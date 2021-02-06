<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loader
 *
 * @author josep
 */

class Loader{

    //put your code here
    // the idea is to do something similar I did when I included
    // the config files.

    public function library($lib){
        include LIB_PATH . "$lib.class.php";
    }
    
    public function helper($helper){
        include HELPER_PATH . "{$helper}_helper.php";
    }

}
