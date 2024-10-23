<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

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
		$header['header_title'] = 'Homepage';
		$header['header'] = 'Homepage';
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
		$content['all'] = base_url('admin/homepage/index/xallx/xallx');
		$content['published'] = base_url('admin/homepage/index/mot_status/published');
		$content['draft'] = base_url('admin/homepage/index/mot_status/draft');
		$content['deleted'] = base_url('admin/homepage/index/mot_status/deleted');
		$content['create'] = base_url('admin/homepage/create');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/homepage/banners', $content);
		$this->load->view("template/admin_footer");
	}

	public function addhomepageimg(){

 		// upload mot img start
 		if($this->input->post("addbanner")=="addbanner"){
		if(empty($this->input->post("bannertitle"))) {
			echo "Enter Banner Title";
			// $msg = array(
			// 	'stat' => 0,
			// 	'msg' => "Enter Banenr Title"
			// );
		}else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$data["bannertitle"] = $this->input->post("bannertitle");
				$data["bannerdesc"] = $this->input->post("bannerdesc");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$bannerimg = $_FILES['bannerimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				if (empty($bannerimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					echo "No image attached!Please attach image.";
				}else{	

		                $_FILES['file']['name']     = $_FILES['bannerimg']['name'];
		                $_FILES['file']['type']     = $_FILES['bannerimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['bannerimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['bannerimg']['error'];
		                $_FILES['file']['size']     = $_FILES['bannerimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/banner';
		                $config['upload_path'] = $uploadPath;
		                //$config['allowed_types'] = 'jpg|jpeg|png';
		                $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['bannerimg'] = 'resources/site/newui-assets2/landingimg/banner/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_banner');
		                   // echo $data['bannerimg'] ;
		                }

		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Banner added!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
		  	} // upload mot img end	
		}

		else if($this->input->post("addmerchant")=="addmerchant"){
			if(empty($this->input->post("merchantname"))) {
				echo "Enter merchant name!";
				// $msg = array(
				// 	'stat' => 0,
				// 	'msg' => "Enter Banenr Title"
				// );
			}
			else if(empty($this->input->post("username"))){
				echo "Enter username!";
			}
			else if(empty($this->input->post("password"))){
				echo "Enter password!";
			}
			else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$data["merchantname"] = $this->input->post("merchantname");
				$data["merchantdesc"] = $this->input->post("merchantdesc");
				$data["username"] = $this->input->post("username");
				$data["password"] = md5($this->input->post("password"));
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$merchantimg = $_FILES['merchantimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];
				if (empty($merchantimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					echo "No image attached!Please attach image.";
				}else{	

		                $_FILES['file']['name']     = $_FILES['merchantimg']['name'];
		                $_FILES['file']['type']     = $_FILES['merchantimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['merchantimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['merchantimg']['error'];
		                $_FILES['file']['size']     = $_FILES['merchantimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/mgclub';
		                $config['upload_path'] = $uploadPath;
		                //$config['allowed_types'] = 'jpg|jpeg|png';
		                $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['merchantimg'] = 'resources/site/newui-assets2/mgclub/'. $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_merchant');
		                    //echo $merchantimg;
		                    
		                }
		                //echo $data["merchantname"],$data["merchantdesc"];
		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Merchant added!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
		  	} // upload mot img end	
		}
		else if($this->input->post("addtestimonial")=="addtestimonial"){
			if(empty($this->input->post("highlightdesc"))) {
				echo "Enter highlight description!";
				// $msg = array(
				// 	'stat' => 0,
				// 	'msg' => "Enter Banenr Title"
				// );
			}else if(empty($this->input->post("description"))){
				echo "Enter description!";
			}else if(empty($this->input->post("custname"))){
				echo "Enter customer name!";
			}else if(empty($this->input->post("mot_model"))){
				echo "Enter motorcycle name!";
			}else if(empty($this->input->post("dealername"))){
				echo "Enter dealer name!";
			}else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$data["title"] = $this->input->post("highlightdesc");
				$data["description"] = $this->input->post("description");
				$data["custname"] = $this->input->post("custname");
				$data["mot_model"] = $this->input->post("mot_model");
				$data["dealername"] = $this->input->post("dealername");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$testimonialimg = $_FILES['testimonialimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];
				if (empty($testimonialimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					echo "No image attached!Please attach image.";
				}else{	

		                $_FILES['file']['name']     = $_FILES['testimonialimg']['name'];
		                $_FILES['file']['type']     = $_FILES['testimonialimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['testimonialimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['testimonialimg']['error'];
		                $_FILES['file']['size']     = $_FILES['testimonialimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/testimonials';
		                $config['upload_path'] = $uploadPath;
		               // $config['allowed_types'] = 'jpg|jpeg|png';
		               $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['testimonialimg'] = 'resources/site/newui-assets2/landingimg/testimonials/'. $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_testimonial');
		                    //echo $testimonialimg;
		                    
		                }
		                //echo $data["merchantname"],$data["merchantdesc"];
		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Testimonial added!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
		  	} // upload mot img end	
		}
	}

	public function updatehomepageimg(){

 		// upload mot img start
 		if($this->input->post("updatebanner")=="updatebanner"){
		if(empty($this->input->post("bannertitle"))) {
			echo "Enter Banner Title";
			// $msg = array(
			// 	'stat' => 0,
			// 	'msg' => "Enter Banenr Title"
			// );
		}else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$bannerid = $this->input->post("bannerid");
				$data["bannertitle"] = $this->input->post("bannertitle");
				$data["bannerdesc"] = $this->input->post("bannerdesc");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$bannerimg = $_FILES['bannerimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				if (empty($bannerimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					$this->model_base->update_data($bannerid,'bannerid',$data, 'homepage_banner');
					echo "Banner updated!!";
				}else{	

		                $_FILES['file']['name']     = $_FILES['bannerimg']['name'];
		                $_FILES['file']['type']     = $_FILES['bannerimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['bannerimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['bannerimg']['error'];
		                $_FILES['file']['size']     = $_FILES['bannerimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/banner';
		                $config['upload_path'] = $uploadPath;
		                //$config['allowed_types'] = 'jpg|jpeg|png';
		                $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['bannerimg'] = 'resources/site/newui-assets2/landingimg/banner/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_banner');
		                   // echo $data['bannerimg'] ;
		                }

		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Banner updated!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
			}
		}
		else if($this->input->post("updatemerchant")=="updatemerchant"){
			if(empty($this->input->post("merchantname"))) {
				echo "Enter merchant name!";
				// $msg = array(
				// 	'stat' => 0,
				// 	'msg' => "Enter Banenr Title"
				// );
			}
			else if(empty($this->input->post("username"))){
				echo "Enter username!";
			}
			else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$merchantid = $this->input->post("merchantid");
				$data["merchantname"] = $this->input->post("merchantname");
				$data["merchantdesc"] = $this->input->post("merchantdesc");
				$data["username"] = $this->input->post("username");
				//$data["password"] = $this->input->post("password");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$merchantimg = $_FILES['merchantimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				if (empty($merchantimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					if(empty($this->input->post("password"))){
						$this->model_base->update_data($merchantid,'merchantid',$data, 'homepage_merchant');	
					}else{
						$data["password"] = md5($this->input->post("password"));
						$this->model_base->update_data($merchantid,'merchantid',$data, 'homepage_merchant');	
					}
					
					echo "Merchant updated!!";
				}else{	

		                $_FILES['file']['name']     = $_FILES['merchantimg']['name'];
		                $_FILES['file']['type']     = $_FILES['merchantimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['merchantimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['merchantimg']['error'];
		                $_FILES['file']['size']     = $_FILES['merchantimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/mgclub';
		                $config['upload_path'] = $uploadPath;
		                //$config['allowed_types'] = 'jpg|jpeg|png';
		                $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['bannerimg'] = 'resources/site/newui-assets2/mgclub/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_merchant');
		                   // echo $data['bannerimg'] ;
		                }

		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Merchant updated!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
			}
		}
		else if($this->input->post("updatetestimonial")=="updatetestimonial"){
			if(empty($this->input->post("highlightdesc"))) {
				echo "Enter highlight description!";
				// $msg = array(
				// 	'stat' => 0,
				// 	'msg' => "Enter Banenr Title"
				// );
			}else if(empty($this->input->post("description"))){
				echo "Enter description!";
			}else if(empty($this->input->post("custname"))){
				echo "Enter customer name!";
			}else if(empty($this->input->post("mot_model"))){
				echo "Enter motorcycle name!";
			}else if(empty($this->input->post("dealername"))){
				echo "Enter dealer name!";
			}else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$testimonialid = $this->input->post("testimonialid");
				$data["title"] = $this->input->post("highlightdesc");
				$data["description"] = $this->input->post("description");
				$data["custname"] = $this->input->post("custname");
				$data["mot_model"] = $this->input->post("mot_model");
				$data["dealername"] = $this->input->post("dealername");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();
				//$ImageCount = count($_FILES['bannerimg']['name']); // web img
				$testimonialimg = $_FILES['testimonialimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				if (empty($testimonialimg)) {
					// $msg = array(
					// 	'stat' => 0,
					// 	'msg' => "No image attached!Please attach image."
					// );
					$this->model_base->update_data($testimonialid,'testimonialid',$data, 'homepage_testimonial');
					echo "Testimonial updated!!";
				}else{	

		                $_FILES['file']['name']     = $_FILES['testimonialimg']['name'];
		                $_FILES['file']['type']     = $_FILES['testimonialimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['testimonialimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['testimonialimg']['error'];
		                $_FILES['file']['size']     = $_FILES['testimonialimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/testimonials';
		                $config['upload_path'] = $uploadPath;
		                //$config['allowed_types'] = 'jpg|jpeg|png';
		                $config['allowed_types'] = '*';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();


		                    // $this->godprint($fileData);

		                    $data['testimonialimg'] = 'resources/site/newui-assets2/landingimg/testimonials/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    $this->model_base->insert_data($data, 'homepage_testimonial');
		                   // echo $data['bannerimg'] ;
		                }

		   //          $msg = array(
					// 	'stat' => 1,
					// 	'msg' => "Banner added!"
					// );
					echo "Testimonial updated!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	
				}
			}
		}
			 // upload mot img end	
	}

	public function removehomepageimg() {
		if($this->input->post("banner")=="banner"){
			$bannerid = $this->input->post("id");
			$content['banner'] = $this->model_base->delete_data($bannerid, 'bannerid', 'status', 'homepage_banner');
		}
		else if($this->input->post("merchant")=="merchant"){
			$merchantid = $this->input->post("id");
			$content['merchant'] = $this->model_base->delete_data($merchantid, 'merchantid', 'status', 'homepage_merchant');
		}
		else if($this->input->post("testimonial")=="testimonial"){
			$testimonialid = $this->input->post("id");
			$content['testimonial'] = $this->model_base->delete_data($testimonialid, 'testimonialid', 'status', 'homepage_testimonial');
		}
		

		echo "Data deleted!";
	}

	public function banners($search_type = "xallx", $search_val ="xallx", $filter = 1 ){
		$header = [];
		$header['header_title'] = 'Homepage - Banner';
		$header['header'] = 'Homepage - Banner';
		$header['header_small'] = '';
		$content = [];

		$config = array();
		$config["base_url"] = base_url() . "admin/homepage/banners/index/". $search_type ."/". $search_val ."/";
		//$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('homepage_banner');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 7;
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

		$content['banner'] = $this->model_base->get_all('homepage_banner');

		$this->load->view("template/admin_header", $header);
		$this->load->view("admin/homepage/popupadd");
		$this->load->view("admin/homepage/popupedit", $content);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/homepage/banners', $content);
		$this->load->view("template/admin_footer");
	}

	public function merchants($search_type = "xallx", $search_val ="xallx", $filter = 1 ){ 
		$header = [];
		$header['header_title'] = 'Homepage - Partner Merchants';
		$header['header'] = 'Homepage - Partner Merchants';
		$header['header_small'] = '';
		$content = [];

		$config = array();
		$config["base_url"] = base_url() . "admin/homepage/merchants/index/". $search_type ."/". $search_val ."/";
		//$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('homepage_merchant');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 7;
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

		$content['merchant'] = $this->model_base->get_all('homepage_merchant');

		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/homepage/merchants', $content);
		$this->load->view("template/admin_footer");
	}

	public function testimonials($search_type = "xallx", $search_val ="xallx", $filter = 1 ){ 
		$header = [];
		$header['header_title'] = 'Homepage - Testimonials';
		$header['header'] = 'Homepage - Testimonials';
		$header['header_small'] = '';
		$content = [];

		$config = array();
		$config["base_url"] = base_url() . "admin/homepage/testimonials/index/". $search_type ."/". $search_val ."/";
		//$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('homepage_testimonial');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 7;
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
        
        $this->db->order_by('testimonialid','desc');
		$content['testimonial'] = $this->model_base->get_all('homepage_testimonial');

		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/homepage/testimonials', $content);
		$this->load->view("template/admin_footer");
	}
}