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
		$content['history'] = base_url('admin/sales/history');
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

		if ($this->session->userdata('selected_client') == NULL ) {
			$this->form_validation->set_rules('cli_id', 'Client Name hey', 'required|trim');
		}	
		
		if ( $this->input->post('client_mode') ) {
			//$content['select_client'] = $this->model_base->get_all('clients');
			$data_selected_client = $this->input->post();
			array_pop($data_selected_client);
			$content['select_client'] = $this->model_base->get_one($data_selected_client['cli_id'], "cli_id", "clients");
			$this->session->set_userdata("selected_client", $content['select_client'][0]['cli_id']);
		}
		

		$this->db->where('cli_status !=', 'deleted');
		if ( $this->session->userdata('acc_id') != 1 ) {
			$this->db->where('acc_id', $this->session->userdata('acc_id'));
		}

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

			if ($this->form_validation->run() == TRUE) {

				$data = $this->input->post();

				$content['products'] = array();
				$products = $this->model_base->like_data($data['pro_name'], 'pro_name', 'products');

				foreach ( $products as $product ) {
					$this->db->where('pro_id', $product['pro_id']);
					$this->db->where('cli_id', $this->session->userdata('selected_client'));
					$personalized_price = $this->model_base->get_all('personalized_prices');
					
					if ( isset($personalized_price[0]['ppr_price']) ) {
						$product['pro_price'] = $personalized_price[0]['ppr_price'];
					}

					array_push($content['products'], $product);
				}

			} else {

				$content['products'] = array();

				$products = $this->model_base->get_all('products');

				foreach ( $products as $product ) {
					$this->db->where('pro_id', $product['pro_id']);
					$this->db->where('cli_id', $this->session->userdata('selected_client'));
					$personalized_price = $this->model_base->get_all('personalized_prices');
					
					if ( isset($personalized_price[0]['ppr_price']) ) {
						$product['pro_price'] = $personalized_price[0]['ppr_price'];
					}

					array_push($content['products'], $product);
				}
			}	
		}

		if ( !$this->input->post('search_mode') ) {
			$content['products'] = array();

			$products = $this->model_base->get_all('products');
			foreach ( $products as $product ) {
				$this->db->where('pro_id', $product['pro_id']);
				$this->db->where('cli_id', $this->session->userdata('selected_client'));
				$personalized_price = $this->model_base->get_all('personalized_prices');
				
				if ( isset($personalized_price[0]['ppr_price']) ) {
					$product['pro_price'] = $personalized_price[0]['ppr_price'];
				}

				array_push($content['products'], $product);
			}
		}

		// echo "<pre>";
		// print_r ($content['products']);
		// echo "</pre>";

		

		if ( $this->input->post('save_mode') ) {
			$this->db->flush_cache();
			$this->form_validation->set_rules('cli_id', 'Client Name', 'required|trim');
			$this->form_validation->set_rules('sal_po_no', 'P.O No', 'trim');
			// $this->form_validation->set_rules('sal_so_no', 'S.I No', 'required|trim|is_unique[sales.sal_so_no]');

			$this->form_validation->set_rules('sal_checked_by', 'Checked and Release By', 'required|trim');
			$this->form_validation->set_rules('sal_agent', 'Agent', 'required|trim');
			// $this->form_validation->set_rules('sal_paid', 'Amount Paid', 'required|trim|decimal');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {

				if ( $this->cart->contents() != NULL ) {
					$sale = $this->input->post();
					array_pop($sale);

					$sale['acc_id'] = $this->session->userdata('acc_id');
					$sale['bra_id'] = $this->session->userdata('bra_id');
					$sale['sal_prepared_by'] = $sale['sal_checked_by'];
					$sale['sal_total'] = $this->cart->total();

					$this->session->set_userdata('sal_po_no',  $sale['sal_po_no']);

					$sale['sat_created'] = $this->getDatetimeNow();
					$sale['sal_status'] = 'draft';

					unset($sale['sal_po_no']);
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

					if ( $this->session->userdata('sal_po_no') == 'yes' ) {

						$PO['sal_id'] = $last_id;
						$this->model_base->insert_data($PO, 'sales_po');
						
						$last_id2 = $this->db->insert_id();

						$data2['sal_po_no'] = $last_id2;
						
						$this->model_base->update_data($PO['sal_id'], 'sal_id', $data2, 'sales');
						$this->session->unset_userdata('sal_po_no');
					}

					$this->rollback_price($this->session->userdata('selected_client'));
					$this->reset_sale_transaction();

					$this->session->set_flashdata('msg_success', 'Successful sale!');	
					redirect('admin/sales/','refresh');		

				} else {
					$content['msg_error'] = validation_errors();
				}
			}		
		}

		if ( $this->input->post('add_product') ) {	
			//validations
			$this->form_validation->set_rules('sti_qty', 'Product Quantity', 'required|trim|integer');
			$this->form_validation->set_rules('pro_id', 'Product ID', 'required|trim');
			$this->form_validation->set_rules('pro_name', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('pro_unit', 'Product Unit', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				array_pop($data);

				if ( $this->get_stocks_counts( $data['pro_id'], $this->session->userdata('bra_id'), 'published' ) >= $data['sti_qty'] ) {

					$category = $this->get_category_name($data['pro_id']);

					$cart = array (
						'id'      => $data['pro_id'],
			            'qty'     => $data['sti_qty'],
			            'price'   => $data['pro_price'],
			            'name'    => $data['pro_name'],	
			            'options' => array ('unit' => $data['pro_unit'], 'category' => $category)
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

	public function get_category_name($pro_id) {
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
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
		$content['controller'] = $this; 
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

		// echo $this->session->userdata('selected_client2');

		$this->db->where('cli_status !=', 'deleted');
		if ( $this->session->userdata('acc_id') != 1 ) {
			$this->db->where('acc_id', $this->session->userdata('acc_id'));
		}
		$content['clients'] = $this->model_base->get_all('clients');

		if ( $this->uri->segment(5) != NULL ) {
			$content['products'] = array();

				$products = $this->model_base->get_all('products');

				foreach ( $products as $product ) {
					$this->db->where('pro_id', $product['pro_id']);
					$this->db->where('cli_id', $this->session->userdata('selected_client2'));
					$personalized_price = $this->model_base->get_all('personalized_prices');
					
					if ( isset($personalized_price[0]['ppr_price']) ) {
						$product['pro_price'] = $personalized_price[0]['ppr_price'];
					}

					array_push($content['products'], $product);
				}
			
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
				$this->form_validation->set_rules('sal_agent', 'Agent', 'required|trim');
				$this->form_validation->set_rules('sal_total', 'Total Amount', 'required|trim|decimal');
			}

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				$data['sat_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'sal_id', $data, 'sales');
				$this->session->set_flashdata('msg_success', 'Updated Transfer!');	

				redirect('admin/sales', 'refresh');
			}
		} elseif ( $this->input->post('update_mode') ) {
			//validations
			$this->form_validation->set_rules('sai_id', 'Sales Infomation', 'required|trim');
			$this->form_validation->set_rules('sal_id', 'Sales Infomation', 'required|trim');
			$this->form_validation->set_rules('sai_old_qty', 'Original Price', 'required|trim');
			$this->form_validation->set_rules('sai_qty', 'Product Quantity', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('sai_price', 'Product Price', 'required|trim');
			$this->form_validation->set_rules('sai_remark', 'remark', 'trim');


			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data_update = $this->input->post();
				array_pop($data_update);

				$this->db->flush_cache();
				
				$old_qty = $this->get_stocks_counts( $data_update['pro_id'], $this->session->userdata('bra_id'), 'published' ) + $data_update['sai_old_qty'];
				
				if ( $old_qty >= $data_update['sai_qty'] ) {
					
					$old_data_sales = $this->model_base->get_one($data_update['sal_id'], "sal_id", "sales");
					$old_data_sales_info = $this->model_base->get_one($data_update['sai_id'], "sai_id", "sales_info");


					unset($data_update['sai_old_qty']);
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
					$this->rollback_price($this->session->userdata('selected_client2'));
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

		$this->session->set_userdata("selected_client2", $content['sales_info'][0]['cli_id']);
		//echo $content['sales_info'][0]['cli_id'];

		$content['controller'] = $this; 
		$content['back'] = base_url('admin/sales');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/edit', $content);
		$this->load->view("template/admin_footer");
	}


	public function get_stocks_counts ($pro_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$inventory_draft = 0;
		$sales_draft = 0;
		$broken_product = 0;
		$total = 0;

		// SUM ALL ADDED PRODUCTS
		// if ( $this->session->userdata('bra_id') == 1 ) {

		// 	$this->db->flush_cache();
			
		// 	// gets sum of all stocks
		// 	$this->db->select_sum('sti_qty');
		// 	$this->db->where('pro_id', $pro_id);
		// 	$this->db->where('bra_id', 1);
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
		$this->db->where('inventory_info.bra_id_to', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT PRODUCTS
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'sub');
		$this->db->where('inventory_info.bra_id_from', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks_sub = $overall_stocks_sub + $inventory[0]['ini_qty'];
		$total  = $overall_stocks - $overall_stocks_sub;

		$this->db->flush_cache();
		
		// gets sum of all stocks
		$this->db->select_sum('sti_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('stocks.bra_id', $bra_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('sales.bra_id', $bra_id);
		$this->db->where('sales.sal_status', 'published');
		$this->db->join('sales', 'sales.sal_id = sales_info.sal_id');
		$sales = $this->db->get('sales_info')->result_array();
		$total = $total - $sales[0]['sai_qty'];

		// echo "<pre>";
		// print_r ($total);
		// echo "</pre>";
		//get stocks pending transfer
		$this->db->flush_cache();
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_from', $bra_id);
		$this->db->where('int_status', 'approved');
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory_draft = $this->db->get('inventory_info')->result_array();
		// echo "<pre>";
		// print_r ($inventory_draft[0]['ini_qty']);
		// echo "</pre>";
		$total = $total - $inventory_draft[0]['ini_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('sales.bra_id', $bra_id);
		$this->db->where('sales.sal_status', 'draft');
		$this->db->join('sales', 'sales.sal_id = sales_info.sal_id');
		$sales_draft = $this->db->get('sales_info')->result_array();
		// echo "<pre>";
		// print_r ($sales_draft);
		// echo "</pre>";
		$total = $total - $sales_draft[0]['sai_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('bro_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('bra_id', $bra_id);
		$this->db->where('bro_status', 'published');
		$broken_product = $this->db->get('broken_products')->result_array();
		// echo "<pre>";
		// print_r ($broken_product);
		// echo "</pre>";
		$total = $total - $broken_product[0]['bro_qty'];

		// }

		return $total;
	}

	public function get_branchname ($bra_id) {
		$data = $this->model_base->get_one($bra_id, "bra_id", "branches");
		return $data[0]['bra_name'];
	}

	public function history($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Sales';
		$header['header'] = 'Sales';
		$header['header_small'] = '';
		
		$content = [];
		//$this->db->where('bra_status !=', 'deleted');
		if ( $this->session->userdata('acc_id') != 1 ) {
			$this->db->where('acc_id', $this->session->userdata('acc_id'));	
		}
		$content['clients'] = $this->model_base->get_all('clients');

		$content['branches'] = $this->model_base->get_all('branches');

		//$this->db->where('cat_status !=', 'deleted');
		$content['categories'] = $this->model_base->get_all('categories');

		//validations
		$this->form_validation->set_rules('bra_id', 'Branch Name', 'trim');
		$this->form_validation->set_rules('cli_id', 'Client Name', 'trim');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim');
		$this->form_validation->set_rules('date_from', 'date from', 'trim');
		$this->form_validation->set_rules('date_to', 'date to', 'trim');
		$this->form_validation->set_rules('pro_name', 'Product', 'trim');
		$this->form_validation->set_rules('sal_po_no', 'PO NO', 'trim');
		$this->form_validation->set_rules('sal_id', 'SO NO', 'trim');
		$this->form_validation->set_rules('sal_prepared_by', 'SO NO', 'trim');
		$this->form_validation->set_rules('sal_agent', 'Agent', 'trim');
		$this->form_validation->set_rules('pending', 'Pending', 'trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search = [];

				if ( $data['bra_id'] != 'all' ) {
					$this->db->where('sales.bra_id', $data['bra_id']);
				}

				if ( $data['cli_id'] != 'all' ) {
					$this->db->where('sales.cli_id', $data['cli_id']);
				}

				if ( $data['cat_id'] != 'all' ) {
					$this->db->where('products.cat_id', $data['cat_id']);
				}

				if ( isset($data['date_from']) && !empty($data['date_from']) ) {
					$this->db->where('sales.sat_created >=', date("Y\-m\-d\ H:i:s", strtotime($data['date_from'])));
				}

				if ( isset($data['date_to']) && !empty($data['date_to']) ) {
					$this->db->where('sales.sat_created <=', date("Y\-m\-d\ H:i:s", strtotime($data['date_to'] . ' +1 day')));
				}

				if ( isset($data['pro_name']) && !empty($data['pro_name']) && $data['pro_name'] != NULL ) {
					$this->db->where('products.pro_name', $data['pro_name']);
				}

				if ( isset($data['sal_po_no']) && !empty($data['sal_po_no']) && $data['sal_po_no'] != NULL ) {
					$this->db->where('sales.sal_po_no', $data['sal_po_no']);
				}

				if ( isset($data['sal_id']) && !empty($data['sal_id']) && $data['sal_id'] != NULL ) {
					$this->db->where('sales.sal_id', $data['sal_id']);
				}

				if ( isset($data['sal_prepared_by']) && !empty($data['sal_prepared_by']) && $data['sal_prepared_by'] != NULL ) {
					$this->db->like('sales.sal_prepared_by', $data['sal_prepared_by']);
				}

				if ( isset($data['sal_agent']) && !empty($data['sal_agent']) && $data['sal_agent'] != NULL ) {
					$this->db->like('sales.sal_agent', $data['sal_agent']);
				}

				if ( $data['pending'] == 'yes' ) {
					$this->db->where('sal_status !=', 'deleted');	
				} else {
					$this->db->where('sal_status', 'published');
				}


				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";
				

				if ( $data['export'] == 'yes' ) {

					unset($data['direct']);

					$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
					$this->db->join("clients", "clients.cli_id = sales.cli_id");
					$this->db->join("products", "products.pro_id = sales_info.pro_id");
					$this->db->join("categories", "categories.cat_id = products.cat_id");
					$this->db->join("branches", "branches.bra_id = sales.bra_id");
					$this->db->select('sales.sal_id, sal_po_no, cli_name, bra_name, cat_name, pro_name, sai_qty, sai_price, sai_sub_total, sal_total, sal_prepared_by, sal_agent, sat_created, sales.sal_status');
					$this->db->from('sales');
					$query = $this->db->get();
					$content['sales'] = $query->result_array();



					$this->load->library('excel');
					//activate worksheet number 1
			        $this->excel->setActiveSheetIndex(0);
			        //name the worksheet
			        $this->excel->getActiveSheet()->setTitle('Sales');
			 
			        // read data to active sheet
			        $col = array ('S.I No.', 'P.O No.', 'CLIENT', 'BRANCH', 'CATEGORY','PRODUCT', 'QTY', 'UNIT PRICE', 'SUB PRICE', 'TOTAL PRICE', 'PREPARED BY', 'AGENT', 'DATE', 'STATUS');
			        array_unshift($content['sales'], $col);
			        $this->excel->getActiveSheet()->fromArray($content['sales']);
			 
			        $filename='just_some_random_name.xls'; //save our workbook as this file name
			 
			        header('Content-Type: application/vnd.ms-excel'); //mime type
			 
			        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			 
			        header('Cache-Control: max-age=0'); //no cache
			                    
			        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			        //if you want to save it as .XLSX Excel 2007 format
			 
			        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			 
			        //force user to download the Excel file without writing it to server's HD
			        $objWriter->save('php://output');
				} else {
					unset($data['direct']);

					$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
					$this->db->join("clients", "clients.cli_id = sales.cli_id");
					$this->db->join("products", "products.pro_id = sales_info.pro_id");
					$this->db->join("categories", "categories.cat_id = products.cat_id");
					$this->db->join("branches", "branches.bra_id = sales.bra_id");
					$this->db->select('sal_agent, sal_prepared_by, sal_po_no, sales.sal_id, cli_name, bra_name, cat_name, pro_name, sai_qty, sai_price, sai_sub_total, sal_total, sat_created, sales.sal_status');
					$this->db->from('sales');
					$query = $this->db->get();
					$content['sales'] = $query->result_array();
				}

				// echo "<pre>";
				// print_r ($content['sales']);
				// echo "</pre>";

				// $result = array_merge($content['sales'], $content['stocks']);
				// $items_thread = array_unique($result, SORT_REGULAR);
				$newArray = array();
				foreach ($content['sales'] as $item) {
					$gag['qty'] = $item['sai_qty'];
					$gag['total'] = $item['sai_sub_total'];
					$gag['pro_name'] = $item['pro_name'];
					array_push($newArray, $gag);
				}	

				$content['products'] = array();
				foreach ($newArray as $value)
				{
				  if( ! isset($content['products'][$value['pro_name']]) )
				  {
				     $content['products'][$value['pro_name']] = 0;
				  }
				  $content['products'][$value['pro_name']] += $value['qty'];
				}

				$content['products_total'] = array();
				foreach ($newArray as $value)
				{
				  if( ! isset($content['products_total'][$value['pro_name']]) )
				  {
				     $content['products_total'][$value['pro_name']] = 0;
				  }
				  $content['products_total'][$value['pro_name']] += $value['total'];
				}
			}	
		} 

		

		$content['controller']=$this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/sales/history', $content);
		$this->load->view("template/admin_footer");


	}

	public function export() {
		$content = [];
		$content['controller']=$this; 

		// Load the table view into a variable
		$html = $this->load->view('admin/export/export_sales', $data, true);

		// Put the html into a temporary file
		$tmpfile = time().'.html';
		file_put_contents($tmpfile, $html);

		// Read the contents of the file into PHPExcel Reader class
		$reader = new PHPExcel_Reader_HTML; 
		$content = $reader->load($tmpfile); 

		// Pass to writer and output as needed
		$objWriter = PHPExcel_IOFactory::createWriter($content, 'Excel2007');
		$objWriter->save('excelfile.xlsx');

		// Delete temporary file
		unlink($tmpfile);
	}

	public function reset_sale_transaction () {
		$this->cart->destroy();
		$this->session->unset_userdata('selected_client');	
		redirect('admin/sales/create','refresh');
	}

	public function loadData() {
		$pro_id = $this->input->post('pro_id');
        
        $read = array();

		$products = $this->model_base->get_one($pro_id, "pro_id", "products");

		foreach ( $products as $product ) {
			$this->db->where('pro_id', $pro_id);
			$this->db->where('cli_id', $this->session->userdata('selected_client2'));
			$personalized_price = $this->model_base->get_all('personalized_prices');
			
			if ( isset($personalized_price[0]['ppr_price']) ) {
				$product['pro_price'] = $personalized_price[0]['ppr_price'];
			}

			array_push($read, $product);
		}

		echo json_encode($read);
	}

	public function rollback_price ($cli_id) {
		$this->db->flush_cache();	
		$this->db->where('cli_id', $cli_id);
		$personalized_prices = $this->model_base->get_all('personalized_prices');

		foreach ( $personalized_prices as $personalized_price ) {
			$personalized_price['ppr_price'] = $personalized_price['ppr_return_price'];

			$this->model_base->update_data($personalized_price['ppr_id'], 'ppr_id', $personalized_price, 'personalized_prices');
		}
	}

	public function delivered($id)
	{
		$data['sal_status'] = 'published';
		$data['sat_updated'] = $this->getDatetimeNow();
		$this->model_base->update_data($id, 'sal_id', $data, 'sales');

		$this->session->set_flashdata('msg_success', 'Products Delivered!');	
		redirect('admin/sales/','refresh');
	}
}