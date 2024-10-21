<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_all_admins_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_admins() {
        $query = $this->db->get('dd_web_admin_login');
        return $query->result_array();
    }

    public function get_admin_by_id($admin_id) {
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get('dd_web_admin_login');
        return $query->row_array();
    }
    
    public function update_admin($admin_id, $updateData) {
        $this->db->where('admin_id', $admin_id);
        return $this->db->update('dd_web_admin_login', $updateData);
    }
    
    public function delete_admin($admin_id) {
        $this->db->where('admin_id', $admin_id);
        return $this->db->delete('dd_web_admin_login');
    }

     public function get_count()
    {
        return $this->db->count_all('dd_web_admin_login');
    }

}
