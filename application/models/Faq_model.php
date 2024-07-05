<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function get_faqs() {
        $query = $this->db->get('dd_web_faqs');
        // return $query->result_array();
        return $query->result();
    }

    public function get_faq_by_id($id) {
        $query = $this->db->get_where('dd_web_faqs', array('id' => $id));
        return $query->row();
    }

    public function insert_faq($data) {
        return $this->db->insert('dd_web_faqs', $data);
        
    }

    public function update_faq($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('dd_web_faqs', $data);
    }

    public function delete_faq($id) {
        $this->db->where('id', $id);
        return $this->db->delete('dd_web_faqs');
    }

    public function count_faqs() {
        return $this->db->count_all('dd_web_faqs');
    }
}
?>
