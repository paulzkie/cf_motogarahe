<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

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
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('acc_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('acc_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('acc_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('acc_status', 'deleted');
		}

		$this->db->join('branches', 'branches.bra_id = accounts.bra_id');
		//validations
		$this->form_validation->set_rules('acc_name', 'Account Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['accounts'] = $this->model_base->like_data($data['acc_name'], 'acc_name', 'accounts');
			}	
		} else {
			$content['accounts'] = $this->model_base->get_all('accounts');
		}
        
        $content['accounts'] = $this->model_base->get_all('accounts');
        
		$content['all'] = base_url('admin/accounts/');
		$content['published'] = base_url('admin/accounts/index/published');
		$content['draft'] = base_url('admin/accounts/index/draft');
		$content['deleted'] = base_url('admin/accounts/index/deleted');
		$content['create'] = base_url('admin/accounts/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/accounts/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		//validations
		$this->form_validation->set_rules('acc_name', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('acc_username', 'Username', 'required|trim');
		$this->form_validation->set_rules('acc_password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('acc_type', 'Account Type', 'required|trim');
		//$this->form_validation->set_rules('bra_id', 'Branch Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['acc_password'] = md5($data['acc_password']);
				$data['bra_id'] = 1;
				$data['acc_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'accounts');

				$this->session->set_flashdata('msg_success', 'Added Account!');	

				redirect('admin/accounts','refresh');
			}
		}

		$content['back'] = base_url('admin/accounts');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/accounts/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		$this->db->join('branches', 'branches.bra_id = accounts.bra_id');
		$content['accounts'] = $this->model_base->get_one($id, "acc_id", "accounts");

		//validations
		$this->form_validation->set_rules('acc_name', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('acc_username', 'Username', 'required|trim');
		
		$this->form_validation->set_rules('acc_type', 'Account Type', 'required|trim');
		//$this->form_validation->set_rules('bra_id', 'Branch Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['bra_id'] = 1;
				$data['acc_updated'] = $this->getDatetimeNow();

				if ( isset($data['acc_password']) && !empty($data['acc_password']) ) {
					$this->form_validation->set_rules('acc_password', 'Password', 'required|trim|min_length[8]');
					$data['acc_password'] = md5($data['acc_password']);
				} else {
					unset($data['acc_password']);
				}

				$this->model_base->update_data($id, 'acc_id', $data, 'accounts');

				$this->session->set_flashdata('msg_success', 'Updated Account!');	

				redirect('admin/accounts/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/accounts');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/accounts/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = 'View';
		
		$content = [];
		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');
		
		$content['accounts'] = $this->model_base->get_one($id, "acc_id", "accounts");

		$content['back'] = base_url('admin/accounts');
		$content['edit'] = base_url() . 'admin/accounts/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/accounts/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['accounts'] = $this->model_base->delete_data($id, 'acc_id', 'acc_status', 'accounts');

		$this->session->set_flashdata('msg_success', 'Deleted Account!');	

		redirect('admin/accounts/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/accounts/view', $content);
		$this->load->view("template/admin_footer");
	}
}