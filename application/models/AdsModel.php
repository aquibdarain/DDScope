<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function getAllAdsVideos()
    {
        $query = $this->db->get('adsvideos');
        return $query->result();
    }

    public function getFirstVideo()
    {
        $query = $this->db->limit(1)->get('adsvideos');
        return $query->row();
    }

    public function get_users_by_search($searchInput)
    {
        $this->db->select('*');
        $this->db->from('dd_registrations');

        if (!empty($searchInput['name'])) {
            $this->db->like('reg_username', $searchInput['name']);
        }
        if (!empty($searchInput['email'])) {
            $this->db->like('reg_email', $searchInput['email']);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_count()
    {
        return $this->db->count_all('dd_registrations');
    }

    public function get_user_data()
    {
        $query = $this->db->select('reg_username, reg_email')->get('dd_registrations');
        return $query->result();
    }

    public function insert_ip_geolocation($ip_address, $location, $email, $video_id = null)
    {
        $timestamp = date("Y-m-d H:i:s"); // Corrected timestamp
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            'video_id' => $video_id,
            'email' => $email,
            'created_at' => $timestamp
        ];
        // print_r($data);exit;
        return $this->db->insert('dd_web_ip_address_geolocation', $data);
    }

    public function count_all_geolocations()
    {
        return $this->db->count_all('dd_web_ip_address_geolocation');
    }

    public function getAll_Talk_Videos()
    {
        $query = $this->db->get('dd_web_talk_videos');
        return $query->result();
    }

    public function get_spreadsheet_long_video()
    {
        $query = $this->db->get('dd_web_spreadsheet_long_video');
        return $query->result();
    }

    public function get_second_video()
    {
        $this->db->where('vidid', 2);
        $query = $this->db->get('dd_web_spreadsheet_long_video');
        return $query->row(); // Return only one row since we're filtering by vidid
    }

    public function get_video_by_vidid($vidid)
    {
        $this->db->where('vidid', $vidid);
        $query = $this->db->get('dd_web_spreadsheet_long_video');
        return $query->row();
    }

    public function count_all_geolocations_of_15_and_30_min_video()
    {
        return $this->db->count_all('dd_web_ip_address_location');
    }

    public function count_videos_by_duration($durationn)
    {
        $this->db->where('video_id', $durationn);
        return $this->db->count_all_results('dd_web_ip_address_location');
    }

    public function get_all_geolocations_of_15_and_30_min_video()
    {
        $query = $this->db->get('dd_web_ip_address_location');
        return $query->result_array();
    }

    public function get_all_geolocations($limit = 10, $start = 0, $searchValue = '', $videoIdSearch = '', $filterIp = '', $excluded_ips = [])
    {
        $this->db->limit($limit, $start);

        if (!empty($searchValue)) {
            $this->db->group_start();
            $this->db->like('ip_address', $searchValue);
            $this->db->or_like('city', $searchValue);
            $this->db->or_like('region', $searchValue);
            $this->db->or_like('country', $searchValue);
            $this->db->or_like('latitude', $searchValue);
            $this->db->or_like('longitude', $searchValue);
            $this->db->or_like('video_id', $searchValue);
            $this->db->group_end();
        }

        if (!empty($videoIdSearch)) {
            $this->db->where('video_id', $videoIdSearch);
        }

        if (!empty($filterIp)) {
            $this->db->where('ip_address !=', $filterIp);
        }

        if (!empty($excluded_ips)) {
            $this->db->where_not_in('ip_address', $excluded_ips);
        }

        $query = $this->db->get('dd_web_ip_address_geolocation');
        return $query->result_array();
    }

    public function count_filtered_geolocations($search = '')
    {
        $this->db->select('COUNT(*) AS count');
        $this->db->from('dd_web_ip_address_geolocation');

        // Apply search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('ip_address', $search);
            $this->db->or_like('city', $search);
            $this->db->or_like('region', $search);
            $this->db->or_like('country', $search);
            $this->db->group_end();
        }

        $query = $this->db->get();
        return $query->row()->count;
    }

    public function insert_excluded_ip($ip_address)
    {
        $data = [
            'ip_address' => $ip_address,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('dd_web_filtered_ip_address_from_table', $data);
    }

    public function get_filtered_ips()
    {
        $this->db->select('ip_address');
        $query = $this->db->get('dd_web_filtered_ip_address_from_table');
        return array_column($query->result_array(), 'ip_address');
    }

    public function delete_excluded_ip($ip_address)
    {
        $this->db->where('ip_address', $ip_address);
        return $this->db->delete('dd_web_filtered_ip_address_from_table');
    }

       public function insert_ip_geolocation_who_trying_to_access_ads_without_login($ip_address, $location)
    {
        $timestamp = date("Y-m-d H:i:s"); // Corrected timestamp
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            // 'video_id' => $video_id,
            'created_at' => $timestamp
        ];
        // print_r($data);exit;
        return $this->db->insert('dd_web_ip_geolocation_store_who_access_Ads_without_login', $data);
    }

    public function insert_ip_geolocation_who_trying_to_access_talk_without_login($ip_address, $location)
    {
        $timestamp = date("Y-m-d H:i:s"); // Corrected timestamp
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            // 'video_id' => $video_id,
            'created_at' => $timestamp
        ];
        // print_r($data);exit;
        return $this->db->insert('dd_web_ip_geolocation_store_who_access_Talk_without_login', $data);
    }

 public function insert_ip_geolocation_who_trying_to_access_15_min_video_without_login($ip_address, $location)
    {
        $timestamp = date("Y-m-d H:i:s"); // Corrected timestamp
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            // 'video_id' => $video_id,
            'created_at' => $timestamp
        ];
        // print_r($data);exit;
        return $this->db->insert('dd_web_ip_geolocation_who_access_15_min_video_without_login', $data);
    }

    public function insert_ip_geolocation_who_trying_to_access_30_min_video_without_login($ip_address, $location)
    {
        $timestamp = date("Y-m-d H:i:s"); // Corrected timestamp
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            // 'video_id' => $video_id,
            'created_at' => $timestamp
        ];
        // print_r($data);exit;
        return $this->db->insert('dd_web_ip_geolocation_who_access_30_min_video_without_login', $data);
    }

     public function disableTrading($userId) {
        $this->db->set('reg_enable_trading', 0);
        $this->db->where('reg_id', $userId);
        return $this->db->update('dd_registrations');
    }

      public function enableTrading($userId) {
        $this->db->set('reg_enable_trading', 1);
        $this->db->where('reg_id', $userId);
        return $this->db->update('dd_registrations');
    }


}
