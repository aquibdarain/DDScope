<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends CI_Controller 
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
			$this->load->library("pagination");
			$this->load->model('Contactus_model');
		}
	}

	public function index()
	{   
		$name = '';
		if($this->input->post('search') != NULL)
		{	
			$name = trim($this->security->xss_clean($this->input->post('name'))); 
			$this->session->set_userdata("name", $name); 
		}
		else
		{
			if($this->session->userdata('name') != NULL)
			{ 
				$name = $this->session->userdata('name'); 
			} 
		}
		$data['name'] = $name; 
		$rowno = $this->uri->segment(4); 
	
		$results = $this->Contactus_model->getContactsByName($name);
		$total_records = !empty($results) ? sizeof($results) : 0;

		$limit_per_page = 10;
		
		if($rowno != 0)
		{
			$rowno = ($rowno - 1) * $limit_per_page;
		}
		else
		{
			$rowno = 0; 
		}

		if(empty($total_records))
		{
			$limit_per_page = ''; 
			$StartCount = 0;
			$EndCount = 0; 
		}
		else
		{
			$EndCount = $rowno + $limit_per_page;
			if ($EndCount > $total_records)
			{
				$EndCount = $total_records;
			}
			$StartCount = ($rowno + 1);
		}
	
		$data['TotalCount'] = $total_records; 
		$data['StartCount'] = $StartCount; 
		$data['EndCount'] = $EndCount; 
	  
	    $config = array();
        $config["base_url"] = base_url() . "admin/contactus/index";
        $config["total_rows"] = $total_records;
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
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['row'] = $rowno;
		$data['main'] = $this->Contactus_model->getContactsByName($name, $limit_per_page, $rowno);

        $this->load->view('admin/admin_contactsList_view', $data);
	}

	public function delete_Contacts($id)
	{ 
		if($this->Contactus_model->deleteContacts($id))
		{
			$this->session->set_flashdata('delete_successfully', 'Contact Deleted Successfully');
			redirect('admin/contactus/index/');
		}
		else
		{
			echo "why not delete";
			exit;
		}
	}

	public function reset()
	{
		$this->session->unset_userdata('name');
		return redirect('admin/contactus/index'); 
	}
}
?>
