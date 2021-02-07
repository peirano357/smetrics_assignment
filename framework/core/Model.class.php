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

class Model {

    //put your code here
    protected $path; //url/entity name

    public function __construct($path) {
        
        // load libraries / helpers
        $this->loader = new Loader();
        $this->loader->library("Request");
        
        $this->basepath = $GLOBALS['config']['apipath'];
        $this->endpoint = $GLOBALS['config']['apipath'] . $path;
        $this->email = $GLOBALS['config']['email'];
        $this->name = $GLOBALS['config']['name'];
        $this->clientid = $GLOBALS['config']['clientid'] ;
    }

    /**
     * @TO-DO: implement token check, use this function instead of creating
     * a new token on every call
     * 
     */
    protected function isTokenValid() {
        
    }

    
    /**
     * Generates an access token for a given user on
     * Supermetrics service.
     * @return string
     */

    protected function generateAccessToken() {
        $params = array('client_id' => $this->clientid , 'email' =>  $this->email, 'name' => $this->name);
        $tokenRequest = json_decode(\CurlRequest\Request::basicPost($this->basepath.'register', $params));
        $token = $tokenRequest->data->sl_token;
        return $token;
    }
}