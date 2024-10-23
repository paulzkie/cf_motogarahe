<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

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
		$header['header_title'] = 'Projects';
		$header['header'] = 'Projects';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->order_by('pro_name', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('pro_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('pro_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('pro_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('pro_status', 'deleted');
			} elseif ( $filter == 'accomplished' ) {
				$this->db->where('pro_type', 'accomplished');
			} elseif ( $filter == 'ongoing' ) {
				$this->db->where('pro_type', 'on-going');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/projects/index/";
			$total_row = $this->model_base->count_data('projects');
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
			$this->db->where('pro_status !=', 'deleted');
		}

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

				$content['projects'] = $this->model_base->like_data($search_value, $search_type, 'projects');
			}	
		} else {
			// echo "<pre>";
			// print_r ($content['projects']);
			// echo "</pre>";
			$content['projects'] = $this->model_base->get_all('projects');
		}

		if($this->input->post('upload_mode')) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				$config['upload_path']   = './uploads/projects'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
		  		$data = $this->input->post();
		  		array_pop($data);
					
		  		if ( $this->upload->do_upload('set_desc')) {
				    $upload = $this->upload->data();
		            $data['set_desc'] = base_url() . 'uploads/projects/' . $upload['file_name'];
				}

				$this->model_base->update_data('structure', 'set_name', $data, 'settings');
				$this->session->set_flashdata('msg_success', 'Updated Image!');	
				redirect('admin/projects','refresh');

			}
		}

		$this->db->where('set_id', 4);	
		$content['structure_img'] = $this->model_base->get_all('settings');

		$content['controller']=$this; 
		$content['all'] = base_url('admin/projects/index/all');
		$content['published'] = base_url('admin/projects/index/published');
		$content['draft'] = base_url('admin/projects/index/draft');
		$content['deleted'] = base_url('admin/projects/index/deleted');
		$content['create'] = base_url('admin/projects/create');

		$content['accomplished'] = base_url('admin/projects/index/accomplished');
		$content['ongoing'] = base_url('admin/projects/index/ongoing');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'projects';
		$header['header'] = 'projects';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('cat_status !=', 'deleted');
		$content['categories'] = $this->model_base->get_all('categories');

		//validations
		$this->form_validation->set_rules('pro_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('pro_type', 'Type', 'required|trim');
		$this->form_validation->set_rules('pro_desc', 'Description', 'trim');
		$this->form_validation->set_rules('pro_package', 'Package', 'required|trim');
		$this->form_validation->set_rules('pro_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				$config['upload_path']   = './uploads/projects'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
					
		  		if ( !$this->upload->do_upload('pro_image')) {
		          	$error = array('error' => $this->upload->display_errors()); 
		          	$content['msg_error'] = $error;
				} else { 
		            $upload = $this->upload->data();
		            $data = $this->input->post();
		            $data['pro_image'] = base_url() . 'uploads/projects/' . $upload['file_name'];
		            $data['pro_created'] = $this->getDatetimeNow();

					$this->model_base->insert_data($data, 'projects');
					$this->session->set_flashdata('msg_success', 'Added Structure!');	
					redirect('admin/projects','refresh');
		        } 
			}
		}

		$content['back'] = base_url('admin/projects');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'projects';
		$header['header'] = 'projects';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['projects'] = $this->model_base->get_one($id, "pro_id", "projects");

		//validations
		$this->form_validation->set_rules('pro_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('pro_type', 'Type', 'required|trim');
		$this->form_validation->set_rules('pro_desc', 'Description', 'trim');
		$this->form_validation->set_rules('pro_package', 'Package', 'required|trim');
		$this->form_validation->set_rules('pro_status', 'Status', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$config['upload_path']   = './uploads/projects'; 
		  		$config['allowed_types'] = 'jpg|png'; 
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
		  		$data['pro_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();
					
		  		if ( !$this->upload->do_upload('pro_image')) {
					$data['pro_image'] = $content['projects'][0]['pro_image'];

				} else { 
		            $upload = $this->upload->data();
		            $data['pro_image'] = base_url() . 'uploads/projects/' . $upload['file_name'];
		        } 

		        $this->model_base->update_data($id, 'pro_id', $data, 'projects');
				$this->session->set_flashdata('msg_success', 'Updated Product!');	

				redirect('admin/projects/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/projects');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'projects';
		$header['header'] = 'projects';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['projects'] = $this->model_base->get_one($id, "pro_id", "projects");

		$content['back'] = base_url('admin/projects');
		$content['edit'] = base_url() . 'admin/projects/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'projects';
		$header['header'] = 'projects';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['projects'] = $this->model_base->delete_data($id, 'pro_id', 'pro_status', 'projects');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/projects/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($pro_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$inventory_draft = 0;
		$sales_draft = 0;
		$broken_product = 0;
		$total = 0;

		// SUM ALL ADDED projects
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

		// 	//SUM ALL SUBTRACT projects
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

		// SUM ALL SUBTRACT projects
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
		$broken_product = $this->db->get('broken_projects')->result_array();
		// echo "<pre>";
		// print_r ($broken_product);
		// echo "</pre>";
		$total = $total - $broken_product[0]['bro_qty'];

		// }

		return $total;
	}

	public function history ($pro_id) {
		$header = [];
		$header['header_title'] = 'projects';
		$header['header'] = 'projects';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('projects.pro_id', $pro_id);
		$this->db->where('inventory.bra_id_to', $this->session->userdata('bra_id'));
		$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
		$this->db->join("projects", "projects.pro_id = inventory_info.pro_id");
		$this->db->join("categories", "categories.cat_id = projects.cat_id");
		$this->db->where('ini_type', 'add');	
		$content['inventory'] = $this->model_base->get_all('inventory');

		$this->db->flush_cache();

		$this->db->where('projects.pro_id', $pro_id);
		$this->db->where('stocks.bra_id',  $this->session->userdata('bra_id'));
		$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
		$this->db->join("branches", "branches.bra_id = stocks.bra_id");
		$this->db->join("projects", "projects.pro_id = stocks_info.pro_id");
		$this->db->join("categories", "categories.cat_id = projects.cat_id");
		$content['stocks'] = $this->model_base->get_all('stocks');

		$this->db->flush_cache();

		$this->db->where('projects.pro_id', $pro_id);
		$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("projects", "projects.pro_id = sales_info.pro_id");
		$this->db->join("categories", "categories.cat_id = projects.cat_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$content['sales'] = $this->model_base->get_all('sales');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/projects/history', $content);
		$this->load->view("template/admin_footer");
	}
}