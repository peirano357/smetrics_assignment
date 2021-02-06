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
        //include CURR_VIEW_PATH . "main.html";
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
        include CURR_VIEW_PATH . "list.html";
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
            $processed_result['average_chars_lenght_in_month'][$posts_month_key] = $postModel->getAverageCharsLength($posts_month_value);
        }
        
        /*
        echo '<pre>';
        print_r($processed_result);
        echo '</pre>';
        */
    }

}
