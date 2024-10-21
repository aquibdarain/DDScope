<?php

class Waitlist_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_count($searchInput = [])
    {
        if (!empty($searchInput['name'])) {
            $this->db->like('name', $searchInput['name']);
        }
        if (!empty($searchInput['email'])) {
            $this->db->like('email', $searchInput['email']);
        }
        return $this->db->count_all_results('dd_web_user_waitlist');
    }

    public function get_all_data($limit = 10, $start = 0, $searchInput = [])
    {
        if (!empty($searchInput['name'])) {
            $this->db->like('name', $searchInput['name']);
        }
        if (!empty($searchInput['email'])) {
            $this->db->like('email', $searchInput['email']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get('dd_web_user_waitlist');
        return $query->result_array();
    }
}
