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
class IndexController {
    //put your code here
    
     public function mainAction() {

        include CURR_VIEW_PATH . "main.html";

        // Load Captcha class

        $this->loader->library("Captcha");

        $captcha = new Captcha;

        $captcha->hello();

        $userModel = new UserModel("user");

        $users = $userModel->getUsers();
    }

    public function indexAction() {

        $userModel = new UserModel("user");

        //$users = $userModel->getUsers();

        // Load View template

        include CURR_VIEW_PATH . "index.html";
    }

    public function menuAction() {

        include CURR_VIEW_PATH . "menu.html";
    }

    public function dragAction() {

        include CURR_VIEW_PATH . "drag.html";
    }

    public function topAction() {

        include CURR_VIEW_PATH . "top.html";
    }
}
