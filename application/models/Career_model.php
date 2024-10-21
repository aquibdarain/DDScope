<?php
class Career_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_job() {
        $data = array(
            'title' => $this->input->post('title'),
            'location' => $this->input->post('location'),
            'description' => $this->input->post('description'),
            'requirements' => $this->input->post('requirements'),
            'responsibilities' => $this->input->post('responsibilities'),
            'salary' => $this->input->post('salary'),
            'job_type' => $this->input->post('job_type'),
            'openings' => $this->input->post('openings'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('dd_web_jobs', $data);
    }

    public function get_all_jobs() {
        $query = $this->db->get('dd_web_jobs');
        return $query->result_array();
    }

    public function get_jobs_count() {
        return $this->db->count_all('dd_web_jobs');
    }


}
?>
