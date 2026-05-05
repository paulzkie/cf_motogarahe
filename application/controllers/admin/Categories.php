<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
		$header['header_title'] = 'Categories';
		$header['header'] = 'Categories';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('cat_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('cat_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('cat_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('cat_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['categories'] = $this->model_base->like_data($data['cat_name'], 'cat_name', 'categories');
			}	
		} else {
			$content['categories'] = $this->model_base->get_all('categories');
		}

		$content['all'] = base_url('admin/categories/');
		$content['published'] = base_url('admin/categories/index/published');
		$content['draft'] = base_url('admin/categories/index/draft');
		$content['deleted'] = base_url('admin/categories/index/deleted');
		$content['create'] = base_url('admin/categories/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/categories/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Categories';
		$header['header'] = 'Categories';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cat_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'categories');

				$this->session->set_flashdata('msg_success', 'Added Category!');	

				redirect('admin/categories','refresh');
			}
		}

		$content['back'] = base_url('admin/categories');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/categories/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Categories';
		$header['header'] = 'Categories';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['categories'] = $this->model_base->get_one($id, "cat_id", "categories");

		//validations
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cat_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'cat_id', $data, 'categories');

				$this->session->set_flashdata('msg_success', 'Updated Category!');	

				redirect('admin/categories/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/categories');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/categories/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Categories';
		$header['header'] = 'Categories';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['categories'] = $this->model_base->get_one($id, "cat_id", "categories");

		$content['back'] = base_url('admin/categories');
		$content['edit'] = base_url() . 'admin/categories/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/categories/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Categories';
		$header['header'] = 'Categories';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['categories'] = $this->model_base->delete_data($id, 'cat_id', 'cat_status', 'categories');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/categories/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/categories/view', $content);
		$this->load->view("template/admin_footer");
	}
}