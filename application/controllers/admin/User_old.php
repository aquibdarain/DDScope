<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
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
            $this->load->model("AdsModel");
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

    // public function index()
    // {
    //     // Retrieve the search inputs from session
    //     $searchInput = $this->session->userdata('searchInput');

    //     // If search inputs are not available in session, initialize them as empty
    //     if (!$searchInput) {
    //         $searchInput = array(
    //             'name' => '',
    //             'email' => ''
    //         );
    //     }

    //     // Update the search inputs if provided in the current request
    //     $name = $this->input->get('name');
    //     $email = $this->input->get('email');
    //     if (!empty($name)) {
    //         $searchInput['name'] = $name;
    //     }
    //     if (!empty($email)) {
    //         $searchInput['email'] = $email;
    //     }

    //     // Store the updated search inputs back in session
    //     $this->session->set_userdata('searchInput', $searchInput);

    //     // Retrieve other necessary data
    //     $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;

    //     // Fetch data based on search inputs
    //     $this->load->model('AdsModel');
    //     $data = $this->AdsModel->get_users_by_search($searchInput);

    //     // Load pagination library
    //     $this->load->library('pagination');

    //     // Configure pagination
    //     $config['base_url'] = base_url('admin/User/index');
    //     $config['total_rows'] = $this->AdsModel->get_total_count();
    //     $config['per_page'] = 10; // Set your desired number of items per page here
    //     $config['use_page_numbers'] = TRUE;
    //     $config['uri_segment'] = 4;

    //     $this->pagination->initialize($config);

    //     // Pass data to view
    //     $this->load->view('admin/user_admin_view', array(
    //         'data' => $data,
    //         'searchInput' => $searchInput,
    //         'pagination' => $this->pagination->create_links(),
    //         'pageNumber' => $pageNumber,
    //         'TotalCount' => $config['total_rows'],
    //         'EndCount' => min($pageNumber * $config['per_page'], $config['total_rows']),
    //         'StartCount' => ($pageNumber - 1) * $config['per_page'] + 1,
    //         'perPage' => $config['per_page']
    //     ));
    // }

    public function index()
    {
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
        $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
    
        // Fetch data based on search inputs
        $this->load->model('AdsModel');
        $data = $this->AdsModel->get_users_by_search($searchInput);
    
        // Load pagination library
        $this->load->library('pagination');
    
        // Configure pagination
        $config['base_url'] = base_url('admin/User/index');
        $config['total_rows'] = count($data); // Count of fetched data
        $config['per_page'] = 10; // Set your desired number of items per page here
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
    
        $this->pagination->initialize($config);
    
        // Slice data based on pagination
        $startIndex = ($pageNumber - 1) * $config['per_page'];
        $data = array_slice($data, $startIndex, $config['per_page']);
    
        // Pass data to view
        $this->load->view('admin/user_admin_view', array(
            'data' => $data,
            'searchInput' => $searchInput,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $config['total_rows'],
            'EndCount' => min($pageNumber * $config['per_page'], $config['total_rows']),
            'StartCount' => ($pageNumber - 1) * $config['per_page'] + 1,
            'perPage' => $config['per_page']
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
    public function send_verification_mail()
    {
        $this->load->model('AdsModel');

        $data['users'] = $this->AdsModel->get_user_data();
        //     echo"<pre>";
        //   print_r($data);exit;
        $this->load->view('admin/send_verification_mailnew2', $data);
    }
    public function send_verification_mailold()
    {
        $admin_id = $this->session->userdata("admin_id");
        $name = $this->input->get('name');
        $email = $this->input->get('email');

        // Get search input from session
        $searchInput = $this->session->userdata('searchInput');

        // Update search input if parameters are provided
        if (!empty($name)) {
            $searchInput['name'] = $name;
        }
        if (!empty($email)) {
            $searchInput['email'] = $email;
        }

        // Set the updated search input to session
        $this->session->set_userdata('searchInput', $searchInput);

        // Load the AdsModel
        $this->load->model('AdsModel');

        // Fetch data from the database based on search parameters
        $data = $this->AdsModel->get_users_by_search($searchInput);

        // Calculate StartCount based on the current page and number of items per page
        $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
        $pageSize = 10; // Assuming a page size of 10
        $StartCount = ($pageNumber - 1) * $pageSize + 1;

        // Calculate EndCount based on the StartCount and number of items per page
        $EndCount = min($pageNumber * $pageSize, count($data));

        // Get TotalCount from your model or wherever it's being stored
        $TotalCount = $this->AdsModel->get_total_count(); // Replace with actual method

        // Load necessary libraries
        $this->load->library('pagination');

        // Calculate pagination configuration
        $config['base_url'] = base_url('admin/User/send_verification_mail');
        // Add other pagination configuration settings as needed

        // Initialize pagination with calculated configuration
        $this->pagination->initialize($config);

        // Load the view with data, StartCount, EndCount, TotalCount, and pagination
        $this->load->view('admin/send_verification_mailnew', array(
            'data' => $data,
            'searchInput' => $searchInput,
            'StartCount' => $StartCount,
            'EndCount' => $EndCount,
            'TotalCount' => $TotalCount,
            'pagination' => $this->pagination->create_links(), // Include pagination here
            // other view data...
        ));
    }
    public function send_verification_mails()
    {
        // Retrieve the selected emails from the POST array
        $selectedEmails = $this->input->post('selected_emails');

        // Now $selectedEmails contains the array of selected email addresses

        // You can process the emails here as needed

        // Example: Print the selected emails
        echo "<pre>";
        print_r($selectedEmails);
        exit;
    }
    public function send_verification_mailnew()
    {
        // $selectedUsers = $this->input->get('selected_users');
        // print_r($selectedUsers);exit;

        $searchInput = $this->session->userdata('searchInput');
        // print_r($searchInput);

        $selectedUsers = $this->input->get('selected_users');
        // print_r($selectedUsers);exit;

        if (!$selectedUsers) {
            $selectedUsers = array();
        }
        if (!$searchInput) {
            $searchInput = array(
                'name' => '',
                'email' => ''
            );
        }

        $name = $this->input->get('name');
        $email = $this->input->get('email');
        // print_r($name);
        // print_r("hiiiiiii");
        // print_r($email);exit;

        if (!empty($name)) {
            $searchInput['name'] = $name;
        }
        if (!empty($email)) {
            $searchInput['email'] = $email;
        }

        $this->session->set_userdata('searchInput', $searchInput);

        $admin_id = $this->session->userdata("admin_id");
        $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;

        $apiLink = 'web/admin/' . $admin_id . '/register-user-list?pageNumber=' . $pageNumber;
        if (!empty($searchInput['name']) && !empty($searchInput['email'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByName=' . $searchInput['name'] . '&searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
        } elseif (!empty($searchInput['name'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByName=' . $searchInput['name'] . '&pageNumber=' . $pageNumber;
        } elseif (!empty($searchInput['email'])) {
            $apiLink = 'web/admin/' . $admin_id . '/search-register-users?searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
        }

        $response = callApiGet($apiLink);

        if (isset($response['data'])) {
            $data = $response['data'];
        } else {
            $data = array();
        }

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/User/index');
        $config['total_rows'] = $response['totalCount'];
        $config['per_page'] = $response['pageSize'];
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $StartCount = ($pageNumber - 1) * $response['pageSize'] + 1;

        $this->load->view('admin/send_verification_mailnew', array(
            'data' => $data,
            'searchInput' => $searchInput,
            'selectedUsers' => $selectedUsers,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $response['totalCount'],
            'EndCount' => min($pageNumber * $response['pageSize'], $response['totalCount']),
            'StartCount' => $StartCount,
            'perPage' => $response['pageSize']
        ));
    }

    public function send_verif_mail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $selectedUsers = $this->input->post('selected_users');
            // print_r($selectedUsers);exit;

            foreach ($selectedUsers as $userId) {
            }
            $data['selectedUsers'] = $selectedUsers;

            $this->load->view('admin/emailcontent', $data);
        } else {
            show_error('Invalid request method');
        }
    }

    public function send_verif_mailcontent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selectedUsers = $this->input->post('selected_users');
            $admin_id = $this->session->userdata("admin_id");

            $subject = $this->input->post('subject');
            $message = $this->input->post('message');


            $apiLink = 'web/admin/' . $admin_id . '/check-user-status';

            $dataArray = array(
                "listOfEmail" => $selectedUsers,
                "emailSubject" => $subject,
                "emailMessage" => $message,
                "returnType" => "Web",
                "language" => $this->session->userdata("language")
            );

            $post_data = json_encode($dataArray);
            print_r($post_data);
            exit;

            $response = callApiPostformailcontent($apiLink, $post_data);
            echo "okkkk";

            print_r($response);
            exit;
        } else {
            show_error('Invalid request method');
        }
    }
    public function reset()
    {
        $this->session->unset_userdata('searchInput');
        return redirect('admin/User/index');
    }
    public function reset_ver_mail()
    {
        $this->session->unset_userdata('searchInput');
        return redirect('admin/User/send_verification_mail');
    }
    
    public function send_verification_mail()
    {  
        $this->load->model('AdsModel');
        $data['users'] = $this->AdsModel->get_user_data();
       
         $success_message = $this->session->flashdata('success');
        $error_message = $this->session->flashdata('error');
   
         $data['success_message'] = $success_message;
        $data['error_message'] = $error_message;
   
        $this->load->view('admin/send_verification_mail', $data);
    }
   
   
    public function send_verification_mails() {
        $admin_id = $this->session->userdata("admin_id");
        $selectedEmails = $this->input->post('selectedEmails');
        $subject = $this->input->post('subject');  
        $message = $this->input->post('message');  
     $apiLink = 'web/admin/' . $admin_id . '/check-user-status';

        $dataArray = array(
            "listOfEmail" => $selectedEmails,  
            "emailSubject" => $subject,  
            "emailMessage" => $message,  
            "returnType" => "Web",
            "language" => $this->session->userdata("language")
        );

        $post_data = json_encode($dataArray);
 
        $response = callApiPostformailcontent($apiLink, $post_data);
 
         if ($response['status'] == 1) {
 
             $this->session->set_flashdata('success', 'Verification emails sent successfully!');
        } else {
 
             $this->session->set_flashdata('error', 'Failed to send verification emails: ' . $response['message']);
        }
     
         redirect('admin/User/send_verification_mail');
       
    }
}
