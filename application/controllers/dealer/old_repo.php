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

		if ( $this->have_sess_branch() != true ){
			$this->logout_branch();	
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
				redirect('dealer/repo/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $data['search_val'];
				$search_type = $data['search_type'];
				// $this->godprintp($data);
				redirect('dealer/repo/index/' . $search_type . '/' . $search_val, 'refresh');
			}	
		}

		

		$config = array();
		$config["base_url"] = base_url() . "dealer/repo/index/". $search_type ."/". $search_val ."/";
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
		$content['all'] = base_url('dealer/repo/index/xallx/xallx');
		$content['published'] = base_url('dealer/repo/index/mot_status/published');
		$content['draft'] = base_url('dealer/repo/index/mot_status/draft');
		$content['deleted'] = base_url('dealer/repo/index/mot_status/deleted');
		$content['create'] = base_url('dealer/repo/create');

		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repo/index', $content);
		$this->load->view("template/dealer_footer");
	}

	public function _sort($search_type, $search_val) {
		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, $search_val);
		}

		$this->db->order_by('mot_model', 'ASC');
		$this->db->where('repo.deb_id', $this->session->userdata('deb_id'));	
		$this->db->where('repo_pictures.mop_status', 'published');	
		$this->db->join("repo_pictures", "repo_pictures.mot_id = repo.mot_id");
		$this->db->group_by('repo_pictures.mot_id,repo.mot_id');
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('deb_id', 'Branch', 'required|trim');
		$this->form_validation->set_rules('mot_model', 'Model', 'required|trim');
		$this->form_validation->set_rules('mot_brand', 'Brand', 'required|trim');
		$this->form_validation->set_rules('mot_type', 'Category Type', 'required|trim');

		$this->form_validation->set_rules('mot_year', 'Year', 'trim');
		$this->form_validation->set_rules('mot_mileage', 'Mileage', 'trim');
		$this->form_validation->set_rules('mot_desc', 'Description', 'trim');

		$this->form_validation->set_rules('mot_dp', 'Downpayment', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_36', '36mos m.a', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_24', '24mos m.a', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_12', '12mos m.a', 'decimal|trim');

		if($this->input->post()) {


			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success

				// $config['upload_path']   = './uploads/repo'; 
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
		  //           $data['mot_image'] = base_url() . 'uploads/repo/' . $upload['file_name'];
		  //           $data['mot_created'] = $this->getDatetimeNow();

				// 	$this->model_base->insert_data($data, 'repo');
				// 	$this->session->set_flashdata('msg_success', 'Added Structure!');	
				// 	redirect('dealer/repo','refresh');
		  //       } 

	            $data = $this->input->post();
	            $data['mot_created'] = $this->getDatetimeNow();
				$last_id = $this->model_base->insert_data($data, 'repo');

				$this->db->flush_cache();
				$repo_pictures['mot_id'] = $last_id;
				$repo_pictures['mop_image'] ='none';
				// $repo_pictures['mop_image'] ='https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No';
				$this->model_base->insert_data($repo_pictures, 'repo_pictures');

				$this->session->set_flashdata('msg_success', 'Added repo!');	
				redirect('dealer/repo','refresh');
		        
			}
		}

		$content['back'] = base_url('dealer/repo');
		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repo/create', $content);
		$this->load->view("template/dealer_footer");
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

		$this->form_validation->set_rules('mot_dp', 'Downpayment', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_36', '36mos m.a', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_24', '24mos m.a', 'decimal|trim');
		$this->form_validation->set_rules('mot_ma_12', '12mos m.a', 'decimal|trim');


		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
		  		$data['mot_updated'] = $this->getDatetimeNow();

		  		$data = $this->input->post();

		        $this->model_base->update_data($id, 'mot_id', $data, 'repo');
				$this->session->set_flashdata('msg_success', 'Updated motorcycle!');	

				redirect('dealer/repo/view/' . $id,'refresh');
			}
		}

		$this->db->where('repo.deb_id', $this->session->userdata('deb_id'));	
		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['repo'] = $this->model_base->get_one($id, "mot_id", "repo");


		$content['back'] = base_url('dealer/repo');
		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repo/edit', $content);
		$this->load->view("template/dealer_footer");
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

		  		redirect('dealer/repo/view/' . $id,'refresh');
		  	}

		}

		$this->db->where('repo.deb_id', $this->session->userdata('deb_id'));	
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

		$content['back'] = base_url('dealer/repo');
		$content['edit'] = base_url() . 'dealer/repo/edit/' . $id;
		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repo/view', $content);
		$this->load->view("template/dealer_footer");
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
		redirect('dealer/repo/view/' . $mot_id,'refresh');
		
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Repos';
		$header['header'] = 'Repo';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('repo.deb_id', $this->session->userdata('deb_id'));	
		$content['repo'] = $this->model_base->delete_data($id, 'mot_id', 'mot_status', 'repo');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('dealer/repo/','refresh');

		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repo/view', $content);
		$this->load->view("template/dealer_footer");
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