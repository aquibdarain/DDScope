<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipapi {

    private $apiUrl = "http://ip-api.com/json/";
    private $ci;

    public function __construct() {
        // Load the URL helper
        $this->ci =& get_instance();
        $this->ci->load->helper('url');
    }

    public function get_location($ip_address) {
        $url = $this->apiUrl . $ip_address;

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute the request
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            log_message('error', 'Curl error: ' . $error);
            return false;
        }

        // Decode the JSON response
        $decoded_response = json_decode($response, true);

        // Log the response for debugging
        log_message('debug', 'IPAPI response: ' . print_r($decoded_response, true));

        return $decoded_response;
    }
}
