<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogs extends CI_Controller {

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
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
		$header['header_small'] = '';
		
		$content = [];


		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('admin/blogs/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];


				// $this->godprintp($data);

				redirect('admin/blogs/index/' . $search_type . '/' . $search_val, 'refresh');

			}	
		}

		
		$config = array();
		$config["base_url"] = base_url() . "admin/blogs/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('blogs');
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
		$content['blogs'] = $this->model_base->get_all('blogs');
		// $this->godprint($content['dealers_branches']);

		$content['controller']=$this; 
		$content['all'] = base_url('admin/blogs/index/xallx/xallx');
		$content['published'] = base_url('admin/blogs/index/blo_status/published');
		$content['draft'] = base_url('admin/blogs/index/blo_status/draft');
		$content['deleted'] = base_url('admin/blogs/index/blo_status/deleted');
		$content['create'] = base_url('admin/blogs/create');

		$content['accomplished'] = base_url('admin/blogs/index/accomplished');
		$content['ongoing'] = base_url('admin/blogs/index/ongoing');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/blogs/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function _sort ($search_type, $search_val) {

		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, urldecode($search_val));
		}

		$this->db->order_by('blo_created', 'DESC');
		// $this->db->where('blo_status', 'published');
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
		$header['header_small'] = 'Create';
		
		$content = [];

		if($this->input->post()) {

			// $this->form_validation->set_rules('mot_id', 'Model', 'required|trim');
			// $this->form_validation->set_rules('deb_id', 'Dealer Branch', 'required|trim');
			// $this->form_validation->set_rules('dem_price', 'Total Price', 'decimal|trim');
			// $this->form_validation->set_rules('dem_dp', 'Downpayment', 'decimal|trim');
			// $this->form_validation->set_rules('dem_installment', '36mos m.a.', 'decimal|trim');
			// $this->form_validation->set_rules('dem_installment2', '24mos m.a.', 'decimal|trim');
			// $this->form_validation->set_rules('dem_installment3', '12mos m.a.', 'decimal|trim');
			// $this->form_validation->set_rules('dem_promo', 'Promos List', 'required|trim');
			// $this->form_validation->set_rules('dem_colors', 'Color Variant List', 'required|trim');

			// $this->form_validation->set_rules('blo_img', 'Image', 'required|trim');
			$this->form_validation->set_rules('blo_desc', 'Description', 'required|trim');
			$this->form_validation->set_rules('blo_content', 'Content', 'required|trim');

			// $data = $this->input->post();

			// $data['blo_content'] =  addslashes( $data['blo_content'] );

		 //            $this->godprintp($data);

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				$config['upload_path']   = './uploads/blogs'; 
		  		//$config['allowed_types'] = 'jpg|png|jpeg|webp'; 
		  		$config['allowed_types'] = '*';
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);
					
		  		if ( !$this->upload->do_upload('blo_image')) {
		          	$error = array('error' => $this->upload->display_errors()); 
		          	$content['msg_error'] = $error;
				} else { 
		            $upload = $this->upload->data();
		            $data = $this->input->post();

		            unset($data["_wysihtml5_mode"]);

		            $data['blo_image'] = 'uploads/blogs/' . $upload['file_name'];
		            $data['blo_created'] = $this->getDatetimeNow();
		            $data['blo_slug'] = $this->_slug( $data['blo_title'] );
		            $data['blo_content'] =  addslashes( $data['blo_content'] );

		            // $this->godprintp($data);

					$last_id = $this->model_base->insert_data($data, 'blogs');
					$this->session->set_flashdata('msg_success', 'Added blog!');	
					redirect('admin/blogs/view/' . $last_id,'refresh');
		        } 

	            


	   //          $data['dem_created'] = $this->getDatetimeNow();
				// $last_id = $this->model_base->insert_data($data, 'dealers_motorcycles');

				// $this->db->flush_cache();

				// $this->session->set_flashdata('msg_success', 'Added Dealers Motorcycles!');	
				// redirect('admin/blogs/view/' . $last_id,'refresh');
				// redirect('admin/blogs','refresh');
		        
			}
		}

		$content['back'] = base_url('admin/blogs');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/blogs/create', $content);
		$this->load->view("template/admin_footer");
	}





	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$content['blogs'] = $this->model_base->get_one($id, "blo_id", "blogs");

		$content['blogs'][0]['blo_content'] = stripcslashes( $content['blogs'][0]['blo_content'] );


		if($this->input->post()) {

			//validations
			$this->form_validation->set_rules('blo_desc', 'Description', 'required|trim');
			$this->form_validation->set_rules('blo_content', 'Content', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$config['upload_path']   = './uploads/blogs'; 
		  		//$config['allowed_types'] = 'jpg|png|jpeg|webp'; 
		  		$config['allowed_types'] = '*';
		  		$config['encrypt_name'] = TRUE; 
		  		$config['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)

		  		$this->load->library('upload', $config);


		  		$data = $this->input->post();

		  		if ( !$this->upload->do_upload('blo_image')) {
		  			$data["blo_image"] = $content['blogs'][0]['blo_image'];
				} else { 
					$upload = $this->upload->data();
		            $data['blo_image'] = 'uploads/blogs/' . $upload['file_name'];
				}

				unset($data["_wysihtml5_mode"]);

				$data['blo_updated'] = $this->getDatetimeNow();
				$data['blo_slug'] = $this->_slug( $data['blo_title'] );
				$data['blo_content'] =  addslashes( $data['blo_content'] );

		        $this->model_base->update_data($id, 'blo_id', $data, 'blogs');
				$this->session->set_flashdata('msg_success', 'Updated Blog!');	

				redirect('admin/blogs/view/' . $id,'refresh');
			}
		}

		

		$content['back'] = base_url('admin/blogs');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/blogs/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['blogs'] = $this->model_base->get_one($id, "blo_id", "blogs");

		$content['blogs'][0]['blo_content'] = stripcslashes( $content['blogs'][0]['blo_content'] );


		// $this->godprint($content['dealers_motorcycles']);

		$content['back'] = base_url('admin/blogs');
		$content['edit'] = base_url() . 'admin/blogs/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/blogs/view', $content);
		$this->load->view("template/admin_footer");
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './uploads/dealers_motorcycles'; 
	    //$config['allowed_types'] = 'jpg|png|webp';
	    $config['allowed_types'] = '*';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;
	}

	public function delete_picture($mop_id, $deb_id) {
		$content['dealers_motorcycles'] = $this->model_base->delete_data($mop_id, 'mop_id', 'mop_status', 'motorcycles_pictures');


		$this->session->set_flashdata('msg_success', 'Photo Deleted!');	
		redirect('admin/blogs/view/' . $deb_id,'refresh');
		
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['blogs'] = $this->model_base->delete_data($id, 'blo_id', 'blo_status', 'blogs');

		$this->session->set_flashdata('msg_success', 'Deleted Blog!');	

		redirect('admin/blogs/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/blogs/view', $content);
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
		$header['header_title'] = 'Blogs';
		$header['header'] = 'Blogs';
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
		$this->load->view('admin/blogs/history', $content);
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