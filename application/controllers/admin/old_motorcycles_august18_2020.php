<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motorcycles extends CI_Controller {

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

	public function index($search_type = "xallx", $search_val ="xallx", $filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = '';
		
		$content = [];

		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('admin/motorcycles/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];
				// $this->godprintp($data);
				redirect('admin/motorcycles/index/' . $search_type . '/' . $search_val, 'refresh');
			}	
		}

		

		$config = array();
		$config["base_url"] = base_url() . "admin/motorcycles/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
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
		$content["current_count_start"] = $offset;
		

		

		
		$this->_sort($search_type, $search_val );
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');

		$content['controller']=$this; 
		$content['all'] = base_url('admin/motorcycles/index/xallx/xallx');
		$content['published'] = base_url('admin/motorcycles/index/mot_status/published');
		$content['draft'] = base_url('admin/motorcycles/index/mot_status/draft');
		$content['deleted'] = base_url('admin/motorcycles/index/mot_status/deleted');
		$content['create'] = base_url('admin/motorcycles/create');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function _sort($search_type, $search_val) {
		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, $search_val);
		}
		$this->db->order_by('mot_model', 'ASC');
		$this->db->where('motorcycles_pictures.mop_status', 'published');	
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('mot_model', 'Model', 'required|trim|is_unique[motorcycles.mot_model]');
		$this->form_validation->set_rules('mot_keyword', 'Mot Keyword', 'required|trim');
		$this->form_validation->set_rules('mot_brand', 'Brand', 'required|trim');
		$this->form_validation->set_rules('mot_type', 'Category Type', 'required|trim');
		$this->form_validation->set_rules('mot_srp', 'SRP', 'decimal|trim');


		$this->form_validation->set_rules('mot_engine_size_range', '', 'trim');
		$this->form_validation->set_rules('mot_transmission', '', 'trim');
		$this->form_validation->set_rules('mot_color_variant', '', 'trim');
		$this->form_validation->set_rules('mot_engine_type', '', 'trim');
		$this->form_validation->set_rules('mot_diplacement', 'Displacement', 'decimal|trim');
		$this->form_validation->set_rules('mot_bore_stroke_mm', '', 'trim');
		$this->form_validation->set_rules('mot_starting_system', '', 'trim');
		$this->form_validation->set_rules('mot_ignition_type', '', 'trim');
		$this->form_validation->set_rules('mot_transmission_type', '', 'trim');
		$this->form_validation->set_rules('mot_fuel_system', '', 'trim');
		$this->form_validation->set_rules('mot_engine_oil_capacity', '', 'trim');
		$this->form_validation->set_rules('mot_maximum_horse_power', '', 'trim');
		$this->form_validation->set_rules('mot_maximum_torque', '', 'trim');
		$this->form_validation->set_rules('mot_brake_system_front', '', 'trim');
		$this->form_validation->set_rules('mot_brake_system_rear', '', 'trim');
		$this->form_validation->set_rules('mot_suspension_front', '', 'trim');
		$this->form_validation->set_rules('mot_suspension_rear', '', 'trim');
		$this->form_validation->set_rules('mot_wheels_type', '', 'trim');
		$this->form_validation->set_rules('mot_front_tire', '', 'trim');
		$this->form_validation->set_rules('mot_rear_tire', '', 'trim');
		$this->form_validation->set_rules('mot_overall_dimensions', '', 'trim');
		$this->form_validation->set_rules('mot_wet_curb_weight', '', 'trim');
		$this->form_validation->set_rules('mot_dry_weight', '', 'trim');
		$this->form_validation->set_rules('mot_wheelbase', '', 'trim');
		$this->form_validation->set_rules('mot_seat_height', '', 'trim');
		$this->form_validation->set_rules('mot_minimum_ground_clearance', '', 'trim');
		$this->form_validation->set_rules('mot_fuel_capacity', '', 'trim');
		$this->form_validation->set_rules('mot_desc', '', 'trim');

		if($this->input->post()) {


			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				// $config['upload_path']   = './uploads/motorcycles'; 
		  // 		$config['allowed_types'] = 'jpg|png'; 
		  // 		$config['encrypt_name'] = TRUE; 
		  // 		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  // 		$this->load->library('upload', $config);
					
		  // 		if ( !$this->upload->do_upload('mot_image')) {
		  //         	$error = array('error' => $this->upload->display_errors()); 
		  //         	$content['msg_error'] = $error;
				// } else { 
		  //           $upload = $this->upload->data();
		  //           $data = $this->input->post();
		  //           $data['mot_image'] = base_url() . 'uploads/motorcycles/' . $upload['file_name'];
		  //           $data['mot_created'] = $this->getDatetimeNow();

				// 	$this->model_base->insert_data($data, 'motorcycles');
				// 	$this->session->set_flashdata('msg_success', 'Added Structure!');	
				// 	redirect('admin/motorcycles','refresh');
		  //       } 

	            $data = $this->input->post();
	            $data['mot_slug'] = $this->_slug($data['mot_model']);
	            $data['mot_created'] = $this->getDatetimeNow();
				$last_id = $this->model_base->insert_data($data, 'motorcycles');

				$this->db->flush_cache();
				$motorcycles_pictures['mot_id'] = $last_id;
				$motorcycles_pictures['mop_image'] ='none';
				// $motorcycles_pictures['mop_image'] ='https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No';
				$this->model_base->insert_data($motorcycles_pictures, 'motorcycles_pictures');

				$this->session->set_flashdata('msg_success', 'Added Motorcycles!');	
				redirect('admin/motorcycles','refresh');
		        
			}
		}

		$content['back'] = base_url('admin/motorcycles');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/create', $content);
		$this->load->view("template/admin_footer");
	}



	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'Edit';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('mot_model', 'Model', 'required|trim');
		$this->form_validation->set_rules('mot_keyword', 'Mot Keyword', 'required|trim');
		$this->form_validation->set_rules('mot_brand', 'Brand', 'required|trim');
		$this->form_validation->set_rules('mot_type', 'Category Type', 'required|trim');
		$this->form_validation->set_rules('mot_srp', 'SRP', 'decimal|trim');


		$this->form_validation->set_rules('mot_engine_size_range', '', 'trim');
		$this->form_validation->set_rules('mot_transmission', '', 'trim');
		$this->form_validation->set_rules('mot_color_variant', '', 'trim');
		$this->form_validation->set_rules('mot_engine_type', '', 'trim');
		$this->form_validation->set_rules('mot_diplacement', 'Displacement', 'decimal|trim');
		$this->form_validation->set_rules('mot_bore_stroke_mm', '', 'trim');
		$this->form_validation->set_rules('mot_starting_system', '', 'trim');
		$this->form_validation->set_rules('mot_ignition_type', '', 'trim');
		$this->form_validation->set_rules('mot_transmission_type', '', 'trim');
		$this->form_validation->set_rules('mot_fuel_system', '', 'trim');
		$this->form_validation->set_rules('mot_engine_oil_capacity', '', 'trim');
		$this->form_validation->set_rules('mot_maximum_horse_power', '', 'trim');
		$this->form_validation->set_rules('mot_maximum_torque', '', 'trim');
		$this->form_validation->set_rules('mot_brake_system_front', '', 'trim');
		$this->form_validation->set_rules('mot_brake_system_rear', '', 'trim');
		$this->form_validation->set_rules('mot_suspension_front', '', 'trim');
		$this->form_validation->set_rules('mot_suspension_rear', '', 'trim');
		$this->form_validation->set_rules('mot_wheels_type', '', 'trim');
		$this->form_validation->set_rules('mot_front_tire', '', 'trim');
		$this->form_validation->set_rules('mot_rear_tire', '', 'trim');
		$this->form_validation->set_rules('mot_overall_dimensions', '', 'trim');
		$this->form_validation->set_rules('mot_wet_curb_weight', '', 'trim');
		$this->form_validation->set_rules('mot_dry_weight', '', 'trim');
		$this->form_validation->set_rules('mot_wheelbase', '', 'trim');
		$this->form_validation->set_rules('mot_seat_height', '', 'trim');
		$this->form_validation->set_rules('mot_minimum_ground_clearance', '', 'trim');
		$this->form_validation->set_rules('mot_fuel_capacity', '', 'trim');
		$this->form_validation->set_rules('mot_desc', '', 'trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
		  		$data['mot_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();

		  		$data['mot_slug'] = $this->_slug($data['mot_model']);

		        $this->model_base->update_data($id, 'mot_id', $data, 'motorcycles');
				$this->session->set_flashdata('msg_success', 'Updated motorcycle!');	

				redirect('admin/motorcycles/view/' . $id,'refresh');
			}
		}


		$content['motorcycles'] = $this->model_base->get_one($id, "mot_id", "motorcycles");


		$content['back'] = base_url('admin/motorcycles');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];



		$this->form_validation->set_rules('mot_id', 'Name', 'trim|required');
		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();

			} else {

				$this->load->library('upload');

		  		$data = $this->input->post();
				$ImageCount = count($_FILES['mop_image']['name']);
				$this->godprint($ImageCount);

				$dataInfo = [];

				if ( $ImageCount >= 1) {

					$filesCount = $ImageCount;
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['mop_image']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['mop_image']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['mop_image']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['mop_image']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['mop_image']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = './uploads/motorcycles';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['mop_image'] = 'uploads/motorcycles/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'motorcycles_pictures');
		                }
		            }

					$this->session->set_flashdata('msg_success', 'Added Photos!');	

				} else {
					$this->session->set_flashdata('msg_error', 'Please Add Photos!');	
				}

		  		redirect('admin/motorcycles/view/' . $id,'refresh');
		  	}

		}



		$content['motorcycles'] = $this->model_base->get_one($id, "mot_id", "motorcycles");

		$this->db->flush_cache();
		$this->db->where('mot_id', $id);
		$this->db->where('mop_status', 'published');	
		$content['motorcycles_pictures'] = $this->model_base->get_all('motorcycles_pictures');


		$this->db->flush_cache();
		$this->db->where('dealers_motorcycles.mot_id', $id);
		$this->db->where('dealers_motorcycles.dem_status', 'published');
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['dealers_branches'] = $this->model_base->get_all('dealers_motorcycles');

		$content['back'] = base_url('admin/motorcycles');
		$content['edit'] = base_url() . 'admin/motorcycles/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/view', $content);
		$this->load->view("template/admin_footer");
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './uploads/motorcycles'; 
	    $config['allowed_types'] = 'jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;
	}

	public function delete_picture($mop_id, $mot_id) {
		$content['motorcycles'] = $this->model_base->delete_data($mop_id, 'mop_id', 'mop_status', 'motorcycles_pictures');


		$this->session->set_flashdata('msg_success', 'Photo Deleted!');	
		redirect('admin/motorcycles/view/' . $mot_id,'refresh');
		
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['motorcycles'] = $this->model_base->delete_data($id, 'mot_id', 'mot_status', 'motorcycles');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/motorcycles/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($mot_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$inventory_draft = 0;
		$sales_draft = 0;
		$broken_product = 0;
		$total = 0;

		// SUM ALL ADDED motorcycles
		// if ( $this->session->userdata('bra_id') == 1 ) {

		// 	$this->db->flush_cache();
			
		// 	// gets sum of all stocks
		// 	$this->db->select_sum('sti_qty');
		// 	$this->db->where('mot_id', $mot_id);
		// 	$this->db->where('bra_id', 1);
		// 	$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		// 	$warehouse = $this->db->get('stocks_info')->result_array();
		// 	$overall_stocks = $overall_stocks + $warehouse[0]['sti_qty'];

		// 	$this->db->flush_cache();

		// 	//SUM ALL SUBTRACT motorcycles
		// 	$this->db->select_sum('ini_qty');
		// 	$this->db->where('mot_id', $mot_id);
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
		$this->db->where('mot_id', $mot_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_to', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT motorcycles
		$this->db->select_sum('ini_qty');
		$this->db->where('mot_id', $mot_id);
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
		$this->db->where('mot_id', $mot_id);
		$this->db->where('stocks.bra_id', $bra_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('mot_id', $mot_id);
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
		$this->db->where('mot_id', $mot_id);
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
		$this->db->where('mot_id', $mot_id);
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
		$this->db->where('mot_id', $mot_id);
		$this->db->where('bra_id', $bra_id);
		$this->db->where('bro_status', 'published');
		$broken_product = $this->db->get('broken_motorcycles')->result_array();
		// echo "<pre>";
		// print_r ($broken_product);
		// echo "</pre>";
		$total = $total - $broken_product[0]['bro_qty'];

		// }

		return $total;
	}

	public function history ($mot_id) {
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('motorcycles.mot_id', $mot_id);
		$this->db->where('inventory.bra_id_to', $this->session->userdata('bra_id'));
		$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
		$this->db->join("motorcycles", "motorcycles.mot_id = inventory_info.mot_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$this->db->where('ini_type', 'add');	
		$content['inventory'] = $this->model_base->get_all('inventory');

		$this->db->flush_cache();

		$this->db->where('motorcycles.mot_id', $mot_id);
		$this->db->where('stocks.bra_id',  $this->session->userdata('bra_id'));
		$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
		$this->db->join("branches", "branches.bra_id = stocks.bra_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = stocks_info.mot_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$content['stocks'] = $this->model_base->get_all('stocks');

		$this->db->flush_cache();

		$this->db->where('motorcycles.mot_id', $mot_id);
		$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = sales_info.mot_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$content['sales'] = $this->model_base->get_all('sales');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/motorcycles/history', $content);
		$this->load->view("template/admin_footer");
	}


	public static function _slug($string){
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	} 
}