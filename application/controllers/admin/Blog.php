<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) {
			redirect('admin/login');
		} else {
			date_default_timezone_set("Asia/Calcutta");
			$this->load->library('encryption');
			$this->load->library("pagination");
			$this->load->model('admin_blog_model');
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$blog_name = '';

		if ($this->input->post('search') != NULL) {
			$blog_name = trim($this->security->xss_clean($this->input->post('blog_name')));
			$this->session->set_userdata("blog_name", $blog_name);
		} else {
			if ($this->session->userdata('blog_name') != NULL) {
				$blog_name = $this->session->userdata('blog_name');
			}
		}

		$data['blog_name'] = $blog_name;

		$rowno = $this->uri->segment(4);

		$this->load->library("pagination");

		$results = $this->admin_blog_model->getblogByName($blog_name);

		if (!empty($results)) {
			$total_records = sizeof($results);
		} else {
			$total_records = 0;
		}


		$limit_per_page = 10;

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
		$config["base_url"] = base_url() . "admin/blog/index";
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

		$data['blogs'] = $this->admin_blog_model->getblogByName($blog_name, $limit_per_page, $rowno);

		//$data['blogs'] = $this->admin_blog_model->showall();

		$this->load->view('admin/admin_blog_view', $data);
	}


	public function add_blog()
	{

		$data['add_error'] = FALSE;

		$data['blogs'] = $this->admin_blog_model->getblogById();
		$this->load->view('admin/add_blog_admin_view', $data);
	}

	public function submit_blogs()
	{
		$this->form_validation->set_rules('blog_name', 'Blog Name', 'required|trim');
		$this->form_validation->set_rules('blog_desc', 'Description', 'required|trim');
		$this->form_validation->set_rules('blog_url', 'Blog URL', 'required|trim|valid_url');

		if ($this->form_validation->run()) {
			if (!empty($_FILES['blog_image']['name'])) {
				$blog_image = $this->file_upload('blog_image', 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG', '2048', TRUE);
				$error = "error";

				if ($blog_image != $error) {
					$lastId = $this->admin_blog_model->addblog($blog_image);
					$this->session->set_flashdata('add_success', 'Blog Added Successfully!');
					return redirect('admin/blog/index', $lastId);
				} else {
					$LastId = 0;
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/add_blog_admin_view', $data);
				}
			} else {
				$data['add_error'] = "Some of the required fields are missing!.";
				$this->load->view('admin/add_blog_admin_view', $data);
			}
		} else {
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/add_blog_admin_view', $data);
		}
	}


	public function edit_blog()
	{
		$blog_id = $this->uri->segment(4, 0);
		$blog_id = $this->security->xss_clean($blog_id);
		if (isset($blog_id) && !empty($blog_id) && $blog_id != NULL && $blog_id > 0) {
			$data['add_error'] = FALSE;
			$data['blog_id'] = $blog_id;
			$data['blog'] = $this->admin_blog_model->editblog($blog_id);
			// Include blog_url in the data passed to the view
			$data['blog_url'] = $data['blog']->blog_url;
			$this->load->view('admin/edit_blog_admin_view', $data);
		} else {
			return redirect('admin/fournotfour');
		}
	}
	

	public function update_blog()
	{
		$this->form_validation->set_rules('blog_name', 'Blog Name', 'required|trim');

		$this->form_validation->set_rules('blog_desc', 'Blog Description', 'required|trim');


		$blog_id = $this->input->post('blog_id');
		$blog_id = $this->security->xss_clean($blog_id);

		if ($this->form_validation->run()) {
			$blog_image = '';
			if (!empty($_FILES['blog_image']['name'])) {
				$blog_image = $this->file_upload('blog_image', 'gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG', '2048', TRUE);

				$error = "error";

				if ($blog_image != $error) {
					$old_file = $this->security->xss_clean($this->input->post('old_file'));
					if ($old_file != "") {
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/blog/' . $old_file);
					}
				} else {
					$data['blog_id'] = $blog_id;
					$data['blog'] = $this->admin_blog_model->editblog($blog_id); //echo '<pre>';print_r($data);
					$data['add_error'] = "There is an error while uploading file. Please try again.";
					$this->load->view('admin/edit_blog_admin_view', $data);
				}
			}

			if ($this->admin_blog_model->updateblog($blog_image)) {
				$this->session->set_flashdata('update_success', 'Blog Updated Successfully!');
				return redirect('admin/blog/index');
			} else {

				if (isset($blog_id) && !empty($blog_id) && $blog_id != NULL && $blog_id > 0) {
					$data['add_error'] = 'Error while updating record. Try again';
					$data['blog_id'] = $blog_id;
					$data['blog'] = $this->admin_blog_model->editblog($blog_id); //echo '<pre>';print_r($data);
					$this->load->view('admin/edit_blog_admin_view', $data);
				} else {
					return redirect('admin/fournotfour');
				}
			}
		} else {
			$data['add_error'] = FALSE;
			$data['blog_id'] = $blog_id;
			$data['blog'] = $this->admin_blog_model->editblog($blog_id); //echo '<pre>';print_r($data);
			$this->load->view('admin/edit_blog_admin_view', $data);
		}
	}

	public function updateStatus()
	{
		$blog_id = $this->uri->segment(4, 0);
		$blog_id = $this->security->xss_clean($blog_id);
		if (isset($blog_id) && !empty($blog_id) && $blog_id != NULL && $blog_id > 0) {
			$blog_array = $this->admin_blog_model->getStatus($blog_id);
			if ($blog_array->blog_status == 'active') {
				$status = 'inactive';
			} else {
				$status = 'active';
			}
			if ($this->admin_blog_model->updateStatus($blog_id, $status)) {

				if ($status == 'active') {
					$this->session->set_flashdata('status_active', 'active');
				} else {
					$this->session->set_flashdata('status_inactive', 'inactive');
				}

				return redirect('admin/blog/index');
			} else {
				$this->session->set_flashdata('error', 'Error while updating record. Try again');
				return redirect('admin/blog/index');
			}
		} else {
			return redirect('admin/fournotfour');
		}
	}

	public function delete_blog($blog_id)
	{
		$blog_id;
		//echo $stud_id;exit;
		$data['blog_id'] = $blog_id;
		//$enq_id = $this->decode_hidden_string($enq_id);

		if ($this->admin_blog_model->deleteblogs($blog_id)) {

			//echo "id deleted";exit;
			//print_r($data);exit;
			$this->session->set_flashdata('delete_successfully', 'Record Deleted Successfully');
			return redirect('admin/blog/index/', $data);
			//print_r($data);exit;

		} else {
			echo "why not delete";
			exit;
		}
		//echo "$id";exit;

	}

	public function file_upload($field_name, $type, $size, $encryption)
	{

		$config['upload_path']   = './upload/blog';
		$config['allowed_types'] = $type;
		$config['max_size']      = $size;
		/*$config['max_width']     = 1024; 
		$config['max_height']    = 768;*/
		$config['encrypt_name'] = $encryption;
		$config['file_name'] = $field_name;
		//echo"hello";print_r($config);exit;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload($field_name)) //
		{
			$upload = $this->upload->data();

			return $upload['file_name'];
		} else {
			$error = array('error' => $this->upload->display_errors());
			//echo '<pre>';
			// print_r($error);exit;
			return 'error';
		}
	}

	public function reset()
	{
		$this->session->unset_userdata('blog_name');
		return redirect('admin/blog/index');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */