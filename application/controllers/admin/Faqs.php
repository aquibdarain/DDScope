<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faqs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_model');
        date_default_timezone_set("Asia/Calcutta");
        $this->load->helper('url_helper');
        $this->load->helper('my_general_helper');
        $this->load->library('form_validation');
        $this->load->library('session'); // Load session library
    }

    public function index()
    {
        $data['faqs'] = $this->Faq_model->get_faqs();
        $this->load->view('admin/admin_faqList_view', $data);
    }

    public function add_faq()
    {
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/add_faq');
        } else {
            $data = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'created_at' => date('Y-m-d H:i:s') // Setting the current timestamp
            );
            $this->Faq_model->insert_faq($data);
            $this->session->set_flashdata('add_success', 'FAQ added successfully.');
            redirect('admin/Faqs');
        }
    }
    public function edit_faq($encrypt_subject_id)
    {

        $id = decrypt_id($encrypt_subject_id);
        // print_r($id);
        // echo $id;exit;
        $data['faq'] = $this->Faq_model->get_faq_by_id($id);
        $this->load->view('admin/edit_faqs_view', $data);
    }

    public function update_faq()
    {
        $this->form_validation->set_rules('question', 'Question', 'required|trim');
        $this->form_validation->set_rules('answer', 'Answer', 'required|trim');

        $id = $this->input->post('id');
        $id = $this->security->xss_clean($id);

        if ($this->form_validation->run()) {
            $data = array(
                'question' => $this->security->xss_clean($this->input->post('question')),
                'answer' => $this->security->xss_clean($this->input->post('answer'))
            );

            if ($this->Faq_model->update_faq($id, $data)) {
                $this->session->set_flashdata('update_success', 'Record Updated Successfully!');
                return redirect('admin/faqs/index');
            } else {
                if (isset($id) && !empty($id) && $id != NULL && $id > 0) {
                    $data['add_error'] = 'Error while updating record. Try again';
                    $data['id'] = $id;
                    $data['faq'] = $this->Faq_model->get_faq_by_id($id);
                    $this->load->view('admin/edit_faqs_view', $data);
                } else {
                    return redirect('admin/fournotfour');
                }
            }
        } else {
            $data['add_error'] = FALSE;
            $data['id'] = $id;
            $data['faq'] = $this->Faq_model->get_faq_by_id($id);
            $this->load->view('admin/edit_faqs_view', $data);
        }
    }
    public function delete_faq($id)
    {
        if ($this->Faq_model->delete_faq($id)) {
            $this->session->set_flashdata('delete_success', 'FAQ deleted successfully.');
        } else {
            $this->session->set_flashdata('delete_error', 'Error deleting FAQ. Please try again.');
        }
        redirect('admin/faqs/index');
    }
}
