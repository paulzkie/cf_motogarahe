<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct_indirect extends CI_Controller {

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
		$header['header_title'] = 'Direct / Indirect Bonus';
		$header['header'] = 'Direct / Indirect Bonus';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('dir_created', 'DESC'); //DESC
		$this->db->where('dir_to_id', $this->session->userdata('usr_id'));
		$this->db->where('dir_status !=', 'deleted');

		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('dir_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('dir_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('dir_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('dir_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "member/direct_indirect/index/";
			
			$total_row = $this->model_base->count_data('direct_indirect');

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

		$this->db->order_by('dir_created', 'DESC'); //DESC
		$this->db->where('dir_status !=', 'deleted');
		$this->db->where('dir_to_id', $this->session->userdata('usr_id'));

		if ( $this->input->post('search_mode') ) {
			//validations
			$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
			$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				unset($data['search_mode']);

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['direct_indirect'] = $this->model_base->like_data($search_value, $search_type, 'direct_indirect');
			}	
		} else {
			$content['direct_indirect'] = $this->model_base->get_all('direct_indirect');
		}

		if($this->input->post('activate_mode')) {
			// success
			$user = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");

			if ( $user[0]['usr_reciept'] != '' ) {
				$this->session->set_flashdata('msg_error', 'Your Account is already activated!');	
				redirect('member/direct_indirect','refresh');	
	        }
	        
			$config['upload_path']   = './uploads/reciepts'; 
	  		$config['allowed_types'] = 'jpg|png'; 
	  		$config['encrypt_name'] = TRUE; 
	  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

	  		$this->load->library('upload', $config);
				
	  		if ( !$this->upload->do_upload('usr_reciept')) {
			    $error = array('error' => $this->upload->display_errors()); 
			    $content['msg_error'] = $error;
			} else { 
	            $upload = $this->upload->data();
	            $data = $this->input->post();
	            unset($data['activate_mode']);
	            $data['usr_reciept'] = 'uploads/reciepts/' . $upload['file_name'];

				$this->model_base->update_data($user[0]['usr_id'], 'usr_id', $data, 'users');
				$this->db->flush_cache();

				$settings = $this->model_base->get_one(1, "set_id", "settings");

				$activation_details['dir_from_id'] = 0;	
				$activation_details['dir_from_username'] = 'Account Activation';	
				$activation_details['dir_to_id'] = $user[0]['usr_id'];	
				$activation_details['dir_to_username'] = $user[0]['usr_username'];	
				$activation_details['dir_position'] = 0;
				$activation_details['dir_amount'] = $settings[0]['set_activation'];
				$activation_details['dir_from_type'] = 'Account Activation';
				$activation_details['dir_created'] = $this->getDatetimeNow();

				$this->model_base->insert_data($activation_details, 'direct_indirect');
				$this->db->flush_cache();

				$this->session->set_flashdata('msg_success', 'Request Successfully!');	
				redirect('member/direct_indirect','refresh');
	        }
		}

		$this->db->flush_cache();
		$this->db->select_sum('dir_amount');
		$this->db->where('dir_status', 'published');
		$this->db->where('dir_to_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$direct_indirects = $this->db->get('direct_indirect')->result_array();
		$content['total_dir_amount'] = $direct_indirects[0]['dir_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('dir_amount');
		$this->db->where('dir_status', 'published');
		$this->db->where('dir_to_id', $this->session->userdata('usr_id'));
		$this->db->where('month(dir_created)',date('m'));
		$direct_indirects = $this->db->get('direct_indirect')->result_array();
		$content['total_monthly_dir_amount'] = $direct_indirects[0]['dir_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(diw_created)',date('m'));
		$direct_indirects = $this->db->get('direct_indirect_withdraw')->result_array();
		$content['total_diw_amount'] = $direct_indirects[0]['diw_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('cap_amount');
		$this->db->where('cap_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$captcha = $this->db->get('captcha')->result_array();
		$content['total_cap_amount'] = $captcha[0]['cap_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('cap_amount');
		$this->db->where('cap_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		$this->db->where('month(cap_created)',date('m'));
		$captchas = $this->db->get('captcha')->result_array();
		$content['total_monthly_cap_amount'] = $captchas[0]['cap_amount'];

		$content['left_dir_amount'] = ($content['total_dir_amount'] + $content['total_cap_amount']) - $content['total_diw_amount'];

		$content['total_dir_amount_total_cap_amount'] = $content['total_dir_amount'] + $content['total_cap_amount'];

		$content['controller']=$this; 
		$content['refresh'] = base_url('member/direct_indirect');
		$content['all'] = base_url('member/direct_indirect/index/all');
		$content['published'] = base_url('member/direct_indirect/index/published');
		$content['draft'] = base_url('member/direct_indirect/index/draft');
		$content['deleted'] = base_url('member/direct_indirect/index/deleted');
		$content['create'] = base_url('member/direct_indirect/create');
		$content['history'] = base_url('member/direct_indirect/history');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/direct_indirect/index', $content);
		$this->load->view("template/member_footer");
	}

	public function create()
	{

		$encashement_status = $this->model_base->get_one(4, "set_id", "settings2");

		if ($encashement_status[0]['set_status'] != 'published') {
			$content['msg_error'] = "You cant withdraw now!";	
			redirect('member/direct_indirect','refresh');
		}

		$header = [];
		$header['header_title'] = 'Direct / Indirect Bonus';
		$header['header'] = 'Direct / Indirect Bonus';
		$header['header_small'] = 'Withdraw Request';
		
		$content = [];

		$user = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		if ( $user[0]['usr_activate'] != 'yes' ) {
			$this->session->set_flashdata('msg_error', 'Activate your account first!');
			redirect('member/direct_indirect','refresh');	
        }

		$this->db->flush_cache();
		$this->db->select_sum('dir_amount');
		$this->db->where('dir_status', 'published');
		$this->db->where('dir_to_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$direct_indirects = $this->db->get('direct_indirect')->result_array();
		$content['total_dir_amount'] = $direct_indirects[0]['dir_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('cap_amount');
		$this->db->where('cap_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$captcha = $this->db->get('captcha')->result_array();
		$content['total_cap_amount'] = $captcha[0]['cap_amount'];


		$this->db->flush_cache();
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(diw_created)',date('m'));
		$direct_indirects = $this->db->get('direct_indirect_withdraw')->result_array();
		$content['total_diw_amount'] = $direct_indirects[0]['diw_amount'];

		$left_dir_amount = ($content['total_dir_amount'] + $content['total_cap_amount']) - $content['total_diw_amount'];
		$content['left_dir_amount'] = $left_dir_amount;

		$left_direct_indirect = $left_dir_amount;

		//validations
		$this->form_validation->set_rules('diw_amount', 'Sale ID', 'required|trim|decimal');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				

	            $data = $this->input->post();

	            $this->db->flush_cache();
				$this->db->select_sum('dir_amount');
				$this->db->where('dir_status', 'published');
				$this->db->where('dir_to_id', $this->session->userdata('usr_id'));
				//$this->db->where('month(sat_created)',date('m'));
				$direct_indirects = $this->db->get('direct_indirect')->result_array();
				$content['total_dir_amount'] = $direct_indirects[0]['dir_amount'];

				$this->db->flush_cache();
				$this->db->select_sum('cap_amount');
				$this->db->where('cap_status', 'published');
				$this->db->where('usr_id', $this->session->userdata('usr_id'));
				//$this->db->where('month(sat_created)',date('m'));
				$captcha = $this->db->get('captcha')->result_array();
				$content['total_cap_amount'] = $captcha[0]['cap_amount'];


				$this->db->flush_cache();
				$this->db->select_sum('diw_amount');
				$this->db->where('diw_status', 'published');
				$this->db->where('usr_id', $this->session->userdata('usr_id'));
				//$this->db->where('month(diw_created)',date('m'));
				$direct_indirects = $this->db->get('direct_indirect_withdraw')->result_array();
				$content['total_diw_amount'] = $direct_indirects[0]['diw_amount'];

				$left_dir_amount = ($content['total_dir_amount'] + $content['total_cap_amount']) - $content['total_diw_amount'];
				$content['left_dir_amount'] = $left_dir_amount;

				$left_direct_indirect = $left_dir_amount;
				$request_direct_indirect = $data['diw_amount'];

				$this->db->flush_cache();

				if ( $left_dir_amount >= $request_direct_indirect ) {
					$content['withdraw'] = $this->model_base->get_one(5, "set_id", "settings2");

					if ( $request_direct_indirect >= $content['withdraw'][0]['set_amount'] ) {

					

						$tax = $this->model_base->get_one(1, "set_id", "settings2");
						$process = $this->model_base->get_one(2, "set_id", "settings2");
						
						$data['usr_id'] = $this->session->userdata('usr_id');
						$data['usr_username'] = $this->session->userdata('usr_username');
						$data['usr_lname'] = $this->session->userdata('usr_lname');

						$data['usr_fname'] = $this->session->userdata('usr_fname');
						$data['usr_mname'] = $this->session->userdata('usr_mname');
						$data['usr_type'] = $this->session->userdata('usr_type');
						
						$data['usr_payment_method'] = $this->session->userdata('usr_payment_method');
						$data['usr_payment_no'] = $this->session->userdata('usr_payment_no');
						$data['usr_contact'] = $this->session->userdata('usr_contact');

						$data['diw_created'] = $this->getDatetimeNow();
						$data['diw_status'] = "published";
						$data['diw_get'] = "yes";
						$data['diw_lastamount'] = $left_direct_indirect;
						$data['diw_leftamount'] = $left_dir_amount - $request_direct_indirect;
											
						$data['diw_tax'] = $request_direct_indirect * $tax[0]['set_amount'];
						$data['diw_proccess'] = $request_direct_indirect * $process[0]['set_amount'];
						$data['diw_realamount'] = ($request_direct_indirect - ( $data['diw_tax'] + $data['diw_proccess'] ));

						$this->model_base->insert_data($data, 'direct_indirect_withdraw');
						$this->session->set_flashdata('msg_success', 'Added Request!');	
						redirect('member/direct_indirect','refresh');
					} else{
						$content['msg_error'] = "Not qualified for minimum withdrawal amount!";	
					}
				} else {
					$content['msg_error'] = "insuffiecient Direct Indirect Amount value!";	
				}
			}
		}

		$content['back'] = base_url('member/direct_indirect');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/direct_indirect/create', $content);
		$this->load->view("template/member_footer");
	}

	public function history($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Direct / Indirect Bonus';
		$header['header'] = 'Direct / Indirect Bonus';
		$header['header_small'] = 'Withdraw history';
		
		$content = [];

		$this->db->order_by('diw_created', 'DESC'); //DESC
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
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
			$config["base_url"] = base_url() . "member/direct_indirect_withdraw/index/";
			
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

				$content['direct_indirect_withdraw'] = $this->model_base->like_data($search_value, $search_type, 'direct_indirect_withdraw');
			}	
		} else {
			$content['direct_indirect_withdraw'] = $this->model_base->get_all('direct_indirect_withdraw');
		}

		$content['controller']=$this; 
		$content['back'] = base_url('member/direct_indirect');
		$content['refresh'] = base_url('member/direct_indirect_withdraw');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/direct_indirect/history', $content);
		$this->load->view("template/member_footer");
	}
}