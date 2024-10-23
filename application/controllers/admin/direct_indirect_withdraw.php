<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct_indirect_withdraw extends CI_Controller {

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
		$header['header_title'] = 'Direct / Indirect Bonus';
		$header['header'] = 'Direct / Indirect Bonus';
		$header['header_small'] = 'Withdraw history';
		
		$content = [];

		$this->db->order_by('diw_created', 'DESC'); //DESC
	
		$this->db->where('diw_status !=', 'deleted');

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('diw_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('diw_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('diw_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('diw_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/direct_indirect_withdraw/index/";
			
			$total_row = $this->model_base->count_data('direct_indirect_withdraw');

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

		$this->db->order_by('diw_created', 'DESC'); //DESC
		$this->db->where('diw_status !=', 'deleted');
	

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

				$content['direct_indirect_withdraw'] = $this->model_base->like_data($search_value, $search_type, 'direct_indirect_withdraw');
			}	
		} else {
			$content['direct_indirect_withdraw'] = $this->model_base->get_all('direct_indirect_withdraw');
		}

		$content['controller']=$this; 
		$content['back'] = base_url('admin/direct_indirect_withdraw');
		$content['refresh'] = base_url('admin/direct_indirect_withdraw');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/direct_indirect_withdraw/history', $content);
		$this->load->view("template/admin_footer");
	}

	public function confirm($id) {
		$date_now = $this->getDatetimeNow();

		$content['direct_indirect_withdraw'] = $this->model_base->get_one($id, "diw_id", "direct_indirect_withdraw");	

		if ( $content['direct_indirect_withdraw'][0]['diw_get'] == "no" ) {
			$data['diw_get'] = "yes";
			$data['diw_updated'] = $date_now;

			$this->model_base->update_data($id, 'diw_id', $data, 'direct_indirect_withdraw');
			$this->session->set_flashdata('msg_success', 'Withdraw successfully!');
		} else {
			$this->session->set_flashdata('msg_error', 'Previously withdraw!');	
		}
		redirect('admin/direct_indirect_withdraw/','refresh');
	}
}