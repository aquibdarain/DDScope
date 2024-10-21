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
                $admin_role = $this->session->userdata("admin_role");

                $data['admin_role'] = $admin_role;

		$apiLink = 'api/v1/web/admin/' . $admin_id . '/register-user/count';
		$response = callApiGet($apiLink);
		$data['userCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		// Update $apiLink for Delete Account Request
		$apiLink = 'api/v1/web/admin/' . $admin_id . '/user-account-delete-request/count';
		$response = callApiGet($apiLink);
		$data['deleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$apiLink = 'api/v1/web/admin/' . $admin_id . '/user-account-delete-request/approved/count';
		$response = callApiGet($apiLink);
		$data['acceptdeleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$apiLink = 'api/v1/web/admin/' . $admin_id . '/user-account-delete-request/rejected/count';
		$response = callApiGet($apiLink);
		$data['rejectdeleteRequestCount'] = isset($response['data']['result_count']) ? $response['data']['result_count'] : 0;

		$blogs = $this->admin_blog_model->showall();
		$data['blogCount'] = !empty($blogs) ? count($blogs) : 0;

		$testimonials = $this->Admin_testimonial_model->showall();
		$data['testimonialCount'] = !empty($testimonials) ? count($testimonials) : 0;
		
		 $this->load->model('Contactus_model');
		 $data['contactusCount'] = $this->Contactus_model->get_contactus_count();
		 
		 $this->load->model('Admin_aboutus_model');
		 $data['aboutusCount'] = $this->Admin_aboutus_model->get_aboutus_count();

                $this->load->model('Admin_about_instructor_model');
		$data['Count'] = $this->Admin_about_instructor_model->get_aboutus_count();
		 
		 $this->load->model('Faq_model');
		 $data['faqsCount'] = $this->Faq_model->count_faqs();

<<<<<<< HEAD
                 $this->load->model('AdsModel');
		 $data['ip_address_count'] = $this->AdsModel->count_all_geolocations();
                 
                 $this->load->model('Waitlist_model');
		 $data['waitlist_users_count'] = $this->Waitlist_model->get_count();

                $this->load->model('Get_all_admins_model');
		$data['get_admin_count'] = $this->Get_all_admins_model->get_count();

                $this->load->model('AdsModel');
		$data['count_ip_locations'] = $this->AdsModel->count_all_geolocations_of_15_and_30_min_video();
=======
		 $this->load->model('Career_model');
		 $data['job_count'] = $this->Career_model->get_jobs_count();

>>>>>>> d7b4c3740d35bee2dc96027519bbb507d762e6c8

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
