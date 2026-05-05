<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'request_throttle'));
	}

	public function index()
	{
		if ( $this->have_sess_brand() == true ){
			redirect('brand/inquiries/index/xallx/xallx','refresh');
		} else {
			$this->load->model('model_login');

			$header = [];
			$header['header_title'] = 'Login';
			
			$content = [];

			//validations
			$this->form_validation->set_rules('acc_username', 'Username', 'required|trim');
			$this->form_validation->set_rules('acc_password', 'Password', 'required|trim|min_length[8]');

			if($this->input->post()) {
				$login_limit = $this->request_throttle->hit_login_buckets('brand_login', $this->input->ip_address(), $this->input->post('acc_username', TRUE));
				if (!$login_limit['allowed']) {
					$content['msg_error'] = 'Too many login attempts. Please wait ' . $login_limit['retry_after'] . ' seconds and try again.';
				} else {

				if ($this->form_validation->run() == FALSE) {
					$content['msg_error'] = validation_errors();
				} else {
					// success
					$data = $this->input->post();
					$table = "dealers_accounts";

	    			$account = $this->model_login->login_normal($data, $table);

	    			if ( count( $account ) >= 1 ) {
		    			$this->request_throttle->clear_login_buckets('brand_login', $this->input->ip_address(), $this->input->post('acc_username', TRUE));
	    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
	    				$this->session->set_userdata($account[0]);
	    				redirect('brand/inquiries/index/xallx/xallx','refresh');

	    			} else {	
	    				$content['msg_error'] = 'Invalid Account';
	    			}
				}
					}
			}
			$this->load->view('brand/login', $content);	
		}
	}

	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('brand/login', 'refresh'); 
   }
}