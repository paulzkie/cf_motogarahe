<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery_prizes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->join("lottery_seasons", "lottery_seasons.los_id = lottery_prizes.los_id");
		$this->db->order_by('lop_name', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('lop_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('lop_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('lop_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('lop_status', 'deleted');
			} elseif ( $filter == 'accomplished' ) {
				$this->db->where('lop_type', 'accomplished');
			} elseif ( $filter == 'ongoing' ) {
				$this->db->where('lop_type', 'on-going');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/lottery_prizes/index/";
			$total_row = $this->model_base->count_data('lottery_prizes');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 20;
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
			$this->db->where('lop_status !=', 'deleted');
		}
		
		$this->db->join("lottery_seasons", "lottery_seasons.los_id = lottery_prizes.los_id");
		//validations
		$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
		$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

		if ( $this->input->post('search_mode') ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['lottery_prizes'] = $this->model_base->like_data($search_value, $search_type, 'lottery_prizes');
			}	
		} else {
			// echo "<pre>";
			// print_r ($content['lottery_prizes']);
			// echo "</pre>";
			$content['lottery_prizes'] = $this->model_base->get_all('lottery_prizes');
		}

		if($this->input->post('upload_mode')) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				$config['upload_path']   = './uploads/lottery_prizes'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
		  		$data = $this->input->post();
		  		array_pop($data);
					
		  		if ( $this->upload->do_upload('set_desc')) {
				    $upload = $this->upload->data();
		            $data['set_desc'] = base_url() . 'uploads/lottery_prizes/' . $upload['file_name'];
				}

				$this->model_base->update_data('Prizes', 'set_name', $data, 'settings');
				$this->session->set_flashdata('msg_success', 'Updated Image!');	
				redirect('admin/lottery_prizes','refresh');

			}
		}

		$content['controller']=$this; 
		$content['all'] = base_url('admin/lottery_prizes/index/all');
		$content['published'] = base_url('admin/lottery_prizes/index/published');
		$content['draft'] = base_url('admin/lottery_prizes/index/draft');
		$content['deleted'] = base_url('admin/lottery_prizes/index/deleted');
		$content['create'] = base_url('admin/lottery_prizes/create');

		$content['accomplished'] = base_url('admin/lottery_prizes/index/accomplished');
		$content['ongoing'] = base_url('admin/lottery_prizes/index/ongoing');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = 'Create';
		
		$content = [];

		// $this->db->where('cat_status !=', 'deleted');
		// $content['categories'] = $this->model_base->get_all('categories');

		//validations
		$this->form_validation->set_rules('lop_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('lop_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				$config['upload_path']   = './uploads/lottery_prizes'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
					
		  		if ( !$this->upload->do_upload('lop_img')) {
		          	$error = array('error' => $this->upload->display_errors()); 
		          	$content['msg_error'] = $error;
				} else { 
					$lastData = $this->model_base->get_lastData('los_id', 'lottery_seasons');
					$upload = $this->upload->data();
					
		            $data = $this->input->post();
					$data['lop_img'] = base_url() . 'uploads/lottery_prizes/' . $upload['file_name'];
					$data['los_id'] = $lastData[0]['los_id'];
		            $data['lop_created'] = $this->getDatetimeNow();

					$this->model_base->insert_data($data, 'lottery_prizes');
					$this->session->set_flashdata('msg_success', 'Added Prizes!');	
					redirect('admin/lottery_prizes','refresh');
		        } 
			}
		}

		$content['back'] = base_url('admin/lottery_prizes');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['lottery_prizes'] = $this->model_base->get_one($id, "lop_id", "lottery_prizes");

		//validations
		$this->form_validation->set_rules('lop_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('lop_type', 'Type', 'required|trim');
		$this->form_validation->set_rules('lop_desc', 'Description', 'trim');
		$this->form_validation->set_rules('lop_package', 'Package', 'required|trim');
		$this->form_validation->set_rules('lop_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$config['upload_path']   = './uploads/lottery_prizes'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
		  		$data['lop_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();
					
		  		if ( !$this->upload->do_upload('lop_img')) {
					$data['lop_img'] = $content['lottery_prizes'][0]['lop_img'];

				} else { 
		            $upload = $this->upload->data();
		            $data['lop_img'] = base_url() . 'uploads/lottery_prizes/' . $upload['file_name'];
		        } 

		        $this->model_base->update_data($id, 'lop_id', $data, 'lottery_prizes');
				$this->session->set_flashdata('msg_success', 'Updated Product!');	

				redirect('admin/lottery_prizes/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/lottery_prizes');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['lottery_prizes'] = $this->model_base->get_one($id, "lop_id", "lottery_prizes");

		$content['back'] = base_url('admin/lottery_prizes');
		$content['edit'] = base_url() . 'admin/lottery_prizes/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['lottery_prizes'] = $this->model_base->delete_data($id, 'lop_id', 'lop_status', 'lottery_prizes');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/lottery_prizes/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($lop_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$inventory_draft = 0;
		$sales_draft = 0;
		$broken_product = 0;
		$total = 0;

		// SUM ALL ADDED lottery_prizes
		// if ( $this->session->userdata('bra_id') == 1 ) {

		// 	$this->db->flush_cache();
			
		// 	// gets sum of all stocks
		// 	$this->db->select_sum('sti_qty');
		// 	$this->db->where('lop_id', $lop_id);
		// 	$this->db->where('bra_id', 1);
		// 	$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		// 	$warehouse = $this->db->get('stocks_info')->result_array();
		// 	$overall_stocks = $overall_stocks + $warehouse[0]['sti_qty'];

		// 	$this->db->flush_cache();

		// 	//SUM ALL SUBTRACT lottery_prizes
		// 	$this->db->select_sum('ini_qty');
		// 	$this->db->where('lop_id', $lop_id);
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
		$this->db->where('lop_id', $lop_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_to', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT lottery_prizes
		$this->db->select_sum('ini_qty');
		$this->db->where('lop_id', $lop_id);
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
		$this->db->where('lop_id', $lop_id);
		$this->db->where('stocks.bra_id', $bra_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('lop_id', $lop_id);
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
		$this->db->where('lop_id', $lop_id);
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
		$this->db->where('lop_id', $lop_id);
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
		$this->db->where('lop_id', $lop_id);
		$this->db->where('bra_id', $bra_id);
		$this->db->where('bro_status', 'published');
		$broken_product = $this->db->get('broken_lottery_prizes')->result_array();
		// echo "<pre>";
		// print_r ($broken_product);
		// echo "</pre>";
		$total = $total - $broken_product[0]['bro_qty'];

		// }

		return $total;
	}

	public function history ($lop_id) {
		$header = [];
		$header['header_title'] = 'Lottery_prizes';
		$header['header'] = 'Lottery_prizes';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('lottery_prizes.lop_id', $lop_id);
		$this->db->where('inventory.bra_id_to', $this->session->userdata('bra_id'));
		$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
		$this->db->join("lottery_prizes", "lottery_prizes.lop_id = inventory_info.lop_id");
		$this->db->join("categories", "categories.cat_id = lottery_prizes.cat_id");
		$this->db->where('ini_type', 'add');	
		$content['inventory'] = $this->model_base->get_all('inventory');

		$this->db->flush_cache();

		$this->db->where('lottery_prizes.lop_id', $lop_id);
		$this->db->where('stocks.bra_id',  $this->session->userdata('bra_id'));
		$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
		$this->db->join("branches", "branches.bra_id = stocks.bra_id");
		$this->db->join("lottery_prizes", "lottery_prizes.lop_id = stocks_info.lop_id");
		$this->db->join("categories", "categories.cat_id = lottery_prizes.cat_id");
		$content['stocks'] = $this->model_base->get_all('stocks');

		$this->db->flush_cache();

		$this->db->where('lottery_prizes.lop_id', $lop_id);
		$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("lottery_prizes", "lottery_prizes.lop_id = sales_info.lop_id");
		$this->db->join("categories", "categories.cat_id = lottery_prizes.cat_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$content['sales'] = $this->model_base->get_all('sales');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_prizes/history', $content);
		$this->load->view("template/admin_footer");
	}
}