<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shares_confirmation extends CI_Controller {

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

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Rebates Confirmation';
		$header['header'] = 'Rebates Confirmation';
		$header['header_small'] = '';
		
		$content = [];

		//$this->db->order_by('shc_name', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('shc_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('shc_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('shc_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('shc_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/shares_confirmation/index/";
			$total_row = $this->model_base->count_data('shares_confirmation');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 50;
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
			$this->db->where('shc_status !=', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
		$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['shares_confirmations'] = $this->model_base->like_data($search_value, $search_type, 'shares_confirmation');
			}	
		} else {
			$content['shares_confirmations'] = $this->model_base->get_all('shares_confirmation');
		}

		$content['controller']=$this; 
		$content['all'] = base_url('admin/shares_confirmation/index/all');
		$content['published'] = base_url('admin/shares_confirmation/index/published');
		$content['draft'] = base_url('admin/shares_confirmation/index/draft');
		$content['deleted'] = base_url('admin/shares_confirmation/index/deleted');
		$content['create'] = base_url('admin/shares_confirmation/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/shares_confirmation/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function confirmed_rebates($id) {
		$date_now = $this->getDatetimeNow();

		$content['shares_confirmations'] = $this->model_base->get_one($id, "shc_id", "shares_confirmation");



		if ( $content['shares_confirmations'][0]['shc_status'] == "draft" ) {

			$shc_id = $content['shares_confirmations'][0]['shc_id'];
			$sale_id = $content['shares_confirmations'][0]['sale_id'];
			$amount = $content['shares_confirmations'][0]['shc_amount'];

			$shc_from_id = $content['shares_confirmations'][0]['shc_from_id'];
			$this->db->where('usr_status', "published");
			$content['user'] = $this->model_base->get_one($shc_from_id, "usr_id", "users");	

			$user_type = $content['user'][0]['usr_type'];
			$user_id = $content['user'][0]['usr_id'];
			$username = $content['user'][0]['usr_username'];
			$usr_username = $content['user'][0]['dir_to_username'];

			$this->db->where('set_status', "published");
			$settings = $this->model_base->get_one($user_type, "set_name", "settings");


			$data_rebate_conf['shc_status'] = "published";
			$this->model_base->update_data($shc_id, 'shc_id', $data_rebate_conf, 'shares_confirmation');


			$this->db->where('usr_status', "published");
			$rebate1 = $this->model_base->get_one($username, "usr_username", "users");


			if ( $user_type == 'sparkle' ) {
				$this->_get_profit_share($user_id, $username, $amount);
			}

			$this->session->set_flashdata('msg_success', 'Rebates Applied!');	

		} else {
			$this->session->set_flashdata('msg_error', 'Rebates Previously applied!');	
		}
		redirect('admin/shares_confirmation/','refresh');
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Rebates Confirmation';
		$header['header'] = 'Rebates Confirmation';
		$header['header_small'] = '';
		
		$content = [];

		$content['shares_confirmations'] = $this->model_base->delete_data($id, 'shc_id', 'shc_status', 'shares_confirmation');

		$this->session->set_flashdata('msg_success', 'Deleted Rebate Request!');	

		redirect('admin/shares_confirmation/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/shares_confirmation/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function _get_profit_share($user_id, $username, $amount) {
		$date_now = $this->getDatetimeNow();

		$profit_share['usr_username'] = $username;
		$profit_share['usr_id'] = $user_id;
		$profit_share['prs_amount'] = $amount;	
		$profit_share['prs_status'] = "published";
		$profit_share['prs_updated'] = $date_now;

		if ( $amount <= 1999 ) { $profit_share['prs_share'] = 1; }
		if ( $amount >= 2000 && $amount <= 2999 ) { $profit_share['prs_share'] = 3; }
		if ( $amount >= 3000 && $amount <= 4999 ) { $profit_share['prs_share'] = 5; }
		if ( $amount >= 5000 ) { $profit_share['prs_share'] = 10; }

		$this->model_base->insert_data($profit_share, 'profit_shares');
		$this->db->flush_cache();

	}
}