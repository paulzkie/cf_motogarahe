<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		if ( $this->session->userdata('usr_id') ) {
			$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
			if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
				$this->logout_user();	
			}
		}
	}

	public function index()
	{

		// $this->useraccount->pota();
		$header = [];
		$header['header_title'] = 'Invoice';
		
		$content = [];

		if($this->input->post('reg_mode')) {

			// $this->form_validation->set_rules('usr_username', 'Username','trim|required|is_unique[users.usr_username]');  
			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email|max_length[254]|is_unique[users.usr_email]');
			$this->form_validation->set_rules('usr_password', 'Password', 'trim|required|matches[usr_password_conf]|min_length[8]|md5'); 
			$this->form_validation->set_rules('usr_password_conf', 'Confirm Password', 'trim|required|md5');
			$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim|max_length[120]');
			// $this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
			$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim|max_length[120]');
			// $this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
			$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim|max_length[20]|regex_match[/^[0-9]+$/]');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data_users = public_input_registration_payload($this->input->post(NULL, FALSE));
				$data_users['usr_created'] = $this->getDatetimeNow();
		        // $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));
		        $data_users['usr_session'] = $this->session->userdata('session_id');

		        $this->model_base->insert_data($data_users, 'users');
		        $last_id = $this->db->insert_id();
		        $this->session->set_flashdata('msg_success', 'Successfully Registered!');	
				redirect('invoice','refresh');
			}
		}


		

		if($this->input->post('login_mode')) {

			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = public_input_login_payload($this->input->post(NULL, FALSE));
				$table = "users";

				$this->db->select('usr_id, usr_fname, usr_lname, usr_mname, usr_email, usr_username, usr_session, uss_id, usr_status');
				$this->db->where('usr_status !=', 'deleted');
    			$user = $this->model_login->login_user_by_email($data, $table);

    			if ( count( $user ) >= 1 ) {
    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
    				$this->session->set_userdata($user[0]);

    				$data_update['usr_session'] = $this->session->userdata('session_id');
					$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_update, 'users');

    				redirect('home','refresh');

    			} else {	
    				$content['msg_error'] = 'Invalid Account';
    			}
			}
		}

		$this->db->flush_cache();
	    if ( $this->session->userdata('uss_id') != 0 ) {
			$plan = $this->model_base->get_one($this->session->userdata('uss_id'), "uss_id", "users_subscriptions");
			if ($plan[0]['uss_date_end'] >= date("d/m/Y H:i:s", strtotime('today'))) {
				$content['plan'] = 'Premium Account';
				$header['plan'] = 'Premium Account';
			} else {
				$content['plan'] = 'Regular Account';
				$header['plan'] = 'Regular Account';	
			}
			// $this->godprintp($plan);
		} else {
			$content['plan'] = 'Regular Account';
			$header['plan'] = 'Regular Account';	
		}
		
		// $this->load->view("template/site_header", $header);
		$this->load->view('site/view_invoice', $content);
		// $this->load->view("template/site_footer");
	}
}