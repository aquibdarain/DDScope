<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
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

    // public function index()
    // {   
    //     $admin_id = $this->session->userdata("admin_id");
    //     $pageNumber = 1;
    //     // $pageNumber = $this->uri->segment(3, 1);

    //     $apiLink = 'web/admin/' . $admin_id . '/register-user-list?pageNumber=' . $pageNumber;
    
    //      $response = callApiGet($apiLink);
    
    //      if(isset($response['data'])) {
    //          $data = $response['data'];
    //     } else {
    //          $data = array();
    //     }
    
    //      $this->load->view('admin/user_admin_view', array('data' => $data));
    // }
    
    public function index() {
        // Retrieve the search inputs from session
        $searchInput = $this->session->userdata('searchInput');
        
        // If search inputs are not available in session, initialize them as empty
        if (!$searchInput) {
            $searchInput = array(
                'name' => '',
                'email' => ''
            );
        }
        
        // Update the search inputs if provided in the current request
        $name = $this->input->get('name');
        $email = $this->input->get('email');
        if (!empty($name)) {
            $searchInput['name'] = $name;
        }
        if (!empty($email)) {
            $searchInput['email'] = $email;
        }
        
        // Store the updated search inputs back in session
        $this->session->set_userdata('searchInput', $searchInput);
    
        // Retrieve other necessary data
        $admin_id = $this->session->userdata("admin_id");
        $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
    
        // Construct API link based on search inputs
        $apiLink = 'web/admin/' . $admin_id . '/register-user-list?pageNumber=' . $pageNumber;
        if (!empty($searchInput['name']) && !empty($searchInput['email'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByName=' . $searchInput['name'] . '&searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
        } elseif (!empty($searchInput['name'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByName=' . $searchInput['name'] . '&pageNumber=' . $pageNumber;
        } elseif (!empty($searchInput['email'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
        }
    
        // Call API based on constructed link
        $response = callApiGet($apiLink);
    
        // Process API response
        if(isset($response['data'])) {
            $data = $response['data'];
        } else {
            $data = array();
        }
    
        // Load pagination library
        $this->load->library('pagination');
    
        // Configure pagination
        $config['base_url'] = base_url('admin/User/index');
        $config['total_rows'] = $response['totalCount'];
        $config['per_page'] = $response['pageSize'];
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
    
        $this->pagination->initialize($config);
    
        // Calculate StartCount
        $StartCount = ($pageNumber - 1) * $response['pageSize'] + 1;
    
        // Pass data to view
        $this->load->view('admin/user_admin_view', array(
            'data' => $data,
            'searchInput' => $searchInput,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $response['totalCount'],
            'EndCount' => min($pageNumber * $response['pageSize'], $response['totalCount']),
            'StartCount' => $StartCount,
            'perPage' => $response['pageSize']
        ));
    }
    
    
    
    public function delete_user()
	{   
        $reg_id = $this->input->post('reg_id');
        // print_r($reg_id);exit;
        $admin_id = $this->session->userdata("admin_id");
        $apiLink = 'web/admin/' . $admin_id . '/register-user/delete';

        $dataArray = array(
            "reg_id" => $reg_id,     
            "returnType" => "Web",
            "language" => $this->session->userdata("language")
        );
        
         $post_data = json_encode($dataArray);
        //  print_r($post_data);exit;

         $response = callApidelete($apiLink, $post_data);
        //  print_r($response);exit;
	   redirect('admin/User/index'); 	


        
 	}

    public function reset()
	{
	  $this->session->unset_userdata('searchInput');
	  return redirect('admin/User/index'); 	
	}
	
	
}
