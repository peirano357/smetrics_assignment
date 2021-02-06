<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Framework
 *
 * @author josep
 */
class Framework {

    //put your code here
    public static function run() {
        self::init();
        self::autoload();
        self::dispatch();
    }

    private static function init() {

        // Define path constants
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", getcwd() . DS);
        define("APP_PATH", ROOT . 'application' . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "lib" . DS);

        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add

        define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');

        define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');

        define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');


        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);

        define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);


        // Load core classes
        require CORE_PATH . "Controller.class.php";
        require CORE_PATH . "Loader.class.php";
        require CORE_PATH . "Model.class.php";


        // Load configuration file
        $GLOBALS['config'] = include CONFIG_PATH . "config.php";
        
        // Start session
        session_start();
    }

    private static function autoload() {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    /**
     * Define your name convenios below for LIBs Controllers, models, etc
     * @param type $classname
     */
    private static function load($classname) {

        // Here simply autoload app’s controller and model classes
        if (substr($classname, -10) == "Controller") {

            // Controller
            require_once CURR_CONTROLLER_PATH . "$classname.class.php";
        } elseif (substr($classname, -5) == "Model") {
            
            // Model
            require_once MODEL_PATH . "$classname.class.php";
        }
    }

    private static function dispatch() {
        // Instantiate the controller class and call its action method
        $controller_name = CONTROLLER . "Controller";
        $action_name = ACTION . "Action";
        $controller = new $controller_name;
        $controller->$action_name();
    }
}