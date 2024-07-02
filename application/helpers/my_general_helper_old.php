<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Cybernetix Dev Team
 * @copyright		Copyright (c) 20017, Cybernetix. (http://www.cybernetix.co.in/)
 * @license		http://www.cybernetix.co.in/
 * @link		http://www.cybernetix.co.in/
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter General Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Cybernetix Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/xml_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Check the permission of user with the current action taken over access
 *  
 * @access	public
 * @return	True or Flase
 */


if ( ! function_exists('encrypt_id'))
{
	function encrypt_id($id)
	{	  
		$CI = & get_instance();
		$CI->load->library('encryption');
		$original_id = $id;
		$original_id = $CI->security->xss_clean($original_id);
 
		$encrypt_id = $CI->encryption->encrypt($original_id);
		$encrypt_id = strtr($encrypt_id,array('+' => '.', '=' => '-', '/' => '~'));
 
		if(!empty($encrypt_id))
		{
			return $encrypt_id;
		}
	}
}

if ( ! function_exists('decrypt_id'))
{
	function decrypt_id($encrypt_id)
	{	  
		$CI = & get_instance();
		$CI->load->library('encryption');

		//$encrypt_id = $CI->uri->segment(4,0);			
		$encrypt_id = strtr($encrypt_id,array('.' => '+', '-' => '=', '~' => '/'));
		$decrypted_id = $CI->encryption->decrypt($encrypt_id);			
		$decrypted_id = $CI->security->xss_clean($decrypted_id);

		if(!empty($decrypted_id))
		{
			return $decrypted_id;
		}
	}

if (!defined('ApiAddress')) {
    define('ApiAddress', 'https://uatdd.virtualglobetechnology.com/');
}


	if (!function_exists('callApi')) {
		function callApi($apiLink, $post_data)
		{
			$CI = &get_instance();
			
		    // define('ApiAddress', 'https://uatcni.virtualglobetechnology.com/trutravel/'); 
			define('ApiAddress', 'https://uatdd.virtualglobetechnology.com/'); 
 
			// Get API token
			$TokenData =tokenkey();
			// print_r($TokenData);exit;

			$TokenKey = $TokenData['token'];
			// print_r($TokenKey);exit;
			
			// Initialize cURL session
			$curl = curl_init();
	
			// Set cURL options
			curl_setopt_array($curl, array(
				CURLOPT_URL => ApiAddress . $apiLink,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post_data,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Authorization: $TokenKey"
				),
			));
	
			// Execute cURL request
			$response = curl_exec($curl);
			// echo"<pre>";
			// print_r($response);exit;

			// Close cURL session
			curl_close($curl);
	
			// Decode the JSON response
			$data = json_decode($response, TRUE);

			return $data;
		}
	}

	if (!function_exists('callApiGet')) {
		function callApiGet($apiLink)
		{
			$CI = &get_instance();
	
			//define('ApiAddress', 'https://uatdd.virtualglobetechnology.com/');
	
			// Get API token
			$TokenData = tokenkey();
			$TokenKey = $TokenData['token'];
	
			// Initialize cURL session
			$curl = curl_init();
	
			// Set cURL options for GET request
			curl_setopt_array($curl, array(
				CURLOPT_URL => ApiAddress . $apiLink,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Authorization: $TokenKey"
				),
			));
	
			// Execute cURL request
			$response = curl_exec($curl);
			// 	echo"<pre>";
			// print_r($response);exit;
			// Close cURL session
			curl_close($curl);
	
			// Decode the JSON response
			$data = json_decode($response, TRUE);
	
			return $data;
		}
	}

	if (!function_exists('callApiPost')) {
		function callApiPost($apiLink, $requestData)
		{	
			// print_r($apiLink);
			// print_r($requestData);exit;
			$CI = &get_instance();
	
			define('ApiAddress', 'https://uatdd.virtualglobetechnology.com/');
	
			// Get API token
			$TokenData = tokenkey();
			$TokenKey = $TokenData['token'];
	
			// Initialize cURL session
			$curl = curl_init();
	
			// Set cURL options for POST request
			curl_setopt_array($curl, array(
				CURLOPT_URL => ApiAddress . $apiLink,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($requestData),
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Authorization: $TokenKey"
				),
			));
	
			// Execute cURL request
			$response = curl_exec($curl);
	
			// Close cURL session
			curl_close($curl);
	
			// Decode the JSON response
			$data = json_decode($response, TRUE);
	
			return $data;
		}
	}

	if (!function_exists('callApiDelete')) {
		function callApiDelete($apiLink, $post_data)
		{
			$CI = &get_instance();
			
		    // define('ApiAddress', 'https://uatcni.virtualglobetechnology.com/trutravel/'); 
			define('ApiAddress', 'https://uatdd.virtualglobetechnology.com/'); 
 
			// Get API token
			$TokenData =tokenkey();
			// print_r($TokenData);exit;

			$TokenKey = $TokenData['token'];
			// print_r($TokenKey);exit;
			
			// Initialize cURL session
			$curl = curl_init();
	
			// Set cURL options
			curl_setopt_array($curl, array(
				CURLOPT_URL => ApiAddress . $apiLink,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "DELETE",
				CURLOPT_POSTFIELDS => $post_data,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Authorization: $TokenKey"
				),
			));
	
			// Execute cURL request
			$response = curl_exec($curl);
			// echo"<pre>";
			// print_r($response);exit;

			// Close cURL session
			curl_close($curl);
	
			// Decode the JSON response
			$data = json_decode($response, TRUE);

			return $data;
		}
	}
	
	
	if (!function_exists('tokenkey')) {
		function tokenkey()
		{	

			$CI = &get_instance();
			$curl = curl_init();
			curl_setopt_array($curl, array(
				// CURLOPT_URL => ApiAddress . "application/controllers/api/Registereduser/generateJwtToken",
				CURLOPT_URL => ApiAddress . "user/generateToken",

				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => '{
					"clientID": "DOZEN_DIAMONDS_CLIENT_ID",
					"secretKey": "5+5`3LaZLjE[>nBq10tLcZ-{?/HlG]:uJZZ[A@LJZ/q+BcG^bBMtA(POv!}l2IohUBB/,%tNMep=B5]6GMLi:uJ}Bpm89`/FRlPG)Q8;K)~`:gI+I?",
					"returnType": "Web"
				}',
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json"
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
	
			$data = json_decode($response, TRUE);
			// print_r($data);exit;
	
			return $data;
		}
	}

	 
	
}
