<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{ 
			redirect('admin/login');
		}
		else
		{  
	        // $this->load->model('api/Create_itinerary_model');
		$this->load->helper('my_general');
			$this->load->library("pagination");

		}
	}


	public function index()
    {   
		$admin_id = $this->session->userdata("admin_id");
		
		$apiLink = 'web/admin/' . $admin_id . '/register-user/count';
		$response = callApiGet($apiLink);
		$data['userCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		// Update $apiLink for Delete Account Request
		$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/count';
		$response = callApiGet($apiLink);
		$data['deleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/approved/count';
		$response = callApiGet($apiLink);
		$data['acceptdeleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/rejected/count';
		$response = callApiGet($apiLink);
		$data['rejectdeleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$this->load->view('admin/dashboard_view', $data);
    }



	// public function index()
	// {   
    //     $admin_id = $this->session->userdata("admin_id");
	// 	$apiLink = 'web/admin/' . $admin_id . '/register-user/count';
        
    //     $response = callApiGet($apiLink);
	// 	$count=$response['data']['result_count'];
	// 	$data['count'] = $count;

	// 	// $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/count';
        
    //     // $responses = callApiGet($apiLink);
	// 	// $counts=$responses['data']['result_count'];
	// 	// $data['counts'] = $counts;
	// 	$this->load->view('admin/dashboard_view',$data);
	// }
    
	
	
}
