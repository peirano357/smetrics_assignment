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
        $availablePosts = json_decode(\CurlRequest\Request::basicGet($url.'?sl_token='.$token.'&page='.$page));
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
            } elseif (isset($value[$_key])) {
                $key = $value[$_key];
            }

            if ($key === null) {
                continue;
            }
            
            if ($_key == 'created_time'){
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
 
                $grouped[$key] = call_user_func_array(array($this,'groupPosts'), $params);
            }
        }
        return $grouped;
    }
    
    protected function addExtraKeys(array $array){
        
    }

}
