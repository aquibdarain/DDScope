<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_about_instructor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // for fetching all the entries
    public function get_all_aboutus()
    {
        $this->db->select('*');
        $this->db->from('dd_web_about_instructors');
        // $this->db->limit($limit, $offset);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_aboutus_by_designation($designation)
    {
        $this->db->select('*');
        $this->db->from('dd_web_about_instructors');
        $this->db->where('about_designation', $designation);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_aboutus_by_id($about_id)
    {
        $this->db->select('*');
        $this->db->from('dd_web_about_instructors');
        $this->db->where('about_id', $about_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function get_aboutus_count()
    {
        return $this->db->count_all('dd_web_about_instructors');
    }

    public function insert_aboutus($data)
    {
        return $this->db->insert('dd_web_about_instructors', $data);
    }

    public function update_aboutus($about_id, $data)
    {
        $this->db->where('about_id', $about_id);
        return $this->db->update('dd_web_about_instructors', $data);
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('dd_web_about_instructors');
        $this->db->where('about_id >=', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
