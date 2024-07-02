<?php
class Admin_testimonial_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("tes_id", "ASC")->get('tbl_testimonial');

		if ($result->num_rows()) {
			return $result->result_array();
		} else {
			return FALSE;
		}
	}



	public function get_testimonials()
	{
		$query = $this->db->get('tbl_testimonial');
		return $query->result();
	}


	public function gettestimonialById()
	{
		$this->db->select('*');
		$this->db->from('tbl_testimonial');
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function gettestimonialByName($tes_name = FALSE, $number_of_feedbacks = FALSE, $page_number = FALSE)
	{
		$this->db->select('*');
		$this->db->from('tbl_testimonial');
		$this->db->like('tes_name', $tes_name);

		if ($number_of_feedbacks != FALSE) {
			$this->db->limit($number_of_feedbacks, $page_number);
		}
		$this->db->order_by('tbl_testimonial.tes_id', "DESC");
		$query = $this->db->get();

		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

    public function addtestimonial()
    {
        $field = array(
            'tes_name' => $this->security->xss_clean($this->input->post('tes_company')),
            'tes_desc' => $this->security->xss_clean($this->input->post('tes_desc'))
        );
    
        $this->db->insert('tbl_testimonial', $field);
    
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    


	public function get_count()
	{
		$query = $this->db->get("tbl_testimonial");
		return $query->num_rows();
	}
	public function get_testimonialpage($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('tes_id', "DESC");
		$query = $this->db->get("tbl_testimonial");
		return $query->result_array();
	}

	public function edittestimonial($tes_id)
	{
		$this->db->where('tes_id', $tes_id);
		$query = $this->db->get('tbl_testimonial');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function updatetestimonial($tes_id, $data)
	{
		$tes_id = $this->input->post('$tes_id');
		$tes_id = $this->security->xss_clean($this->input->post('tes_id'));

		// $data_1 = array();
		// if ($tes_image != '') {
		// 	$data_1 = array('tes_image' => $tes_image);
		// }

		$data_2 = array(
			'tes_name' => $this->security->xss_clean($this->input->post('tes_name')),

			// 'tes_company' => $this->security->xss_clean($this->input->post('tes_company')),

			'tes_desc' => $this->security->xss_clean($this->input->post('tes_desc'))
		);

		$data = array_merge($data_2);

		$this->db->where('tes_id', $tes_id);
		$this->db->update('tbl_testimonial', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deletetestimonial($tes_id)
	{

		$this->db->delete('tbl_testimonial', array('tes_id' => $tes_id));
		return TRUE;
	}
}
