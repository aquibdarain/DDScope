<?php

class Ip_store_without_login_access_videos extends CI_Model
{

    public function insert_ip_geolocation($ip_address, $location, $video_page)
    {
        $timestamp = date("Y-m-d H:i:s"); 
        // echo $timestamp;exit;
        $data = [
            'ip_address' => $ip_address,
            'city' => $location['city'] ?? 'N/A',
            'region' => $location['regionName'] ?? 'N/A',
            'country' => $location['country'] ?? 'N/A',
            'latitude' => $location['lat'] ?? null,
            'longitude' => $location['lon'] ?? null,
            'video_page' => $video_page,
            'created_at' => $timestamp
        ];
        // dd_web_videos_access_without_login_ip_store
        // print_r($data);exit;
        return $this->db->insert('dd_web_videos_access_without_login_ip_store', $data);
    }

}