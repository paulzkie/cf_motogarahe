<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form'));
		$this->load->library(array('form_validation', 'security'));
		$this->load->model('model_base');
	}

	public function index()
	{
		$header = [];
		$header['header_title'] = 'Registration';
		
		$content = [];

		$this->form_validation->set_rules('cus_username', 'Username', 'required|trim');
		$this->form_validation->set_rules('cus_password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cus_fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('cus_mname', 'Middle Name', 'required|trim');
		$this->form_validation->set_rules('cus_lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('cus_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('cus_city', 'City', 'required|trim');
		$this->form_validation->set_rules('cus_state', 'State', 'required|trim');
		$this->form_validation->set_rules('cus_country', 'Country', 'required|trim');
		$this->form_validation->set_rules('cus_zip', 'Zip', 'required|trim');
		$this->form_validation->set_rules('cus_phone', 'Phone', 'required|trim');
		$this->form_validation->set_rules('cus_email', 'Email', 'required|trim');


		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cus_password'] = md5($data['cus_password']);
				$data['cus_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'customer');

				// $this->session->set_flashdata('msg_success', 'Added Account!');	

				redirect('customer/login','refresh');
			}
		}
		$this->load->view("template/site_header", $header);
		$this->load->view('customer/view_registration', $content);
		$this->load->view("template/site_footer");
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */