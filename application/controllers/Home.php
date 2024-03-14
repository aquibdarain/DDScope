<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use Firebase\JWT\JWT;

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Signup_model');
		$this->load->model('Signin_model');
		$this->load->helper('my_general_helper');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function investor()
	{
		$this->load->view('investor');
	}
	public function policy()
	{
		$this->load->view('policy');
	}
	// public function adds()
	// {
	// 	$this->load->view('adsview');
	// }

	public function vision()
	{
		$this->load->view('vision');
	}

	public function career()
	{
		$this->load->view('career');
	}

	public function video()
	{
		$this->load->view('video');
	}

	public function ads()
	{
		$this->load->view('ads');
	}

	public function enquire()
	{
		$this->load->view('enquire');
	}

	public function signup()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$this->load->view('signup');
	}

	// public function Signupdata()
	// {
	// 	// exit;
	// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 		$name = $_POST["name"];
	// 		$email = $_POST["email"];
	// 		$city = $_POST["city"];
	// 		$city = $_POST	["city"];
	// 		$selectedOptions = $_POST["notify_options"];
	// 		$interestedOptions = $_POST["interest_options"];
	// 		// $notifyOptions = $this->input->post('notify_options');
	// 		// $selectedOptions = json_decode($this->input->post('selectedOptions'), true);
	// 		// echo"<pre>";
	// 		// print_r($_POST);exit;

	// 		// print_r($selectedOptions);exit;

	// 		// print_r($selectedOptions);exit;

	// 		$countrycode = $_POST["country-code"];
	// 		$number = $_POST["number"];
	// 		$phoneNumber = $countrycode . '-' . $number;
	// 		$password = $_POST["password"];
	// 		$hashedPassword = hash('sha512', $password);
	// 		// print_r($hashedPassword);exit;
	// 		if (empty($name) || empty($email) || empty($city) || empty($selectedOptions) || empty($interestedOptions) || empty($countrycode) || empty($number) || empty($password)) {
	// 			$this->session->set_flashdata('error_message', 'All fields are required. Please fill in all the required information.');
	// 			redirect('Home/signup');
	// 			return;
	// 		}

	// 		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	// 			$this->session->set_flashdata('error_message', 'Invalid email format. Please enter a valid email address.');
	// 			redirect('Home/signup');
	// 			return;
	// 		}

	// 		$this->load->model('Signup_model');
	// 		if ($this->Signup_model->isEmailExists($email)) {
	// 			// echo"hi";exit;
	// 			$this->session->set_flashdata('error_message', 'Email already exists. Please choose a different email.');
	// 			redirect('Home/signup');
	// 			return;
	// 		}

	// 		// 	if ($this->Signup_model->isphoneExists($phoneNumber)) {
	// 		// 		$this->session->set_flashdata('error_message', 'Phone Number already exists. Please choose a different Phone Number.');
	// 		// 	   redirect('home/signup');   
	// 		// 	   return;
	// 		//   }
	// 		$ok = $this->sendsignupdata($name, $email, $city, $phoneNumber, $password, $selectedOptions, $interestedOptions);
	// 		// print_r($ok);exit;
	// 		if (!empty($ok['reg_id'])) {
	// 			// $this->sendVerificationEmail($email);

	// 			$this->session->set_flashdata('success_messages', 'A verification link has been sent to your email. Please check your inbox and follow the instructions to complete the email verification process.');

	// 			redirect('Home/sendmailtoverify');
	// 		} else {
	// 			$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
	// 			redirect('Home/signup');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
	// 		redirect('Home/signup');
	// 	}
	// 	//  $insertedUserId = $this->Signup_model->insertUser($name, $email, $city, $phoneNumber, $hashedPassword);

	// 	//  if ($insertedUserId) {
	// 	// 	foreach ($selectedOptions as $option) {
	// 	//         $this->Signup_model->insertSelectedOption($insertedUserId, $option);
	// 	//     }
	// 	// 	foreach ($interestedOptions as $options) {
	// 	//         $this->Signup_model->insertInterestedOption($insertedUserId, $options);
	// 	//     }
	// 	// 	$this->sendVerificationEmail($email);

	// 	// 	$this->session->set_flashdata('success_messages', 'A verification link has been sent to your email. Please check your inbox and follow the instructions to complete the email verification process.');
	// 	//     // $this->load->view('signin');
	// 	// 	// $this->load->view('sendmailtoverify');

	// 	//     redirect('Home/sendmailtoverify');
	// 	//     } else {
	// 	// 	$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
	// 	// 	redirect('Home/signup');	
	// 	// }

	// }


	public function Signupdata()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$email = $_POST["email"];
			$city = $_POST["city"];
			$phoneNumber = $_POST["reg_mobile"];
			$selectedOptions = $_POST["notify_options"];
			$interestedOptions = $_POST["interest_options"];


			// $notifyOptions = $this->input->post('notify_options');
			// $selectedOptions = json_decode($this->input->post('selectedOptions'), true);
			// echo"<pre>";
			// print_r($_POST);exit;

			// print_r($selectedOptions);exit;

			// print_r($selectedOptions);exit;

			$countrycode = $_POST["country-code"];
			$number = $_POST["number"];
			$phoneNumber = $countrycode . '-' . $number;
			$password = $_POST["password"];
			$hashedPassword = hash('sha512', $password);
			// print_r($hashedPassword);exit;
			if (empty($name) || empty($email) || empty($city) || empty($selectedOptions) || empty($interestedOptions) || empty($countrycode) || empty($number) || empty($password)) {
				$this->session->set_flashdata('error_message', 'All fields are required. Please fill in all the required information.');
				redirect('Home/signup');
				return;
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->session->set_flashdata('error_message', 'Invalid email format. Please enter a valid email address.');
				redirect('Home/signup');
				return;
			}

			$this->load->model('Signup_model');
			if ($this->Signup_model->isEmailExists($email)) {
				// echo"hi";exit;
				$this->session->set_flashdata('error_message', 'Email already exists. Please choose a different email.');
				redirect('Home/signup');
				return;
			}

			// 	if ($this->Signup_model->isphoneExists($phoneNumber)) {
			// 		$this->session->set_flashdata('error_message', 'Phone Number already exists. Please choose a different Phone Number.');
			// 	   redirect('home/signup');   
			// 	   return;
			//   }
			$ok = $this->sendsignupdata($name, $email, $city, $phoneNumber, $password, $selectedOptions, $interestedOptions);
			// print_r($ok);exit;
			if (!empty($ok['reg_id'])) {
				// $this->sendVerificationEmail($email);

				$this->session->set_flashdata('success_messages', 'A verification link has been sent to your email. Please check your inbox and follow the instructions to complete the email verification process.');

				redirect('Home/sendmailtoverify');
			} else {
				$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
				redirect('Home/signup');
			}
		} else {
			$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
			redirect('Home/signup');
		}

		// Generate token
		$tokenData = array(
			'reg_id' => $ok['reg_id'], // Assuming $ok['reg_id'] contains the user's registration ID
			// 'email' => $email,
			'reg_username' => $name,
			'reg_email' => $email,
			'reg_user_city' => $city,
			'reg_mobile' => $phoneNumber,
			'reg_password' => $password,
			'reg_notify_me' => $selectedOptions,
			'reg_intrested_in' => $interestedOptions,
			// You can add more data to your token if needed
		);

		$secretKey = '5+5`3LaZLjE[>nBq10tLcZ-{?/HlG]:uJZZ[A@LJZ/q+BcG^bBMtA(POv!}l2IohUBB/,%tNMep=B5]6GMLi:uJ}Bpm89`/FRlPG)Q8;K)~`:gI+I?'; // Make sure to keep your secret key secure

		$token = JWT::encode($tokenData, $secretKey);

		// Now you can send the verification link containing the token to the user's email

		// Your email sending logic here, including the verification link with the token

		// Example:
		// $verificationLink = base_url('verify_email?token=' . $token);
		// $emailContent = "Please click the following link to verify your email: $verificationLink";

		// Send the email

		// End of email sending logic

		// Redirect user to a page indicating that an email has been sent for verification
		$this->session->set_flashdata('success_messages', 'A verification link has been sent to your email. Please check your inbox and follow the instructions to complete the email verification process.');
		redirect('Home/sendmailtoverify');
		// } else {
		// 	$this->session->set_flashdata('error_message', 'Invalid data.Try Again.');
		// 	redirect('Home/signup');
		// }
	}











	private function sendsignupdata($name, $email, $city, $phoneNumber, $password, $selectedOptions, $interestedOptions)
	{

		// print_r($email);exit;
		$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/signup';
		// $verificationUrl = 'https://ldtchndw-3000.inc1.devtunnels.ms/web/user/signup';

		$requestData = [
			'reg_username' => $name,
			'reg_email' => $email,
			'reg_user_city' => $city,
			'reg_mobile' => $phoneNumber,
			'reg_password' => $password,
			'reg_notify_me' => $selectedOptions,
			'reg_intrested_in' => $interestedOptions,
		];

		$ch = curl_init($verificationUrl);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
		]);

		$response = curl_exec($ch);
		//  var_dump($response);

		if (curl_errno($ch)) {
			error_log('Curl error: ' . curl_error($ch));
		}

		curl_close($ch);

		$responseData = json_decode($response, true);
		//  echo"<pre>";
		//  print_r($responseData);

		if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
			return $responseData['data'];
		} else {
			$this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
			return false;
		}
	}






	private function sendVerificationEmail($email)
	{

		// print_r($email);exit;
		$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/email-verify-link';
		// $verificationUrl = 'https://ldtchndw-3000.inc1.devtunnels.ms/web/user/email-verify-link';

		$requestData = [
			'web_user_email' => $email
		];

		$ch = curl_init($verificationUrl);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			error_log('Curl error: ' . curl_error($ch));
		}

		curl_close($ch);

		$responseData = json_decode($response, true);

		if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
			$this->session->set_flashdata('success_message', $responseData['message']);
		} else {
			$this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
		}
	}



	public function signin()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$this->load->view('signin');
	}

	public function sendmailtoverify()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$this->load->view('sendmailtoverify');
	}
	public function Signindata()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$result = $this->sendsignindata($email, $password);

			//echo"<pre>";
			//print_r($result);exit;

			if ($result['status'] === "false") {

				$this->session->set_flashdata('error_messages', $result['message']);
				redirect('Home/signin');
			} else {

				$this->session->set_userdata('User_id', $result['data']['reg_id']);
				$this->session->set_userdata('reg_username', $result['data']['reg_username']);
				$this->session->set_userdata('reg_email', $result['data']['reg_email']);

				redirect('Home/notifymepage');
			}
		}
	}


	// $this->load->model('Signin_model');
	// $result = $this->Signin_model->verifyCredentials($email, $password);

	// if ($result['reg_email_verify'] == 0) {
	// 	$this->sendVerificationEmail($email);
	// 	$this->session->set_flashdata('error_messages', 'Email not verified. Please check your email for the verification link.');
	// 	redirect('Home/signin');
	// } elseif (!empty($result['reg_id'])) {
	// 	// Sign in successful
	// 	$this->session->set_flashdata('success_message', 'Sign in successful.');
	// 	$this->session->set_userdata('User_id', $result['reg_id']);
	// 	redirect('Home/notifymepage');
	// } else {
	// 	// Invalid email or password
	// 	$this->session->set_flashdata('error_messages', 'Invalid email or password. Please try again.');
	// 	redirect('Home/signin');
	// }

	// if ($result === 'not_verified') {
	// 	$this->sendVerificationEmail($email);
	// 	$this->session->set_flashdata('error_messages', 'Email not verified. Please check your email for the verification link.');
	// 	redirect('Home/signin');
	// } elseif ($result) {
	// 	$this->session->set_flashdata('success_message', 'Sign in successful.');
	// 	$this->session->set_userdata('User_id', $result);
	// 	redirect('Home/notifymepage');
	// } else {
	// 	$this->session->set_flashdata('error_messages', 'Invalid email or password. Please try again.');
	// 	redirect('Home/signin');
	// }

	private function sendsignindata($email, $password)
	{

		// print_r($email);exit;
		$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/signin';
		// $verificationUrl = 'https://ldtchndw-3000.inc1.devtunnels.ms/web/user/signup';

		$requestData = [
			'reg_email' => $email,
			'reg_password' => $password,
		];

		$ch = curl_init($verificationUrl);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
		]);

		$response = curl_exec($ch);
		//  echo"<pre>";

		//  print_r($response);

		//  var_dump($response);

		if (curl_errno($ch)) {
			error_log('Curl error: ' . curl_error($ch));
		}

		curl_close($ch);

		//  $responseData = json_decode($response, true);
		//  echo"<pre>";
		//  print_r($responseData);

		$responseData = json_decode($response, true);
		if ($responseData !== null) {
			// Extract message and status from $responseData
			$message = isset($responseData['message']) ? $responseData['message'] : '';
			$data = isset($responseData['data']) ? $responseData['data'] : '';
			$status = isset($responseData['status']) ? $responseData['status'] : false; // Set status to false if it's empty

			// Echo message and status for debugging
			// Assign message and status to new variables
			$messageOutput = $message;
			$data = $data;
			$statusOutput = ($status ? "true" : "false");

			$statusData = [
				'message' => $messageOutput,
				'status' => $statusOutput,
				'data' => $data,
			];

			return $statusData;
		} else {

			$this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
			return false;
		}




		//  if ($response && isset($response['status']) && $response['status'] === true) {
		// 	print_r("no");

		// 	 return $response['data'];
		// } else {
		// 	print_r("yes");

		// 	$this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
		// 	return false;
		// }

	}
	// public function notifymepage()
	// {	
	// 	$User_id = $this->session->userdata('User_id');

	// 	$this->load->view('notifymepage');
	// }

	// public function notifymepage() {
	// 	if (!$this->session->userdata('User_id')) {
	// 		redirect('Home/signin');
	//    }
	//      $User_id = $this->session->userdata('User_id');
	// 	//  print_r($User_id);

	//      $result = $this->Signin_model->getNotifyData($User_id);
	//      $results = $this->Signin_model->getinterestData($User_id);

	//      $data['result'] = $result;
	//      $data['results'] = $results;
	// 	//  echo"<pre>";
	// 	//  print_r($data);exit;
	// 	if ($User_id) {
	//         $this->session->set_userdata('is_logged_in', true);
	//     }
	//     $this->load->view('notifymepage', $data);
	// }


	public function notifymepage()
	{
		if (!$this->session->userdata('User_id')) {
			redirect('Home/signin');
		}

		$User_id = $this->session->userdata('User_id');
		$result = $this->Signin_model->getNotifyData($User_id);
		$results = $this->Signin_model->getinterestData($User_id);

		$data['result'] = $result;
		$data['results'] = $results;

		$data['user_name'] = $this->session->userdata('reg_username');
		$data['user_email'] = $this->session->userdata('reg_email');

		if ($User_id) {
			$this->session->set_userdata('is_logged_in', true);
		}

		//echo"<pre>";
		//print_r($data);exit;
		$this->load->view('notifymepage', $data);
	}


	public function profile()
	{
		if (!$this->session->userdata('User_id')) {
			redirect('Home/signin');
		}

		// Fetch user data from session
		$data['user_name'] = $this->session->userdata('reg_username');
		$data['user_email'] = $this->session->userdata('reg_email');
		// 	echo"<pre>";
		// print_r($_SESSION);exit;
		$this->load->view('profile', $data);
	}


	public function user_delete()

	{
		$reg_id = $this->input->post('reg_id');
		// print_r($reg_id);exit;
		$reg_id = $this->session->userdata("User_id");
		$apiLink = 'user/' . $reg_id . '/delete-user';

		$dataArray = array(
			"reg_id" => $reg_id,
			"returnType" => "Web",
			"language" => $this->session->userdata("language")
		);

		$post_data = json_encode($dataArray);
		//   print_r($post_data);

		$response = callApidelete($apiLink, $post_data);
		//print_r($response);exit;
		if ($response['status'] == 1) {
			// Destroy the session
			$this->session->sess_destroy();
		}

		redirect('Home/signin');
	}



	// public function reject_user()

	// {
	//     $reg_id = $this->input->post('reg_id');
	//     // print_r($reg_id);exit;
	//     $reg_id = $this->session->userdata("User_id");
	//     $apiLink = 'user/' . $reg_id . '/delete-user';

	//     $dataArray = array(
	//         "reg_id" => $reg_id,     
	//         "returnType" => "Web",
	//         "language" => $this->session->userdata("language")
	//     );

	//      $post_data = json_encode($dataArray);
	// //   print_r($post_data);

	//      $response = callApidelete($apiLink, $post_data);
	//      //print_r($response);exit;
	//      if ($response['status'] == 1) {
	//         // Destroy the session
	//         $this->session->sess_destroy();
	//     }

	//    redirect('Home/signin');     

	// }   



	public function ForgetPassword()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$this->load->view('ForgetPassword');
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url('Home'));
	}


	public function send_reset_email()
	{
		$email = $this->input->post('email');
		// print_r($email);

		$this->load->model('Signin_model');
		$userName = $this->Signin_model->getUserNameByEmail($email);
		$name = $userName->web_user_name;
		// print_r($name);exit;

		$this->load->library('encryption');
		$id = $userName->web_user_id;
		$encrypted_user_id = $this->encryption->encrypt($id);

		// print_r($id);

		// $encrypted_id = encrypt_id($id);

		// print_r($encrypted_id);exit;
		// $encrypted_user_id = hash('sha512', $id);

		// $encrypted_user_id = encrypt_id($id); 
		// print_r($encrypted_user_id);exit;


		if (empty($userName)) {
			$this->session->set_flashdata('error_message', 'Email address not found. Please check and try again.');
			redirect('ForgetPassword');
		}

		$this->load->library('email');

		// Configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.smtp2go.com';
		$config['smtp_port'] = 587;
		$config['smtp_user'] = 'virtualglobetechnology@gmail.com';
		$config['smtp_pass'] = 'TuNdxesORHSXLBc3';
		$config['smtp_crypto'] = 'tls';
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from('DozenDiamond@virtualglobetechnology.com', 'Dozen Diamond');
		$this->email->to($email);

		//print_r($email);exit;

		$this->email->subject('Password Reset');

		$reset_link = base_url("Home/reset_userpassword_page");

		$timestamp = time();
		$expiration_time = $timestamp + 300;
		$reset_link_with_id = $reset_link . '?id=' . urlencode($encrypted_user_id) . '&timestamp=' . $timestamp;

		// $reset_link_with_id = $reset_link . '?id=' . urlencode($encrypted_user_id);

		// Set the email message in HTML format
		// $msg = "<html><head></head>";
		// $msg .= "<body class='mailtext'>";
		// $msg .= "<div align='left'>";
		// $msg .= "<h4>Hello $name,</h4>";
		// $msg .= "<p><b>Click the link below to reset your password:</b></p>";
		// $msg .= "<p><a href='{$reset_link_with_id}'>Reset Password</a></p>";
		// $msg .= "<table border='0' width='100%' id='table1' cellspacing='0' cellpadding='0'>";
		// $msg .= "<tbody>";
		// $msg .= "<tr><td><b>Regards,</b></td></tr>";
		// $msg .= "<tr><td>Dozen Diamond</td></tr>";
		// $msg .= "</table></div></body></html>";


		$msg = "<html>
    <head>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 0;
            }

            .mail-container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border: 2px solid #007bff;
            }

            h4 {
                color: #007bff;
            }

            p {
                font-size: 16px;
                line-height: 1.5;
            }

            a {
                display: inline-block;
                padding: 8px 15px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
            }

            a:hover {
                background-color: #0056b3;
            }

            table {
                margin-top: 20px;
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 10px;
            }

            .footer {
                margin-top: 20px;
                text-align: center;
                color: #888;
            }
        </style>
    </head>
    <body>
        <div class='mail-container'>
            <h4>Hello $name,</h4>
			<h4 style='color: #000;'>We received a request to reset the password for your account. If you did not make this request, please ignore this email.</h4>
            <p><b>Click the link below to reset your password:</b></p>
			<p><a href='{$reset_link_with_id}' style='color: #fff; text-decoration: none; background-color: #007bff; padding: 8px 15px; border-radius: 5px; font-size: 14px; display: inline-block;'>Reset Password</a></p>
            <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                    <td><b>Regards,</b></td>
                </tr>
                <tr>
                    <td>Dozen Diamond</td>
                </tr>
            </table>
            <div class='footer'>© " . date('Y') . " Dozen Diamond. All rights reserved.</div>
        </div>
    </body>
</html>";




		$this->email->message($msg);

		$this->email->send();
		$this->session->set_flashdata('success_message', 'Password Reset Instructions sent to your Email.');
		redirect('Home/ForgetPassword');
	}

	public function reset_userpassword_page()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$token = $this->input->get('token');
		// print_r($token);
		$this->load->library('encryption');
		$secretKey = '5+5`3LaZLjE[>nBq10tLcZ-{?/HlG]:uJZZ[A@LJZ/q+BcG^bBMtA(POv!}l2IohUBB/,%tNMep=B5]6GMLi:uJ}Bpm89`/FRlPG)Q8;K)~`:gI+I?';

		try {
			$decoded = JWT::decode($token, $secretKey, array('HS256'));
			// $expirationTime = date('Y-m-d H:i:s', $decoded->exp);
			$expirationTime = $decoded->exp;
			// print_r($decoded->exp);
			// print_r($decoded);exit;
			$currentTime = time();
			// print_r($currentTime);exit;

			if ($currentTime > ($expirationTime + 5 * 60)) {
				$this->load->view('genrateNewPassword', ['link_expired' => true]);
			} else {
				// print_r("1");exit;
				$id = $decoded->reg_id;
				$this->load->view('genrateNewPassword');
			}
			// print_r($expirationTime);
			// print_r($decoded);exit;
			$id = $decoded->reg_id;
		} catch (\Firebase\JWT\ExpiredException $e) {
			$this->load->view('genrateNewPassword', ['link_expired' => true]);
		} catch (\Exception $e) {
			$this->load->view('genrateNewPassword');
		}
		// $timestamp = $this->input->get('timestamp');
		// if (time() > $timestamp + 300) {
		// 	$this->load->view('genrateNewPassword', ['link_expired' => true]);
		// } else {
		// 	$this->load->view('genrateNewPassword');
		// }

	}


	public function forgetpassnew()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$password = $this->input->post("password");
			$confpassword = $this->input->post("conf-password");
			$token = $this->input->post('token');
			$this->load->library('encryption');
			// print_r($token);
			$secretKey = '5+5`3LaZLjE[>nBq10tLcZ-{?/HlG]:uJZZ[A@LJZ/q+BcG^bBMtA(POv!}l2IohUBB/,%tNMep=B5]6GMLi:uJ}Bpm89`/FRlPG)Q8;K)~`:gI+I?';

			try {
				$decoded = JWT::decode($token, $secretKey, array('HS256'));

				// print_r($decoded);exit;
				$id = $decoded->reg_id;
			} catch (\Firebase\JWT\ExpiredException $e) {
				echo 'Token has expired';
			} catch (\Exception $e) {
				// Handle other errors
				// echo 'Error decoding token: ' . $e->getMessage();
			}
			//  $decrypted_id = $this->encryption->decrypt($encrypted_user_id);

			// print_r($encrypted_user_id);exit;
			// $hashedPassword = hash('sha512', $password);


			// $updated = $this->Signin_model->updatePassword($id, $hashedPassword);
			$result = $this->sendupdatepassword($token, $password);


			if ($result['status'] === true) {
				$this->session->set_flashdata('success_message', 'Password updated successfully.');
				redirect('Home/reset_userpassword_page');
			} else {
				$this->session->set_flashdata('error_message', 'Failed to update password. Please try again.');
				redirect('Home/reset_userpassword_page?token=' . $token);
			}
		}

		$this->load->view('genrateNewPassword');
	}


	private function sendupdatepassword($token, $password)
	{

		// print_r($email);exit;
		$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/create-new-password';

		$requestData = [
			'token' => $token,
			'new_password' => $password
		];

		$ch = curl_init($verificationUrl);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			error_log('Curl error: ' . curl_error($ch));
		}

		curl_close($ch);

		$responseData = json_decode($response, true);
		return $responseData;
		// print_r($responseData);exit;
		// if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
		// 	 $this->session->set_flashdata('success_message', $responseData['message']);
		// } else {
		// 	 $this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
		// }
	}



	public function save_changes()
	{
		$User_id = $this->session->userdata('User_id');
		// print_r($User_id);

		if ($this->input->post('selected_options')) {
			$selectedOptions = $this->input->post('selected_options');
			// print_r($selectedOptions);


			$ok = $this->Signin_model->update_notify_options($User_id, $selectedOptions);

			// print_r($ok);exit;

			redirect('Home/notifymepage');
		} else {
			redirect('Home/notifymepage');
		}
	}


	public function save_interestedin()
	{
		$User_id = $this->session->userdata('User_id');
		// print_r($User_id);

		if ($this->input->post('selected_options')) {
			$selectedOptions = $this->input->post('selected_options');
			// print_r($selectedOptions);


			$ok = $this->Signin_model->update_interest_options($User_id, $selectedOptions);
			// print_r($ok);exit;

			redirect('Home/notifymepage');
		} else {
			redirect('Home/notifymepage');
		}
	}

	public function Verify_email()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}
		$token = $this->input->get('token');
		$this->load->library('encryption');
		$secretKey = '5+5`3LaZLjE[>nBq10tLcZ-{?/HlG]:uJZZ[A@LJZ/q+BcG^bBMtA(POv!}l2IohUBB/,%tNMep=B5]6GMLi:uJ}Bpm89`/FRlPG)Q8;K)~`:gI+I?';


		try {
			$decoded = JWT::decode($token, $secretKey, array('HS256'));
			// print_r($decoded);exit;
			$reg_id = $decoded->reg_id;
			$this->Signup_model->updateVerifiedEmail($reg_id);

			$this->session->set_flashdata('success_message', 'Email verification successful! <a href="' . base_url('Home/signin') . '">Click here</a> to Sign in.');

			redirect('Home/Verify_email');
		} catch (\Firebase\JWT\ExpiredException $e) {
			$token = $this->input->get('token');

			$userData = $this->Signup_model->getUserDataByToken($token);
			if (is_array($userData) && isset($userData['verified_email'])) {
				if ($userData['verified_email'] == 1) {
					$this->load->view('verifyemail', ['verificationemail' => true]);
				} else {
					$this->load->view('verifyemail', ['link_expiredforverify' => true]);
				}
			} else {
				$this->load->view('verifyemail', ['link_expiredforverify' => true]);
			}
		} catch (\Exception $e) {
			// print_r("hi");exit;
			$this->load->view('verifyemail');
		}
	}

	public function resendlink()
	{
		if ($this->session->userdata('User_id')) {
			redirect('Home');
		}

		$originalToken = $this->input->get('token');
		$userData = $this->Signup_model->getUserDataByToken($originalToken);
		// print_r($originalToken);
		// print_r($userData);

		if ($userData) {
			if ($userData['verified_email'] == 0) {
				$this->sendVerificationEmail($userData['web_user_email']);
				$this->load->view('verifyemail', ['verification_email_sent' => true]);
			} else {
				$this->load->view('verifyemail', ['verificationemail' => true]);
			}
		} else {
			$this->load->view('verifyemail', ['invalid_token' => true]);
		}
	}
	public function waitlist()
	{
		$this->load->view('waitlist');
	}


	// {{baseurl}}/waitlist/add-to-waitlist


	// 	public function waitlist_submit()
	// 	{
	// 		// $reg_id = $this->input->post('reg_id');
	// 		// // print_r($reg_id);exit;
	// 		// $admin_id = $this->session->userdata("admin_id");
	// 		$name = $this->input->post('name');
	// 		$email = $this->input->post('email');

	// 		$apiLink = 'waitlist/add-to-waitlist';
	// 		$baseUrl = 'https://uatdd.virtualglobetechnology.com';


	// 		$dataArray = array(
	// 			"name" => $name,
	// 			"email" => $email,
	// 			// "actionMessage" => $reg_id,
	// 			"returnType" => "Web",
	// 			"language" => $this->session->userdata("language")
	// 		);
	// // print_r($dataArray);exit;
	// 		$post_data = json_encode($dataArray);
	// 		//  print_r($post_data);exit;

	// 		$response = callApiPost($apiLink, $post_data);
	// 		echo"<pre>";
	// 		 print_r($response);exit;
	// 		redirect('admin/Delete_acc/index');
	// 	}



	public function waitlist_submit()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		$apiLink = 'waitlist/add-to-waitlist';
		$baseUrl = 'https://uatdd.virtualglobetechnology.com'; // Base URL

		// Prepare data array
		$dataArray = array(
			"name" => $name,
			"email" => $email
		);

		// Convert data array to JSON
		$post_data = json_encode($dataArray);

		// Initialize cURL session
		$curl = curl_init();

		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => $baseUrl . '/' . $apiLink,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post_data,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			)
		));

		// Execute cURL request
		$response = curl_exec($curl);

		// Close cURL session
		curl_close($curl);

		// Decode JSON response
		$response_array = json_decode($response, true);
		// print_r($response_array);exit;
		// Check if the request was successful
		if ($response_array['status'] == true) {
			// Redirect to the same page
			// echo "hii";exit;
			$this->session->set_flashdata('success_message', "Your request for a meeting with the founder has been successfully submitted. We will review your request and get back to you as soon as possible. Thank you for your interest!");
			redirect('home/waitlist');
		} 
		else {
			// Redirect to an error page
			$this->session->set_flashdata('success_message', "Your request for a meeting with the founder has already been submitted. We'll review your request and get back to you shortly. Thank you for your interest!");
			redirect('home/waitlist');
		}
	}
}
