<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.about/index.php/cms
	 *	- or -  
	 * 		http://example.about/index.php/cms/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.about/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/cms/<method_name>
	 * @see http://codeigniter.about/user_guide/general/urls.html
	 */
	public function __construct()
	{
		
        parent::__construct();
		if(! $this->session->userdata('admin_id'))
		{
			redirect('admin/login');
		}
		else
		{   
			$this->load->helper('my_general');
			// $this->load->helper('captcha');
			$this->load->helper('string');
			$this->load->library("pagination");
			$this->load->model('admin_aboutus_model');
			$this->output->enable_profiler(FALSE);
		}	
				
	}

    
	public function index()
	{
	    $abt_title='';
		
		if($this->input->post('search') != NULL )
		{	
			$abt_title = trim($this->security->xss_clean($this->input->post('abt_title'))); 
			$this->session->set_userdata("abt_title",$abt_title); 
		}
		else
		{
		if($this->session->userdata('abt_title') != NULL){ $abt_title = $this->session->userdata('abt_title'); } 
		}
		
      $data['abt_title'] = $abt_title; 
	  $rowno = $this->uri->segment(4); 
	  
	   $this->load->library("pagination");
	   
	   $results = $this->admin_aboutus_model->getaboutusByName($abt_title);
	   if(!empty($results)){$total_records=sizeof($results);}else{$total_records=0;}

		
		$limit_per_page = 5;
		
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
			$StartCount = 0 ;
			$EndCount = 0; 
		}
		else
		{
			$EndCount = $rowno + $limit_per_page;
			if ($EndCount > $total_records)
			{
				$EndCount = $total_records;
			}
			$StartCount = ($rowno+1);
		}
	
		$data['TotalCount'] = $total_records; 
		$data['StartCount'] = $StartCount; 
		$data['EndCount'] = $EndCount; 
	  
	    $config = array();
        $config["base_url"] = base_url() . "admin/aboutus/index";
        $config["total_rows"] = $total_records;
        //print_r($config);exit;
        $config["per_page"] =$limit_per_page;
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
	  
	    $data['aboutuss'] = $this->admin_aboutus_model->getaboutusByName($abt_title,$limit_per_page,$rowno);

        // $data['aboutuss'] = $this->admin_aboutus_model->get_count();


        // $contactusCount = $this->admin_aboutus_model->get_count();
        // $data['contactusCount'] = $contactusCount;
    
	    //$data['aboutpanies'] = $this->admin_aboutus_model->showall();
		
        $this->load->view('admin/aboutus_admin_view',$data);
	}

	public function addaboutus()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/aboutusadd_admin_view',$data);
	}

	public function submitaboutus()
	{
		//print_r($_POST);exit;
		$this->form_validation->set_rules('abt_title','Title','required|trim|xss_clean');
		$this->form_validation->set_rules('abt_desc','Description','required|trim|xss_clean');
		

		if ($this->form_validation->run())
		{ 

			$abt_image = '';
			$abth_image = '';
			
			if (!empty($_FILES['abt_image']['name']) && !empty($_FILES['abth_image']['name']))
			{
				$abt_image = $this->file_upload('abt_image', 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', '2048', TRUE);
				$abth_image = $this->file_upload('abth_image', 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', '2048', TRUE);
				
				$error = "error";
				//echo $cms_file;exit;
				
				if($abt_image!=$error && $abth_image!=$error)
				{
					if($this->admin_aboutus_model->addaboutus($abt_image, $abth_image))
					{				
						$this->session->set_flashdata('add_success','New Record Added Successfully!');
						return redirect('admin/aboutus/index');
					}
					else
					{
						@unlink('./upload/je/'.$abt_image);
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/aboutusadd_admin_view',$data);
					}
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					//print_r($data);
					$this->load->view('admin/aboutusadd_admin_view',$data);
				}
			}
			else
			{
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/aboutusadd_admin_view',$data);		
			}
			
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/aboutusadd_admin_view',$data);
		}
	}

	public function editaboutus($abt_id)
	{	
		$abt_id = decrypt_id($abt_id); 

		// $abt_id = $this->uri->segment(4,0);
		// //echo $cms_id;exit;
		// $abt_id = $this->security->xss_clean($abt_id);
		if(isset($abt_id) && !empty($abt_id) && $abt_id!=NULL && $abt_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['abt_id'] = $abt_id;
			$data['aboutus'] = $this->admin_aboutus_model->editaboutus($abt_id);
			// echo '<pre>';print_r($data);exit;
			$this->load->view('admin/aboutusedit_admin_view',$data);
		}
		else
		{ 
		
			return redirect('admin/fournotfour');
		}
	}

	public function updateaboutus()
	{		
        
		$this->form_validation->set_rules('abt_title','Title','required|trim');
		
		$this->form_validation->set_rules('abt_desc','Description','required|trim');
				
        $abt_id = $this->input->post('abt_id');
		$abt_id = $this->security->xss_clean($abt_id);
		
		if ($this->form_validation->run())
		{
		
			$abt_image = ''; 
			$abth_image = ''; 
			
			if (!empty($_FILES['abt_image']['name']))
			{
				$abt_image = $this->file_upload('abt_image', 'jpg|jpeg|JPEG|png|gif|GIF|', '2048', TRUE);

				$error = "error";
					
				if($abt_image!=$error)
				{
					$old_file = $this->security->xss_clean($this->input->post('old_file'));
					//echo $old_file;exit;
					if($old_file!="")
					{
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/je/'.$old_file);
					}
					
				
				}
				else
				{
					
					$data['abt_id'] = $abt_id;
					$data['aboutus'] = $this->admin_aboutus_model->editaboutus($abt_id);//echo '<pre>';print_r($data);
					$data['add_error'] = 'There is an error while uploading file. Please try again.';
					$this->load->view('admin/aboutusedit_admin_view',$data);
				}
			}
			
			
			if (!empty($_FILES['abth_image']['name']))
			{
				$abth_image = $this->file_upload('abth_image', 'jpg|jpeg|JPEG|png|gif|GIF|', '2048', TRUE);

				$error = "error";
					
				if($abth_image!=$error)
				{
					$oldh_file = $this->security->xss_clean($this->input->post('oldh_file'));
					//echo $old_file;exit;
					if($oldh_file!="")
					{
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/je/'.$old_file);
					}
					
				
				}
				else
				{
					
					$data['abt_id'] = $abt_id;
					$data['aboutus'] = $this->admin_aboutus_model->editaboutus($abt_id);//echo '<pre>';print_r($data);
					$data['add_error'] = 'There is an error while uploading file. Please try again.';
					$this->load->view('admin/aboutusedit_admin_view',$data);
				}
			}
			
			
			if($this->admin_aboutus_model->updateaboutus($abt_image,$abth_image))
			{				
				$this->session->set_flashdata('update_success','Record Updated Successfully!');
				return redirect('admin/aboutus/index');
			}
			else
			{
				
				if(isset($abt_id) && !empty($abt_id) && $abt_id!=NULL && $abt_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['abt_id'] = $abt_id;
					$data['aboutus'] = $this->admin_aboutus_model->editaboutus($abt_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/aboutusedit_admin_view',$data);
				}
				else
				{ 
					return redirect('admin/fournotfour');
				}
			}				
		}
		else
		{
			$data['add_error'] = FALSE;
			$data['abt_id'] = $abt_id;
			$data['aboutus'] = $this->admin_aboutus_model->editaboutus($abt_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/aboutusedit_admin_view',$data);
		}		
	}
	public function delete_aboutus($abt_id)
	{
		 $abt_id;
		//echo $stud_id;exit;
		$data['abt_id'] = $abt_id;
		//$enq_id = $this->decode_hidden_string($enq_id);
         //echo $cms_id;exit;
		if($this->admin_aboutus_model->deleteaboutus($abt_id))
			{
			
			//print_r($data);exit;
              $this->session->set_flashdata('delete_successfully', 'Record Deleted Successfully');
				return redirect('admin/aboutus/index/',$data);
		         //print_r($data);exit;

			}
			else{
				  echo "why not delete";exit;
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
						
		if($this->upload->do_upload($field_name))//
		{
			$upload = $this->upload->data();
			
			return $upload['file_name'];
		}					
		else
		{
			$error = array('error' => $this->upload->display_errors());
			//echo '<pre>';
			 //print_r($error);exit;
			return 'error';
		}
	}
	
	public function reset()
	{
	  $this->session->unset_userdata('abt_title');
	  return redirect('admin/aboutus/index'); 	
	}
	
}

/* End of file cms.php */
/* Location: ./application/controllers/cms.php */