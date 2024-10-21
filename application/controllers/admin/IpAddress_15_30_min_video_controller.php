<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class IpAddress_15_30_min_video_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdsModel');
        $this->load->library('pagination');
        date_default_timezone_set("Asia/Calcutta");
        $this->load->helper('url_helper');
    }

    public function index($page = 0) {
        // Pagination configuration
        $config = array();
        $config['base_url'] = base_url('admin/IpAddress_15_30_min_video_controller/index');
        $config['total_rows'] = $this->AdsModel->count_all_geolocations_of_15_and_30_min_video();
        $config['per_page'] = 10; // Number of items per page
        $config['uri_segment'] = 4; // Segment of the URL that contains the page number
    
        // Pagination styling
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '<< First';
        $config['last_link'] = 'Last >>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '< Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next >';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
    
        $this->pagination->initialize($config);
    
        $start = $page;

        $data['all_ip_locations'] = $this->AdsModel->get_all_geolocations_of_15_and_30_min_video();

        // Get counts for 15-minute and 30-minute videos
        $data['count_15_min_videos'] = $this->AdsModel->count_videos_by_duration('15 minute');
        $data['count_30_min_videos'] = $this->AdsModel->count_videos_by_duration('30 minute');
    
        // Pagination links
        $data['links'] = $this->pagination->create_links();
    
        // for calculating StartCount and EndCount
        $data['StartCount'] = $start + 1;
        $data['EndCount'] = min($start + $config['per_page'], $config['total_rows']);
        $data['TotalCount'] = $config['total_rows'];
    
        $this->load->view('admin/ip_address_list_view_of_15_and_30_min_video', $data);
    }
    
}
