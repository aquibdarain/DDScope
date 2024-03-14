<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_acc extends CI_Controller 
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
 		    $this->load->helper('my_general');
			$this->load->library("pagination");


	     
		}
	}

   
    
public function index() {
    $searchInputdelete = $this->session->userdata('searchInputdelete');

    if (!$searchInputdelete) {
        $searchInputdelete = array(
            'name' => '',
            'email' => ''
        );
    }

    $n = $this->input->get('name');
    $name = ($n !== null) ? rawurlencode(trim($n)) : '';
    $email = ($this->input->get('email') !== null) ? trim($this->input->get('email')) : '';
    
    if (!empty($name)) {
        $searchInputdelete['name'] = $name;
    }
    if (!empty($email)) {
        $searchInputdelete['email'] = $email;
    }

    $this->session->set_userdata('searchInputdelete', $searchInputdelete);

    $admin_id = $this->session->userdata("admin_id");
    $pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;

    $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request?pageNumber=' . $pageNumber;
	
    if (!empty($searchInputdelete['name']) && !empty($searchInputdelete['email'])) {
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request?searchByName=' . $searchInputdelete['name'] . '&searchByEmail=' . $searchInputdelete['email'] . '&pageNumber=' . $pageNumber;
    } elseif (!empty($searchInputdelete['name'])) {
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request?searchByName=' . $searchInputdelete['name'] . '&pageNumber=' . $pageNumber;
    } elseif (!empty($searchInputdelete['email'])) {
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request?searchByEmail=' . $searchInputdelete['email'] . '&pageNumber=' . $pageNumber;
    }

    $response = callApiGet($apiLink);

    if (isset($response['data'])) {
        $data = $response['data'];
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/Delete_acc/index');
        $config['total_rows'] = $response['totalCount'];
        $config['per_page'] = $response['pageSize'];
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        $this->pagination->initialize($config);

        $StartCount = ($pageNumber - 1) * $response['pageSize'] + 1;

        $this->load->view('admin/delete_acc_admin_view', array(
            'data' => $data,
            'searchInputdelete' => $searchInputdelete,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $response['totalCount'],
            'EndCount' => min($pageNumber * $response['pageSize'], $response['totalCount']),
            'StartCount' => $StartCount,
            'perPage' => $response['pageSize']
        ));
    } else {
        $data = array();
        $this->load->view('admin/delete_acc_admin_view', array(
            'data' => $data,
            'searchInputdelete' => $searchInputdelete,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => 0,
            'TotalCount' => 0,
            'EndCount' => 0,
            'StartCount' => 0,
            'perPage' => 0
        ));
    }
} 
    
	
    // public function delete_user()
	// {   
    //     $reg_id = $this->input->post('reg_id');
    //     // print_r($reg_id);exit;
    //     $admin_id = $this->session->userdata("admin_id");
		
    //     $apiLink = 'web/admin/' . $admin_id . '/register-user/delete';

    //     $dataArray = array(
    //         "reg_id" => $reg_id,     
    //         "action" => $action,     
    //         "actionMessage" => $reg_id,     
    //         "returnType" => "Web",
    //         "language" => $this->session->userdata("language")
    //     );
        
    //      $post_data = json_encode($dataArray);
    //     //  print_r($post_data);exit;

    //      $response = callApidelete($apiLink, $post_data);
    //     //  print_r($response);exit;
	//    redirect('admin/Delete_acc/index'); 	
 	// }
	


    //  public function delete_user()
    //  {   
    //      $reg_id = $this->input->post('reg_id');
    //      $admin_id = $this->session->userdata("admin_id");
     
    //      // API endpoint for deleting user
    //      $apiLink = 'web/admin/' . $admin_id . '/register-user/delete';
     
    //      // Check if the user clicked Accept or Reject
    //      $action = $this->input->post('action');
    //      $actionMessage = '';

    // // print_r($action);exit;
    //      if ($action === 'Accept') {
    //          $actionMessage = 'customer deleted request accepted successfully';
    //      } elseif ($action === 'Reject') {
    //          $actionMessage = $this->input->post('rejectReason') ?: 'customer deleted request rejected successfully';
    //      }
     
    //      $dataArray = array(
    //          "reg_id" => $reg_id,
    //          "action" => $action,
    //          "actionMessage" => $actionMessage,
    //          "returnType" => "Web",
    //          "language" => $this->session->userdata("language")
    //      );
     
    //      $post_data = json_encode($dataArray);
     
    //      $response = callApidelete($apiLink, $post_data);
    //  //print_r ($response);exit;
    //      if (isset($response['status']) && $response['status'] === true) {
    //          // The action was successful, you can redirect or show a success message
    //          redirect('admin/Delete_acc/index');
    //      } else {
    //          // The action failed, handle the error, and show an error message
    //          echo "Error: " . $response['message'];
    //      }
    //  }
     



public function delete_user()
{
    $reg_id = $this->input->post('reg_id');
    $admin_id = $this->session->userdata("admin_id");

    // API endpoint for deleting user
    $apiLink = 'web/admin/' . $admin_id . '/register-user/delete';

    // Check if the user clicked Accept or Reject
    $action = $this->input->post('action');
	
	//print_r($action);exit;
    $actionMessage = '';

    if ($action === 'Accept') {
        $actionMessage = ''; // Set to empty string for Accept
    } elseif ($action === 'Reject') {
        $actionMessage = $this->input->post('rejectReason');
    }
//print_r($actionMessage);exit;
    $dataArray = array(
        "reg_id" => $reg_id,
        "action" => $action,
        "actionMessage" => $actionMessage,
        "returnType" => "Web",
        "language" => $this->session->userdata("language")
    );

    $post_data = json_encode($dataArray);
//print_r($post_data);exit;
    $response = callApidelete($apiLink, $post_data);
//print_r($response);exit;
    if (isset($response['status']) && $response['status'] === true) {
        // Set flashdata based on the action
        if ($action === 'Accept') {
            $this->session->set_flashdata('success', 'User deletion request accepted successfully.');
        } elseif ($action === 'Reject') {
            $this->session->set_flashdata('success', 'User deletion request rejected successfully.');
        }

        // Redirect to the index page
        redirect('admin/Delete_acc/index');
    } else {
        // Set flashdata for error
        $this->session->set_flashdata('error', 'Error: ' . $response['message']);
        // Redirect to the index page
        redirect('admin/Delete_acc/index');
    }
}



// API Name : GetRejectedDeleteRequestList
// URL : {{baseurl}}/web/admin/{{adminId}}/user-account-delete-request/rejected?pageNumber=1&searchByEmail=eshssh
// Method : GET 
// Response Body {
//     "status": true,
//     "message": "List of rejected users for account deletion.",
//     "data": [
//         {
//             "request_id": 7,
//             "user_id": 289,
//             "user_name": "Khomesh",
//             "user_email": "eshssh@gmail.com",
//             "admin_rejection_reason": "",
//             "status": "rejected",
//             "createdAt": "2024-03-05T06:05:29.000Z",
//             "updatedAt": "2024-03-05T06:05:29.000Z"
//         }
//     ],
//     "currentPage": 1,
//     "pageSize": 10,
//     "totalPages": 1,
//     "totalCount": 1
// }


public function acceptRequest()
	{   
	    $searchInput = $this->session->userdata('searchInput');

    if (!$searchInput) {
        $searchInput = array(
            'name' => '',
            'email' => ''
        );
    }

    $n = $this->input->get('name');
    $name = ($n !== null) ? rawurlencode(trim($n)) : '';
    $email = ($this->input->get('email') !== null) ? trim($this->input->get('email')) : '';
    
    if (!empty($name)) {
        $searchInput['name'] = $name;
    }
    if (!empty($email)) {
        $searchInput['email'] = $email;
    }
    
	 $this->session->set_userdata('searchInput', $searchInput);

        $reg_id = $this->input->post('reg_id');
        $admin_id = $this->session->userdata("admin_id");
		$pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/approved?pageNumber=' . $pageNumber;
		
		if (!empty($searchInput['name']) && !empty($searchInput['email'])) {
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/approved?searchByName=' . $searchInput['name'] . '&searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
		} elseif (!empty($searchInput['name'])) {
			$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/approved?searchByName=' . $searchInput['name'] . '&pageNumber=' . $pageNumber;
		} elseif (!empty($searchInput['email'])) {
			$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/approved?searchByEmail=' . $searchInput['email'] . '&pageNumber=' . $pageNumber;
		}
		
		
		$response = callApiGet($apiLink);

        if (isset($response['status']) && $response['status'] === true) {
            // Load the accept_request_delete_acc_admin_view with the data
            $data['approvedUsers'] = $response['data'];
			
			$this->load->library('pagination');

        $config['base_url'] = base_url('admin/Delete_acc/acceptRequest');
        $config['total_rows'] = $response['totalCount'];
        $config['per_page'] = $response['pageSize'];
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        $this->pagination->initialize($config);

        $StartCount = ($pageNumber - 1) * $response['pageSize'] + 1;

        $this->load->view('admin/accept_request_delete_acc_admin_view', array(
            'approvedUsers' => $data['approvedUsers'],
            'searchInput' => $searchInput,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $response['totalCount'],
            'EndCount' => min($pageNumber * $response['pageSize'], $response['totalCount']),
            'StartCount' => $StartCount,
            'perPage' => $response['pageSize']
        ));

           
        } else {
           $data = array();
           $this->load->view('admin/accept_request_delete_acc_admin_view', array(
            'data' => $data,
            'searchInput' => $searchInput,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => 0,
            'TotalCount' => 0,
            'EndCount' => 0,
            'StartCount' => 0,
            'perPage' => 0
        ));
    }
 }


public function rejectRequest()
	{   
	    $searchInputReject = $this->session->userdata('searchInputReject');

    if (!$searchInputReject) {
        $searchInputReject = array(
            'name' => '',
            'email' => ''
        );
    }

    $n = $this->input->get('name');
    $name = ($n !== null) ? rawurlencode(trim($n)) : '';
    $email = ($this->input->get('email') !== null) ? trim($this->input->get('email')) : '';
    
    if (!empty($name)) {
        $searchInputReject['name'] = $name;
    }
    if (!empty($email)) {
        $searchInputReject['email'] = $email;
    }
    
	 $this->session->set_userdata('searchInputReject', $searchInputReject);

        $reg_id = $this->input->post('reg_id');
        $admin_id = $this->session->userdata("admin_id");
		$pageNumber = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/rejected?pageNumber=' . $pageNumber;
		
		if (!empty($searchInputReject['name']) && !empty($searchInputReject['email'])) {
        $apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/rejected?searchByName=' . $searchInputReject['name'] . '&searchByEmail=' . $searchInputReject['email'] . '&pageNumber=' . $pageNumber;
		} elseif (!empty($searchInputReject['name'])) {
			$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/rejected?searchByName=' . $searchInputReject['name'] . '&pageNumber=' . $pageNumber;
		} elseif (!empty($searchInputReject['email'])) {
			$apiLink = 'web/admin/' . $admin_id . '/user-account-delete-request/rejected?searchByEmail=' . $searchInputReject['email'] . '&pageNumber=' . $pageNumber;
		}
		
		
		$response = callApiGet($apiLink);
		
		//echo"<pre>";
        //print_r($response);exit;
		
        if (isset($response['status']) && $response['status'] === true) {
            // Load the reject_request_delete_acc_admin_view with the data
            $data['rejectedUsers'] = $response['data'];
			
			$this->load->library('pagination');

        $config['base_url'] = base_url('admin/Delete_acc/rejectRequest');
        $config['total_rows'] = $response['totalCount'];
        $config['per_page'] = $response['pageSize'];
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        $this->pagination->initialize($config);

        $StartCount = ($pageNumber - 1) * $response['pageSize'] + 1;

        $this->load->view('admin/reject_request_delete_acc_admin_view', array(
            'rejectedUsers' => $data['rejectedUsers'],
            'searchInputReject' => $searchInputReject,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $response['totalCount'],
            'EndCount' => min($pageNumber * $response['pageSize'], $response['totalCount']),
            'StartCount' => $StartCount,
            'perPage' => $response['pageSize']
        ));

           
        } else {
           $data = array();
           $this->load->view('admin/reject_request_delete_acc_admin_view', array(
            'data' => $data,
            'searchInputReject' => $searchInputReject,
            'pagination' => $this->pagination->create_links(),
            'pageNumber' => 0,
            'TotalCount' => 0,
            'EndCount' => 0,
            'StartCount' => 0,
            'perPage' => 0
        ));
    }
 }


    //  Api-name : delete register user by reg id
    //  URL : https://uatdd.virtualglobetechnology.com/web/admin/{{adminId}}/register-user/delete
    //  Method : delete
    //  request body {
    //      "reg_id":214,
    //      "action":"Reject",  //Accept /Reject
    //      "actionMessage":""
    //  }
     
    //  response Body {
    //      "status": true,
    //      "message": "customer deleted request rejected succesfully"
    //  }


//    public function reject_user()
//    {
//     $reg_id = $this->input->post('reg_id');
//     $admin_id = $this->session->userdata("admin_id");

//     // API endpoint for rejecting user deletion request
//     $apiLink = 'web/admin/' . $admin_id . '/register-user/delete';

//     // Request body for the API
//     $requestData = array(
//         "reg_id" => $reg_id,
//         "action" => "Reject", // Specify the action as "Reject"
//         "actionMessage" => "" // Leave actionMessage empty as per the API documentation
//     );

//     // Convert the data array to JSON format
//     $postData = json_encode($requestData);

//     // Call the API using the callApidelete function
//     $response = callApidelete($apiLink, $postData);

//     // Check the response and take appropriate actions
//     if (isset($response['status']) && $response['status'] === true) {
//         // The rejection was successful, you can redirect or show a success message
//         redirect('admin/Delete_acc/index');
//     } else {
//         // The rejection failed, handle the error, and show an error message
//         echo "Error: " . $response['message'];
//     }
// }



    public function reset()
	{
	  $this->session->unset_userdata('searchInputdelete');
	  return redirect('admin/Delete_acc/index'); 	
	}
	
	public function reset_acceptRequest()
	{
	  $this->session->unset_userdata('searchInput');
	  return redirect('admin/Delete_acc/acceptRequest'); 	
	}
	
	public function reset_rejectRequest()
	{
	  $this->session->unset_userdata('searchInputReject');
	  return redirect('admin/Delete_acc/rejectRequest'); 	
	}
	
}
