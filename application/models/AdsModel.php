<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdsModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAdsVideos()
    {
        $query = $this->db->get('adsvideos');
        return $query->result();
    }

    public function get_users_by_search($searchInput)
    {
        // Initialize query builder for CodeIgniter
        $this->db->select('*');
        $this->db->from('dd_registration');

        // Apply search filters if provided
        if (!empty($searchInput['name'])) {
            $this->db->like('reg_username', $searchInput['name']);
        }
        if (!empty($searchInput['email'])) {
            $this->db->like('reg_email', $searchInput['email']);
        }

        // Execute the query and return results
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_count()
    {
        // Assuming you have a table named 'users', replace it with your actual table name
        // Example query to count total records in the 'users' table
        return $this->db->count_all('dd_registration');
    }


    public function get_user_data()
    {
        // Fetch data from the database
        $query = $this->db->select('reg_username, reg_email')
            ->get('dd_registration');
        return $query->result();
    }
}
