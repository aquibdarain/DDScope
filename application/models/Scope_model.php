<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scope_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

         // Function to fetch data from 'scope' table with optional priority filter
    public function get_scope_data($priority = null) {
        if ($priority !== null) {
            $this->db->where('Priority', $priority);
        }
        $query = $this->db->get('scope');
        return $query->result_array(); // Returns an array of results
    }
    
}
