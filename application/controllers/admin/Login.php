<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		// echo "hii";exit;
		parent::__construct();

		$this->load->helper('my_general');
		$this->load->helper('captcha');
		$this->load->helper('string');
	}

	public function creating_captcha()
	{
		// echo "hiiii";exit;
		$this->load->helper('string');
		$word = random_string($type = 'numeric', $len = 5);
		$data = array(
			'word' => $word,
			'word_length' => '4',
			'img_path' => './static/',
			'img_url' => base_url() . 'static/',
			'font_path' => base_url() . 'system/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 34,
			'expiration' => 7200
		);
		//    print_r($data);exit;


		$photo = @create_captcha($data);
		// print_r($photo);exit;
		$this->session->set_userdata("admin_security_code", $photo);

		return $photo;
	}


	public function index()
	{
		// echo phpinfo();exit;
		$photo = $this->creating_captcha();
		// print_r($photo);exit;

		$this->load->view('admin/admin_login_view', $photo);
	}

	public function submitLogin()
	{
		$apiLink = 'api/v1/web/admin/login';
		$admin_useremail = $this->input->post('admin_useremail');
		$admin_password = $this->input->post('admin_password');
		$admin_role = $this->input->post('admin_role');

		$secret_key = '6LelCKYpAAAAADhYZpodlrvvUzeW7SC6k3yBl7zJ';
		$recaptcha_response = $this->input->post('g-recaptcha-response');
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $recaptcha_response);
		$response_keys = json_decode($response, true);

		if (intval($response_keys["success"]) !== 1) {
			$this->session->set_flashdata('captcha', 'Please complete the CAPTCHA');
			return redirect('admin/Login');
		} else {
			$dataArray = array(
				"username" => $admin_useremail,
				"password" => $admin_password,
				"role" => $admin_role,
				"returnType" => "Web",
				"language" => $this->session->userdata("language")
			);
	
			$post_data = json_encode($dataArray);
			$response = callApi($apiLink, $post_data);
	
			if (!isset($response['status']) || empty($response['status'])) {
				$response['status'] = 0;
				$this->session->set_flashdata('invalid', $response['message']);
				return redirect('admin/Login');
			} else {
				// Fetch admin details from the database
				$this->load->model('Get_all_admins_model');
				$adminData = $this->Get_all_admins_model->get_admin_by_id($response['data']['admin_id']);
	
				// Check if the admin is inactive
				if ($adminData['admin_role'] == 'admin' && $adminData['admin_status'] == 'inactive') {
					$this->session->set_flashdata('invalid', 'Your account is inactive. Please contact the administrator.');
					return redirect('admin/Login');
				}
	
				$this->session->set_userdata('admin_id', $adminData['admin_id']);
				$this->session->set_userdata('admin_role', $adminData['admin_role']);
				$this->session->set_userdata('admin_status', $adminData['admin_status']);
	
				// Redirect based on role
				if ($adminData['admin_role'] === 'superadmin') {
					redirect('admin/Dashboard/index');
				} else {
					redirect('admin/Dashboard/index');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('logout', 'You have successfully logged Out');
		return redirect('admin');
	}

	public function forgotPassword()
	{

		$this->load->view('admin/admin_forgot_password_view');
	}

	public function submitForgotPassword()
	{
		$admin_useremail = $this->security->xss_clean($this->input->post('admin_useremail'));
		$admin_password = $this->security->xss_clean($this->input->post('admin_password'));
		$admin_password = $this->security->xss_clean($this->input->post('admin_password'));

		$data = $this->admin_login_model->change_password($admin_useremail);

		if (empty($admin_data)) {
			$data['message'] = "Username is not found, please enter correct Username";

			$this->load->view('admin/login_forgot_password_view', $data);
		} else {
			$this->form_validation->set_rules('admin_passwordd', 'Admin Password', 'required|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('admin_password', 'Admin Password', 'required|matches[password]');
			if ($this->form_validation->run()) {
				$Type = "Admin Password";

				$data['admin_useremail'] = $admin_useremail;
				$data['admin_password'] = $admin_password;

				$this->load->view('admin/login_forgot_password_view', $data);
			} else {
				// $data['message3'] = "The New Password field does not match the Repeat Password field.";
				$data['message'] = validation_errors();
				$data['admin_useremail'] = "USERNAME";
				$this->load->view('admin/login_forgot_password_view', $data);
			}
		}
	}
}
