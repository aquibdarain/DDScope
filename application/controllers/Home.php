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
		// Get the selected priority filter from the request (if any)
		$selected_priority = $this->input->get('priority');
	
		// Fetch data from the model with optional priority filter
		$data['scope_data'] = $this->Scope_model->get_scope_data($selected_priority);
		
		// Pass the selected priority to the view to maintain the selection
		$data['selected_priority'] = $selected_priority;
	
		$this->load->view('welcome_message', $data);
	}
	
	
	

}
