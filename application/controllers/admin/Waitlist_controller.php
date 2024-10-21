<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Waitlist_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        $this->load->model('Waitlist_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $searchInput = $this->session->userdata('searchInput') ?? ['name' => '', 'email' => ''];

        $name = $this->input->get('name');
        $email = $this->input->get('email');

        if (!empty($name)) {
            $searchInput['name'] = $name;
        }
        if (!empty($email)) {
            $searchInput['email'] = $email;
        }

        $this->session->set_userdata('searchInput', $searchInput);

        $pageNumber = $this->uri->segment(4) ?? 1;

        $totalCount = $this->Waitlist_model->get_count($searchInput);
        $perPage = 10;

        // Pagination configuration
        $config = array();
        $config['base_url'] = base_url('admin/Waitlist_controller/index');
        $config['total_rows'] = $totalCount;
        $config['per_page'] = $perPage;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;

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

        $startIndex = ($pageNumber - 1) * $perPage;
        $data = $this->Waitlist_model->get_all_data($perPage, $startIndex, $searchInput);

        // for debugging

        // echo '<pre>';
        // print_r($data); 
        // echo '</pre>';

        $this->load->view('admin/waitlist_view', [
            'waitlist_entries' => $data,
            'searchInput' => $searchInput,
            'links' => $this->pagination->create_links(),
            'pageNumber' => $pageNumber,
            'TotalCount' => $totalCount,
            'EndCount' => min($pageNumber * $perPage, $totalCount),
            'StartCount' => ($pageNumber - 1) * $perPage + 1,
            'perPage' => $perPage
        ]);
    }

    public function reset()
    {
        $this->session->unset_userdata('searchInput');
        redirect('admin/Waitlist_controller/index');
    }
}
