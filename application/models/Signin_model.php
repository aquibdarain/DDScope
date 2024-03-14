<?php

class Signin_model extends CI_Model {

    public function verifyCredentials($email, $password) {
        $this->db->select('web_user_id, web_password, verified_email');
        $this->db->where('web_user_email', $email);
        $query = $this->db->get('dd_web_user_details');
    
        if ($query->num_rows() > 0) {
            $user = $query->row();
            $hashedPassword = hash('sha512', $password);
    
            if ($user->web_password === $hashedPassword) {
                // Check if the email is verified
                if ($user->verified_email == 1) {
                    return $user->web_user_id;
                } else {
                    return 'not_verified';
                }
            }
        }
    
        return false;
    }
    


    public function getNotifyData($User_id) {
         $this->db->select('web_notify_me_id');
        $this->db->where('web_user_id', $User_id);
        $query_dd_web_selected_notify_me = $this->db->get('dd_web_selected_notify_me');
        
         if ($query_dd_web_selected_notify_me->num_rows() > 0) {
             $web_notify_me_ids = $query_dd_web_selected_notify_me->result_array();
    
             $dd_web_user_notify_list_data = array();
    
             foreach ($web_notify_me_ids as $row) {
                $web_notify_me_id = $row['web_notify_me_id'];
    
                 $this->db->where('dd_web_user_notify_listid', $web_notify_me_id);
                $query_dd_web_user_notify_list = $this->db->get('dd_web_user_notify_list');
    
                 if ($query_dd_web_user_notify_list->num_rows() > 0) {
                     $row_dd_web_user_notify_list = $query_dd_web_user_notify_list->row_array();
                    $dd_web_user_notify_list_data[] = $row_dd_web_user_notify_list;
                } else {
                     return false;
                }
            }
    
             return $dd_web_user_notify_list_data;
        } else {
             return array();
        }
    }


    public function getinterestData($User_id) {
        $this->db->select('web_interested_in_id');
       $this->db->where('web_user_id', $User_id);
       $query_dd_web_interested_iny_me = $this->db->get('dd_web_selected_interested_in');
       
        if ($query_dd_web_interested_iny_me->num_rows() > 0) {
            $web_notify_me_ids = $query_dd_web_interested_iny_me->result_array();
   
            $dd_web_user_notify_list_data = array();
   
            foreach ($web_notify_me_ids as $row) {
               $web_interested_in_id = $row['web_interested_in_id'];
   
                $this->db->where('dd_web_user_interestedin_listid', $web_interested_in_id);
               $query_dd_web_user_interested_list = $this->db->get('dd_web_user_interestedin_list');
   
                if ($query_dd_web_user_interested_list->num_rows() > 0) {
                    $row_dd_web_user_interest_list = $query_dd_web_user_interested_list->row_array();
                   $dd_web_user_notify_list_data[] = $row_dd_web_user_interest_list;
               } else {
                    return false;
               }
           }
   
            return $dd_web_user_notify_list_data;
       } else {
            return array();
       }
   }
    
    public function getUserNameByEmail($email) {
 
         $this->db->select('web_user_id');
         $this->db->select('web_user_name');
        $this->db->from('dd_web_user_details');
        $this->db->where('web_user_email', $email);

         $query = $this->db->get();

         if ($query->num_rows() > 0) {
             return $query->row();
        } else {
             return null;
        }
    }

    public function updatePassword($web_user_id, $new_password) {
        $this->db->where('web_user_id', $web_user_id);
        $this->db->update('dd_web_user_details', array('web_password' => $new_password));
        
        return $this->db->affected_rows() > 0;
    }
    

    public function update_notify_options($web_user_id, $selectedOptions) {
        $now = date('Y-m-d H:i:s');
        $this->db->where('web_user_id', $web_user_id);
        $this->db->delete('dd_web_selected_notify_me');
    
         foreach ($selectedOptions as $option) {
            $data = array(
                'web_user_id' => $web_user_id,
                'web_notify_me_id' => $option,
                 'updatedAt' => $now,
            );
            $this->db->insert('dd_web_selected_notify_me', $data);
        }
    
        return true;  
    }

    public function update_interest_options($web_user_id, $selectedOptions) {
        $now = date('Y-m-d H:i:s');
        $this->db->where('web_user_id', $web_user_id);
        $this->db->delete('dd_web_selected_interested_in');
    
         foreach ($selectedOptions as $option) {
            $data = array(
                'web_user_id' => $web_user_id,
                'web_interested_in_id' => $option,
                 'updatedAt' => $now,
            );
            $this->db->insert('dd_web_selected_interested_in', $data);
        }
    
        return true;  
    }
    
    
}
?>