<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_blog_model');
		$this->load->helper('my_general_helper');
		// $data = $this->_setCommonData();
		// $this->load->vars($data);
	}

	// private function _setCommonData()
	// {
	// 	$trav_id = $this->session->userdata('trav_id');
	// 	$plan_id = $this->session->userdata('plan_id');

	// 	$data['showMyItineraryButton'] = $trav_id ? true : false;
	// 	$data['showCreateItineraryButton'] = $plan_id ? true : false;

	// 	return $data;
	// }

	public function blogdetails($encrypted_id)
	{

		$blog_id = decrypt_id($encrypted_id);

		$blog = $this->Admin_blog_model->getblogssById($blog_id);
		$data['blog'] = $blog;
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
		$this->load->view('blog-details', $data);
	}
}
