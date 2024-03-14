<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use Firebase\JWT\JWT;

class Ddads extends CI_Controller {



	 public function __construct() {
        parent::__construct();
		$this->load->model('Signup_model');
		$this->load->model('Signin_model');
		$this->load->helper('my_general_helper');
    }

    public function index()
	{
		$this->load->view('adsview');
	}
}