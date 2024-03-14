<?php

class Signup_model extends CI_Model {

    public function insertUser($name, $email, $city, $phoneNumber, $hashedPassword) {
        $now = date('Y-m-d H:i:s');
         $data = array(
            'reg_username' => $name,
            'reg_email' => $email,
            'reg_user_city' => $city,
            'reg_mobile' => $phoneNumber,
            'reg_password' => $hashedPassword, 
            'reg_datetime' => $now,
        );

         $this->db->insert('dd_registration', $data);
          

         return $this->db->insert_id();
    }

    public function isEmailExists($email) {
        $this->db->where('reg_email', $email);
        // $this->db->where('verified_email', 1); 
        $query = $this->db->get('dd_registration');
    
        return $query->num_rows() > 0;
    }

    public function isphoneExists($phoneNumber) {
        $this->db->where('web_user_phone', $phoneNumber);
        $query = $this->db->get('dd_web_user_details');
    
        return $query->num_rows() > 0;
    }

    public function insertSelectedOption($userId, $selectedOption) {
        $now = date('Y-m-d H:i:s');
        $data = array(
            'web_user_id' => $userId,
            'web_notify_me_id' => $selectedOption,
             'updatedAt' => $now,
        );
    
        $this->db->insert('dd_web_selected_notify_me', $data);
         
    }

    public function insertInterestedOption($userId, $selectedOption) {
        $now = date('Y-m-d H:i:s');
        $data = array(
            'web_user_id' => $userId,
            'web_interested_in_id' => $selectedOption,
             'createdAt' => $now,
             'updatedAt' => $now,
        );
    
        $this->db->insert('dd_web_selected_interested_in', $data);
         
    }
    
    public function updateVerifiedEmail($reg_id) {
        $data = array('reg_email_verify' => 1);
        $this->db->where('reg_id', $reg_id);
        $this->db->update('dd_registration', $data);
    }

    public function getUserDataByToken($token) {
         $this->db->select('web_user_email, verified_email');
        $this->db->where('token', $token);
        $query = $this->db->get('dd_web_user_details');
          if ($query->num_rows() > 0) {
             return $query->row_array();
        } else {
             return false;
        }
    }
}   
?>