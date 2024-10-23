<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dealers_motorcycles extends CI_Controller {

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
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = '';
		
		$content = [];


		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('admin/dealers_motorcycles/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];


				// $this->godprintp($data);

				redirect('admin/dealers_motorcycles/index/' . $search_type . '/' . $search_val, 'refresh');

			}	
		}

		
		$config = array();
		$config["base_url"] = base_url() . "admin/dealers_motorcycles/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('dealers_motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 30;
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
		
		

		//validations

		$this->_sort($search_type, $search_val );
		$content['dealers_branches'] = $this->model_base->get_all('dealers_motorcycles');
		// $this->godprint($content['dealers_branches']);

		$content['controller']=$this; 
		$content['all'] = base_url('admin/dealers_motorcycles/index/xallx/xallx');
		$content['published'] = base_url('admin/dealers_motorcycles/index/deb_status/published');
		$content['draft'] = base_url('admin/dealers_motorcycles/index/deb_status/draft');
		$content['deleted'] = base_url('admin/dealers_motorcycles/index/deb_status/deleted');
		$content['create'] = base_url('admin/dealers_motorcycles/create');

		$content['accomplished'] = base_url('admin/dealers_motorcycles/index/accomplished');
		$content['ongoing'] = base_url('admin/dealers_motorcycles/index/ongoing');

		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/dealers_motorcycles/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function _sort ($search_type, $search_val) {
        $this->db->order_by('motorcycles.mot_model', 'ASC');
		$this->db->where('dealers_branches.deb_status', 'published');
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");

		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			if($search_type == 'dealers.dea_name'){
				$this->db->like($search_type, urldecode($search_val));
				$this->db->or_like('dealers_branches.name', urldecode($search_val));
			}else{
				$this->db->like($search_type, urldecode($search_val));

			}
		}
	}

	public function checkexist(){
		$mot_id = $this->input->post('mot_id');
		$deb_id = $this->input->post('deb_id');
		$this->db->join('dealers_branches', 'dealers_branches.deb_id=dealers_motorcycles.deb_id');
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$this->db->where('dealers_motorcycles.mot_id', $mot_id);	
		$this->db->where('dealers_motorcycles.deb_id', $deb_id);	
		$this->db->where('dealers_branches.deb_status', 'published');
		$dealers_motorcycles = $this->model_base->get_all('dealers_motorcycles');
		$this->db->flush_cache();

		if($dealers_motorcycles){
			//echo "1";
			$msg = array(
				'stat'=>'1',
				'msg'=>"This motorcycle exist in ".$dealers_motorcycles[0]['dea_name'].'-'.$dealers_motorcycles[0]['name']
			);
			echo json_encode($msg);
		}else{
			$msg = array(
				'stat'=>'0',
				'msg'=> 'Successfully added!',
			);
			echo json_encode($msg);
		}
	}

	public function addmotorcycledealer(){
		$data['mot_id'] = $this->input->post('mot_id');
		$data['dem_colors'] = $this->input->post('dem_colors');
		$data['dem_created'] = $this->getDatetimeNow();
		$data['dem_colors'] = $this->_slug2($data['dem_colors']);
		$data['dem_promo'] = $this->input->post('dem_promo');
		foreach ($_POST['deb_id'] as $key => $value) {
			$data['deb_id'] = $value;
			$last_id = $this->model_base->insert_data($data, 'dealers_motorcycles');
		}
	}
	public function create(){
		$header = [];
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = 'Create';
		
		$content = [];

		$this->db->where('motorcycles.mot_status', 'published');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		$this->db->flush_cache();

		$this->db->where('dealers_branches.deb_status', 'published');
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['dealers_branches'] = $this->model_base->get_all('dealers_branches');
		// $this->godprintp($content['dealers_branches']);
		$this->db->flush_cache();

		$content['back'] = base_url('admin/dealers_motorcycles');

		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/dealers_motorcycles/create', $content);
		$this->load->view("template/admin_footer");
	}
	// public function create()
	// {

	// 	$header = [];
	// 	$header['header_title'] = 'Dealers Motorcycles';
	// 	$header['header'] = 'Dealers Motorcycles';
	// 	$header['header_small'] = 'Create';
		
	// 	$content = [];


	// 	$this->db->where('motorcycles.mot_status', 'published');
	// 	$content['motorcycles'] = $this->model_base->get_all('motorcycles');
	// 	$this->db->flush_cache();

	// 	$this->db->where('dealers_branches.deb_status', 'published');
	// 	$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
	// 	$content['dealers_branches'] = $this->model_base->get_all('dealers_branches');
	// 	// $this->godprintp($content['dealers_branches']);
	// 	$this->db->flush_cache();

	// 	//validations
	// 	// $this->form_validation->set_rules('mot_id', 'Model', 'required|trim');
	// 	// $this->form_validation->set_rules('deb_id', 'Dealer Branch', 'required|trim');
	// 	// $this->form_validation->set_rules('deb_price', 'Total Price', 'decimal|trim');
	// 	// $this->form_validation->set_rules('deb_dp', 'Downpayment', 'decimal|trim');
	// 	// $this->form_validation->set_rules('deb_installment', '36mos m.a.', 'decimal|trim');
	// 	// $this->form_validation->set_rules('deb_installment2', '24mos m.a.', 'decimal|trim');
	// 	// $this->form_validation->set_rules('deb_installment3', '12mos m.a.', 'decimal|trim');
	// 	// $this->form_validation->set_rules('deb_promo', 'Promos List', 'required|trim');
	// 	// $this->form_validation->set_rules('deb_colors', 'Color Variant List', 'required|trim');

	// 	if($this->input->post()) {

	// 		//$this->form_validation->set_rules('mot_id', 'Model', 'required|trim');
	// 		//$this->form_validation->set_rules('deb_id', 'Dealer Branch', 'required|trim');
	// 		// $this->form_validation->set_rules('dem_price', 'Total Price', 'decimal|trim');
	// 		// $this->form_validation->set_rules('dem_dp', 'Downpayment', 'decimal|trim');
	// 		// $this->form_validation->set_rules('dem_installment', '36mos m.a.', 'decimal|trim');
	// 		// $this->form_validation->set_rules('dem_installment2', '24mos m.a.', 'decimal|trim');
	// 		// $this->form_validation->set_rules('dem_installment3', '12mos m.a.', 'decimal|trim');
	// 		// $this->form_validation->set_rules('dem_promo', 'Promos List', 'required|trim');
	// 		//$this->form_validation->set_rules('dem_colors', 'Color Variant List', 'required|trim');

	// 		$data['mot_id'] = $this->input->post('mot_id');
	// 		$data['dem_colors'] = $this->input->post('dem_colors');
	// 		//$data = $this->input->post();

	// 		// $this->godprintp($data);


	// 		//if ($this->form_validation->run() == FALSE) {
	// 			//$content['msg_error'] = validation_errors();
	// 		//} else {
	// 			// success
	// 			foreach ($_POST['deb_id'] as $key => $value) {
	// 			$this->db->where('mot_id', $data["mot_id"]);	
	// 			$this->db->where('deb_id', $value);	
	// 			$dealers_motorcycles = $this->model_base->get_all('dealers_motorcycles');
	// 			$this->db->flush_cache();

	// 			// $this->godprint( $dealers_motorcycles );


	// 			if ( $dealers_motorcycles ) {
	// 				 $this->session->set_flashdata('msg_error', 'Dealers motorcycle cant be duplicate!');	
	// 				$content['msg_error'] = "Dealers motorcycle cant be duplicate!";
	// 			}   else {

	// 				$data['dem_created'] = $this->getDatetimeNow();
	// 				$data['dem_colors'] = $this->_slug2($data['dem_colors']);
					
	// 				// echo 'gago';
	// 				// $this->godprintp($data);


	// 				//$last_id = $this->model_base->insert_data($data, 'dealers_motorcycles');

	// 				$this->db->flush_cache();

	// 				$this->session->set_flashdata('msg_success', 'Added Dealers Motorcycles!');	
	// 				//redirect('admin/dealers_motorcycles/view/' . $last_id,'refresh');
	// 				//redirect('admin/dealers_motorcycles','refresh');
	// 				//}
	// 			}
	// 		}
	// 	}

	// 	$content['back'] = base_url('admin/dealers_motorcycles');

	// 	$this->load->view("template/admin_header", $header);
	// 	$this->load->view("template/popupmsg");
	// 	$this->load->view('admin/dealers_motorcycles/create', $content);
	// 	$this->load->view("template/admin_footer");
	// }





	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = 'Edit';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('mot_id', 'Model', 'required|trim');
		$this->form_validation->set_rules('deb_id', 'Dealer Branch', 'required|trim');
		// $this->form_validation->set_rules('dem_price', 'Total Price', 'decimal|trim');
		// $this->form_validation->set_rules('dem_dp', 'Downpayment', 'decimal|trim');
		// $this->form_validation->set_rules('dem_installment', '36mos m.a.', 'decimal|trim');
		// $this->form_validation->set_rules('dem_installment2', '24mos m.a.', 'decimal|trim');
		// $this->form_validation->set_rules('dem_installment3', '12mos m.a.', 'decimal|trim');
		// $this->form_validation->set_rules('dem_promo', 'Promos List', 'required|trim');
		$this->form_validation->set_rules('dem_colors', 'Color Variant List', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
		  		$data['dem_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();


		  		$this->db->where('mot_id', $data["mot_id"]);	
				$this->db->where('deb_id', $data["deb_id"]);	
				$dealers_motorcycles = $this->model_base->get_all('dealers_motorcycles');
				$this->db->flush_cache();

				// $this->godprint( $dealers_motorcycles );


				if ( $dealers_motorcycles ) {
					// $this->session->set_flashdata('msg_error', 'Dealers motorcycle cant be duplicate!');	

					//if ( $dealers_motorcycles[0]['dem_colors'] == $data["dem_colors"] && $dealers_motorcycles[0]['dem_status'] == $data["dem_status"] ) {
					//	$content['msg_error'] = "Dealers motorcycle cant be duplicate!";	
					//} else {
						$this->model_base->update_data($id, 'dem_id', $data, 'dealers_motorcycles');
							$this->session->set_flashdata('msg_success', 'Updated Dealers Motorcycles!');	

							redirect('admin/dealers_motorcycles/view/' . $id,'refresh');
					//}

					// $content['msg_error'] = "Dealers motorcycle cant be duplicate!";
				} else {

					$this->model_base->update_data($id, 'dem_id', $data, 'dealers_motorcycles');
					$this->session->set_flashdata('msg_success', 'Updated Dealers Motorcycles!');	

					redirect('admin/dealers_motorcycles/view/' . $id,'refresh');


				}

		        
			}
		}


		$this->db->where('motorcycles.mot_status', 'published');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		$this->db->flush_cache();

		$this->db->where('dealers_branches.deb_status', 'published');
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['dealers_branches'] = $this->model_base->get_all('dealers_branches');
		// $this->godprintp($content['dealers_branches']);
		$this->db->flush_cache();



		$content['dealers_motorcycles'] = $this->model_base->get_one($id, "dem_id", "dealers_motorcycles");


		$content['back'] = base_url('admin/dealers_motorcycles');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/dealers_motorcycles/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];



		$this->form_validation->set_rules('dem_id', 'Name', 'trim|required');
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
		                $uploadPath = './uploads/dealers_motorcycles';
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

		                    $data['mop_image'] = 'uploads/dealers_motorcycles/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'motorcycles_pictures');
		                }
		            }

					$this->session->set_flashdata('msg_success', 'Added Photos!');	

				} else {
					$this->session->set_flashdata('msg_error', 'Please Add Photos!');	
				}

		  		redirect('admin/dealers_motorcycles/view/' . $id,'refresh');
		  	}

		}

		$this->db->where('motorcycles.mot_status', 'published');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		$this->db->flush_cache();

		$this->db->where('dealers_branches.deb_status', 'published');
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['dealers_branches'] = $this->model_base->get_all('dealers_branches');
		// $this->godprintp($content['dealers_branches']);
		$this->db->flush_cache();



		$content['dealers_motorcycles'] = $this->model_base->get_one($id, "dem_id", "dealers_motorcycles");

		// $this->godprint($content['dealers_motorcycles']);

		$content['back'] = base_url('admin/dealers_motorcycles');
		$content['edit'] = base_url() . 'admin/dealers_motorcycles/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/dealers_motorcycles/view', $content);
		$this->load->view("template/admin_footer");
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './uploads/dealers_motorcycles'; 
	    $config['allowed_types'] = 'jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;
	}

	public function delete_picture($mop_id, $deb_id) {
		$content['dealers_motorcycles'] = $this->model_base->delete_data($mop_id, 'mop_id', 'mop_status', 'motorcycles_pictures');


		$this->session->set_flashdata('msg_success', 'Photo Deleted!');	
		redirect('admin/dealers_motorcycles/view/' . $deb_id,'refresh');
		
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['dealers_motorcycles'] = $this->model_base->delete_data($id, 'dem_id', 'dem_status', 'dealers_motorcycles');

		$this->session->set_flashdata('msg_success', 'Deleted Dealers Motorcycles!');	

		redirect('admin/dealers_motorcycles/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/dealers_motorcycles/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($deb_id, $bra_id, $status) {
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
		// 	$this->db->where('deb_id', $deb_id);
		// 	$this->db->where('bra_id', 1);
		// 	$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		// 	$warehouse = $this->db->get('stocks_info')->result_array();
		// 	$overall_stocks = $overall_stocks + $warehouse[0]['sti_qty'];

		// 	$this->db->flush_cache();

		// 	//SUM ALL SUBTRACT motorcycles
		// 	$this->db->select_sum('ini_qty');
		// 	$this->db->where('deb_id', $deb_id);
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
		$this->db->where('deb_id', $deb_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_to', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT motorcycles
		$this->db->select_sum('ini_qty');
		$this->db->where('deb_id', $deb_id);
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
		$this->db->where('deb_id', $deb_id);
		$this->db->where('stocks.bra_id', $bra_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('deb_id', $deb_id);
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
		$this->db->where('deb_id', $deb_id);
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
		$this->db->where('deb_id', $deb_id);
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
		$this->db->where('deb_id', $deb_id);
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

	public function history ($deb_id) {
		$header = [];
		$header['header_title'] = 'Dealers Motorcycles';
		$header['header'] = 'Dealers Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('motorcycles.deb_id', $deb_id);
		$this->db->where('inventory.bra_id_to', $this->session->userdata('bra_id'));
		$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
		$this->db->join("motorcycles", "motorcycles.deb_id = inventory_info.deb_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$this->db->where('ini_type', 'add');	
		$content['inventory'] = $this->model_base->get_all('inventory');

		$this->db->flush_cache();

		$this->db->where('motorcycles.deb_id', $deb_id);
		$this->db->where('stocks.bra_id',  $this->session->userdata('bra_id'));
		$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
		$this->db->join("branches", "branches.bra_id = stocks.bra_id");
		$this->db->join("motorcycles", "motorcycles.deb_id = stocks_info.deb_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$content['stocks'] = $this->model_base->get_all('stocks');

		$this->db->flush_cache();

		$this->db->where('motorcycles.deb_id', $deb_id);
		$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("motorcycles", "motorcycles.deb_id = sales_info.deb_id");
		$this->db->join("categories", "categories.cat_id = motorcycles.cat_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$content['sales'] = $this->model_base->get_all('sales');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/dealers_motorcycles/history', $content);
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

	public static function _slug2($stringg){

		// echo $stringg;

		$string2 = explode(",", $stringg);

		// echo "<pre>";
		// print_r ($string2);
		// echo "</pre>";

		$result = '';

		foreach ($string2 as $string_color) {

			// echo  $string_color;
			$string = strtolower($string_color);
		    //Make alphanumeric (removes all other characters)
		    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		    //Clean up multiple dashes or whitespaces
		    $string = preg_replace("/[\s-]+/", " ", $string);
		    //Convert whitespaces and underscore to dash
		    $string = preg_replace("/[\s_]/", "-", $string);

		    // echo $string;

		    $result =  $string . ',' . $result;
		}
		// echo $result;
		// break;
	    return substr_replace($result, "", -1);
	}

	public function getdealers(){
		$dealername = $this->input->post('dealername');
		$tabindex=1;
		if($this->model_base->like_data($dealername,'dea_name','dealers')){
			$getdealers = $this->model_base->like_data($dealername,'dea_name','dealers');?>
			<div class="containerdealer" style="border: solid 1px;height: 200px;overflow-y: auto;z-index: 999;position: absolute;background: white;">
			<ul id="lists">	
			<?php
			foreach ($getdealers as $dealers) {
				//echo "<div id='row' class='getdealers' style='cursor: pointer;color: black;font-size: 16px;
				//padding: 5px;' data-id='".$dealers['dea_id']."' data-deaname='".$dealers['dea_name']."'><a id='dealername'>".$dealers['dea_name']."</a></div>";
				echo "<li id='row' tabindex='".$tabindex."' class='getdealers' style='cursor: pointer;color: black;font-size: 16px;
				padding: 5px;' data-id='".$dealers['dea_id']."' data-deaname='".$dealers['dea_name']."'>".$dealers['dea_name']."</li>";
				$tabindex++;
			}
		}else{
			//echo "<div id='row' class='getdealers' style='cursor: pointer;color: black;font-size: 16px;
				//padding: 5px;'><a id='getdealers' >No Result</a></div>";
			echo "<li id='row' class='getdealers' style='cursor: pointer;color: black;font-size: 16px;
				padding: 5px;'>No Result</li>";
		} ?></ul></div><?php
	}

	public function getdealerbranch(){
		$dealerid = $this->input->post('dealerid');
		$dealerbranch = $this->input->post('dealerbranch');
		if($this->model_base->like_data($dealerid,'dea_id','dealers_branches')){
			$this->db->like('name',$dealerbranch);
			$getdealers = $this->model_base->like_data($dealerid,'dea_id','dealers_branches'); ?>
			<div class="containerdealerbranch">
			<ul>
			<?php
			foreach ($getdealers as $dealers) {
				//echo "<div id='row' class='getBranch' style='cursor: pointer;color: black;font-size: 16px;
				//padding: 5px;' data-id='".$dealers['deb_id']."' data-deaname='".$dealers['name']."'><a id='dealername' >".$dealers['name']."</a></div>";
				echo "<li id='row' class='getBranch' style='cursor: pointer;color: black;font-size: 16px;
				padding: 5px;' data-id='".$dealers['deb_id']."' data-deaname='".$dealers['name']."'>".$dealers['name']."</li>";
			}
		}else{
			//echo "<div id='row' class='getBranch' style='cursor: pointer;color: black;font-size: 16px;
				//padding: 5px;'><a id='dealername' >No Result</a></div>";
			echo "<li id='row' class='getBranch' style='cursor: pointer;color: black;font-size: 16px;
				padding: 5px;'>No Result</li>";
		} ?>
			</ul>
			</div>
		<?php
	}

	public function dealermotorcycletable(){
		$dealerid = $this->input->post('dealerid');
		$debid = $this->input->post('debid');
		
		if(empty($debid)){
			$this->db->join('dealers_branches as b', 'a.dea_id=b.dea_id');
			$this->db->join('dealers_motorcycles as d', 'b.deb_id=d.deb_id');
			$this->db->join('motorcycles as c', 'd.mot_id=c.mot_id');
			$this->db->where('b.dea_id', $dealerid);
			$data = $this->model_base->get_all('dealers as a'); 

			if(count($data) > 0) {
			echo "TOTAL: ".count($data);?>
			<div style="height: 250px;">
			<table id="example1" class="table table-hover table-striped tablesorter">
				<tr>
					<td>DEALER</td>
					<td>BRANCH</td>
					<td>BRAND</td>
					<td>MODEL</td>
					<td>COLOR</td>
					<td>DATE CREATED</td>
				</tr>
			<?php foreach ($data as $key) {
				echo '<tr>
						<td>'.$key['dea_name'].'</td>
						<td>'.$key['name'].'</td>
						<td>'.$key['mot_brand'].'</td>
						<td>'.$key['mot_slug'].'</td>
						<td>'.$key['dem_colors'].'</td>
						<td>'.$key['dem_created'].'</td>
				</tr>';
				//echo $key['dea_name'].'-'.$key['name'].'-'.$key['mot_brand'].'-'.  "<br>";
			} 
			}else { echo "NO RESULT";}?>
			</table>
			</div>
<?php	
		}else{
			$this->db->join('dealers_branches as b', 'a.dea_id=b.dea_id');
			$this->db->join('dealers_motorcycles as d', 'b.deb_id=d.deb_id');
			$this->db->join('motorcycles as c', 'd.mot_id=c.mot_id');
			$this->db->where('b.dea_id', $dealerid);
			$this->db->where('d.deb_id', $debid);
			$data = $this->model_base->get_all('dealers as a'); 

			if(count($data) > 0) {
			echo "TOTAL: ".count($data);?>
			<div style="height: 250px;">
			<table id="example1" class="table table-hover table-striped tablesorter">
				<tr>
					<td>DEALER</td>
					<td>BRANCH</td>
					<td>BRAND</td>
					<td>MODEL</td>
					<td>COLOR</td>
					<td>DATE CREATED</td>
				</tr>
			<?php foreach ($data as $key) {
				echo '<tr>
						<td>'.$key['dea_name'].'</td>
						<td>'.$key['name'].'</td>
						<td>'.$key['mot_brand'].'</td>
						<td>'.$key['mot_slug'].'</td>
						<td>'.$key['dem_colors'].'</td>
						<td>'.$key['dem_created'].'</td>
				</tr>';
				//echo $key['dea_name'].'-'.$key['name'].'-'.$key['mot_brand'].'-'.  "<br>";
			} 
			}else { echo "NO RESULT";}?>
			</table>
			</div>
<?php	
		}
	} 
		
	public function dealers_motorcyclesdownload(){
		$dealerid = $this->input->get('dealerid');
		$debid = $this->input->get('debid');

		$fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->model_base->downloaddealermotorcycles($dealerid, $debid);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'DEALER');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'BRANCH');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'BRAND');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'MODEL');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'COLORS');  
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'DATECREATED');     
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->DEALER);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->BRANCH);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->BRAND);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->MODEL);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->COLORS);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->DATECREATED);
            $rowCount++;
        }
        $filename = "DealerMorcycles-". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
	}

	public function insertmultiple(){
		
	}	
}