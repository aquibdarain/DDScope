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
        $apiLink = 'api/v1/web/admin/' . $admin_id . '/register-user/delete';

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


    public function send_verification_mails()
    {
        $admin_id = $this->session->userdata("admin_id");
        $selectedEmails = $this->input->post('selectedEmails');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $apiLink = 'api/v1/web/admin/' . $admin_id . '/check-user-status';

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


     public function updateTradingStatus($userId)
      
    {

    $this->load->model('AdsModel'); 

    $result = $this->AdsModel->disableTrading($userId);

    if ($result) {
        $this->session->set_flashdata('update_success', 'User trading status updated successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to update user trading status. Please try again.');
    }

    redirect('admin/User');
   }


    public function updateTradingStatus_active($userId)
    {
        $this->load->model('AdsModel');

        $result = $this->AdsModel->enableTrading($userId);

        if ($result) {
            $this->session->set_flashdata('update_success', 'User trading status updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update user trading status. Please try again.');
        }

        redirect('admin/User');
    }

}
