<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfers extends CI_Controller {

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

		if ( $this->session->userdata('cart_type') != 'transfers' ) {
			$this->cart->destroy();
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('int_id', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('int_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('int_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('int_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('int_status', 'deleted');
			} elseif ( $filter == 'approved' ) {
				$this->db->where('int_status', 'approved');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/transfers/index/";
			$total_row = $this->model_base->count_data('inventory');
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
			$this->db->where('int_status !=', 'deleted');
		}
		if ( $this->session->userdata('bra_id') != 1 ) {
			$this->db->where('bra_id_to', $this->session->userdata('bra_id'));
			$this->db->or_where('bra_id_from',  $this->session->userdata('bra_id')); 
		}
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");

		//validations
		$this->form_validation->set_rules('int_id', 'Transfer ID', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['inventory'] = $this->model_base->like_data($data['int_id'], 'int_id', 'inventory');
			}	
		} else {
			$content['inventory'] = $this->model_base->get_all('inventory');
		}
		$content['controller']=$this; 
		$content['all'] = base_url('admin/transfers/index/all');
		$content['approved'] = base_url('admin/transfers/index/approved');
		$content['published'] = base_url('admin/transfers/index/published');
		$content['draft'] = base_url('admin/transfers/index/draft');
		$content['deleted'] = base_url('admin/transfers/index/deleted');
		$content['create'] = base_url('admin/transfers/create');
		$content['history'] = base_url('admin/transfers/history');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/transfers/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create($filter = 1)
	{

		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		$this->db->order_by('pro_name', 'ASC'); //DESC
		if (is_numeric($filter)) {
			$config = array();
			$config["base_url"] = base_url() . "admin/transfers/create/";
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
				redirect('admin/transfers/create','refresh');
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
			$this->form_validation->set_rules('bra_id_to', 'Branch Name', 'required|trim');
			// $this->form_validation->set_rules('int_dr', 'D/R No', 'required|trim|is_unique[inventory.int_dr]');
			//$this->form_validation->set_rules('int_ts', 'Transfer Slip', 'required|trim|is_unique[inventory.int_ts]');

			$this->form_validation->set_rules('int_pickup_by', 'Picked Up By', 'required|trim');
			$this->form_validation->set_rules('int_delivered_by', 'Delivered By', 'required|trim');
			$this->form_validation->set_rules('int_checked_and_released_by', 'Checked and Release By', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {

				if ( $this->cart->contents() != NULL ) {
					$transfer = $this->input->post();
					array_pop($transfer);

					$transfer['acc_id_from'] = $this->session->userdata('acc_id');
					//$transfer['acc_id_to'] = ;
					$transfer['bra_id_from'] = $this->session->userdata('bra_id');
					$transfer['int_prepared_by'] = $this->session->userdata('acc_name');
					$transfer['int_status'] = 'approved';
					$transfer['int_approved_by'] = 'Christian Uy';
					$transfer['int_created'] = $this->getDatetimeNow();

					$this->model_base->insert_data($transfer, 'inventory');

					$last_id = $this->db->insert_id();

					foreach ( $this->cart->contents() as $item ) {

						$data['int_id'] = $last_id;
						$data['pro_id'] = $item['id'];
						$data['ini_qty'] = $item['qty']; 
						$data['bra_id_from'] = $transfer['bra_id_from']; 
						$data['bra_id_to'] = $transfer['bra_id_to']; 
						$data['ini_type'] = 'sub'; 

						$this->model_base->insert_data($data, 'inventory_info');

						$data['bra_id_from'] = $transfer['bra_id_from']; 
						$data['int_id'] = $last_id;
						$data['pro_id'] = $item['id'];
						$data['ini_qty'] = $item['qty']; 
						$data['bra_id_to'] = $transfer['bra_id_to']; 
						$data['ini_type'] = 'add'; 

						$this->model_base->insert_data($data, 'inventory_info');
					}

					$this->cart->destroy();
					$this->session->set_flashdata('msg_success', 'Warehouse Updated!');	
					redirect('admin/transfers/','refresh');
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

				$category = $this->get_category_name($data['pro_id']);

				if ( $this->get_stocks_counts( $data['pro_id'], $this->session->userdata('bra_id'), 'published' ) >= $data['sti_qty'] ) {
					$cart = array (
						'id'      => $data['pro_id'],
			            'qty'     => $data['sti_qty'],
			            'price'   => 1,
			            'name'    => $data['pro_name'],	
			            'options' => array ('unit' => $data['pro_unit'], 'category' => $category)
					);
					$this->cart->insert($cart);

					$this->session->set_userdata('cart_type', 'transfers');
				} else {
					$content['msg_error'] = 'insufiscient stocks!';
				}
				
			}
		}

		$content['controller'] = $this; 
		$content['back'] = base_url('admin/transfers');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/transfers/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_category_name($pro_id) {
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
	}

	public function edit($id)
	{

		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		if ( $this->uri->segment(5) != NULL ) {
			$content['products'] = $this->model_base->get_all('products');
			
			if ( $this->uri->segment(5) == 'add_product' ) {

			} else {
				$this->db->flush_cache();

				$content['inventory_updates'] = $this->model_base->get_one($this->uri->segment(5), "ini_id", "inventory_info");
			}
		} 

		if($this->input->post('save_mode')) {
			//validations
			$this->db->flush_cache();

			if ( $this->session->userdata('acc_id') == 1 ) {
				$this->form_validation->set_rules('bra_id_to', 'Branch Name', 'required|trim');
				// $this->form_validation->set_rules('int_dr', 'D/R No', 'required|trim');
				//$this->form_validation->set_rules('int_ts', 'Transfer Slip', 'required|trim');

				$this->form_validation->set_rules('int_pickup_by', 'Picked Up By', 'required|trim');
				$this->form_validation->set_rules('int_delivered_by', 'Delivered By', 'required|trim');
				$this->form_validation->set_rules('int_checked_and_released_by', 'Checked and Release By', 'required|trim');
				$this->form_validation->set_rules('int_approved_by', 'Approve By', 'trim');
			}

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				$data['int_updated'] = $this->getDatetimeNow();

				if ( $data['int_approved_by'] != '') {

					$data['int_status'] = 'approved';
				}

				$this->model_base->update_data($id, 'int_id', $data, 'inventory');

				$this->db->flush_cache();

				$this->db->where('int_id', $id);
				$this->db->where('ini_type', 'add');
				$inventory_infos_add = $this->model_base->get_all('inventory_info');


				$this->db->flush_cache();

				$this->db->where('int_id', $id);
				$this->db->where('ini_type', 'sub');
				$inventory_infos_sub = $this->model_base->get_all('inventory_info');

				foreach ($inventory_infos_add as $item) {
					$update_product['bra_id_to'] = $data['bra_id_to'];
					$this->model_base->update_data($item['ini_id'], 'ini_id', $update_product, 'inventory_info');
				}

				$this->db->flush_cache();

				foreach ($inventory_infos_sub as $item) {
					$update_product['bra_id_to'] = $data['bra_id_to'];
					$this->model_base->update_data($item['ini_id'], 'ini_id', $update_product, 'inventory_info');
				}

				$this->session->set_flashdata('msg_success', 'Updated Transfer!');	

				redirect('admin/transfers', 'refresh');
			}
		} elseif ( $this->input->post('update_mode') ) {
			//validations
			$this->form_validation->set_rules('ini_id', 'Inventory Information', 'required|trim');
			$this->form_validation->set_rules('bra_id_from', 'From Branch Name', 'required|trim');
			$this->form_validation->set_rules('bra_id_to', 'To Branch Name', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('ini_qty', 'Product Quantity', 'required|trim');
			$this->form_validation->set_rules('ini_remark', 'Remark', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data_update = $this->input->post();
				array_pop($data_update);
				
				$old_data2 = $this->model_base->get_one($data_update['ini_id'], "ini_id", "inventory_info");
				$old_data = $old_data2;

				$this->db->flush_cache();

				$this->db->where('int_id', $old_data[0]['int_id']);
				$this->db->where('pro_id', $old_data[0]['pro_id']);
				$this->db->where('ini_type', 'sub');
				$this->db->delete('inventory_info'); 

				$this->db->flush_cache();

				$this->db->where('int_id', $old_data[0]['int_id']);
				$this->db->where('pro_id', $old_data[0]['pro_id']);
				$this->db->where('ini_type', 'add');
				$this->db->delete('inventory_info'); 
 
				$this->db->flush_cache();

				$data_sub['int_id'] = $old_data[0]['int_id'];
				$data_sub['pro_id'] = $data_update['pro_id'];
				$data_sub['ini_qty'] = $old_data[0]['ini_qty']; 
				$data_sub['bra_id_from'] = $data_update['bra_id_to']; 
				$data_sub['bra_id_to'] = $data_update['bra_id_from']; 
				$data_sub['ini_remark'] = $data_update['ini_remark']; 
				$data_sub['ini_type'] = 'sub'; 
				
				$this->model_base->insert_data($data_sub, 'inventory_info');
				$last_id1 = $this->db->insert_id();

				$this->db->flush_cache();

				$data_add['bra_id_from'] = $data_update['bra_id_to']; 
				$data_add['int_id'] = $old_data[0]['int_id'];
				$data_add['pro_id'] = $data_update['pro_id'];
				$data_add['ini_qty'] = $old_data[0]['ini_qty']; 
				$data_add['bra_id_to'] = $data_update['bra_id_from']; 
				$data_add['ini_remark'] = $data_update['ini_remark']; 
				$data_add['ini_type'] = 'add'; 
				
				$this->model_base->insert_data($data_add, 'inventory_info');
				$last_id2 = $this->db->insert_id();

				$this->db->flush_cache();

				if ( $this->get_stocks_counts( $data_update['pro_id'], $this->session->userdata('bra_id'), 'draft' ) >= $data_update['ini_qty'] ) {
					
					$this->db->flush_cache();
					$data_sub['ini_qty'] = $data_update['ini_qty']; 
					$data_sub['bra_id_from'] = $data_update['bra_id_from']; 
					$data_sub['bra_id_to'] = $data_update['bra_id_to']; 
					$data_sub['ini_remark'] = $data_update['ini_remark']; 
					$this->model_base->insert_data($data_sub, 'inventory_info');

					$this->db->flush_cache();
					$data_add['ini_qty'] = $data_update['ini_qty']; 
					$data_add['bra_id_from'] = $data_update['bra_id_from']; 
					$data_add['bra_id_to'] = $data_update['bra_id_to'];
					$data_add['ini_remark'] = $data_update['ini_remark']; 
					$this->model_base->insert_data($data_add, 'inventory_info');

					$this->db->flush_cache();

					$this->db->where('ini_id', $last_id1);
					$this->db->delete('inventory_info');

					$this->db->flush_cache();

					$this->db->where('ini_id', $last_id2);
					$this->db->delete('inventory_info'); 

					$this->session->set_flashdata('msg_success', 'Updated Transfer!');	
					redirect('admin/transfers/edit/' . $id, 'refresh');
				} else {
					$data_sub['int_id'] = $old_data[0]['int_id'];
					$data_sub['pro_id'] = $old_data[0]['pro_id'];
					$data_sub['ini_qty'] = $old_data[0]['ini_qty']; 
					$data_sub['bra_id_from'] = $old_data[0]['bra_id_from']; 
					$data_sub['bra_id_to'] = $old_data[0]['bra_id_to']; 
					$data_sub['ini_remark'] = $data_update['ini_remark']; 
					$data_sub['ini_type'] = 'sub'; 

					$this->model_base->insert_data($data_sub, 'inventory_info');

					$this->db->flush_cache();

					$data_add['bra_id_from'] = $old_data[0]['bra_id_from']; 
					$data_add['int_id'] = $old_data[0]['int_id'];
					$data_add['pro_id'] = $old_data[0]['pro_id'];
					$data_add['ini_qty'] = $old_data[0]['ini_qty']; 
					$data_add['bra_id_to'] = $old_data[0]['bra_id_to']; 
					$data_add['ini_remark'] = $data_update['ini_remark']; 
					$data_add['ini_type'] = 'add'; 

					$this->model_base->insert_data($data_add, 'inventory_info');

					$this->db->flush_cache();

					$this->db->where('ini_id', $last_id1);
					$this->db->delete('inventory_info');

					$this->db->flush_cache();

					$this->db->where('ini_id', $last_id2);
					$this->db->delete('inventory_info'); 

					$this->session->set_flashdata('msg_error', 'Insufficient Stocks!');	
					redirect('admin/transfers/edit/' . $id, 'refresh');
				}


				
			}
		} elseif ( $this->input->post('cart_mode') ) {
			//validations
			$this->form_validation->set_rules('int_id', 'Inventory Information', 'required|trim');
			$this->form_validation->set_rules('bra_id_from', 'From Branch Name', 'required|trim');
			$this->form_validation->set_rules('bra_id_to', 'To Branch Name', 'required|trim');
			$this->form_validation->set_rules('pro_id', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('ini_qty', 'Product Quantity', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);
				
				if ( $this->get_stocks_counts( $data['pro_id'], $this->session->userdata('bra_id'), 'draft' ) >= $data['ini_qty'] ) {
					
					$data_sub['int_id'] = $data['int_id'];
					$data_sub['pro_id'] = $data['pro_id'];
					$data_sub['ini_qty'] = $data['ini_qty']; 
					$data_sub['bra_id_from'] = $data['bra_id_from']; 
					$data_sub['bra_id_to'] = $data['bra_id_to']; 
					$data_sub['ini_type'] = 'sub'; 

					$this->model_base->insert_data($data_sub, 'inventory_info');

					$this->db->flush_cache();

					$data_add['bra_id_from'] = $data['bra_id_from']; 
					$data_add['int_id'] = $data['int_id'];
					$data_add['pro_id'] = $data['pro_id'];
					$data_add['ini_qty'] = $data['ini_qty']; 
					$data_add['bra_id_to'] = $data['bra_id_to']; 
					$data_add['ini_type'] = 'add'; 

					$this->model_base->insert_data($data_add, 'inventory_info');

					$this->session->set_flashdata('msg_success', 'Updated Stock!');	
					redirect('admin/transfers/edit/' . $id, 'refresh');
				} else {
					$this->session->set_flashdata('msg_error', 'Insufficient Stocks!');	
					redirect('admin/transfers/edit/' . $id, 'refresh');
				}
			}
		}

		$this->db->where('ini_type', 'sub');
		$this->db->join("products", "products.pro_id = inventory_info.pro_id");
		$this->db->join("inventory", "inventory.int_id = inventory_info.int_id");
		$content['inventory_infos'] = $this->model_base->get_one($id, "inventory_info.int_id", "inventory_info");

		$content['controller'] = $this; 
		$content['back'] = base_url('admin/transfers');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/transfers/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = 'View';
		
		$content = [];

		//$this->db->join("stocks", "stocks.sto_id = stocks_info.sto_id");
		
		$content['branches'] = $this->model_base->get_all('branches');
		$this->db->where('ini_type', 'sub');
		$this->db->join("products", "products.pro_id = inventory_info.pro_id");
		$this->db->join("inventory", "inventory.int_id = inventory_info.int_id");
		$content['inventory_infos'] = $this->model_base->get_one($id, "inventory_info.int_id", "inventory_info");

		$content['back'] = base_url('admin/transfers');
		$content['edit'] = base_url() . 'admin/transfers/edit/' . $id;
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/transfers/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$this->have_sess_superadmin();

		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = 'Delete';
		
		$content = [];

		$content['stocks'] = $this->model_base->delete_data($id, 'sto_id', 'sto_status', 'stocks');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/transfers/','refresh');
	}

	public function delivered($id)
	{
		$data['int_status'] = 'published';
		$data['int_delivered'] = $this->getDatetimeNow();
		$this->model_base->update_data($id, 'int_id', $data, 'inventory');

		$this->session->set_flashdata('msg_success', 'Products Delivered!');	
		redirect('admin/transfers/','refresh');
	}

	public function history($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Transfer';
		$header['header'] = 'Transfer';
		$header['header_small'] = '';
		
		$content = [];
		//$this->db->where('bra_status !=', 'deleted');
		$content['branches'] = $this->model_base->get_all('branches');

		//$this->db->where('cat_status !=', 'deleted');
		$content['categories'] = $this->model_base->get_all('categories');

		
		

		//validations
		$this->form_validation->set_rules('bra_id_to', 'Branch Name', 'trim');
		$this->form_validation->set_rules('bra_id_from', 'Branch Name', 'trim');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim');
		$this->form_validation->set_rules('date_from', 'date from', 'trim');
		$this->form_validation->set_rules('date_to', 'date to', 'trim');
		$this->form_validation->set_rules('pro_name', 'Product', 'trim');
		$this->form_validation->set_rules('int_id', 'TS NO', 'trim');
		$this->form_validation->set_rules('int_dr', 'DR NO', 'trim');
		$this->form_validation->set_rules('direct', 'direct', 'trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search = [];
				$newArray = array();

				if ( $data['direct'] == 'yes' ) {
					if ( $data['bra_id_to'] != 'all' ) {
						$this->db->where('stocks.bra_id', $data['bra_id_to']);
					}

					if ( $data['cat_id'] != 'all' ) {
						$this->db->where('products.cat_id', $data['cat_id']);
					}

					if ( isset($data['date_from']) && !empty($data['date_from']) ) {
						$this->db->where('stocks.sto_created >=', date("Y\-m\-d\ H:i:s", strtotime($data['date_from'])));
					}

					if ( isset($data['date_to']) && !empty($data['date_to']) ) {
						$this->db->where('stocks.sto_created <=', date("Y\-m\-d\ H:i:s", strtotime($data['date_to'] . ' +1 day')));
					}

					if ( isset($data['pro_name']) && !empty($data['pro_name'])  ) {
						$this->db->where('products.pro_name', $data['pro_name']);
					}

					if ( isset($data['int_id']) && !empty($data['int_id']) && $data['int_id'] != NULL ) {
						$this->db->where('stocks.sto_id', 0);
					}

					if ( isset($data['int_dr']) && !empty($data['int_dr']) && $data['int_dr'] != NULL ) {
						$this->db->where('stocks.sto_id', 0);
					}

					unset($data['direct']);

					$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
					$this->db->join("branches", "branches.bra_id = stocks.bra_id");
					$this->db->join("products", "products.pro_id = stocks_info.pro_id");
					$this->db->join("categories", "categories.cat_id = products.cat_id");
					$content['stocks'] = $this->model_base->get_all('stocks');

					foreach ($content['stocks'] as $item) {
						$gag['qty'] = $item['sti_qty'];
						$gag['pro_name'] = $item['pro_name'];
						array_push($newArray, $gag);
					}	
				}

				$this->db->flush_cache();

				if ( $data['bra_id_to'] != 'all' ) {
					$this->db->where('inventory.bra_id_to', $data['bra_id_to']);
				}

				if ( $data['bra_id_from'] != 'all' ) {
					$this->db->where('inventory.bra_id_from', $data['bra_id_from']);
				}

				if ( $data['cat_id'] != 'all' ) {
					$this->db->where('products.cat_id', $data['cat_id']);
				}

				if ( isset($data['date_from']) && !empty($data['date_from']) ) {
					$this->db->where('inventory.int_created >=', date("Y\-m\-d\ H:i:s", strtotime($data['date_from'])));
				}

				if ( isset($data['date_to']) && !empty($data['date_to']) ) {
					$this->db->where('inventory.int_created <=', date("Y\-m\-d\ H:i:s", strtotime($data['date_to'] . ' +1 day')));
				}

				if ( isset($data['pro_name']) && !empty($data['pro_name']) && $data['pro_name'] != NULL ) {
					$this->db->where('products.pro_name', $data['pro_name']);
				}

				if ( isset($data['int_id']) && !empty($data['int_id']) && $data['int_id'] != NULL ) {
					$this->db->where('inventory.int_id', $data['int_id']);
				}

				if ( isset($data['int_dr']) && !empty($data['int_dr']) && $data['int_dr'] != NULL ) {
					$this->db->where('inventory.int_dr', $data['int_dr']);
				}

				$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
				$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
				$this->db->join("products", "products.pro_id = inventory_info.pro_id");
				$this->db->join("categories", "categories.cat_id = products.cat_id");
				$this->db->where('ini_type', 'add');	
				
				if ( $data['pending'] == 'yes' ) {
					$this->db->where('int_status !=', 'deleted');	
				} else {
					$this->db->where('int_status', 'published');
				}	
				$content['inventory'] = $this->model_base->get_all('inventory');

				foreach ($content['inventory'] as $item) {
					$gag['qty'] = $item['ini_qty'];
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
			}	
		} 

		$content['controller']=$this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/transfers/history', $content);
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


	// public function get_stocks_counts2 ($pro_id, $acc_id) {
	// 	$overall_stocks = 0;
	// 	$overall_stocks_sub = 0;
	// 	$total = 0;

	// 	$this->db->flush_cache();
			
	// 	// gets sum of all inventory
	// 	$this->db->select_sum('ini_qty');
	// 	$this->db->where('pro_id', $pro_id);
	// 	$this->db->where('ini_type', 'add');
	// 	$this->db->where('inventory_info.bra_id_to', $acc_id);
	// 	$this->db->where('int_status', $status);
	// 	$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
	// 	$inventory = $this->db->get('inventory_info')->result_array();
	// 	$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

	// 	$this->db->flush_cache();

		
	// 	// gets sum of all stocks
	// 	$this->db->select_sum('sti_qty');
	// 	$this->db->where('pro_id', $pro_id);
	// 	$this->db->where('stocks.acc_id', $acc_id);
	// 	$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
	// 	$warehouse = $this->db->get('stocks_info')->result_array();
	// 	$total = $overall_stocks + $warehouse[0]['sti_qty'];

	// 	return $total;
	// }

	public function get_branchname ($bra_id) {
		$data = $this->model_base->get_one($bra_id, "bra_id", "branches");
		return $data[0]['bra_name'];
	}
}