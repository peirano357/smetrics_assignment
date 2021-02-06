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
class ListController {

    //put your code here

    public function mainAction() {

        include CURR_VIEW_PATH . "main.html";

        // Load Captcha class

        $this->loader->library("Request");

        $captcha = new Captcha;

        $captcha->hello();

        $userModel = new UserModel("user");

        $users = $userModel->getUsers();
    }

    public function indexAction() {

        $postModel = new PostModel("posts");
        $totalposts = [];

        for ($i = 1; $i <= 5; $i++) {
            $posts = $postModel->fetchPosts($GLOBALS['config']['apipath'] . 'posts', $i);
            
            $totalposts = array_merge($totalposts, $posts->posts);
            
            
        // $posts_grouped = $postModel->groupPosts($posts->posts, 'created_time');


        }

        
         $posts_grouped = $postModel->groupPosts($totalposts, 'created_time');

        echo '<pre>';
        print_r($posts_grouped);
        echo '</pre>';

        // Load View template

        include CURR_VIEW_PATH . "list.html";
    }

    /**
     * This function generates the statistics
     * 
     */
    protected function processPosts($arrPosts) {
        
    }

}
