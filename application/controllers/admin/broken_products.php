<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class broken_products extends CI_Controller {

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
		$header['header_title'] = 'Damage Items';
		$header['header'] = 'Damage Items';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('bro_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('bro_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('bro_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('bro_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('no_id', 'Number', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$this->db->join('products', 'products.pro_id = broken_products.pro_id');
				$content['broken_products'] = $this->model_base->like_data($data['no_id'], 'no_id', 'broken_products');
			}	
		} else {
			$this->db->join('products', 'products.pro_id = broken_products.pro_id');
			$content['broken_products'] = $this->model_base->get_all('broken_products');
		}

		$content['all'] = base_url('admin/broken_products/');
		$content['published'] = base_url('admin/broken_products/index/published');
		$content['draft'] = base_url('admin/broken_products/index/draft');
		$content['deleted'] = base_url('admin/broken_products/index/deleted');
		$content['create'] = base_url('admin/broken_products/create');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/broken_products/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Damage Items';
		$header['header'] = 'Damage Items';
		$header['header_small'] = 'Create';
		
		$content = [];

		$content['products'] = $this->model_base->get_all('products');

		//validations
		$this->form_validation->set_rules('bro_type', 'Type', 'required|trim');
		$this->form_validation->set_rules('no_id', 'Number', 'required|trim');
		$this->form_validation->set_rules('pro_id', 'Product', 'required|trim');
		$this->form_validation->set_rules('bro_qty', 'Qty', 'required|trim');
		$this->form_validation->set_rules('bro_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['bra_id'] = $this->session->userdata('bra_id');
				$data['bro_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'broken_products');

				$this->session->set_flashdata('msg_success', 'Added Broken Product!');	

				redirect('admin/broken_products','refresh');
			}
		}

		$content['back'] = base_url('admin/broken_products');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/broken_products/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Damage Items';
		$header['header'] = 'Damage Items';
		$header['header_small'] = 'Edit';
		
		$content['products'] = $this->model_base->get_all('products');



		//validations
		$this->form_validation->set_rules('bro_type', 'Type', 'required|trim');
		$this->form_validation->set_rules('no_id', 'Number', 'required|trim');
		$this->form_validation->set_rules('pro_id', 'Product', 'required|trim');
		$this->form_validation->set_rules('bro_qty', 'Qty', 'required|trim');
		$this->form_validation->set_rules('bro_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				//$data['cat_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'bro_id', $data, 'broken_products');

				$this->session->set_flashdata('msg_success', 'Updated Broken Products!');	

				redirect('admin/broken_products/view/' . $id,'refresh');
			}
		}

		$content['broken_products'] = $this->model_base->get_one($id, "bro_id", "broken_products");

		$content['back'] = base_url('admin/broken_products');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/broken_products/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Damage Items';
		$header['header'] = 'Damage Items';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['products'] = $this->model_base->get_all('products');
		$content['broken_products'] = $this->model_base->get_one($id, "bro_id", "broken_products");

		$content['back'] = base_url('admin/broken_products');
		$content['edit'] = base_url() . 'admin/broken_products/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/broken_products/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_category_name($pro_id) {
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Damage Items';
		$header['header'] = 'Damage Items';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['broken_products'] = $this->model_base->delete_data($id, 'bro_id', 'bro_status', 'broken_products');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/broken_products/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/broken_products/view', $content);
		$this->load->view("template/admin_footer");
	}
}