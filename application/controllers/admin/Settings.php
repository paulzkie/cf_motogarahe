<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = "" )
	{
		$header = [];
		$header['header_title'] = 'Settings';
		$header['header'] = 'Settings';
		$header['header_small'] = '';
		
		$content = [];
		
		// if ( $filter == '') {
		// 	$this->db->where('set_status', 'published');
		// } elseif ( $filter == 'published' ) {
		// 	$this->db->where('set_status', 'published');
		// } elseif ( $filter == 'draft' ) {
		// 	$this->db->where('set_status', 'draft');
		// } elseif ( $filter == 'deleted' ) {
		// 	$this->db->where('set_status', 'deleted');
		// }

		

		// if ( $this->input->post() ) {
		// 	//validations
		// 	$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim');
		// 	if ($this->form_validation->run() == FALSE) {
		// 		$content['msg_error'] = validation_errors();
		// 	} else {
		// 		$data = $this->input->post();
		// 		$content['settings'] = $this->model_base->like_data($data['set_name'], 'set_name', 'settings');
		// 	}	
		// } else {
		// 	
		// }


		if($this->input->post('encashment_settings')) {
			$this->form_validation->set_rules('set_status', 'Status', 'required|trim');
			
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['encashment_settings']);	

				$data['set_updated'] = $this->getDatetimeNow();
				$this->model_base->update_data(4, 'set_id', $data, 'settings2');
				$this->session->set_flashdata('msg_success', 'Updated Encashment Status!');	
				redirect('admin/settings/');
			}	
		}

		if($this->input->post('tax_post')) {
			$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim|decimal');
			
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['tax_post']);	

				$data['set_updated'] = $this->getDatetimeNow();
				$this->model_base->update_data(1, 'set_id', $data, 'settings2');
				$this->session->set_flashdata('msg_success', 'Updated Tax Amount!');	
				redirect('admin/settings/');
			}	
		}

		if($this->input->post('process_post')) {
			$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim|decimal');
			
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['process_post']);	

				$data['set_updated'] = $this->getDatetimeNow();
				$this->model_base->update_data(2, 'set_id', $data, 'settings2');
				$this->session->set_flashdata('msg_success', 'Updated Processing Fee Amount!');	
				redirect('admin/settings/');
			}	
		}

		if($this->input->post('withdraw_post')) {
			$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim|decimal');
			
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['withdraw_post']);	

				$data['set_updated'] = $this->getDatetimeNow();
				$this->model_base->update_data(5, 'set_id', $data, 'settings2');
				$this->session->set_flashdata('msg_success', 'Updated Minimum Withdrawal Fee Amount!');	
				redirect('admin/settings/');
			}	
		}

		$content['tax'] = $this->model_base->get_one(1, "set_id", "settings2");
		$content['process'] = $this->model_base->get_one(2, "set_id", "settings2");
		$content['withdraw'] = $this->model_base->get_one(5, "set_id", "settings2");

		$content['encashement_status'] = $this->model_base->get_one(4, "set_id", "settings2");
		$content['settings'] = $this->model_base->get_all('settings');
		// echo "<pre>";
		// print_r ($content['encashement_status']);
		// echo "</pre>";


		$content['all'] = base_url('admin/settings/');
		$content['published'] = base_url('admin/settings/index/published');
		$content['draft'] = base_url('admin/settings/index/draft');
		$content['deleted'] = base_url('admin/settings/index/deleted');
		$content['create'] = base_url('admin/settings/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/settings/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'settings';
		$header['header'] = 'settings';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['set_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'settings');

				$this->session->set_flashdata('msg_success', 'Added Category!');	

				redirect('admin/settings','refresh');
			}
		}

		$content['back'] = base_url('admin/settings');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/settings/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'settings';
		$header['header'] = 'settings';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['settings'] = $this->model_base->get_one($id, "set_id", "settings");

		//validations
		$this->form_validation->set_rules('set_amount', 'Amount', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['set_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'set_id', $data, 'settings');

				$this->session->set_flashdata('msg_success', 'Updated Category!');	

				redirect('admin/settings/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/settings');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/settings/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'settings';
		$header['header'] = 'settings';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['settings'] = $this->model_base->get_one($id, "set_id", "settings");

		$content['back'] = base_url('admin/settings');
		$content['edit'] = base_url() . 'admin/settings/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/settings/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'settings';
		$header['header'] = 'settings';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['settings'] = $this->model_base->delete_data($id, 'set_id', 'set_status', 'settings');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/settings/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/settings/view', $content);
		$this->load->view("template/admin_footer");
	}
}