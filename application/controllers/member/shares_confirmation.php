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

		if ( $this->have_sess_user() != true && $this->session->userdata('usr_type') == 'sparkle' ){
			$this->logout_user();	
		}

		$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
			$this->logout_user();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Profit Share Request';
		$header['header'] = 'Profit Share Request';
		$header['header_small'] = '';
		
		$content = [];

		//$this->db->order_by('shc_position', 'ASC'); //DESC
		
		$this->db->where('shc_from_id', $this->session->userdata('usr_id'));
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
			$config["base_url"] = base_url() . "member/shares_confirmation/index/";
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

		//$this->db->order_by('shc_position', 'ASC'); //DESC
		//$this->db->where('shc_status !=', 'deleted');
		$this->db->where('shc_from_id', $this->session->userdata('usr_id'));

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

				$content['shares_confirmations'] = $this->model_base->like_data($search_value, $search_type, 'shares_confirmation');
			}	
		} else {
			$content['shares_confirmations'] = $this->model_base->get_all('shares_confirmation');
		}

		$content['controller']=$this; 
		$content['all'] = base_url('member/shares_confirmation/index/all');
		$content['published'] = base_url('member/shares_confirmation/index/published');
		$content['draft'] = base_url('member/shares_confirmation/index/draft');
		$content['deleted'] = base_url('member/shares_confirmation/index/deleted');
		$content['create'] = base_url('member/shares_confirmation/create');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/shares_confirmation/index', $content);
		$this->load->view("template/member_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Profit Share Request';
		$header['header'] = 'Profit Share Request';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('sale_id', 'Sale ID', 'required|trim');
		$this->form_validation->set_rules('shc_amount', 'Total amount', 'required|trim|decimal');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				// $config['upload_path']   = './uploads/shares_confirmation'; 
		  		// $config['allowed_types'] = 'jpg|png'; 
		  		// $config['encrypt_name'] = TRUE; 
		  		// $config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		// $this->load->library('upload', $config);
					
		  		// if ( !$this->upload->do_upload('pro_image')) {
				//           $error = array('error' => $this->upload->display_errors()); 
				//           $content['msg_error'] = $error;
				//       } else { 
		            // $upload = $this->upload->data();
		            $data = $this->input->post();
		            // $data['pro_image'] = base_url() . 'uploads/shares_confirmation/' . $upload['file_name'];
		            
		            $data['shc_from_id'] = $this->session->userdata('usr_id');
		            $data['shc_from_username'] = $this->session->userdata('usr_username');
		            $data['shc_created'] = $this->getDatetimeNow();
		            $data['shc_status'] = "draft";

					$this->model_base->insert_data($data, 'shares_confirmation');
					$this->session->set_flashdata('msg_success', 'Added Request!');	
					redirect('member/shares_confirmation','refresh');
		        // } 
			}
		}

		$content['back'] = base_url('member/shares_confirmation');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/shares_confirmation/create', $content);
		$this->load->view("template/member_footer");
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

		redirect('member/shares_confirmation/','refresh');

		$this->load->view("template/member_header", $header);
		$this->load->view('member/shares_confirmation/view', $content);
		$this->load->view("template/member_footer");
	}
}