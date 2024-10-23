<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rebates extends CI_Controller {

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
		$header['header_title'] = 'Unilevel Bonus';
		$header['header'] = 'Unilevel Bonus';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('reb_created', 'DESC'); //DESC
		$this->db->where('reb_to_id', $this->session->userdata('usr_id'));

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('reb_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('reb_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('reb_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('reb_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/rebates/index/";
			
			$total_row = $this->model_base->count_data('rebates');

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

		$this->db->order_by('reb_created', 'DESC'); //DESC
		$this->db->where('reb_status !=', 'deleted');
		$this->db->where('reb_to_id', $this->session->userdata('usr_id'));

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

				$content['rebates'] = $this->model_base->like_data($search_value, $search_type, 'rebates');
			}	
		} else {
			$content['rebates'] = $this->model_base->get_all('rebates');
		}

		$this->db->flush_cache();
		$this->db->select_sum('reb_amount');
		$this->db->where('reb_status', 'published');
		$this->db->where('reb_to_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$rebatess = $this->db->get('rebates')->result_array();
		$content['total_reb_amount'] = $rebatess[0]['reb_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('reb_amount');
		$this->db->where('reb_status', 'published');
		$this->db->where('reb_to_id', $this->session->userdata('usr_id'));
		$this->db->where('month(reb_created)',date('m'));
		$rebatess = $this->db->get('rebates')->result_array();
		$content['total_monthly_reb_amount'] = $rebatess[0]['reb_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('rew_amount');
		$this->db->where('rew_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(rew_created)',date('m'));
		$rebatess = $this->db->get('rebates_withdraw')->result_array();
		$content['total_rew_amount'] = $rebatess[0]['rew_amount'];

		$content['left_reb_amount'] = $content['total_reb_amount'] - $content['total_rew_amount'];

		$content['controller']=$this; 
		$content['all'] = base_url('member/rebates/index/all');
		$content['published'] = base_url('member/rebates/index/published');
		$content['draft'] = base_url('member/rebates/index/draft');
		$content['deleted'] = base_url('member/rebates/index/deleted');
		$content['create'] = base_url('member/rebates/create');
		$content['history'] = base_url('member/rebates/history');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/rebates/index', $content);
		$this->load->view("template/member_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Unilevel Bonus';
		$header['header'] = 'Unilevel Bonus';
		$header['header_small'] = 'Withdraw Request';
		
		$content = [];

		$this->db->flush_cache();
		$this->db->select_sum('reb_amount');
		$this->db->where('reb_status', 'published');
		$this->db->where('reb_to_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$rebatess = $this->db->get('rebates')->result_array();
		$content['total_reb_amount'] = $rebatess[0]['reb_amount'];


		$this->db->flush_cache();
		$this->db->select_sum('rew_amount');
		$this->db->where('rew_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(rew_created)',date('m'));
		$rebatess = $this->db->get('rebates_withdraw')->result_array();
		$content['total_rew_amount'] = $rebatess[0]['rew_amount'];

		$left_reb_amount = $content['total_reb_amount'] - $content['total_rew_amount'];
		$content['left_reb_amount'] = $left_reb_amount;

		$left_rebates = $left_reb_amount;

		//validations
		$this->form_validation->set_rules('rew_amount', 'Sale ID', 'required|trim|decimal');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

	            $data = $this->input->post();

	            $this->db->flush_cache();
				$this->db->select_sum('reb_amount');
				$this->db->where('reb_status', 'published');
				$this->db->where('reb_to_id', $this->session->userdata('usr_id'));
				//$this->db->where('month(sat_created)',date('m'));
				$rebatess = $this->db->get('rebates')->result_array();
				$content['total_reb_amount'] = $rebatess[0]['reb_amount'];


				$this->db->flush_cache();
				$this->db->select_sum('rew_amount');
				$this->db->where('rew_status', 'published');
				$this->db->where('usr_id', $this->session->userdata('usr_id'));
				//$this->db->where('month(rew_created)',date('m'));
				$rebatess = $this->db->get('rebates_withdraw')->result_array();
				$content['total_rew_amount'] = $rebatess[0]['rew_amount'];

				$left_reb_amount = $content['total_reb_amount'] - $content['total_rew_amount'];
				$content['left_reb_amount'] = $left_reb_amount;

				$left_rebates = $left_reb_amount;
				$request_rebates = $data['rew_amount'];

				$this->db->flush_cache();

				if ( $left_reb_amount >= $request_rebates ) {
					$data['usr_id'] = $this->session->userdata('usr_id');
		            $data['usr_username'] = $this->session->userdata('usr_username');
		            $data['usr_type'] = $this->session->userdata('usr_type');
		            $data['rew_created'] = $this->getDatetimeNow();
		            $data['rew_status'] = "published";
		            $data['rew_lastamount'] = $left_rebates;
		            $data['rew_leftamount'] = $left_reb_amount - $request_rebates;

		            $this->model_base->insert_data($data, 'rebates_withdraw');
					$this->session->set_flashdata('msg_success', 'Added Request!');	
					redirect('member/rebates','refresh');
				} else {
					$content['msg_error'] = "insuffiecient Unilevel Amount value!";	
				}
			}
		}

		$content['back'] = base_url('member/rebates');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/rebates/create', $content);
		$this->load->view("template/member_footer");
	}

	public function history($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Unilevel Bonus';
		$header['header'] = 'Unilevel Bonus';
		$header['header_small'] = 'Withdraw history';
		
		$content = [];

		$this->db->order_by('rew_created', 'DESC'); //DESC
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		$this->db->where('rew_status !=', 'deleted');

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('rew_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('rew_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('rew_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('rew_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/rebates_withdraw/index/";
			
			$total_row = $this->model_base->count_data('rebates_withdraw');

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

		$this->db->order_by('rew_created', 'DESC'); //DESC
		$this->db->where('rew_status !=', 'deleted');
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

				$content['rebates_withdraw'] = $this->model_base->like_data($search_value, $search_type, 'rebates_withdraw');
			}	
		} else {
			$content['rebates_withdraw'] = $this->model_base->get_all('rebates_withdraw');
		}

		$content['controller']=$this; 
		$content['back'] = base_url('member/rebates');
		$content['refresh'] = base_url('member/rebates/history');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/rebates/history', $content);
		$this->load->view("template/member_footer");
	}
}