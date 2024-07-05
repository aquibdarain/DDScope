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
		$this->load->model('AdsModel');
		$this->load->model('Admin_blog_model');
		$this->load->model('admin_testimonial_model');
		$this->load->model('Contactus_model');
		$this->load->model('Admin_aboutus_model');
		$this->load->model('Faq_model');


		$this->load->helper('my_general_helper');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['testimonials'] = $this->admin_testimonial_model->get_testimonials();
		// print_r($data);exit;
		$this->load->view('welcome_message', $data);
	}

	// adding new for checking only
	public function preview()
	{
		$this->load->view('welcome1');
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
	public function vision3()
	{
		$this->load->view('vision3');
	}

	public function vision_new()
	{
		$this->load->view('vision2');
	}

	public function career()
	{
		$this->load->view('career');
	}

	public function video()
	{
		$this->load->view('video');
	}

	// 	public function ads()
	// 	{
	// 		$this->load->view('ads');
	// 	}

	// public function ads() {
	//     $data['adsvideos'] = $this->AdsModel->getAllAdsVideos(); 

	//     $this->load->view('adsnew1', $data);
	// }

	public function Ads()
	{
		$data['adsvideos'] = $this->AdsModel->getAllAdsVideos();

		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			if (isset($_POST['vidnum'])) {
				$vidnum = $_POST['vidnum'];
				$data['adsvideos'] = $this->AdsModel->getAllAdsVideos();
				$data['vidnum'] = $vidnum;

				redirect('Home/ShowVideo/' . $vidnum);
			} else {
				echo "Error: Video code not received.";
			}
		} else {
			$this->load->view('adsnew1', $data);
		}
	}

	// public function blog()
	// {
	// 	$this->load->view('blog');
	// }

	public function blogdetails()
	{
		$this->load->view('blog-details');
	}

	public function blogdetails2()
	{
		$this->load->view('blog-details2');
	}

	public function blogdetails3()
	{
		$this->load->view('blog-details3');
	}

	public function blogdetails4()
	{
		$this->load->view('blog-details4');
	}

	public function blogdetails5()
	{
		$this->load->view('blog-details5');
	}

	public function blogdetails6()
	{
		$this->load->view('blog-details6');
	}

	public function blog()
	{
		$this->load->library("pagination");

		// Get all blogs
		$all_blogs = $this->Admin_blog_model->getblogById();

		// Pagination configuration
		$config = array();
		$config["base_url"] = base_url("Home/blog");
		$config["total_rows"] = count($all_blogs);
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config['num_links'] = 5;
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		// Get current page number
		$page = $this->uri->segment(3);
		if (!is_numeric($page)) {
			$page = 0;
		} else {
			$page = intval($page);
		}

		$offset = ($page > 0) ? ($page - 1) * $config["per_page"] : 0;

		// Get blogs for current page
		$data['blogs'] = array_slice($all_blogs, $offset, $config["per_page"]);

		// Create pagination links
		$data["links"] = $this->pagination->create_links();

		// Flash messages
		$data['show_login_modalwrong'] = $this->session->flashdata('show_login_modalwrong');
		$data['show_pass_modalwrong'] = $this->session->flashdata('show_pass_modalwrong');
		$data['show_signupT_modalwrong'] = $this->session->flashdata('show_signupT_modalwrong');
		$data['show_signupP_modalwrong'] = $this->session->flashdata('show_signupP_modalwrong');
		$data['show_loginP_modalwrong'] = $this->session->flashdata('show_loginP_modalwrong');
		$data['show_forgetP_modalwrong'] = $this->session->flashdata('show_forgetP_modalwrong');

		$data['error_messageswrong'] = $this->session->flashdata('error_messageswrong');
		$data['success_message'] = $this->session->flashdata('success_message');
		$data['error_messagesPsign'] = $this->session->flashdata('error_messagesPsign');
		$data['error_messagesPlogin'] = $this->session->flashdata('error_messagesPlogin');
		$data['error_messagesTsign'] = $this->session->flashdata('error_messagesTsign');

		$this->load->view('blog', $data);
	}


	public function ShowVideo($vidnum = null)
	{
		if ($vidnum) {
			$vidnums = decrypt_id($vidnum);
			$data['vidnum'] = $vidnums;
		} else {
			$data['vidnum'] = null;
		}
		$data['adsvideos'] = $this->AdsModel->getAllAdsVideos();
		$data['caption'] = '';

		if ($data['vidnum']) {
			foreach ($data['adsvideos'] as $video) {
				if ($video->vidnum == $data['vidnum']) {
					$data['caption'] = $video->caption;
					break;
				}
			}
		}

		$this->load->view('adsnew1', $data);
	}
	// public function ShowVideo($vidnum = null) {
	//     if($vidnum) {
	//         $vidnums = decrypt_id($vidnum);
	//         $data['vidnum'] = $vidnums;
	//     } else {
	//         $data['vidnum'] = null;  
	//     }
	//     $data['adsvideos'] = $this->AdsModel->getAllAdsVideos(); 
	//     $this->load->view('adsnew1', $data);
	// }

	// public function AdsVideo()
	// {   
	//     $data['adsvideos'] = $this->AdsModel->getAllAdsVideos(); 

	//     if ($_SERVER["REQUEST_METHOD"] === "POST") {
	//         if (isset($_POST['video_code'])) {
	//             $videoCode = $_POST['video_code'];
	//             $data['adsvideos'] = $this->AdsModel->getAllAdsVideos(); 
	//             $data['videoCode'] = $videoCode;
	//             $this->load->view('adsnew1', $data);

	//         } else {
	//             echo "Error: Video code not received.";
	//         }
	//     } else {
	//         $this->load->view('adsnew1', $data);
	//     }
	// }
	public function enquire()
	{
		// Load form validation library
		$this->load->library('form_validation');

		// Set validation rules
		$this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('number', 'Mobile Number', 'required|exact_length[10]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required');

		// Set error delimiters
		// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			// If validation fails, load the view with validation errors
			$this->load->view('enquire');
		} else {
			// Validate reCAPTCHA
			$recaptchaResponse = $this->input->post('g-recaptcha-response');
			$recaptchaSecret = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptchaSecret . "&response=" . $recaptchaResponse);
			$responseKeys = json_decode($response, true);

			if (intval($responseKeys["success"]) !== 1) {
				// reCAPTCHA validation failed
				$this->form_validation->set_message('g-recaptcha-response', 'Please complete the reCAPTCHA.');
				$this->load->view('enquire');
			} else {
				// If validation succeeds, set a flash message
				$this->session->set_flashdata('success_message', 'Your enquiry has been submitted successfully!');
				// Redirect to the enquire page or any other page as needed
				redirect('home/enquire');
			}
		}
	}

	public function alpha_space($str)
	{
		if (!preg_match('/^[a-zA-Z ]+$/', $str)) {
			$this->form_validation->set_message('alpha_space', 'The {field} field may only contain alphabetical characters.');
			return FALSE;
		} else {
			return TRUE;
		}
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


			// Validate reCAPTCHA
			$captcha_response = trim($this->input->post('g-recaptcha-response'));
			if ($captcha_response == '') {
				$this->session->set_flashdata('error_message', 'reCAPTCHA validation failed. Please try again.');
				redirect('Home/signup');
				return;
			}

			$keySecret = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';

			$check = array(
				'secret'    =>  $keySecret,
				'response'  =>  $captcha_response
			);

			$startProcess = curl_init();
			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($startProcess, CURLOPT_POST, true);
			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
			$receiveData = curl_exec($startProcess);
			curl_close($startProcess);

			$finalResponse = json_decode($receiveData, true);

			if (!$finalResponse['success']) {
				$this->session->set_flashdata('error_message', 'reCAPTCHA validation failed. Please try again.');
				redirect('Home/signup');
				return;
			}


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

	public function sendsignupdata($name, $email, $city, $phoneNumber, $password, $selectedOptions, $interestedOptions)
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

		// echo"<pre>";
		//  print_r($requestData);exit;

		$ch = curl_init($verificationUrl);
		// Get API token
		$tokenData = tokenkey(); // Assuming tokenkey() is your function to obtain the token
		$token = $tokenData['token'];

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
			'Authorization: ' . $token
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
		//print_r($_POST);exit;
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

		$tokenData = tokenkey(); // Assuming tokenkey() is your function to obtain the token
		$token = $tokenData['token'];

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
			'Authorization: ' . $token
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


	// public function profile()
	// {
	// 	if (!$this->session->userdata('User_id')) {
	// 		redirect('Home/signin');
	// 	}

	// 	// Fetch user data from session
	// 	$data['user_name'] = $this->session->userdata('reg_username');
	// 	$data['user_email'] = $this->session->userdata('reg_email');
	// 	// 	echo"<pre>";
	// 	// print_r($_SESSION);exit;
	// 	$this->load->view('profile', $data);
	// }


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

		redirect(base_url('Home/signin'));
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
		redirect('ForgetPassword');
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


	// 	public function waitlist_xyz_submit()
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
	// 		 print_r($post_data);exit;

	// 		$response = callApiPost($apiLink, $post_data);
	// 		// echo"<pre>";
	// 		//  print_r($response);exit;
	// 		redirect('admin/Delete_acc/index');
	// 	}



	// public function waitlist_submit()
	// {
	// 	$name = $this->input->post('name');
	// 	$email = $this->input->post('email');
	// 	$apiLink = 'waitlist/add-to-waitlist';

	// 	$dataArray = array(
	// 		"name" => $name,
	// 		"email" => $email,
	// 		"returnType" => "Web",
	// 		"language" => $this->session->userdata("language")
	// 	);

	// 	$post_data = json_encode($dataArray);

	// 	$response = callApiPost($apiLink, $post_data);
	// 	print_r($response);exit;
	// 	// Check if $response is not null and is an array
	// 	if ($response !== null && is_array($response)) {
	// 		// Check if 'status' key exists in $response array
	// 		if (array_key_exists('status', $response) && $response['status'] == true) {
	// 			echo "hii";
	// 		} else {
	// 			echo "Sorry"; // Notify the user if status is not true
	// 		}
	// 	} else {
	// 		echo "Sorry, something went wrong with the API call."; // Notify the user if $response is not an array
	// 	}
	// }





	// public function waitlist_submit()
	// {
	// 	$name = $this->input->post('name');
	// 	$email = $this->input->post('email');

	// 	$apiLink = 'waitlist/add-to-waitlist';
	// 	$baseUrl = 'https://uatdd.virtualglobetechnology.com'; // Base URL

	// 	// Prepare data array
	// 	$dataArray = array(
	// 		"name" => $name,
	// 		"email" => $email
	// 	);

	// 	// Convert data array to JSON
	// 	$post_data = json_encode($dataArray);

	// 	// Initialize cURL session
	// 	$curl = curl_init();

	// 	// Set cURL options
	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => $baseUrl . '/' . $apiLink,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_POST => true,
	// 		CURLOPT_POSTFIELDS => $post_data,
	// 		CURLOPT_HTTPHEADER => array(
	// 			'Content-Type: application/json'
	// 		)
	// 	));

	// 	// Execute cURL request
	// 	$response = curl_exec($curl);

	// 	// Close cURL session
	// 	curl_close($curl);

	// 	// Decode JSON response
	// 	$response_array = json_decode($response, true);
	// 	// print_r($response_array);exit;
	// 	// Check if the request was successful
	// 	if ($response_array['status'] == true) {
	// 		// Redirect to the same page
	// 		// echo "hii";exit;
	// 		$this->session->set_flashdata('success_message', "Your request for a meeting with the founder has been successfully submitted. We will review your request and get back to you as soon as possible. Thank you for your interest!");
	// 		redirect('home/waitlist');
	// 	} else {
	// 		// Redirect to an error page
	// 		$this->session->set_flashdata('success_message', "Your request for a meeting with the founder has already been submitted. We'll review your request and get back to you shortly. Thank you for your interest!");
	// 		redirect('home/waitlist');
	// 	}
	// }

	// 	public function waitlist_submit()
	// {
	//     // Get name and email from POST data
	//     $name = $this->input->post('name');
	//     $email = $this->input->post('email');

	//     // API endpoint and base URL
	//     $apiLink = '/waitlist/add-to-waitlist';
	//     $baseUrl = 'https://uatdd.virtualglobetechnology.com';

	//     // Data array to send in the POST request
	//     $dataArray = array(
	//         "name" => $name,
	//         "email" => $email
	//     );

	//     // Convert data array to JSON
	//     $post_data = json_encode($dataArray);

	//     // Initialize cURL session
	//     $curl = curl_init();

	//     // Set cURL options
	//     curl_setopt_array($curl, array(
	//         CURLOPT_URL => $baseUrl . $apiLink,
	//         CURLOPT_RETURNTRANSFER => true,
	//         CURLOPT_POST => true,
	//         CURLOPT_POSTFIELDS => $post_data,
	//         CURLOPT_HTTPHEADER => array(
	//             'Content-Type: application/json'
	//         )
	//     ));

	//     // Execute cURL request
	//     $response = curl_exec($curl);

	//     // Check for cURL errors
	//     if (curl_errno($curl)) {
	//         // Handle cURL error
	//         $error_message = curl_error($curl);
	//         // Handle the error appropriately (e.g., log it)
	//         $this->session->set_flashdata('error_message', "Failed to connect to API: $error_message");
	//         redirect('home/waitlist');
	//     }

	//     // Close cURL session
	//     curl_close($curl);

	//     // Decode JSON response
	//     $response_array = json_decode($response, true);

	//     // Check if the request was successful
	//     if ($response_array['status'] == true) {
	//         // Success message
	//         $this->session->set_flashdata('success_message', "Your request for a meeting with the founder has been successfully submitted. We will review your request and get back to you as soon as possible. Thank you for your interest!");
	//     } else {
	//         // Error message
	//         $this->session->set_flashdata('error_message', "Failed to submit your request. Please try again later.");
	//     }

	//     // Redirect to the waitlist page
	//     redirect('home/waitlist');
	// }
	public function waitlist_submit()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		// Validate the name field
		if (!ctype_alpha(str_replace(' ', '', $name))) {
			$this->session->set_flashdata('error_message', 'The name field must contain only alphabetic characters.');
			redirect('home/waitlist');
			return;
		}

		// Validate reCAPTCHA
		$captcha_response = $this->input->post('g-recaptcha-response');
		if (empty($captcha_response)) {
			$this->session->set_flashdata('error_message', 'Please complete the reCAPTCHA.');
			redirect('home/waitlist');
			return;
		}

		// Verify reCAPTCHA
		$recaptcha_secret_key = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';
		$recaptcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret_key}&response={$captcha_response}");
		$responseKeys = json_decode($recaptcha_response, true);

		// Check if reCAPTCHA verification was successful
		if (intval($responseKeys["success"]) !== 1) {
			$this->session->set_flashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
			redirect('home/waitlist');
			return;
		}

		$apiLink = 'waitlist/add-to-waitlist';
		$baseUrl = 'https://uatdd.virtualglobetechnology.com'; // Base URL

		// Prepare data array
		$dataArray = array(
			"name" => $name,
			"email" => $email
		);

		// Convert data array to JSON
		$post_data = json_encode($dataArray);

		// Get API token
		$tokenData = tokenkey(); // Assuming tokenkey() is your function to obtain the token
		$token = $tokenData['token'];

		// Initialize cURL session
		$curl = curl_init();

		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => $baseUrl . '/' . $apiLink,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post_data,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: ' . $token // Add token to the request headers
			)
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response_array = json_decode($response, true);

		if ($response_array['status'] == true) {
			// $this->session->set_flashdata('success_message', "Your request for a meeting with the founder has been successfully submitted. We will review your request and get back to you as soon as possible. Thank you for your interest!");
			// redirect('home/waitlist');

			$this->session->set_flashdata('success_message', $response_array["message"]);
			redirect('home/waitlist');
		} elseif ($response_array['status'] == false) {
			$this->session->set_flashdata('error_message', $response_array["message"]);
			redirect('home/waitlist');
		}
		// else {
		// 	$this->session->set_flashdata('error_message', "Your request for a meeting with the founder has already been submitted. We'll review your request and get back to you shortly. Thank you for your interest!");
		// 	redirect('home/waitlist');
		// }
	}




	// private function sendupdatepassword($token, $password)
	// {

	// 	// print_r($email);exit;
	// 	$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/create-new-password';

	// 	$requestData = [
	// 		'token' => $token,
	// 		'new_password' => $password
	// 	];

	// 	$ch = curl_init($verificationUrl);

	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_POST, true);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, [
	// 		'Content-Type: application/json',
	// 	]);

	// 	$response = curl_exec($ch);

	// 	if (curl_errno($ch)) {
	// 		error_log('Curl error: ' . curl_error($ch));
	// 	}

	// 	curl_close($ch);

	// 	$responseData = json_decode($response, true);
	// 	return $responseData;
	// 	// print_r($responseData);exit;
	// 	// if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
	// 	// 	 $this->session->set_flashdata('success_message', $responseData['message']);
	// 	// } else {
	// 	// 	 $this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
	// 	// }
	// }

	// public function scheduleMeeting()
	// {
	// 	// if($SERVER(['userId']))
	// 	$name = $this->input->post('fullName');
	// 	$email = $this->input->post('email');
	// 	$fromDateTime = $this->input->post('fromDateTime');
	// 	$toDateTime = $this->input->post('toDateTime');
	// 	$title = $this->input->post('title');
	// 	$duration = $this->input->post('duration');

	// 	// echo"<pre>";
	// 	// print_r($_POST);exit;

	// 	$apiLink = 'schedule/meeting';
	// 	// print_r($apiLink);exit;
	// 	$baseUrl = 'https://uatdd.virtualglobetechnology.com';
	// 	// echo "hii";exit;
	// 	$dataArray = array(
	// 		"fullName" => $name,
	// 		"email" => $email,
	// 		"fromDateTime" => $fromDateTime,
	// 		"toDateTime" => $toDateTime,
	// 		"title" => $title,
	// 		"duration" => $duration
	// 	);
	// 	// echo "hi";exit;

	// 	// echo"<pre>";
	// 	// print_r($dataArray);exit;

	// 	$post_data = json_encode($dataArray);

	// 	// $tokenData = tokenkey(); 
	// 	// $token = $tokenData['token'];

	// 	$curl = curl_init();

	// 	// its our request headers
	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => $baseUrl . '/' . $apiLink,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_POST => true,
	// 		CURLOPT_POSTFIELDS => $post_data,
	// 		CURLOPT_HTTPHEADER => array(
	// 			'Content-Type: application/json',
	// 			// 'Authorization: ' . $token 
	// 		)
	// 	));

	// 	$response = curl_exec($curl);
	// 	// print_r($response);exit;
	// 	// $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	// 	curl_close($curl);

	// 	$response_array = json_decode($response, true);
	// 	// print_r($response_array);exit;

	// 	if ($response_array['status'] == true) {
	// 		$this->session->set_flashdata('success_message', "Done");
	// 		redirect('home/investor');
	// 	} else {
	// 		$this->session->set_flashdata('error_message', "Not Done");
	// 		redirect('home/investor');
	// 	}

	// 	// redirect('home/investor');
	// }

	// private function sendMeetingdata($name, $email, $fromDateTime, $toDateTime, $title, $duration)
	// {

	// 	// print_r($email);exit;
	// 	$verificationUrl = 'https://uatdd.virtualglobetechnology.com/web/user/signup';
	// 	// $verificationUrl = 'https://ldtchndw-3000.inc1.devtunnels.ms/web/user/signup';

	// 	$requestData = [
	// 		"fullName" => $name,
	// 		"email" => $email,
	// 		"fromDateTime" => $fromDateTime,
	// 		"toDateTime" => $toDateTime,
	// 		"title" => $title,
	// 		"duration" => $duration
	// 	];

	// 	$ch = curl_init($verificationUrl);

	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_POST, true);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, [
	// 		'Content-Type: application/json',
	// 	]);

	// 	$response = curl_exec($ch);
	// 	//  var_dump($response);

	// 	if (curl_errno($ch)) {
	// 		error_log('Curl error: ' . curl_error($ch));
	// 	}

	// 	curl_close($ch);

	// 	$responseData = json_decode($response, true);
	// 	//  echo"<pre>";
	// 	//  print_r($responseData);

	// 	if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
	// 		return $responseData['data'];
	// 	} else {
	// 		$this->session->set_flashdata('error_message', 'Failed to send verification email. Please try again.');
	// 		return false;
	// 	}
	// }



	public function scheduleMeeting()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$name = $this->input->post("fullName");
			$email = $this->input->post("email");
			$title = $this->input->post("title");
			$city = $this->input->post("city");
			$duration = $this->input->post("duration");
			$fromTime = $this->input->post("fromDateTime") . ":00";
			$toTime = $this->input->post("toDateTime") . ":00";

			// echo"<pre>";
			//  print_r($_POST);exit;

			if (empty($name) || empty($email) || empty($title) || empty($city) || empty($duration) || empty($fromTime) || empty($toTime)) {
				$this->session->set_flashdata('error_message', 'All fields are required. Please fill in all the required information.');
				redirect('Home/investor');
				return;
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->session->set_flashdata('error_message', 'Invalid email format. Please enter a valid email address.');
				redirect('Home/investor');
				return;
			}

			// $this->load->model('Signup_model');
			// if ($this->Signup_model->isEmailExistsforMeeting($email)) {
			//  $this->session->set_flashdata('error_message', 'Email already exists. Please choose a different email.');
			//  $this->load->view('investor'); // Load investor view
			//  return;
			// }


			// Verify reCAPTCHA
			$captcha_response = $this->input->post('g-recaptcha-response');
			if (empty($captcha_response)) {
				$this->session->set_flashdata('error_message', 'Please complete the reCAPTCHA.');
				redirect('Home/investor');
				return;
			}

			$recaptcha_secret_key = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';
			$recaptcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret_key}&response={$captcha_response}");
			$responseKeys = json_decode($recaptcha_response, true);

			if (intval($responseKeys["success"]) !== 1) {
				$this->session->set_flashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
				redirect('Home/investor');
				return;
			}


			$ok = $this->sendmeetingdata($name, $email, $title, $city, $duration, $fromTime, $toTime);

			//  echo"<pre>";
			//  print_r($ok);exit;

			if ($ok) {
				$this->session->set_flashdata('success_messages', 'Your meeting request with our founder has been received. We will be in touch shortly to schedule a time. Thank you!');

				redirect('Home/investor?formSubmitted=true');
			} else {
				$this->session->set_flashdata('error_message', 'Failed to send the request for a meeting with the founder. Please try again.');
				redirect('Home/investor?formSubmitted=true');
			}
		} else {
			$this->session->set_flashdata('error_message', 'Invalid data. Please try again.');
			redirect('Home/investor?formSubmitted=true');
		}
	}


	public function sendmeetingdata($name, $email, $title, $city, $duration, $fromTime, $toTime)
	{
		$meetingUrl = 'https://uatdd.virtualglobetechnology.com/schedule/meeting';

		$requestData = [
			'fullName' => $name,
			'email' => $email,
			'title' => $title,
			'city' => $city,
			'duration' => $duration,
			'fromDateTime' => $fromTime,
			'toDateTime' => $toTime,
		];
		// echo "<pre>";print_r($requestData);exit;
		$ch = curl_init($meetingUrl);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
		]);

		$response = curl_exec($ch);
		// print_r($response);exit;
		if (curl_errno($ch)) {
			error_log('Curl error: ' . curl_error($ch));
			curl_close($ch);
			return false; // Return false if there's a CURL error
		}

		curl_close($ch);

		$responseData = json_decode($response, true);

		if ($responseData && isset($responseData['status']) && $responseData['status'] === true) {
			return true; // Return true if the response indicates success
		} else {
			error_log('Failed to send the request for a meeting with the founder: ' . $response);
			return false; // Return false if there's a failure response
		}
	}

	// public function header() {
	// 	$data['userFirstName'] = 'John'; // Example user name
	// 	$this->load->view('header_view', $data);
	// }


	// public function profile() {
	//     $data['first_name'] = $this->session->userdata('first_name'); // Retrieve user's first name
	//     $data['last_name'] = $this->session->userdata('last_name'); // Retrieve user's last name

	//     // Load the profile view with necessary data
	//     $this->load->view('profile_view', $data);
	// }

	public function errorPage()
	{

		$this->load->view("errorPage_view");
	}

	public function newSignin()
	{
		$this->load->view('signin2');
	}
	public function newVision()
	{
		$this->load->view('vision2');
	}
	public function demo()
	{
		$this->load->view('demo');
	}
	public function contactus()
	{
		$this->load->view('contactus');
	}

	public function Contactus_submit()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contactnumber = $this->input->post('contactnumber');
		$message = $this->input->post('message');

		// Validate the name field
		if (!ctype_alpha(str_replace(' ', '', $name))) {
			$this->session->set_flashdata('error_message', 'The name field must contain only alphabetic characters.');
			redirect('home/newweb2');
			return;
		}

		// Validate email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->session->set_flashdata('error_message', 'Please enter a valid email address.');
			redirect('home/newweb2');
			return;
		}

		// Validate contact number (example: must be numeric and 10-15 characters long)
		if (!is_numeric($contactnumber) || strlen($contactnumber) < 10 || strlen($contactnumber) > 15) {
			$this->session->set_flashdata('error_message', 'Please enter a valid contact number.');
			redirect('home/newweb2');
			return;
		}

		// Validate message (example: must not be empty)
		if (empty($message)) {
			$this->session->set_flashdata('error_message', 'The message field cannot be empty.');
			redirect('home/newweb2');
			return;
		}

		// Validate reCAPTCHA
		$captcha_response = $this->input->post('g-recaptcha-response');
		if (empty($captcha_response)) {
			$this->session->set_flashdata('error_message', 'Please complete the reCAPTCHA.');
			redirect('home/newweb2');
			return;
		}

		// Verify reCAPTCHA
		$recaptcha_secret_key = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';
		$recaptcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret_key}&response={$captcha_response}");
		$responseKeys = json_decode($recaptcha_response, true);

		// Check if reCAPTCHA verification was successful
		if (intval($responseKeys["success"]) !== 1) {
			$this->session->set_flashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
			redirect('home/newweb2');
			return;
		}

		// Prepare data array for database insertion
		$data = array(
			'name' => $name,
			'email' => $email,
			'contactnumber' => $contactnumber,
			'message' => $message,
			// 'created_at' => date('Y-m-d H:i:s') // Optional: add a timestamp
		);

		// Load the Contactus model
		$this->load->model('Contactus_model');

		// Insert data into the database
		if ($this->Contactus_model->insert_contact($data)) {
			$this->session->set_flashdata('success_message', 'Your message has been submitted successfully.');
		} else {
			$this->session->set_flashdata('error_message', 'An error occurred while submitting your message. Please try again.');
		}

		redirect('home/newweb2');
	}

	public function newweb2()
	{
		$data['testimonials'] = $this->admin_testimonial_model->get_testimonials();
		$data['faqs'] = $this->Faq_model->get_faqs();

		// echo"<pre>";print_r($data);exit;
		$this->load->view('newweb2', $data);
	}

	public function aboutus()
    {   
        $data['aboutus_data'] = $this->Admin_aboutus_model->showall();
        $this->load->view('aboutus', $data);
    } 
	public function add_faq() {
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/add_faq');
        } else {
            $data = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            );
            $this->Faq_model->insert_faq($data);
            $this->load->view('admin/faq_success');
        }
    }
}
