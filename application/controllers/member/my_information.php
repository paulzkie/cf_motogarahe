<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_information extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		// if ( $this->have_sess_admin() != true ){
		// 	$this->logout_admin();	
		// }

        // $this->session->unset_userdata('selected_client');	
        
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
		// $header = [];
		// $header['header_title'] = 'Users';
		// $header['header'] = 'Users';
		// $header['header_small'] = '';
		
		// $content = [];

		// $this->db->order_by('usr_fname', 'ASC'); //DESC
		// if (!is_numeric($filter)) {
		// 	if ( $filter == 'all') {
		// 		$this->db->where('usr_status !=', 'deleted');
		// 	} elseif ( $filter == 'published' ) {
		// 		$this->db->where('usr_status', 'published');
		// 	} elseif ( $filter == 'draft' ) {
		// 		$this->db->where('usr_status', 'draft');
		// 	} elseif ( $filter == 'deleted' ) {
		// 		$this->db->where('usr_status', 'deleted');
		// 	}
		// } else {
		// 	$config = array();
		// 	$config["base_url"] = base_url() . "member/my_information/index/";
		// 	$total_row = $this->model_base->count_data('users');
		// 	$config["total_rows"] = $total_row;
		// 	$config['per_page'] = 15;
		// 	$config['uri_segment'] = 4;
		// 	$config['num_links'] = $total_row;
		// 	$config['use_page_numbers'] = TRUE;
		// 	$config['full_tag_open'] = '<ul class="pagination">';
		// 	$config['full_tag_close'] = '</ul>';
		// 	$config['prev_link'] = 'Previous';
		// 	$config['prev_tag_open'] = '<li>';
		// 	$config['prev_tag_close'] = '</li>';
		// 	$config['next_tag_open'] = '<li>';
		// 	$config['next_tag_close'] = '</li>';
		// 	$config['cur_tag_open'] = '<li class="active"><a href="">';
		// 	$config['cur_tag_close'] = '</a></li>';
		// 	$config['num_tag_open'] = '<li>';
		// 	$config['num_tag_close'] = '</li>';
		// 	$config['next_link'] = 'Next';

		// 	$this->pagination->initialize($config);
	
		// 	$offset = ($filter - 1) * $config["per_page"];
		// 	$this->db->limit( $config["per_page"] , $offset);
		// 	$this->db->where('usr_status !=', 'deleted');
		// }

		// //validations
		// $this->form_validation->set_rules('search_type', 'Product Name', 'trim');
		// $this->form_validation->set_rules('search_val', 'Product Name', 'trim');

		// if ( $this->input->post() ) {
		// 	if ($this->form_validation->run() == FALSE) {
		// 		$content['msg_error'] = validation_errors();
		// 	} else {
		// 		$data = $this->input->post();

		// 		$search_value = $data['search_val'];
		// 		$search_type = $data['search_type'];

		// 		$data = [];

		// 		$content['users'] = $this->model_base->like_data($search_value, $search_type, 'users');
		// 	}	
		// } else {
		// 	$content['users'] = $this->model_base->get_all('users');
		// }


		// $starter_amount_settings = $this->model_base->get_one(1, "set_id", "settings");
		// $sparkle_amount_settings = $this->model_base->get_one(2, "set_id", "settings");

		// $this->db->flush_cache();	
		// $this->db->where('usr_type', "sparkle");	
		// $this->db->join('users', 'users.usr_id = lottery_users.usr_id');
		// $sparkle_users = $this->model_base->get_all('lottery_users');	
		// $content['sparkle_users_count'] = count($sparkle_users);
		// $content['sparkle_users_amount'] = $content['sparkle_users_count'] * $sparkle_amount_settings[0]['set_amount'];

		// $this->db->flush_cache();	
		// $this->db->where('usr_type', "starter");	
		// $starter_users = $this->model_base->get_all('users');	
		// $content['starter_users_count'] = count($starter_users);
		// $content['starter_users_amount'] = $content['starter_users_count'] * $starter_amount_settings[0]['set_amount'];


		// $content['users_count'] = $content['sparkle_users_count'] + $content['starter_users_count'];
		// $content['users_amount'] = $content['sparkle_users_amount'] + $content['starter_users_amount'];

		// //echo $this->getDatetimeNow();
		// //$month = date("m",strtotime($this->getDatetimeNow()));
		// $this->db->flush_cache();	
		// $this->db->where('usr_type', "sparkle");	
		// $this->db->where('month(usr_created)',date("m",strtotime($this->getDatetimeNow())));
		// $this->db->join('users', 'users.usr_id = lottery_users.usr_id');
		// $sparkle_users = $this->model_base->get_all('lottery_users');	
		// $content['sparkle_users_count_month'] = count($sparkle_users);
		// $content['sparkle_users_amount_month'] = $content['sparkle_users_count_month'] * $sparkle_amount_settings[0]['set_amount'];

		// $this->db->flush_cache();	
		// $this->db->where('usr_type', "starter");	
		// $this->db->where('month(usr_created)',date("m",strtotime($this->getDatetimeNow())));
		// $starter_users = $this->model_base->get_all('users');	
		// $content['starter_users_count_month'] = count($starter_users);
		// $content['starter_users_amount_month'] = $content['starter_users_count_month'] * $starter_amount_settings[0]['set_amount'];
		


		// // echo "<pre>";
		// // print_r ($sparkle_users);
		// // echo "</pre>";

		// $content['controller']=$this; 
		// $content['all'] = base_url('member/my_information/index/all');
		// $content['published'] = base_url('member/my_information/index/published');
		// $content['draft'] = base_url('member/my_information/index/draft');
		// $this->load->view("template/admin_header", $header);
		// $this->load->view('member/my_information/index', $content);
		// $this->load->view("template/admin_footer");
	}

	public function edit()
	{
		$header = [];
		$header['header_title'] = 'My Information';
		$header['header'] = 'My Information';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['users'] = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");

		//validations
		$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
		$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
		
		
		$this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
		$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim');
        $this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
        
        $this->form_validation->set_rules('usr_payment_method', 'Payment Method', 'required|trim');
		$this->form_validation->set_rules('usr_payment_no', 'Payment Number', 'required|trim');

		

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;

				$data['usr_updated'] = $this->getDatetimeNow();
		        $data['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));

				$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data, 'users');

				$this->session->set_flashdata('msg_success', 'Updated User!');	

				redirect('member/my_information/edit/','refresh');
			}
		}

		$content['back'] = base_url('member/my_information');
		$this->load->view("template/member_header", $header);
		$this->load->view('member/my_information/edit', $content);
		$this->load->view("template/member_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Users';
		$header['header'] = 'Users';
		$header['header_small'] = 'View';
		
		$content = [];


		$content['users'] = $this->model_base->get_one($id, "usr_id", "users");
		

		$content['back'] = base_url('member/my_information');
		$content['edit'] = base_url() . 'member/my_information/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('member/my_information/view', $content);
		$this->load->view("template/admin_footer");
	}
}