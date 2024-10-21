<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class IpAddress extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdsModel');
        $this->load->library('pagination');
        date_default_timezone_set("Asia/Calcutta");
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('admin/ip_address_list_view');
    }

    public function fetch_geolocations()
    {
        $start = $this->input->get('start'); // Starting point for pagination
        $length = $this->input->get('length'); // Number of records per page
        $searchValue = $this->input->get('search')['value']; // Global search value
        $videoIdSearch = $this->input->get('columns')[7]['search']['value']; // Video ID search value
        $filterIp = $this->input->get('filter_ip'); // IP address to exclude

        // Fetch the excluded IP addresses
        $excluded_ips = $this->AdsModel->get_filtered_ips();

        // Fetch filtered geolocations excluding the specified IP
        $data['geolocations'] = $this->AdsModel->get_all_geolocations($length, $start, $searchValue, $videoIdSearch, $filterIp, $excluded_ips);
        $data['count'] = $this->AdsModel->count_all_geolocations();

        $response = array(
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $data['count'],
            "recordsFiltered" => $data['count'],
            "data" => $data['geolocations']
        );

        echo json_encode($response); // Return JSON response
    }

    public function add_ip_address_view()
    {
        // Fetch the excluded IPs from the model
        $data['excluded_ips'] = $this->AdsModel->get_filtered_ips();

        // Load the view with the excluded IPs data
        $this->load->view('admin/add_ip_address_to_filter', $data);
    }


    public function add_excluded_ip()
    {
        $ip_address = $this->input->post('ip_address');
        if ($ip_address) {
            $this->AdsModel->insert_excluded_ip($ip_address);
            $this->session->set_flashdata('success', 'IP Address added to exclusion list.');
        } else {
            $this->session->set_flashdata('error', 'Please enter a valid IP address.');
        }
        redirect('admin/IpAddress/add_ip_address_view');
    }

    public function delete_excluded_ip($ip_address)
{
    if ($this->AdsModel->delete_excluded_ip($ip_address)) {
        $this->session->set_flashdata('success', 'IP Address successfully deleted from exclusion list.');
    } else {
        $this->session->set_flashdata('error', 'Failed to delete IP Address.');
    }
    redirect('admin/IpAddress/add_ip_address_view');
}

}
