<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
 {
 	public function __construct()
	{
		// echo "heelo good";exit;
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
			'img_url' => base_url().'static/',
			'font_path' => base_url().'system/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 34,
			'expiration' => 7200
		);
		//    print_r($data);exit;


		$photo = @create_captcha($data);
		// print_r($photo);exit;
		$this->session->set_userdata("admin_security_code",$photo);

		return $photo;
	}
	

	public function index()
	{ 
		// echo phpinfo();exit;
        $photo = $this->creating_captcha();
		// print_r($photo);exit;

		$this->load->view('admin/admin_login_view',$photo);
	}
	
	public function submitLogin()
	{	
		// print_r($_POST);exit;
		// $apiLink = '/api/planner/login'; 
		$apiLink = 'web/admin/login'; 

		$admin_useremail = $this->input->post('admin_useremail');
		$admin_password = $this->input->post('admin_password');

		$admin_security_code= $this->session->userdata("admin_security_code");
 		$admin_captcha = $this->input->post('admin_captcha');
  		if($admin_captcha === $admin_security_code['word'])
			{
			
			$dataArray = array(
				"username" => $admin_useremail,
				"password" => $admin_password,
		 
				"returnType" => "Web",
				"language" => $this->session->userdata("language")
			);
			
			 $post_data = json_encode($dataArray);
			//  print_r($post_data);
	
			 $response = callApi($apiLink, $post_data);
			//  print_r($response);exit;
 				if (!isset($response['status']) || empty($response['status'])) {
 					$response['status'] = 0;
					 $this->session->set_flashdata('invalid',$response['message']);
					return redirect('admin/Login');
				}
				else{
					// echo"<pre>";
					// print_r($response['data']['admin_id']);exit;
					$this->session->set_userdata('admin_id', $response['data']['admin_id']);

					redirect('admin/dashboard');
				}
			}
			else
			{
 				$this->session->set_flashdata('captcha','Please enter correct Captcha');
				return redirect('admin/Login');
			}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		
		
		$this->session->set_flashdata('logout','You have successfully logged Out');
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
	
	    $data= $this->admin_login_model->change_password($admin_useremail);
		
		 if(empty($admin_data))
		 {
			$data['message'] = "Username is not found, please enter correct Username";
			
			$this->load->view('admin/login_forgot_password_view',$data);
		 }
		 else
		{
			$this->form_validation->set_rules('admin_passwordd', 'Admin Password', 'required|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('admin_password', 'Admin Password', 'required|matches[password]');
			if ($this->form_validation->run())
			{ 
					   $Type = "Admin Password";
		
					   $data['admin_useremail'] = $admin_useremail;
					   $data['admin_password'] = $admin_password;
					 
					   $this->load->view('admin/login_forgot_password_view',$data);
			}
			else
			{  
				// $data['message3'] = "The New Password field does not match the Repeat Password field.";
				$data['message'] = validation_errors();
				$data['admin_useremail'] = "USERNAME";
				$this->load->view('admin/login_forgot_password_view',$data);
			}
		}
		
	}
	
	
}

