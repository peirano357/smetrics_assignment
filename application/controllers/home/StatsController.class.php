<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author josep
 */
class StatsController {

    //put your code here

    public function mainAction() { 
        // Load DateTimeHelper class
        $this->loader->helper("DateTimeHelper");
        $datetime_helper = new DateTimeHelper();
        $datetime_helper->weekOfMonth(date());

    }

    public function indexAction() {

        $postModel = new PostModel("posts");
        $totalposts = [];

        for ($i = 1; $i <= 5; $i++) {
            $posts = $postModel->fetchPosts($GLOBALS['config']['apipath'] . 'posts', $i);
            $totalposts = array_merge($totalposts, $posts->posts);
            // $posts_grouped = $postModel->groupPosts($posts->posts, 'created_time');
        }

        // now we have all posts in the same array in memory
        $processed_posts = $this->processPosts($totalposts);

        // Load View template
        include CURR_VIEW_PATH . "statistics.php";
    }

    /**
     * This function process the posts aplying the statistics
     * 
     */
    protected function processPosts($posts) {
        
        $processed_result = [];
        $postModel = new PostModel("posts");
        $posts_grouped_month = $postModel->groupPosts($posts, 'created_time');
        
        foreach($posts_grouped_month as $posts_month_key=>$posts_month_value){
            // get longest post by char lenght by month
            $processed_result['longest_post_in_month'][$posts_month_key] = $postModel->getLongestPost($posts_month_value);
            
            // get average chars lenght of posts by month
            $processed_result['average_chars_length_in_month'][$posts_month_key] = $postModel->getAverageCharsLength($posts_month_value);
            
            // get total posts split by week number in the year
            $processed_result['total_posts_per_week_number'][$posts_month_key] = $postModel->getTotalPostsByWeekNumber($posts_month_value);
            
            // get average posts number by user
            $processed_result['average_number_of_post_per_user'][$posts_month_key] = $postModel->averagePostsByUser($posts_month_value);
        
        }
        
        echo json_encode($processed_result);
        
        
        
        

        echo '<pre>';
        print_r($processed_result);
        echo '</pre>';
        
    }

}
