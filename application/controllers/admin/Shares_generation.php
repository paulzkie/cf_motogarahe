<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shares_generation extends CI_Controller {

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
		$header['header_title'] = 'Generate Shares Profit';
		$header['header'] = 'Generate Shares Profit';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->flush_cache();
		$this->db->select_sum('prs_share');
		$this->db->where('prs_status', 'published');
		$profit_sharess = $this->db->get('profit_shares')->result_array();
		$content['total_prs_share'] = $profit_sharess[0]['prs_share'];

		//$this->db->order_by('tps_name', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('tps_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('tps_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('tps_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('tps_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/total_profit_shares/index/";
			$total_row = $this->model_base->count_data('total_profit_shares');
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
			$this->db->where('tps_status !=', 'deleted');
		}

		

		

		if ( $this->input->post('search_mode') ) {
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

				$content['total_profit_sharess'] = $this->model_base->like_data($search_value, $search_type, 'total_profit_shares');
			}	
		} else {
			$content['total_profit_sharess'] = $this->model_base->get_all('total_profit_shares');
		}


		if ( $this->input->post('generate_mode') ) {
			
			$this->form_validation->set_rules('total_pool', 'Profit Name', 'trim|decimal');
			$this->form_validation->set_rules('generating', 'Generate', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$content['profit_share'] = $data['total_pool'] / $content['total_prs_share'];

				if ( $data['generating'] == "yes" && isset($content['profit_share'])) {
					$this->_get_profit_share($content['profit_share'], $data['total_pool']);
					redirect('admin/shares_generation/','refresh');
				}


			}		

		} else {
			$content['total_profit_sharess'] = $this->model_base->get_all('total_profit_shares');
		}

		$content['controller']=$this; 
		$content['all'] = base_url('admin/total_profit_shares/index/all');
		$content['published'] = base_url('admin/total_profit_shares/index/published');
		$content['draft'] = base_url('admin/total_profit_shares/index/draft');
		$content['deleted'] = base_url('admin/total_profit_shares/index/deleted');
		$content['create'] = base_url('admin/total_profit_shares/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/total_profit_shares/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function confirmed_rebates($id) {
		$date_now = $this->getDatetimeNow();

		$content['total_profit_sharess'] = $this->model_base->get_one($id, "tps_id", "total_profit_shares");

		echo "<pre>";
		print_r ($content['total_profit_sharess']);
		echo "</pre>";

		if ( $content['total_profit_sharess'][0]['tps_status'] == "draft" ) {

			$tps_id = $content['total_profit_sharess'][0]['tps_id'];
			// $sale_id = $content['total_profit_sharess'][0]['sale_id'];
			$amount = $content['total_profit_sharess'][0]['tps_amount'];

			$usr_id = $content['total_profit_sharess'][0]['usr_id'];
			$this->db->where('usr_status', "published");
			$content['user'] = $this->model_base->get_one($usr_id, "usr_id", "users");	

			$user_type = $content['user'][0]['usr_type'];
			$user_id = $content['user'][0]['usr_id'];
			$username = $content['user'][0]['usr_username'];
			$usr_username = $content['user'][0]['dir_to_username'];

			$this->db->where('set_status', "published");
			$settings = $this->model_base->get_one($user_type, "set_name", "settings");


			$data_rebate_conf['tps_status'] = "published";
			$this->model_base->update_data($tps_id, 'tps_id', $data_rebate_conf, 'total_profit_shares');


			$this->db->where('usr_status', "published");
			$rebate1 = $this->model_base->get_one($username, "usr_username", "users");


			// if ( $user_type == 'sparkle' ) {
			// 	$this->_get_profit_share($user_id, $username, $amount);
			// }

			$this->session->set_flashdata('msg_success', 'Rebates Applied!');	

		} else {
			$this->session->set_flashdata('msg_error', 'Rebates Previously applied!');	
		}
		redirect('admin/shares_generation/','refresh');
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Generate Shares Profit';
		$header['header'] = 'Generate Shares Profit';
		$header['header_small'] = '';
		
		$content = [];

		$content['total_profit_sharess'] = $this->model_base->delete_data($id, 'tps_id', 'tps_status', 'total_profit_shares');

		$this->session->set_flashdata('msg_success', 'Deleted Rebate Request!');	

		redirect('admin/total_profit_shares/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/total_profit_shares/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function _get_profit_share($profit_sharring, $pool) {
		$date_now = $this->getDatetimeNow();

		
		$profit_share['tps_status'] = "draft";
		$profit_share['tps_updated'] = $date_now;

		$this->db->where('usr_type', "sparkle");	
		$this->db->select('usr_id, usr_username');
		$users_sparkels = $this->db->get('users')->result_array();	

		foreach ( $users_sparkels as $user ) {
			$this->db->flush_cache();
			$this->db->select_sum('prs_share');
			$this->db->where('prs_status', 'published');
			$this->db->where('usr_id', $user['usr_id']);
			$profit_sharess = $this->db->get('profit_shares')->result_array();
			$no_of_share = $profit_sharess[0]['prs_share'];		

			if ( $no_of_share >= 12 ) {

				$profit_share['usr_username'] = $user["usr_username"];
				$profit_share['usr_id'] = $user["usr_id"];
				$profit_share['tps_amount'] = $no_of_share * $profit_sharring;	
				$profit_share['tps_share'] = $no_of_share ;	
				$profit_share['tps_total_amount'] = $pool;
				$profit_share['tps_each_amount'] = $profit_sharring;

				$this->model_base->insert_data($profit_share, 'total_profit_shares');	
			}

			$this->db->flush_cache();

		}	
		$this->session->set_flashdata('msg_success', 'Done!');	

		$this->db->flush_cache();

	}
}