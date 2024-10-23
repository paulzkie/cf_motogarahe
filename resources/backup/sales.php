<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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

		if ( $this->session->userdata('cart_type') != 'sales' ) {
			$this->cart->destroy();
		}
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Sales';
		$header['header'] = 'Sales';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('sal_id', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('sal_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('sal_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('sal_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('sal_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/sales/index/";
			$total_row = $this->model_base->count_data('sales');
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
			$this->db->where('sal_status !=', 'deleted');
		}
		if ( $this->session->userdata('bra_id') != 1 ) {
			$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		}
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		//validations
		$this->form_validation->set_rules('sal_id', 'Sales ID', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['sales'] = $this->model_base->like_data($data['sal_id'], 'sal_id', 'sales');
			}	
		} else {
			$content['sales'] = $this->model_base->get_all('sales');
		}

		$content['controller']=$this; 
		$content['all'] = base_url('admin/sales/index/all');
		$content['published'] = base_url('admin/sales/index/published');
		$content['draft'] = base_url('admin/sales/index/draft');
		$content['deleted'] = base_url('admin/sales/index/deleted');
		$content['create'] = base_url('admin/sales/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create($filter = 1)
	{

		$header = [];
		$header['header_title'] = 'Sales';
		$header['header'] = 'Sales';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('cli_status !=', 'deleted');
		$content['clients'] = $this->model_base->get_all('clients');

		$this->db->order_by('pro_name', 'ASC'); //DESC
		if (is_numeric($filter)) {
			$config = array();
			$config["base_url"] = base_url() . "admin/sales/create/";
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
				redirect('admin/sales/create','refresh');
			} else {
				$data = array(
					'rowid'   => $filter,
					'qty'     => 0
				);
				$this->cart->update($data); 
			}	
		}

		$this->db->where('pro_status !=', 'deleted');
		$this->db->join("categories", "categories.cat_id = products.cat_id");

		if ( $this->input->post('search_mode') ) {
			//validations
			$this->form_validation->set_rules('pro_name', 'Product Name', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['products'] = $this->model_base->get_all('products');
			} else {
				$data = $this->input->post();
				$content['products'] = $this->model_base->like_data($data['pro_name'], 'pro_name', 'products');
			}	
		}

		if ( !$this->input->post('search_mode') ) {
			$content['products'] = $this->model_base->get_all('products');
		}

		if ( $this->input->post('save_mode') ) {
			$this->db->flush_cache();
			$this->form_validation->set_rules('cli_id', 'Client Name', 'required|trim');
			$this->form_validation->set_rules('sal_checked_by', 'Checked and Release By', 'required|trim');
			$this->form_validation->set_rules('sal_paid', 'Amount Paid', 'required|trim|decimal');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {

				if ( $this->cart->contents() != NULL ) {
					$sale = $this->input->post();
					array_pop($sale);

					$sale['acc_id'] = $this->session->userdata('acc_id');
					//$sale['acc_id_to'] = ;
					$sale['bra_id'] = $this->session->userdata('bra_id');
					$sale['sal_prepared_by'] = $sale['sal_checked_by'];
					$sale['sal_total'] = $this->cart->total();
					$sale['sal_change'] = $sale['sal_paid'] - $sale['sal_total'];

					if ( $sale['sal_paid'] >= $sale['sal_total']) {
						//$sale['int_created'] = $this->getDatetimeNow();

						$this->model_base->insert_data($sale, 'sales');

						$last_id = $this->db->insert_id();

						foreach ( $this->cart->contents() as $item ) {
							$data = [];
							$data['sal_id'] = $last_id;
							$data['pro_id'] = $item['id'];
							$data['bra_id'] = $this->session->userdata('bra_id');
							$data['sai_qty'] = $item['qty']; 
							$data['sai_price'] = $item['price'];
							$data['sai_sub_total'] = $item['subtotal'];

							$this->model_base->insert_data($data, 'sales_info');
						}

						$this->cart->destroy();
						$this->session->set_flashdata('msg_success', 'Successful sale!');	
						redirect('admin/sales/','refresh');
					} else {
						$content['msg_error'] = 'insufiscient Amount Paid';
					}
				} else {
					$content['msg_error'] = validation_errors();
				}
			}		
		}

		if ( $this->input->post('add_product') ) {	
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

				if ( $this->get_stocks_counts( $data['pro_id'], $this->session->userdata('bra_id'), 'published' ) >= $data['sti_qty'] ) {
					$cart = array (
						'id'      => $data['pro_id'],
			            'qty'     => $data['sti_qty'],
			            'price'   => $data['pro_price'],
			            'name'    => $data['pro_name'],	
			            'options' => array ('unit' => $data['pro_unit'])
					);
					$this->cart->insert($cart);

					$this->session->set_userdata('cart_type', 'sales');
				} else {
					$content['msg_error'] = 'insufiscient stocks!';
				}
				
			}
		}

		$content['controller'] = $this; 
		$content['back'] = base_url('admin/sales');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Sales';
		$header['header'] = 'Sales';
		$header['header_small'] = 'View';
		
		$content = [];

		//$this->db->join("stocks", "stocks.sto_id = stocks_info.sto_id");
		
		$content['clients'] = $this->model_base->get_all('clients');

		$this->db->join("sales", "sales.sal_id = sales_info.sal_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("products", "products.pro_id = sales_info.pro_id");
		$content['sales_info'] = $this->model_base->get_one($id, "sales_info.sal_id", "sales_info");

		$content['back'] = base_url('admin/sales');
		$content['edit'] = base_url() . 'admin/sales/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{

		$header = [];
		$header['header_title'] = 'Sales';
		$header['header'] = 'Sales';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$content['clients'] = $this->model_base->get_all('clients');

		if ( $this->uri->segment(5) != NULL ) {
			$content['products'] = $this->model_base->get_all('products');
			
			if ( $this->uri->segment(5) == 'add_product' ) {

			} else {
				$this->db->flush_cache();

				$content['sales_updates'] = $this->model_base->get_one($this->uri->segment(5), "sai_id", "sales_info");
			}
		} 

		if($this->input->post('save_mode')) {
			//validations
			$this->db->flush_cache();

			if ( $this->session->userdata('acc_id') == 1 ) {
				$this->form_validation->set_rules('cli_id', 'Client Name', 'required|trim');
				$this->form_validation->set_rules('sal_checked_by', 'Checked and Release By', 'required|trim');
				$this->form_validation->set_rules('sal_paid', 'Amount Paid', 'required|trim|decimal');
				$this->form_validation->set_rules('sal_total', 'Total Amount', 'required|trim|decimal');
				$this->form_validation->set_rules('sal_change', 'Change Amount', 'required|trim|decimal');
			}

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				$data['sat_updated'] = $this->getDatetimeNow();

				if ( $data['sal_paid'] >= $data['sal_total']) { 

					$data['sal_change'] = $data['sal_paid'] - $data['sal_total'];

					$this->model_base->update_data($id, 'sal_id', $data, 'sales');
					$this->session->set_flashdata('msg_success', 'Updated Transfer!');	
					redirect('admin/sales', 'refresh');
				} else {
					$content['msg_error'] = 'insufiscient Amount Paid';
				}
			}
		} elseif ( $this->input->post('update_mode') ) {
			//validations
			$this->form_validation->set_rules('sai_id', 'Sales Infomation', 'required|trim');
			$this->form_validation->set_rules('sal_id', 'Sales Infomation', 'required|trim');
			$this->form_validation->set_rules('sai_qty', 'Product Quantity', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('sai_price', 'Product Price', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data_update = $this->input->post();
				array_pop($data_update);

				$this->db->flush_cache();
				
				if ( $this->get_stocks_counts( $data_update['pro_id'], $this->session->userdata('bra_id'), 'draft' ) >= $data_update['sai_qty'] ) {
					
					$old_data_sales = $this->model_base->get_one($data_update['sal_id'], "sal_id", "sales");
					$old_data_sales_info = $this->model_base->get_one($data_update['sai_id'], "sai_id", "sales_info");

					$data = [];

					$this->db->flush_cache();
					$data['sal_total'] = ($old_data_sales[0]['sal_total'] - $old_data_sales_info[0]['sai_sub_total']) + ($data_update['sai_qty'] * $data_update['sai_price']);

					$this->model_base->update_data($data_update['sal_id'], 'sal_id', $data, 'sales');

					$this->db->flush_cache();
					$data_update['sai_sub_total'] = $data_update['sai_qty'] * $data_update['sai_price'];

					$this->model_base->update_data($data_update['sai_id'], 'sai_id', $data_update, 'sales_info');

					$this->session->set_flashdata('msg_success', 'Updated Sales!');	
					redirect('admin/sales/edit/' . $id, 'refresh');
				} else {
					$this->session->set_flashdata('msg_error', 'Insufficient Stocks!');	
					redirect('admin/sales/edit/' . $id, 'refresh');
				}


				
			}
		} elseif ( $this->input->post('cart_mode') ) {
			//validations
			$this->form_validation->set_rules('sal_id', 'Sales Infomation', 'required|trim');
			$this->form_validation->set_rules('sai_qty', 'Product Quantity', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('sai_price', 'Product Price', 'required|trim|decimal');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = [];

				$data = $this->input->post();
				array_pop($data);
				
				$this->db->flush_cache();
				if ( $this->get_stocks_counts( $data['pro_id'], $this->session->userdata('bra_id'), 'draft' ) >= $data['sai_qty'] ) {

					$old_data_sales = $this->model_base->get_one($data['sal_id'], "sal_id", "sales");
					$data['sai_sub_total'] = $data['sai_qty'] * $data['sai_price'];
					$this->db->flush_cache();
					$this->model_base->insert_data($data, 'sales_info');

					$data_update = [];
					$this->db->flush_cache();
					$data_update['sal_total'] = ($old_data_sales[0]['sal_total']) + ($data['sai_qty'] * $data['sai_price']);
					$this->model_base->update_data($data['sal_id'], 'sal_id', $data_update, 'sales');

					$this->session->set_flashdata('msg_success', 'Updated Stock!');	
					redirect('admin/sales/edit/' . $id, 'refresh');
				} else {
					$this->session->set_flashdata('msg_error', 'Insufficient Stocks!');	
					redirect('admin/sales/edit/' . $id, 'refresh');
				}
			}
		}

		$this->db->join("sales", "sales.sal_id = sales_info.sal_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("products", "products.pro_id = sales_info.pro_id");
		$content['sales_info'] = $this->model_base->get_one($id, "sales_info.sal_id", "sales_info");

		$content['controller'] = $this; 
		$content['back'] = base_url('admin/sales');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($pro_id, $acc_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$total = 0;

		// SUM ALL ADDED PRODUCTS
		// if ( $this->session->userdata('bra_id') == 1 ) {

		// 	$this->db->flush_cache();
			
		// 	// gets sum of all stocks
		// 	$this->db->select_sum('sti_qty');
		// 	$this->db->where('pro_id', $pro_id);
		// 	$this->db->where('acc_id', 1);
		// 	$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		// 	$warehouse = $this->db->get('stocks_info')->result_array();
		// 	$overall_stocks = $overall_stocks + $warehouse[0]['sti_qty'];

		// 	$this->db->flush_cache();

		// 	//SUM ALL SUBTRACT PRODUCTS
		// 	$this->db->select_sum('ini_qty');
		// 	$this->db->where('pro_id', $pro_id);
		// 	$this->db->where('ini_type', 'sub');
		// 	$this->db->where('inventory_info.bra_id_from', 1);
		// 	$this->db->where('int_status', 'published');
		// 	$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		// 	$inventory = $this->db->get('inventory_info')->result_array();
		// 	$total = $overall_stocks - $inventory[0]['ini_qty'];
		// } else {

		$this->db->flush_cache();
			
		// gets sum of all inventory
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_to', $acc_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT PRODUCTS
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'sub');
		$this->db->where('inventory_info.bra_id_from', $acc_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks_sub = $overall_stocks_sub + $inventory[0]['ini_qty'];
		$total  = $overall_stocks - $overall_stocks_sub;

		$this->db->flush_cache();
		
		// gets sum of all stocks
		$this->db->select_sum('sti_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('stocks.acc_id', $acc_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('sales.acc_id', $acc_id);
		$this->db->join('sales', 'sales.sal_id = sales_info.sal_id');
		$sales = $this->db->get('sales_info')->result_array();
		$total = $total - $sales[0]['sai_qty'];

		// }

		return $total;
	}

	public function get_branchname ($bra_id) {
		$data = $this->model_base->get_one($bra_id, "bra_id", "branches");
		return $data[0]['bra_name'];
	}
}