<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Career_model');
    }

    public function add_job()
    {
        // Load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Set form validation rules
        $this->form_validation->set_rules('title', 'Job Title', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('requirements', 'Requirements', 'required');
        $this->form_validation->set_rules('responsibilities', 'Responsibilities', 'required');
        $this->form_validation->set_rules('salary', 'Salary', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Load the view with the form
            $this->load->view('admin/add_job_view');
        } else {
            // Save job to database
            $this->Career_model->add_job();
            $this->session->set_flashdata('job_added', 'Job post added successfully.');
            redirect('admin/Job_controller/add_job');
            echo "welcome";
        }
    }

    public function view_jobs()
    {
        // Fetch all jobs from the database
        $data['jobs'] = $this->Career_model->get_all_jobs();
        // Load the view and pass the jobs data
        $this->load->view('admin/view_jobs', $data);
    }
}
