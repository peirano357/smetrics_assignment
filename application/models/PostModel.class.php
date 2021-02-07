<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author josep
 */
class PostModel extends Model {

    /**
     * Fetchs all posts by a given url
     * @param string $url
     * @param int $page
     * @return obj array
     */
    public function fetchPosts($url, $page) {
        $token = $this->generateAccessToken();
        $availablePosts = json_decode(\CurlRequest\Request::basicGet($url . '?sl_token=' . $token . '&page=' . $page));
        return $availablePosts->data;
    }

    /**
     * Groups/Sorts a given array by a given key
     * @param array $array
     * @param string $key
     * @return array
     */
    public function groupPosts(array $array, $key) { // , $substr_lenght=NULL
        if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
            trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
            return null;
        }

        $func = (!is_string($key) && is_callable($key) ? $key : null);
        $_key = $key;

        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ($array as $value) {
            $key = null;

            if (is_callable($func)) {
                $key = call_user_func($func, $value);
            } elseif (is_object($value) && property_exists($value, $_key)) {
                $key = $value->{$_key};
            } elseif ( isset($value[$_key])) {
                $key = $value[$_key];
            }

            if ($key === null) {
                continue;
            }

            if ($_key == 'created_time') {
                $key = substr($key, 0, 7);
            }

            $grouped[$key][] = $value;
        }

        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();

            foreach ($grouped as $key => $value) {
                $params = array_merge([$value], array_slice($args, 2, func_num_args()));

                $grouped[$key] = call_user_func_array(array($this, 'groupPosts'), $params);
            }
        }
        return $grouped;
    }

    /**
     * Retrieves the longest post from a given array of posts
     * grouped by some key
     * @param obj array $posts
     * @return array
     */
    public function getLongestPost(array $posts) {

        // @TO-DO valdiate if there is more than 1 longest post
        // right now if there are 2 posts with the max char length, 
        // it will return the first one found.

        $longest_post = $posts[0];
        $longest_count = strlen($posts[0]->message);

        foreach ($posts as $post) {
            $post_length = strlen($post->message);
            if ($post_length > $longest_count) {
                $longest_post = $post;
                $longest_count = strlen($post->message);
            }
        }

        $longest_post->chars_count = $longest_count;
        return $longest_post;
    }

    /**
     * Retrieves the average characters length of posts
     * from a given array of posts
     * grouped by some key
     * @param obj array $posts
     * @return int
     */
    public function getAverageCharsLength(array $posts) {

        $total_chars_count = 0;
        foreach ($posts as $post) {
            $post_length = strlen($post->message);
            $total_chars_count = $total_chars_count + $post_length;
        }

        return floor($total_chars_count / count($posts));
    }

    /**
     * Retrieves total posts amount split by week number in a month
     * @param obj array $posts
     * @return array
     */
    public function getTotalPostsByWeekNumber(array $posts, $yearly = FALSE) {

        $this->loader->helper("DateTime");

        $weeks_in_month = array('Week 1' => 0, 'Week 2' => 0, 'Week 3' => 0, 'Week 4' => 0, 'Week 5' => 0, 'Week 6' => 0);
        foreach ($posts as $post) {
            // find week number in month
            $week_number = \Helpers\DateTime::weekOfMonth($post->created_time);
            $weeks_in_month['Week ' . $week_number] ++;
        }

        return $weeks_in_month;
    }

     /**
     * Retrieves an average number of posts by a given user
     * grouped by some key
     * @param obj array $posts
     * @return array
     */
    
    public function averagePostsByUser(array $posts) {

        $posts_by_user = $this->groupPosts($posts, 'from_id');
        $average_posts_in_month = [];
        foreach ($posts_by_user as $user_post_key => $user_post_value) {
            $average_posts_in_month[$user_post_key] = round(count( $user_post_value)*100/count($posts),2);
        }
        return $average_posts_in_month;
    }
}
