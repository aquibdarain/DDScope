<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('my_general');
        $this->load->model('Get_all_admins_model');
    }

    public function create_admin()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/create_new_admin_view');
        } else {
            // Get the form data
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            $admin_id = $this->session->userdata('admin_id');

            if (!$admin_id) {
                $this->session->set_flashdata('message', 'Admin ID not found in session.');
                $this->load->view('admin/create_new_admin_view');
                return;
            }

            // $admin_id = encrypt_id($admin_id);

            $postData = array(
                'username' => $username,
                'password' => $password,
                'role' => $role,
            );
            // print_r($postData);exit;

            // Call the API to create the new admin
            $apiLink = 'api/v1/web/admin/' . $admin_id . '/create-new-admin';
            $response = callApiPost($apiLink, $postData);

            // echo '<pre>';
            // print_r($response);exit;
            // echo '</pre>';

            // Here i am checking the API response
            if (isset($response['status']) && $response['status'] == true) {
                $this->session->set_flashdata('message', 'New Admin Created Successfully');
                redirect('admin/AdminController/create_admin');
                echo "Admin created successfully.";
            } else {
                $error_message = isset($response['error']['description']) ? $response['error']['description'] : 'Unknown error';
                $this->session->set_flashdata('message', 'Failed to Create Admin: ' . $error_message);
                $this->load->view('admin/create_new_admin_view');
            }
        }
    }

    public function fetch_all_admins()
    {
        $data['admins'] = $this->Get_all_admins_model->get_all_admins();
        $this->load->view('admin/list_all_admins_view', $data);
    }

    public function edit_admin($admin_id) {
        // Load necessary resources
        $this->load->library('form_validation');
        $this->load->model('Get_all_admins_model');
    
        // Retrieve admin data
        $data['admin'] = $this->Get_all_admins_model->get_admin_by_id($admin_id);
    
        // Check if the admin exists
        if (!$data['admin']) {
            $this->session->set_flashdata('error', 'Admin not found.');
            redirect('admin/AdminController/fetch_all_admins');
        }
    
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/edit_admin_view', $data);
        } else {
            // Get updated data
            $updateData = array(
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
            );
    
            // Update admin data in the database
            $this->Get_all_admins_model->update_admin($admin_id, $updateData);
    
            $this->session->set_flashdata('message', 'Admin updated successfully.');
            redirect('admin/AdminController/fetch_all_admins');
        }
    }
    


    public function delete_admin($admin_id)
    {
        $this->load->model('Get_all_admins_model');
        $result = $this->Get_all_admins_model->delete_admin($admin_id);

        if ($result) {
            $this->session->set_flashdata('message', 'Admin deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete admin.');
        }

        redirect('admin/AdminController/fetch_all_admins');
    }

     public function change_status($admin_id, $status)
    {
        // Validate the status value
        if (!in_array($status, ['Active', 'Inactive'])) {
            $this->session->set_flashdata('error', 'Invalid status value.');
            redirect('admin/AdminController/fetch_all_admins');
        }

        // Update the admin status
        $updateData = array('admin_status' => $status);
        $this->load->model('Get_all_admins_model');
        $this->Get_all_admins_model->update_admin($admin_id, $updateData);

        $this->session->set_flashdata('message', 'Admin status updated successfully.');
        redirect('admin/AdminController/fetch_all_admins');
    }
}
