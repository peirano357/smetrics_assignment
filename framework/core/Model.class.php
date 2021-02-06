<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author josep
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '\framework\lib\Request.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '\framework\helper\DateTime.class.php';

class Model {

    //put your code here
    protected $db; //database connection object
    protected $path; //url/entity name
    protected $fields = array();  //fields list

    public function __construct($path) {
        $this->api = new stdClass();
        $this->basepath = $GLOBALS['config']['apipath'];
        $this->endpoint = $GLOBALS['config']['apipath'] . $path;
        $this->email = $GLOBALS['config']['email'];
        $this->name = $GLOBALS['config']['name'];
        $this->clientid = $GLOBALS['config']['clientid'] ;
    }

    protected function isTokenValid() {
        
    }

    protected function generateAccessToken() {
        $params = array('client_id' => $this->clientid , 'email' =>  $this->email, 'name' => $this->name);
        $tokenRequest = json_decode(\CurlRequest\Request::basicPost($this->basepath.'register', $params));
        $token = $tokenRequest->data->sl_token;
        return $token;
    }

    public function pageRows($offset, $limit, $where = '') {

    }

}
