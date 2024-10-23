<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
    }

    public function index($search_type = "xallx", $search_val ="xallx", $filter = 1 )
	{
        $this->session->set_userdata('current_url', current_url());

		$header = [];
		$header['header_title'] = 'Inquiries';
		$header['header'] = 'Inquiries';
		$header['header_small'] = '';
		
        $content = [];

		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('admin/inquiries/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];
				redirect('admin/inquiries/index/' . $search_type . '/' . $search_val, 'refresh');
			}	
		}

		$config = array();
		$config["base_url"] = base_url() . "admin/inquiries/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('inquiries_new');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = 'Next';

		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		$content["current_count_start"] = $offset;
		
		$this->_sort($search_type, $search_val );
		$content['inquiries'] = $this->model_base->get_all('inquiries_new');

		$content['controller']=$this; 
		$content['all'] = base_url('admin/inquiries/index/xallx/xallx');
		$content['published'] = base_url('admin/inquiries/index/inq_status/published');
		$content['draft'] = base_url('admin/inquiries/index/inq_status/draft');
		$content['deleted'] = base_url('admin/inquiries/index/inq_status/deleted');
		$content['create'] = base_url('admin/inquiries/create');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/inquiries/index', $content);
		$this->load->view("template/admin_footer");
    }

    public function _sort ($search_type, $search_val) {

		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, urldecode($search_val));
        }

        $this->db->order_by('inquiries_new.inq_created', 'DESC');
        
		$this->db->join("motorcycles", "motorcycles.mot_id = inquiries_new.mot_id");
        $this->db->join("dealers_motorcycles", "dealers_motorcycles.dem_id = inquiries_new.dem_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
    }

    public function view($id)
	{

		$header = [];
		$header['header_title'] = 'Inquiry';
		$header['header'] = 'Inquiry';
		$header['header_small'] = 'View';
		
        $content = [];
        
		$this->db->join("motorcycles", "motorcycles.mot_id = inquiries_new.mot_id");
        $this->db->join("dealers_motorcycles", "dealers_motorcycles.dem_id = inquiries_new.dem_id");
        $this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
        $this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
        $content['inquiries'] = $this->model_base->get_one($id, "inq_id", "inquiries_new");
		$this->db->flush_cache();

        // $this->godprint($content['inquiries']);

        $current_url  =  $this->session->userdata('current_url');
        $content['back'] = $current_url;
        
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/inquiries/view', $content);
		$this->load->view("template/admin_footer");
	}
}