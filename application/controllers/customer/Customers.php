<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form', 'breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_login');
	}

	public function index()
	{
		$header = [];
		$header['header_title'] = 'Customers';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('cus_username', 'Username', 'required|trim');
		$this->form_validation->set_rules('cus_password', 'Password', 'required|trim|min_length[8]');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();

				// echo "<pre>";
				// print_r ($content['msg_error']);
				// echo "</pre>";

			} else {
				// success
				$data = $this->input->post();

    			$customer = $this->model_login->login($data, 'customer');
    			// echo "<pre>";
    			// print_r ($customer);
    			// echo "</pre>";

    			if ( count( $customer ) >= 1 ) {
    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
    				$this->session->set_userdata($customer[0]);
    				redirect('home','refresh');
    			} else {	
    				$content['msg_error'] = 'Invalid Account';

    				// echo "<pre>";
					// print_r ($content['msg_error']);
					// echo "</pre>";
    			}
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('customer/view_login', $content);
		$this->load->view("template/site_footer");
	}

	public function logout () {
		$this->logout_user();
	}

	public function profile()
	{
		$header = [];
		$header['header_title'] = 'Profile';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('customer/view_customer_profile', $content);
		$this->load->view("template/site_footer");
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */