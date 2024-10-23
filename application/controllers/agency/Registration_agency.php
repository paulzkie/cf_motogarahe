<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_agency extends CI_Controller {

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
		$header['header_title'] = 'Registration_agency';
		
		$content = [];

		$this->form_validation->set_rules('age_username', 'User Name', 'required|trim');
		$this->form_validation->set_rules('age_password', 'Password', 'required|trim');
		$this->form_validation->set_rules('age_businessname', 'Business Name', 'required|trim');
		$this->form_validation->set_rules('age_businessaddress', 'Business Address', 'required|trim');
		$this->form_validation->set_rules('age_fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('age_mname', 'Middle Name', 'required|trim');
		$this->form_validation->set_rules('age_lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('age_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('age_city', 'Address', 'required|trim');
		$this->form_validation->set_rules('age_state', 'State', 'required|trim');
		$this->form_validation->set_rules('age_country', 'Country', 'required|trim');
		$this->form_validation->set_rules('age_zip', 'Zip', 'required|trim');
		$this->form_validation->set_rules('age_phone', 'Phone', 'required|trim');
		$this->form_validation->set_rules('age_email', 'Email', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['age_password'] = md5($data['age_password']);
				$data['age_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'agency');

				// $this->session->set_flashdata('msg_success', 'Added Account!');	

				redirect('agency/login_agency','refresh');
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('agency/view_registration_agency', $content);
		$this->load->view("template/site_footer");
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */