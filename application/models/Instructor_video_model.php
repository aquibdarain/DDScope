<?php
class Instructor_video_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_all_instructors_Videos()
    {
        $query = $this->db->get('dd_web_instructors_Videos');
        return $query->result();
    }

    // Method to save the uploaded video data
    public function insert_video($videoData)
    {
        return $this->db->insert('dd_web_instructors_Videos', $videoData);
    }

}

