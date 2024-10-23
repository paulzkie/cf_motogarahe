<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_login_agency');
	}

	public function index()
	{
		$header = [];
		$header['header_title'] = 'Agencies';
		
		$content = [];

		//validation

		$this->form_validation->set_rules('age_username', 'Username', 'required|trim');
		$this->form_validation->set_rules('age_password', 'Password', 'required|trim|min_lenght[8]');

		if ($this->input->post()) {

			// echo 'asdsad';
			// break;

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();

				// echo "<pre>";
				// print_r ($content['msg_error']);
				// echo "</pre>";
				// break;

			} else {
				//success
				$data = $this->input->post();

				$agency = $this->model_login_agency->login($data, 'agency');

				// echo "<pre>";
				// print_r ($agency);
				// echo "</pre>";
				// break;

				if ( count( $agency) >= 1) {
					$this->session->set_flashdata('msg_success', 'Successfully log in!');
					$this->session->set_userdata($agency[0]);
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
		$this->load->view('agency/view_login_agency', $content);
		$this->load->view("template/site_footer");
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->logout_user();
	}

	public function profile()
	{
		$header = [];
		$header['header_title'] = 'Profile';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('agency/view_agency_profile', $content);
		$this->load->view("template/site_footer");
	}


}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */