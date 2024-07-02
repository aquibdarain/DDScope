<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     public function getAllAdsVideos() {
        $query = $this->db->get('adsvideos'); 
        return $query->result();  
    }
}
