<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downlines extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_user() != true ){
			$this->logout_user();	
		}

		$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
			$this->logout_user();	
		}

	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Downlines';
		$header['header'] = 'Downlines';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('usr_created', 'DESC'); //DESC
		$this->db->where('usr_status !=', 'deleted');
		$this->db->where('dir_to_username', $this->session->userdata('usr_username'));

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('usr_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('usr_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('usr_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('usr_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/downlines/index/";
			
			$total_row = $this->model_base->count_data('users');

			$config["total_rows"] = $total_row;
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['num_links'] = $total_row;
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

			$this->pagination->initialize($config);
	
			$offset = ($filter - 1) * $config["per_page"];
			$this->db->limit( $config["per_page"] , $offset);
		
		}

		$this->db->order_by('usr_created', 'DESC'); //DESC
		$this->db->where('usr_status !=', 'deleted');
		$this->db->where('dir_to_username', $this->session->userdata('usr_username'));

		if ( $this->input->post() ) {
			//validations
			$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
			$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['users'] = $this->model_base->like_data($search_value, $search_type, 'users');
			}	
		} else {
			$content['users'] = $this->model_base->get_all('users');
        }
        
        // echo "<pre>";
		//         print_r ($content['users']);
		// 		echo "</pre>";
		// 		break;

		$content['controller']=$this; 
		$content['all'] = base_url('member/downlines/index/all');
		$content['published'] = base_url('member/downlines/index/published');
		$content['draft'] = base_url('member/downlines/index/draft');
        $content['deleted'] = base_url('member/downlines/index/deleted');
        $content['refresh'] = base_url('member/downlines');
		// $content['create'] = base_url('member/downlines/create');
		// $content['history'] = base_url('member/downlines/history');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/downlines/index', $content);
		$this->load->view("template/member_footer");
	}
}