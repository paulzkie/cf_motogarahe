<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repo extends CI_Controller {

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
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = '';
		
		$content = [];

		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('admin/repo/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];
				// $this->godprintp($data);
				redirect('admin/repo/index/' . $search_type . '/' . $search_val, 'refresh');
			}	
		}

		

		$config = array();
		$config["base_url"] = base_url() . "admin/repo/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('repo');
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
		$content['repo'] = $this->model_base->get_all('repo');

		$content['controller']=$this; 
		$content['all'] = base_url('admin/repo/index/xallx/xallx');
		$content['published'] = base_url('admin/repo/index/mot_status/published');
		$content['draft'] = base_url('admin/repo/index/mot_status/draft');
		$content['deleted'] = base_url('admin/repo/index/mot_status/deleted');
		$content['create'] = base_url('admin/repo/create');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function _sort($search_type, $search_val) {
		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, $search_val);
		}
		$this->db->order_by('mot_created', 'DESC');
	//	$this->db->where_in('repo_pictures.mop_status', 'published','draft');	
	//	$this->db->join("repo_pictures", "repo_pictures.mot_id = repo.mot_id");
		//$this->db->group_by('repo_pictures.mot_id,repo.mot_id');
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
	
	public function create()
	{

		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'Create';
		
		$content = [];
        
		//validations
		$this->form_validation->set_rules('mot_model', 'Model', 'required|trim|is_unique[repo.mot_model]');
		$this->form_validation->set_rules('mot_brand', 'Brand', 'required|trim');
		$this->form_validation->set_rules('mot_type', 'Category Type', 'required|trim');
        
        $this->form_validation->set_rules('mot_issue', '', 'trim');
        $this->form_validation->set_rules('mot_repo_remarks', '', 'trim');
        $this->form_validation->set_rules('mot_price', '', 'trim');
        
        $this->form_validation->set_rules('mot_year', 'Year', 'trim');
		$this->form_validation->set_rules('mot_mileage', 'Mileage', 'trim');
		$this->form_validation->set_rules('mot_desc', 'Description', 'trim');

		$this->form_validation->set_rules('mot_dp', 'Downpayment', 'trim');
		$this->form_validation->set_rules('mot_ma_36', '36mos m.a', 'trim');
		$this->form_validation->set_rules('mot_ma_24', '24mos m.a', 'trim');
		$this->form_validation->set_rules('mot_ma_12', '12mos m.a', 'trim');
		
		//$this->form_validation->set_rules('mot_image', '', 'trim');
		
        $this->load->library('upload');
		
	//	$this->godprint($ImageCount);
		
		if($this->input->post()) {


			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
                $_FILES['file']['name']     = $_FILES['mot_image']['name'];
        		$_FILES['file']['type']     = $_FILES['mot_image']['type'];
        		$_FILES['file']['tmp_name'] = $_FILES['mot_image']['tmp_name'];
        		$_FILES['file']['error']     = $_FILES['mot_image']['error'];
        		$_FILES['file']['size']     = $_FILES['mot_image']['size'];
        		
				$config['upload_path']   = './uploads/repo'; 
		   		$config['allowed_types'] = '*'; 
		   		$config['encrypt_name'] = FALSE; 
		   		//$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		   		$this->load->library('upload', $config);
		        $this->upload->initialize($config);
		        
				if($this->upload->do_upload('file')){	
		             $upload = $this->upload->data();
		             $data = $this->input->post();
		             $data['mot_image'] =  'uploads/repo/' . $upload['file_name'];
		             $data['mot_created'] = $this->getDatetimeNow();
                     $data['mot_slug'] = $this->_slug($data['mot_model']);
	                 $data['mot_created'] = $this->getDatetimeNow();
            			//$last_id = $this->model_base->insert_data($data, 'dealers_motorcycles');
            			$last_id = $this->model_base->insert_data($data, 'repo');
            			$this->db->flush_cache();
        				$repo_pictures['mot_id'] = $last_id;
        				$repo_pictures['mop_image'] = 'uploads/repo/' . $upload['file_name'];
        				$repo_pictures['mop_status'] ='published';
        				// $repo_pictures['mop_image'] ='https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No';
        				$this->model_base->insert_data($repo_pictures, 'repo_pictures');
				 }
		         } 
                $this->session->set_flashdata('msg_success', 'Added repo!');
				redirect('admin/repo/create','refresh');
				
			}
		
		$content['back'] = base_url('admin/repo');
		
		$this->db->join('dealers b','a.dea_id=b.dea_id');
		$content['dealers_branches'] = $this->model_base->get_all('dealers_branches a');
		 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/create', $content);
		$this->load->view("template/admin_footer");
	}



	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'Edit';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('mot_model', 'Model', 'required|trim');
		$this->form_validation->set_rules('mot_brand', 'Brand', 'required|trim');
		$this->form_validation->set_rules('mot_type', 'Category Type', 'required|trim');

		$this->form_validation->set_rules('mot_year', 'Year', 'trim');
		$this->form_validation->set_rules('mot_mileage', 'Mileage', 'trim');
		$this->form_validation->set_rules('mot_desc', 'Description', 'trim');

		$this->form_validation->set_rules('mot_dp', 'Downpayment', 'trim');
		$this->form_validation->set_rules('mot_ma_36', '36mos m.a', 'trim');
		$this->form_validation->set_rules('mot_ma_24', '24mos m.a', 'trim');
		$this->form_validation->set_rules('mot_ma_12', '12mos m.a', 'trim');


		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
		  		$data['mot_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();

		        $this->model_base->update_data($id, 'mot_id', $data, 'repo');
				$this->session->set_flashdata('msg_success', 'Updated motorcycle!');	

				redirect('admin/repo/view/' . $id,'refresh');
			}
		}


		$content['repo'] = $this->model_base->get_one($id, "mot_id", "repo");


		$content['back'] = base_url('admin/repo');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
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
				//$this->godprint($ImageCount);

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
		                $uploadPath = './uploads/repo';
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

		                    $data['mop_image'] = 'uploads/repo/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'repo_pictures');
		                }
		            }

					$this->session->set_flashdata('msg_success', 'Added Photos!');	

				} else {
					$this->session->set_flashdata('msg_error', 'Please Add Photos!');	
				}

		  		redirect('admin/repo/view/' . $id,'refresh');
		  	}

		}

		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['repo'] = $this->model_base->get_one($id, "mot_id", "repo");

		// $this->godprint($content['repo']);	


		$this->db->flush_cache();
		$this->db->where('mot_id', $id);
		$this->db->where('mop_status', 'published');	
		$content['repo_pictures'] = $this->model_base->get_all('repo_pictures');


		// $this->db->flush_cache();
		// $this->db->where('repo.mot_id', $id);
		// $this->db->where('dealers_motorcycles.dem_status', 'published');
		// $this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		// $this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		// $content['dealers_branches'] = $this->model_base->get_all('dealers_motorcycles');

		$content['back'] = base_url('admin/repo');
		$content['edit'] = base_url() . 'admin/repo/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/view', $content);
		$this->load->view("template/admin_footer");
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './uploads/repo'; 
	    $config['allowed_types'] = 'jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;
	}

	public function delete_picture($mop_id, $mot_id) {
		$content['repo'] = $this->model_base->delete_data($mop_id, 'mop_id', 'mop_status', 'repo_pictures');

		$this->session->set_flashdata('msg_success', 'Photo Deleted!');	
		redirect('admin/repo/view/' . $mot_id,'refresh');
		
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['repo'] = $this->model_base->delete_data($id, 'mot_id', 'mot_status', 'repo');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/repo/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_stocks_counts ($mot_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$inventory_draft = 0;
		$sales_draft = 0;
		$broken_product = 0;
		$total = 0;

		// SUM ALL ADDED repo
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

		// 	//SUM ALL SUBTRACT repo
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

		// SUM ALL SUBTRACT repo
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
		$broken_product = $this->db->get('broken_repo')->result_array();
		// echo "<pre>";
		// print_r ($broken_product);
		// echo "</pre>";
		$total = $total - $broken_product[0]['bro_qty'];

		// }

		return $total;
	}

	public function history ($mot_id) {
		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('repo.mot_id', $mot_id);
		$this->db->where('inventory.bra_id_to', $this->session->userdata('bra_id'));
		$this->db->join("inventory_info", "inventory_info.int_id = inventory.int_id");
		$this->db->join("branches", "branches.bra_id = inventory.bra_id_from");
		$this->db->join("repo", "repo.mot_id = inventory_info.mot_id");
		$this->db->join("categories", "categories.cat_id = repo.cat_id");
		$this->db->where('ini_type', 'add');	
		$content['inventory'] = $this->model_base->get_all('inventory');

		$this->db->flush_cache();

		$this->db->where('repo.mot_id', $mot_id);
		$this->db->where('stocks.bra_id',  $this->session->userdata('bra_id'));
		$this->db->join("stocks_info", "stocks_info.sto_id = stocks.sto_id");
		$this->db->join("branches", "branches.bra_id = stocks.bra_id");
		$this->db->join("repo", "repo.mot_id = stocks_info.mot_id");
		$this->db->join("categories", "categories.cat_id = repo.cat_id");
		$content['stocks'] = $this->model_base->get_all('stocks');

		$this->db->flush_cache();

		$this->db->where('repo.mot_id', $mot_id);
		$this->db->where('sales.bra_id', $this->session->userdata('bra_id'));
		$this->db->join("sales_info", "sales_info.sal_id = sales.sal_id");
		$this->db->join("clients", "clients.cli_id = sales.cli_id");
		$this->db->join("repo", "repo.mot_id = sales_info.mot_id");
		$this->db->join("categories", "categories.cat_id = repo.cat_id");
		$this->db->join("branches", "branches.bra_id = sales.bra_id");
		$content['sales'] = $this->model_base->get_all('sales');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/repo/history', $content);
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