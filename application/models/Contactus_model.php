<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_contact($data) {
        return $this->db->insert('contactus', $data);
    }

    public function get_contactus_count() {
        return $this->db->count_all('contactus');
    }

    public function showcontacts() {
        $this->db->select('*')->from('contactus')->order_by('id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getContactsByName($name = '', $limit = 0, $start = 0) {
        $this->db->select('*');
        $this->db->from('contactus');
        if($name != '') {
            $this->db->like('name', $name);
            $this->db->or_like('contactnumber', $name);
            $this->db->or_like('email', $name);
        }
        $this->db->order_by('id', 'DESC');
        if($limit != 0) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function deleteContacts($id) {
        $this->db->where('id', $id);
        return $this->db->delete('contactus');
    }
}
?>
