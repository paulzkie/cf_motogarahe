<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

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
		$header['header_title'] = 'Clients';
		$header['header'] = 'Clients';
		$header['header_small'] = '';
		
		$content = [];

		
		if ( $filter == '') {
			$this->db->where('cli_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('cli_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('cli_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('cli_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('cli_name', 'Client Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['clients'] = $this->model_base->like_data($data['cli_name'], 'cli_name', 'clients');
			}	
		} else {
			$content['clients'] = $this->model_base->get_all('clients');
		}

		$content['all'] = base_url('admin/clients/');
		$content['published'] = base_url('admin/clients/index/published');
		$content['draft'] = base_url('admin/clients/index/draft');
		$content['deleted'] = base_url('admin/clients/index/deleted');
		$content['create'] = base_url('admin/clients/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/clients/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Clients';
		$header['header'] = 'Clients';
		$header['header_small'] = 'Create';
		
		$content = [];
		$this->db->where('acc_status !=', 'deleted');
		$content['accounts'] = $this->model_base->get_all('accounts');

		//validations
		$this->form_validation->set_rules('acc_id', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('cli_name', 'Client Name', 'required|trim');
		$this->form_validation->set_rules('cli_address', 'Client Address', 'required|trim');
		$this->form_validation->set_rules('cli_tin', 'Client TIN No', 'required|trim');
		$this->form_validation->set_rules('cli_fax', 'Fax No', 'required|trim');
		$this->form_validation->set_rules('cli_person', 'Contact Person', 'required|trim');
		$this->form_validation->set_rules('cli_company_address', 'Company Address', 'trim');
		$this->form_validation->set_rules('cli_contact', 'Contact No', 'trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cli_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'clients');

				$this->session->set_flashdata('msg_success', 'Added Clients!');	

				redirect('admin/clients','refresh');
			}
		}

		$content['back'] = base_url('admin/clients');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/clients/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Clients';
		$header['header'] = 'Clients';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$this->db->where('acc_status !=', 'deleted');
		$content['accounts'] = $this->model_base->get_all('accounts');

		$this->db->join('accounts', 'accounts.acc_id = clients.acc_id');
		$content['clients'] = $this->model_base->get_one($id, "cli_id", "clients");

		//validations
		$this->form_validation->set_rules('acc_id', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('cli_name', 'Client Name', 'required|trim');
		$this->form_validation->set_rules('cli_address', 'Client Address', 'required|trim');
		$this->form_validation->set_rules('cli_tin', 'Client TIN No', 'required|trim');
		$this->form_validation->set_rules('cli_fax', 'Fax No', 'required|trim');
		$this->form_validation->set_rules('cli_person', 'Contact Person', 'required|trim');
		$this->form_validation->set_rules('cli_company_address', 'Company Address', 'trim');
		$this->form_validation->set_rules('cli_contact', 'Contact No', 'trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cli_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'cli_id', $data, 'clients');

				$this->session->set_flashdata('msg_success', 'Updated Client!');	

				redirect('admin/clients/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/clients');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/clients/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Clients';
		$header['header'] = 'Clients';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->join('accounts', 'accounts.acc_id = clients.acc_id');
		$content['clients'] = $this->model_base->get_one($id, "cli_id", "clients");

		$content['back'] = base_url('admin/clients');
		$content['edit'] = base_url() . 'admin/clients/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/clients/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Clients';
		$header['header'] = 'Clients';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['clients'] = $this->model_base->delete_data($id, 'cli_id', 'cli_status', 'clients');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/clients/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/clients/view', $content);
		$this->load->view("template/admin_footer");
	}
}