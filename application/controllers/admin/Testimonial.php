<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        } else {
            $this->load->library('encryption');
            $this->load->library("pagination");
            $this->load->model('admin_testimonial_model');
            $this->output->enable_profiler(FALSE);
        }
    }

    public function index()
    {
        $tes_name = '';
        if ($test = 'reset') {
            $this->session->unset_userdata('tes_name');
        }
        if ($this->input->post('search') != NULL) {
            $tes_name = trim($this->security->xss_clean($this->input->post('tes_name')));
            $this->session->set_userdata("tes_name", $tes_name);
        } else {
            if ($this->session->userdata('tes_name') != NULL) {
                $tes_name = $this->session->userdata('tes_name');
            }
        }
        $data['tes_name'] = $tes_name;

        $rowno = $this->uri->segment(4);

        $this->load->library("pagination");

        $results = $this->admin_testimonial_model->gettestimonialByName($tes_name);

        if (!empty($results)) {
            $total_records = sizeof($results);
        } else {
            $total_records = 0;
        }


        $limit_per_page = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $limit_per_page;
        } else {
            $rowno = 0;
        }

        if (empty($total_records)) {
            $limit_per_page = '';
            $StartCount = 0;
            $EndCount = 0;
        } else {
            $EndCount = $rowno + $limit_per_page;
            if ($EndCount > $total_records) {
                $EndCount = $total_records;
            }
            $StartCount = ($rowno + 1);
        }

        $data['TotalCount'] = $total_records;
        $data['StartCount'] = $StartCount;
        $data['EndCount'] = $EndCount;


        $config = array();
        $config["base_url"] = base_url() . "admin/testimonial/index";
        $config["total_rows"] = $total_records;
        //print_r($config);exit;
        $config["per_page"] = $limit_per_page;
        $config["uri_segment"] = 4;
        $config["use_page_numbers"] = TRUE;
        $config['num_links'] = 5;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        //print_r($config);exit;
        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();

        $data['row'] = $rowno;

        $data['testimonials'] = $this->admin_testimonial_model->gettestimonialByName($tes_name, $limit_per_page, $rowno);

        //echo "<pre>";print_r($data);exit;

        $this->load->view('admin/admin_testimonial_view', $data);
    }

    public function add_Testimonial()
    {
        $data['add_error'] = FALSE;
        $this->load->view('admin/admin_addTestimonial_view', $data);
    }

    public function submit_testimonial()
    {
        $this->form_validation->set_rules('tes_company', 'Name', 'required');
        $this->form_validation->set_rules('tes_desc', 'Description', 'required');
    
        if ($this->form_validation->run()) {
            // Prepare data to be inserted
            $data = [
                'tes_name' => $this->input->post('tes_name'),
                'tes_desc' => $this->input->post('tes_desc')
            ];
    // print_r($data);exit;
            if ($this->admin_testimonial_model->addtestimonial($data)) {
                $this->session->set_flashdata('add_success', 'New Record Added Successfully!');
                return redirect('admin/testimonial/index');
            } else {
                $data['add_error'] = 'Error while adding record. Try again';
                $this->load->view('admin/admin_addtestimonial_view', $data);
            }
        } else {
            $data['add_error'] = FALSE;
            $this->load->view('admin/admin_addtestimonial_view', $data);
        }
    }
    




    public function edit_testimonial($tes_id)
    {
        // $tes_id = decrypt_id($tes_id); 

        $tes_id;
        $tes_id = $this->uri->segment(4, 0);
        $tes_id = $this->security->xss_clean($tes_id);
        // echo $tes_id;exit;
        if (isset($tes_id) && !empty($tes_id) && $tes_id != NULL && $tes_id > 0) {
            $data['add_error'] = FALSE;
            $data['tes_id'] = $tes_id;
            //echo $tes_id;exit;
            $data['testimonial'] = $this->admin_testimonial_model->edittestimonial($tes_id);
            // print_r($data);exit;
            // echo '<pre>';print_r($data);exit;
            $this->load->view('admin/edit_testimonial_view', $data);
        } else {
            return redirect('admin/fournotfour');
        }
    }

    public function update_testimonial()
    {
        $this->form_validation->set_rules('tes_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('tes_desc', 'Description', 'required|trim');
    
        $tes_id = $this->input->post('tes_id');
        $tes_id = $this->security->xss_clean($tes_id);
    
        if ($this->form_validation->run()) {
            $data = array(
                'tes_name' => $this->security->xss_clean($this->input->post('tes_name')),
                'tes_desc' => $this->security->xss_clean($this->input->post('tes_desc'))
            );
    
            if ($this->admin_testimonial_model->updatetestimonial($tes_id, $data)) {
                $this->session->set_flashdata('update_success', 'Record Updated Successfully!');
                return redirect('admin/testimonial/index');
            } else {
                if (isset($tes_id) && !empty($tes_id) && $tes_id != NULL && $tes_id > 0) {
                    $data['add_error'] = 'Error while updating record. Try again';
                    $data['tes_id'] = $tes_id;
                    $data['testimonial'] = $this->admin_testimonial_model->edittestimonial($tes_id);
                    $this->load->view('admin/edit_testimonial_view', $data);
                } else {
                    return redirect('admin/fournotfour');
                }
            }
        } else {
            $data['add_error'] = FALSE;
            $data['tes_id'] = $tes_id;
            $data['testimonial'] = $this->admin_testimonial_model->edittestimonial($tes_id);
            $this->load->view('admin/edit_testimonial_view', $data);
        }
    }
    



    public function delete_testimonial($tes_id)
    {
        $tes_id;

        $data['tes_id'] = $tes_id;
        //$id = $this->decode_hidden_string($id);

        if ($this->admin_testimonial_model->deletetestimonial($tes_id)) {

            //print_r($data);exit;
            $this->session->set_flashdata('delete_successfully', 'Data Deleted Successfully');
            return redirect('admin/testimonial/index/', $data);
            //print_r($data);exit;

        } else {
            echo "why not delete";
            exit;
        }
        //echo "$id";exit;

    }


    public function file_upload($field_name, $type, $size, $encryption)
    {
        $config['upload_path']   = './upload/je';
        $config['allowed_types'] = $type;
        $config['max_size']      = $size;
        /*$config['max_width']     = 1024; 
		$config['max_height']    = 768;*/
        $config['encrypt_name'] = $encryption;
        $config['file_name'] = $field_name;
        //echo "hiiii";print_r($config);exit;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) //
        {
            $upload = $this->upload->data();

            return $upload['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            //echo '<pre>';
            //print_r($error);exit;
            return 'error';
        }
    }



    public function reset()
    {
        $this->session->unset_userdata('tes_name');
        $this->index('admin/testimonial/index');
    }
}

/* End of file testimonial.php */
/* Location: ./application/controllers/testimonial.php */