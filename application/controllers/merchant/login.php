<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
	}

	public function index()
	{
		if ( $this->have_sess_admin() == true ){
			redirect('merchant/mgclub','refresh');
		} else {
			$this->load->model('model_login');

			$header = [];
			$header['header_title'] = 'Login';
			
			$content = [];

			//validations
			$this->form_validation->set_rules('acc_username', 'Username', 'required|trim');
			$this->form_validation->set_rules('acc_password', 'Password', 'required|trim|min_length[8]');

			if($this->input->post()) {

				if ($this->form_validation->run() == FALSE) {
					$content['msg_error'] = validation_errors();
				} else {
					// success
					$data = $this->input->post();
					$table = "homepage_merchant";

	    			$account = $this->model_login->login_merchant($data, $table);

	    			if ( count( $account ) >= 1 ) {
	    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
	    				$this->session->set_userdata($account[0]);
	    				redirect('merchant/mgclub','refresh');

	    			} else {	
	    				$content['msg_error'] = 'Invalid Account';
	    			}
				}
			}
			$this->load->view('merchant/login', $content);	
		}
	}

	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('merchant/login', 'refresh'); 
   }
}