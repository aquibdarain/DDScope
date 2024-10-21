<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_aboutus_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all about us records
    public function get_all_aboutus()
    {
        $this->db->select('*');
        $this->db->from('dd_web_aboutus');
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
        $this->db->from('dd_web_aboutus');
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
        $this->db->from('dd_web_aboutus');
        $this->db->where('about_id', $about_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    // Get total record count for pagination
    public function get_aboutus_count()
    {
        return $this->db->count_all('dd_web_aboutus');
    }

    // Insert a new About Us entry
    public function insert_aboutus($data)
    {
        return $this->db->insert('dd_web_aboutus', $data);
    }

    public function update_aboutus($about_id, $data)
    {
        $this->db->where('about_id', $about_id);
        return $this->db->update('dd_web_aboutus', $data);
    }

    // Fetch a specific About Us record by ID
    // public function get_aboutus_by_id($about_id) {
    //     $this->db->select('*');
    //     $this->db->from('dd_web_aboutus');
    //     $this->db->where('about_id', $about_id);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->row_array();
    //     } else {
    //         return false;
    //     }
    // }

    public function get_aboutus_from_id_2_onwards()
    {
        $this->db->select('*');
        $this->db->from('dd_web_aboutus');
        $this->db->where('about_id >', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function delete_aboutus($about_id)
    {
        $this->db->where('about_id', $about_id);
        return $this->db->delete('dd_web_aboutus');
    }
}
