<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) {
			redirect('admin/login');
		} else {
			// $this->load->model('api/Create_itinerary_model');
			$this->load->helper('my_general');
			$this->load->library("pagination");
			$this->load->model('admin_blog_model');
			$this->load->model('Admin_testimonial_model');


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

		$blogs = $this->admin_blog_model->showall();
		$data['blogCount'] = !empty($blogs) ? count($blogs) : 0;

		$testimonials = $this->Admin_testimonial_model->showall();
		$data['testimonialCount'] = !empty($testimonials) ? count($testimonials) : 0;
		
		 $this->load->model('Contactus_model');
		 $data['contactusCount'] = $this->Contactus_model->get_contactus_count();
		 
		 $this->load->model('Admin_aboutus_model');
		 $data['aboutusCount'] = $this->Admin_aboutus_model->get_count();

		 
		 $this->load->model('Faq_model');
		 $data['faqsCount'] = $this->Faq_model->count_faqs();

		 $this->load->model('Job_model');
		 $data['job_count'] = $this->Job_model->get_jobs_count();


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
