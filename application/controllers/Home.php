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
		$this->load->model('Scope_model');
		$this->load->library('Ipapi');


		$this->load->helper('my_general_helper');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index() {
		$selected_priority = $this->input->get('priority');
		$selected_microservice = $this->input->get('microservice');
		$selected_status = $this->input->get('status');
	
		$data['scope_data'] = $this->Scope_model->get_scope_data($selected_priority, $selected_microservice, $selected_status);
	
		$data['selected_priority'] = $selected_priority;
		$data['selected_microservice'] = $selected_microservice;
		$data['selected_status'] = $selected_status; 
	
		$this->load->view('welcome_message', $data);
	}
	
	
	
	

}
