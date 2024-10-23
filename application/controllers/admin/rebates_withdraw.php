<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rebates_withdraw extends CI_Controller {

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
		$header['header_title'] = 'Rebates Bonus';
		$header['header'] = 'Rebates Bonus';
		$header['header_small'] = 'Withdraw history';
		
		$content = [];

		$this->db->order_by('rew_created', 'DESC'); //DESC
	
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
			$config["base_url"] = base_url() . "admin/rebates_withdraw/index/";
			
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
		$content['back'] = base_url('admin/rebates_withdraw');
		$content['refresh'] = base_url('admin/rebates_withdraw');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/rebates_withdraw/history', $content);
		$this->load->view("template/admin_footer");
	}

	public function confirm($id) {
		$date_now = $this->getDatetimeNow();

		$content['rebates_withdraw'] = $this->model_base->get_one($id, "rew_id", "rebates_withdraw");	

		if ( $content['rebates_withdraw'][0]['rew_get'] == "no" ) {
			$data['rew_get'] = "yes";
			$data['rew_updated'] = $date_now;

			$this->model_base->update_data($id, 'rew_id', $data, 'rebates_withdraw');
			$this->session->set_flashdata('msg_success', 'Withdraw successfully!');
		} else {
			$this->session->set_flashdata('msg_error', 'Previously withdraw!');	
		}
		redirect('admin/rebates_withdraw/','refresh');
	}
}