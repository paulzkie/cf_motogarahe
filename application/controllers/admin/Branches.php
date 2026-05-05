<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {

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
		$header['header_title'] = 'Branch';
		$header['header'] = 'Branch';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('bra_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('bra_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('bra_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('bra_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('bra_name', 'Branch Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['branches'] = $this->model_base->like_data($data['bra_name'], 'bra_name', 'branches');
			}	
		} else {
			$content['branches'] = $this->model_base->get_all('branches');
		}

		$content['all'] = base_url('admin/branches/');
		$content['published'] = base_url('admin/branches/index/published');
		$content['draft'] = base_url('admin/branches/index/draft');
		$content['deleted'] = base_url('admin/branches/index/deleted');
		$content['create'] = base_url('admin/branches/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/branches/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Branch';
		$header['header'] = 'Branch';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('bra_name', 'Branch Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['bra_created'] = $this->getDatetimeNow();

				$this->model_base->insert_data($data, 'branches');

				$this->session->set_flashdata('msg_success', 'Added Branch!');	

				redirect('admin/branches','refresh');
			}
		}

		$content['back'] = base_url('admin/branches');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/branches/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Branch';
		$header['header'] = 'Branch';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['branches'] = $this->model_base->get_one($id, "bra_id", "branches");

		//validations
		$this->form_validation->set_rules('bra_name', 'Branch Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['bra_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'bra_id', $data, 'branches');

				$this->session->set_flashdata('msg_success', 'Updated Branch!');	

				redirect('admin/branches/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/branches');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/branches/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Branch';
		$header['header'] = 'Branch';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['branches'] = $this->model_base->get_one($id, "bra_id", "branches");

		$content['back'] = base_url('admin/branches');
		$content['edit'] = base_url() . 'admin/branches/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/branches/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Branch';
		$header['header'] = 'Branch';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['branches'] = $this->model_base->delete_data($id, 'bra_id', 'bra_status', 'branches');

		$this->session->set_flashdata('msg_success', 'Deleted Branch!');	

		redirect('admin/branches/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/branches/view', $content);
		$this->load->view("template/admin_footer");
	}
}