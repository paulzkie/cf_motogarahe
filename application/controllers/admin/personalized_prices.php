<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personalized_prices extends CI_Controller {

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
		$header['header_title'] = 'Personalized Prices';
		$header['header'] = 'Personalized Prices';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('ppr_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('ppr_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('ppr_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('ppr_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('cli_name', 'Client Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$this->db->join("products", "products.pro_id = personalized_prices.pro_id");
				$this->db->join("clients", "clients.cli_id = personalized_prices.cli_id");
				$content['personalized_prices'] = $this->model_base->like_data($data['cli_name'], 'cli_name', 'personalized_prices');
			}	
		} else {
			$this->db->join("products", "products.pro_id = personalized_prices.pro_id");
			$this->db->join("clients", "clients.cli_id = personalized_prices.cli_id");
			$content['personalized_prices'] = $this->model_base->get_all('personalized_prices');
		}

		$content['all'] = base_url('admin/personalized_prices/');
		$content['published'] = base_url('admin/personalized_prices/index/published');
		$content['draft'] = base_url('admin/personalized_prices/index/draft');
		$content['deleted'] = base_url('admin/personalized_prices/index/deleted');
		$content['create'] = base_url('admin/personalized_prices/create');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/personalized_prices/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Personalized Prices';
		$header['header'] = 'Personalized Prices';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('cli_status !=', 'deleted');
		$content['clients'] = $this->model_base->get_all('clients');

		$this->db->where('pro_status !=', 'deleted');
		$content['products'] = $this->model_base->get_all('products');

		//validations
		$this->form_validation->set_rules('cli_id', 'Client Name', 'required|trim');
		$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('ppr_price', 'Discounted price', 'required|trim|decimal');
		$this->form_validation->set_rules('ppr_return_price', 'Return price', 'required|trim|decimal');
		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['ppr_status'] = 'published';

				$this->db->flush_cache();

				$this->db->where('cli_id', $data['cli_id']);
				$this->db->where('pro_id', $data['pro_id']);
				$search = $this->model_base->get_all('personalized_prices');

				if ( count($search) >= 1 ) {

					$content['msg_error'] = 'Personalized prices product is already available for that client!';

				} else {
					$this->model_base->insert_data($data, 'personalized_prices');

					$this->session->set_flashdata('msg_success', 'Added Personalized prices!');	

					redirect('admin/personalized_prices','refresh');
				}
			}
		}

		$content['back'] = base_url('admin/personalized_prices');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/personalized_prices/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Personalized Prices';
		$header['header'] = 'Personalized Prices';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$this->db->where('cli_status !=', 'deleted');
		$content['clients'] = $this->model_base->get_all('clients');

		$this->db->where('pro_status !=', 'deleted');
		$content['products'] = $this->model_base->get_all('products');

		$content['personalized_prices'] = $this->model_base->get_one($id, "ppr_id", "personalized_prices");

		//validations
		$this->form_validation->set_rules('cli_id', 'Client Name', 'required|trim');
		$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('ppr_price', 'Discounted price', 'required|trim|decimal');
		$this->form_validation->set_rules('ppr_return_price', 'Return price', 'required|trim|decimal');
		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['ppr_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'ppr_id', $data, 'personalized_prices');

				$this->session->set_flashdata('msg_success', 'Updated Personalized Price!');	

				redirect('admin/personalized_prices/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/personalized_prices');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/personalized_prices/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Personalized Prices';
		$header['header'] = 'Personalized Prices';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['clients'] = $this->model_base->get_all('clients');
		$content['products'] = $this->model_base->get_all('products');

		$content['personalized_prices'] = $this->model_base->get_one($id, "ppr_id", "personalized_prices");

		$content['back'] = base_url('admin/personalized_prices');
		$content['edit'] = base_url() . 'admin/personalized_prices/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/personalized_prices/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Personalized Prices';
		$header['header'] = 'Personalized Prices';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['personalized_prices'] = $this->model_base->delete_data($id, 'ppr_id', 'ppr_status', 'personalized_prices');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/personalized_prices/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/personalized_prices/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_category_name($pro_id) {
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
	}

	
}