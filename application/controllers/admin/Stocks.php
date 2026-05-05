<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination', 'cart'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->have_sess_main();

		if ( $this->session->userdata('cart_type') != 'stocks' ) {
			$this->cart->destroy();
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Warehouse';
		$header['header'] = 'Warehouse';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('sto_id', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('sto_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('sto_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('sto_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('sto_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/stocks/index/";
			$total_row = $this->model_base->count_data('stocks');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 50;
			$config['uri_segment'] = 4;
			$config['num_links'] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = 'Next';

			$this->pagination->initialize($config);
	
			$offset = ($filter - 1) * $config["per_page"];
			$this->db->limit( $config["per_page"] , $offset);
			$this->db->where('sto_status !=', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('sto_id', 'Stock ID', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['stocks'] = $this->model_base->like_data($data['sto_id'], 'sto_id', 'stocks');
			}	
		} else {
			$content['stocks'] = $this->model_base->get_all('stocks');
		}

		$content['all'] = base_url('admin/stocks/index/all');
		$content['published'] = base_url('admin/stocks/index/published');
		$content['draft'] = base_url('admin/stocks/index/draft');
		$content['deleted'] = base_url('admin/stocks/index/deleted');
		$content['create'] = base_url('admin/stocks/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/stocks/index', $content);
		$this->load->view("template/admin_footer");
	}

	

	public function create($filter = 1)
	{

		$header = [];
		$header['header_title'] = 'Warehouse';
		$header['header'] = 'Warehouse';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		$this->db->order_by('pro_name', 'ASC'); //DESC
		if (is_numeric($filter)) {
			$config = array();
			$config["base_url"] = base_url() . "admin/stocks/create/";
			$total_row = $this->model_base->count_data('products');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['num_links'] = $total_row;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = 'Next';

			$this->pagination->initialize($config);
	
			$offset = ($filter - 1) * $config["per_page"];
			$this->db->limit( $config["per_page"] , $offset);
			
		} else {
			if ( $filter == 'cancel' ) {
				$this->cart->destroy();
				redirect('admin/stocks/create','refresh');
			} else {
				$data = array(
					'rowid'   => $filter,
					'qty'     => 0
				);
				$this->cart->update($data); 
			}	
		}

		$this->db->where('pro_status !=', 'deleted');
		//$this->db->join("categories", "categories.cat_id = products.cat_id");

		if ( $this->input->post('search_mode') ) {
			//validations
			$this->form_validation->set_rules('pro_name', 'Product Name', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['products'] = $this->model_base->get_all('products');
			} else {
				$data = $this->input->post();
				$content['products'] = $this->model_base->like_data($data['pro_name'], 'pro_name', 'products');
			}	
		} elseif ( $this->input->post('add_product') ) {	
			//validations
			$this->form_validation->set_rules('sti_qty', 'Product Quantity', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product ID', 'required|trim');
			$this->form_validation->set_rules('pro_name', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('pro_unit', 'Product Unit', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				array_pop($data);

				$category = $this->get_category_name($data['pro_id']);

				$cart = array (
							'id'      => $data['pro_id'],
				            'qty'     => $data['sti_qty'],
				            'price'   => 1,
				            'name'    => $data['pro_name'],	
				            'options' => array ('unit' => $data['pro_unit'], 'category' => $category)
						);
				$this->cart->insert($cart);

				$this->session->set_userdata('cart_type', 'stocks');
			}
		}

		if ( !$this->input->post('search_mode') ) {
			$content['products'] = $this->model_base->get_all('products');
		}

		if ( $this->input->post('save_mode') ) {
			$this->form_validation->set_rules('sto_from', 'Company Name', 'required|trim');
			$this->form_validation->set_rules('bra_id', 'To Branch', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {

				if ( $this->cart->contents() != NULL ) {
					$stock = $this->input->post();
					array_pop($stock);

					$stock['sto_status'] = 'published';
					$stock['sto_created'] = $this->getDatetimeNow();

					$stock_return = $this->model_base->insert_data($stock, 'stocks');

					$last_id = $this->db->insert_id();

					foreach ( $this->cart->contents() as $item ) {

						$data['sto_id'] = $last_id;
						$data['pro_id'] = $item['id'];
						$data['sti_qty'] = $item['qty'];

						$this->model_base->insert_data($data, 'stocks_info');
					}

					$this->cart->destroy();
					$this->session->set_flashdata('msg_success', 'Warehouse Updated!');	
					redirect('admin/stocks/','refresh');
				} else {
					$content['msg_error'] = validation_errors();
				}
			}		
		}

		$content['back'] = base_url('admin/stocks');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/stocks/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$this->have_sess_superadmin();

		$header = [];
		$header['header_title'] = 'Warehouse';
		$header['header'] = 'Warehouse';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		if ( $this->uri->segment(5) != NULL ) {
			$this->db->where('pro_status !=', 'deleted');
			$content['products'] = $this->model_base->get_all('products');
			
			if ( $this->uri->segment(5) == 'add_product' ) {

			} else {
				$content['stocks_updates'] = $this->model_base->get_one($this->uri->segment(5), "sti_id", "stocks_info");
			}
		} 

		if($this->input->post('save_mode')) {
			//validations
			$this->form_validation->set_rules('sto_from', 'Company Name', 'required|trim');
			$this->form_validation->set_rules('sto_status', 'Stock Status', 'required|trim');
			$this->form_validation->set_rules('bra_id', 'To Branch', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				$data['sto_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'sto_id', $data, 'stocks');

				$this->session->set_flashdata('msg_success', 'Updated Stock!');	

				redirect('admin/stocks', 'refresh');
			}
		} elseif ( $this->input->post('update_mode') ) {
			//validations
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('sti_qty', 'Product Quantity', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);

				$this->model_base->update_data($this->uri->segment(5), 'sti_id', $data, 'stocks_info');
				$this->session->set_flashdata('msg_success', 'Updated Stock!');	
				redirect('admin/stocks/edit/' . $id, 'refresh');
			}
		} elseif ( $this->input->post('cart_mode') ) {
			//validations
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('sti_qty', 'Product Quantity', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				$data['sto_id'] = $id;

				$this->model_base->insert_data($data, 'stocks_info');

				$this->session->set_flashdata('msg_success', 'Updated Stock!');	
				redirect('admin/stocks/edit/' . $id, 'refresh');
			}
		}

		$this->db->join("products", "products.pro_id = stocks_info.pro_id");
		$this->db->join("stocks", "stocks.sto_id = stocks_info.sto_id");
		$content['stocks_infos'] = $this->model_base->get_one($id, "stocks_info.sto_id", "stocks_info");

		$content['back'] = base_url('admin/stocks');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/stocks/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Warehouse';
		$header['header'] = 'Warehouse';
		$header['header_small'] = 'View';
		
		$content = [];
		$content['branches'] = $this->model_base->get_all('branches');

		//$this->db->join("stocks", "stocks.sto_id = stocks_info.sto_id");
		
		$this->db->join("products", "products.pro_id = stocks_info.pro_id");
		$this->db->join("stocks", "stocks.sto_id = stocks_info.sto_id");
		$content['stocks_infos'] = $this->model_base->get_one($id, "stocks_info.sto_id", "stocks_info");

		$content['back'] = base_url('admin/stocks');
		$content['edit'] = base_url() . 'admin/stocks/edit/' . $id;
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/stocks/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$this->have_sess_superadmin();

		$header = [];
		$header['header_title'] = 'Warehouse';
		$header['header'] = 'Warehouse';
		$header['header_small'] = 'Delete';
		
		$content = [];

		$content['stocks'] = $this->model_base->delete_data($id, 'sto_id', 'sto_status', 'stocks');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/stocks/','refresh');
	}

	public function get_category_name($pro_id) {
		$this->db->flush_cache();
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
	}
}

