<?php
namespace CurlRequest;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author josep
 */
class Request {
    
     /**
     * Constructs a new Request object with his parent
     * default properties.
     */
    public function __construct() {

    }
    

    public static function basicGet($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json')
        );
        $result = curl_exec($ch);

        // handle curl error
        if ($result === false) {
            // throw new Exception('Curl error: ' . curl_error($crl));
            print_r('Curl error: ' . curl_error($ch));
            die();
        } else {
            //print_r($result);
            return $result;
        }
        // Close cURL session handle
        curl_close($ch);
    }

    public static function basicPost($url, $arrData) {

        $post_data = json_encode($arrData);

        // Prepare new cURL resource
        $crl = curl_init($url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($crl, CURLINFO_HEADER_OUT, true);
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);

        // Set HTTP Header for POST request  // 'Content-Length: ' . strlen($payload)
        curl_setopt($crl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json')
        );

        // Submit the POST request
        $result = curl_exec($crl);

        // handle curl error
        if ($result === false) {
            // throw new Exception('Curl error: ' . curl_error($crl));
            print_r('Curl error: ' . curl_error($crl));
            die();
        } else {
            //print_r($result);
            return $result;
        }
        // Close cURL session handle
        curl_close($crl);
    }
}
