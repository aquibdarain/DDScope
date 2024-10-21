<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_instructor_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_about_instructor_model');
        $this->load->library('pagination');
        $this->load->library('upload'); // Load the upload library
        $this->load->helper('url');
    }

    public function index()
    {
        // Pagination configuration
        $config['base_url'] = site_url('admin/aboutus/index');
        $config['total_rows'] = $this->Admin_about_instructor_model->get_aboutus_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;

        // Pagination styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        // Fetch data from the model
        $data['aboutus'] = $this->Admin_about_instructor_model->get_all_aboutus($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['TotalCount'] = $config['total_rows'];
        $data['StartCount'] = $page + 1;
        $data['EndCount'] = ($page + $config['per_page'] > $config['total_rows']) ? $config['total_rows'] : $page + $config['per_page'];

        // Load the view with the data
        $this->load->view('admin/about_instructor_view', $data);
    }

    public function add_aboutus()
    {
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('about_name', 'Name', 'required');
        $this->form_validation->set_rules('about_designation', 'Designation', 'required');
        $this->form_validation->set_rules('about_bio', 'Bio', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Load the view with errors if validation fails
            $this->load->view('admin/add_about_instructor_view');
        } else {
            // Configuration for file upload
            $config['upload_path'] = './upload/instructors/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB max size
            $config['encrypt_name'] = TRUE; // Encrypt file name

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('about_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
                $this->load->view('admin/add_about_instructor_view');
            } else {
                $upload_data = $this->upload->data();
                $image_path = $upload_data['file_name'];

                // Prepare data for database insertion
                $data = array(
                    'about_name' => $this->input->post('about_name'),
                    'about_designation' => $this->input->post('about_designation'),
                    'about_bio' => $this->input->post('about_bio'),
                    'about_image' => $image_path
                );

                // Insert data into the database
                $this->Admin_about_instructor_model->insert_aboutus($data);
                $this->session->set_flashdata('add_success', 'About Us content added successfully.');
                redirect('admin/About_instructor_controller/index');
            }
        }
    }

    public function edit_aboutus($about_id)
    {
        // Fetch the current data for the selected record
        $data['aboutus'] = $this->Admin_about_instructor_model->get_aboutus_by_id($about_id);

        if (!$data['aboutus']) {
            // Redirect if the record does not exist
            $this->session->set_flashdata('error', 'Invalid About Us ID.');
            redirect('admin/About_instructor_controller/index');
        }

        // Set validation rules
        $this->form_validation->set_rules('about_name', 'Name', 'required');
        $this->form_validation->set_rules('about_designation', 'Designation', 'required');
        $this->form_validation->set_rules('about_bio', 'Bio', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Load the edit view with existing data
            $this->load->view('admin/edit_about_instructor_view', $data);
        } else {
            // Configuration for file upload
            $config['upload_path'] = './upload/instructors/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB max size
            $config['encrypt_name'] = TRUE; // Encrypt file name

            $this->upload->initialize($config);

            $image_path = $data['aboutus']['about_image'];
            // Check if a new image is uploaded
            if ($this->upload->do_upload('about_image')) {
                $upload_data = $this->upload->data();
                $image_path = $upload_data['file_name'];

                // Optional: Delete the old image file if a new one is uploaded
                if (file_exists('./upload/instructors/' . $data['aboutus']['about_image'])) {
                    unlink('./upload/instructors/' . $data['aboutus']['about_image']);
                }
            } elseif ($_FILES['about_image']['error'] != 4) {
                // If an error occurs (excluding "no file selected"), display the error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
                $this->load->view('admin/edit_about_instructor_view', $data);
                return;
            }

            // Prepare data for updating the database
            $update_data = array(
                'about_name' => $this->input->post('about_name'),
                'about_designation' => $this->input->post('about_designation'),
                'about_bio' => $this->input->post('about_bio'),
                'about_image' => $image_path
            );

            // Update the record in the database
            if ($this->Admin_about_instructor_model->update_aboutus($about_id, $update_data)) {
                $this->session->set_flashdata('edit_success', 'About Us content updated successfully.');
                redirect('admin/About_instructor_controller/index');
            } else {
                $this->session->set_flashdata('edit_error', 'Failed to update About Us content.');
                $this->load->view('admin/edit_about_instructor_view', $data);
            }
        }
    }
}
