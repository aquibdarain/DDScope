<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scope_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function get_scope_data($priority = null, $microservice = null, $status = null) {
        if ($priority !== null && $priority !== '') {
            $this->db->where('Priority', $priority);
        }
    
        if ($microservice !== null && $microservice !== '') {
            $this->db->like('Microservice', $microservice);
        }
    
        if ($status !== null && $status !== '') {
            $this->db->where('Status', $status);
        }
    
        $query = $this->db->get('scope');
        return $query->result_array();
    }
    
}
