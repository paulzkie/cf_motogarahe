<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incentives extends CI_Controller {

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
		$header['header_title'] = 'Incentives';
		$header['header'] = 'Incentives';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('int_created', 'DESC'); //DESC
		$this->db->where('usr_id', $this->session->userdata('usr_id'));

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('int_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('int_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('int_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('int_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/incentives/index/";
			
			$total_row = $this->model_base->count_data('incentives');

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

		$this->db->order_by('int_created', 'DESC'); //DESC
		$this->db->where('int_status !=', 'deleted');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));

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

				$content['incentives'] = $this->model_base->like_data($search_value, $search_type, 'incentives');
			}	
		} else {
			$content['incentives'] = $this->model_base->get_all('incentives');
		}

		$this->db->flush_cache();
		$this->db->where('dir_to_username', $this->session->userdata('usr_username') );
		$this->db->where('month(usr_created)',date('m'));
		$content['month_total_sponsor'] = $this->model_base->count_data('users');

		$this->db->flush_cache();
		$this->db->where('dir_to_username', $this->session->userdata('usr_username') );
		$content['total_sponsor'] = $this->model_base->count_data('users');


		$content['controller']=$this; 
		$content['all'] = base_url('member/incentives/index/all');
		$content['published'] = base_url('member/incentives/index/published');
		$content['draft'] = base_url('member/incentives/index/draft');
		$content['deleted'] = base_url('member/incentives/index/deleted');
		// $content['create'] = base_url('member/incentives/create');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/incentives/index', $content);
		$this->load->view("template/member_footer");
	}
}