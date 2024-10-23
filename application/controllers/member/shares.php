<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shares extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_user() != true && $this->session->userdata('usr_type') == 'sparkle' ){
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
		$header['header_title'] = 'Profit Shares';
		$header['header'] = 'Profit Shares';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('prs_created', 'DESC'); //DESC
		$this->db->where('usr_id', $this->session->userdata('usr_id'));

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('prs_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('prs_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('prs_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('prs_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/profit_shares/index/";
			
			$total_row = $this->model_base->count_data('profit_shares');

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

		$this->db->order_by('prs_created', 'DESC'); //DESC
		$this->db->where('prs_status !=', 'deleted');
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

				$content['profit_shares'] = $this->model_base->like_data($search_value, $search_type, 'profit_shares');
			}	
		} else {
			$content['profit_shares'] = $this->model_base->get_all('profit_shares');
		}

		$this->db->flush_cache();
		$this->db->select_sum('prs_amount');
		$this->db->where('prs_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$profit_sharess = $this->db->get('profit_shares')->result_array();
		$content['total_prs_amount'] = $profit_sharess[0]['prs_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('prs_amount');
		$this->db->where('prs_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		$this->db->where('month(prs_created)',date('m'));
		$profit_sharess = $this->db->get('profit_shares')->result_array();
		$content['total_monthly_prs_amount'] = $profit_sharess[0]['prs_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('prs_share');
		$this->db->where('prs_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$profit_sharess = $this->db->get('profit_shares')->result_array();
		$content['total_prs_share'] = $profit_sharess[0]['prs_share'];

		$this->db->flush_cache();
		$this->db->select_sum('tps_each_amount');
		$this->db->where('tps_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		$total_profit_shares = $this->db->get('total_profit_shares')->result_array();
		$content['total_tps_each_amount'] = $total_profit_shares[0]['tps_each_amount'];

		$content['controller']=$this; 
		$content['all'] = base_url('member/profit_shares/index/all');
		$content['published'] = base_url('member/profit_shares/index/published');
		$content['draft'] = base_url('member/profit_shares/index/draft');
		$content['deleted'] = base_url('member/profit_shares/index/deleted');
		// $content['create'] = base_url('member/profit_shares/create');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/profit_shares/index', $content);
		$this->load->view("template/member_footer");
	}
}