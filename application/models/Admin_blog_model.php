<?php
class Admin_blog_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("blog_id", "desc")->get('tbl_blog');


		if ($result->num_rows()) {
			return $result->result_array();
		} else {
			return FALSE;
		}
	}

	public function getblogById()
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	// public function getblogssById($blog_id)
	// {
	// 	$query = $this->db->get_where('tbl_blog', array('blog_id' => $blog_id));
	// 	return $query->row();
	// }

	public function getblogssById($blog_id)
	{
		$this->db->where('blog_id', $blog_id);
		$query = $this->db->get('tbl_blog');
		return $query->row(); // Ensure it returns a single row as an object
	}

	public function getblogByName($blog_name = FALSE, $number_of_blog = FALSE, $page_number = FALSE)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->like('blog_name', $blog_name);
		if ($number_of_blog != FALSE) {
			$this->db->limit($number_of_blog, $page_number);
		}
		$this->db->order_by('tbl_blog.blog_id', "DESC");
		$query = $this->db->get();

		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function addblog($blog_image)
	{
		$field3 = $blog_image != "" ? array('blog_image' => $blog_image) : array('blog_image' => '');

		$field = array(
			'blog_name' => $this->security->xss_clean($this->input->post('blog_name')),
			'blog_desc' => $this->security->xss_clean($this->input->post('blog_desc')),
			'blog_url' => $this->security->xss_clean($this->input->post('blog_url')),
			'blog_date' => date('Y-m-d H:i:s'),
		);

		$fields_array = array_merge($field, $field3);
		$this->db->insert('tbl_blog', $fields_array);

		return $this->db->affected_rows() > 0;
	}



	public function editblog($blog_id)
	{

		$this->db->where('blog_id', $blog_id);
		$query = $this->db->get('tbl_blog');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function get_blog_name()
	{
		$this->db->select('*')->from('tbl_blog');
		$this->db->order_by('blog_name', "ASC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function updateblog($blog_image)
	{
		$blog_id = $this->input->post('blog_id');
		$blog_id = $this->security->xss_clean($blog_id);
	
		$data_1 = array();
		if ($blog_image != '') {
			$data_1 = array('blog_image' => $blog_image);
		}
	
		$data_2 = array(
			'blog_name' => $this->security->xss_clean($this->input->post('blog_name')),
			'blog_desc' => $this->security->xss_clean($this->input->post('blog_desc')),
			'blog_url' => $this->security->xss_clean($this->input->post('blog_url'))
		);
	
		$data = array_merge($data_1, $data_2);
	
		$this->db->where('blog_id', $blog_id);
		$this->db->update('tbl_blog', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

	public function updateStatus($blog_id, $status)
	{

		$field = array(
			'blog_status' => $status
		);
		$this->db->where('blog_id', $blog_id);
		$this->db->update('tbl_blog', $field);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getStatus($blog_id)
	{
		$this->db->where('blog_id', $blog_id);
		$query = $this->db->get('tbl_blog');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function get_count()
	{
		$query = $this->db->get("tbl_blog");
		return $query->num_rows();
	}
	public function get_blogpage($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('blog_id', "DESC");
		$query = $this->db->get("tbl_blog");

		return $query->result_array();
	}

	public function deleteblogs($blog_id)
	{
		$this->db->delete('tbl_blog', array('blog_id' => $blog_id));
		return TRUE;
	}
}
