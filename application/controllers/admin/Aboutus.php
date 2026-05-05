<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

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
		$header['header_title'] = 'About Us';
		$header['header'] = 'About Us';
		$header['header_small'] = '';
		
		$content = [];
        
        $content['data'] = $this->model_base->get_all('aboutus');
        
		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/aboutus/index', $content);
		$this->load->view("template/admin_footer");
	}
	
	public function updateaboutus(){
	    $data = array(
	            'title' => $this->input->post("title"),
	            'desc' => $this->input->post("desc"),
	        );
	   $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
	   
	   echo "Data successfully updated!";
	}
	
	public function updateaboutusvid(){
	    $data = array(
	            'video' => $this->input->post("video"),
	        );
	    $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
	   
	    echo "Video successfully updated!";
	}
	
	public function updateaboutusdescA(){

	    $this->load->library('upload');
	    
	    //$img = $_FILES['aboutus_img1']['name'];
				//$this->godprint($ImageCount); // web img
		if(empty($_FILES['aboutus_img1']['name'])){
		   $data = array(
               'title1' => $this->input->post("aboutus_title1"),
               'desc1' => $this->input->post("aboutus_desc1"),
           ); 
           $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		}else{
		   $_FILES['file']['name']     = $_FILES['aboutus_img1']['name'];
    		$_FILES['file']['type']     = $_FILES['aboutus_img1']['type'];
    		$_FILES['file']['tmp_name'] = $_FILES['aboutus_img1']['tmp_name'];
    		$_FILES['file']['error']     = $_FILES['aboutus_img1']['error'];
    		$_FILES['file']['size']     = $_FILES['aboutus_img1']['size'];
    		                
    		                
    		// File upload configuration
    		$uploadPath = './resources/site/newui-assets2/aboutus';
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
            $data = array(
                   'title1' => $this->input->post("aboutus_title1"),
                   'desc1' => $this->input->post("aboutus_desc1"),
                   'img1' => 'resources/site/newui-assets2/aboutus/' . $fileData['file_name']
            );
    		 //$data['img1'] = 'resources/site/newui-assets2/aboutus/' . $fileData['file_name'];
    		 // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
    
    		 // $this->godprint($data);
    		                    
    		 //$this->model_base->insert_data($data, 'motorcycles_pictures');
    		 $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		    
    		}  
		}

	    echo "Data successfully updated!";
	}

	public function updateaboutusdescB(){

	    $this->load->library('upload');
	    
	    //$img = $_FILES['aboutus_img1']['name'];
				//$this->godprint($ImageCount); // web img
		if(empty($_FILES['aboutus_img2']['name'])){
		   $data = array(
               'title2' => $this->input->post("aboutus_title2"),
               'desc2' => $this->input->post("aboutus_desc2"),
           ); 
           $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		}else{
		   $_FILES['file']['name']     = $_FILES['aboutus_img2']['name'];
    		$_FILES['file']['type']     = $_FILES['aboutus_img2']['type'];
    		$_FILES['file']['tmp_name'] = $_FILES['aboutus_img2']['tmp_name'];
    		$_FILES['file']['error']     = $_FILES['aboutus_img2']['error'];
    		$_FILES['file']['size']     = $_FILES['aboutus_img2']['size'];
    		                
    		                
    		// File upload configuration
    		$uploadPath = './resources/site/newui-assets2/aboutus';
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
            $data = array(
                   'title2' => $this->input->post("aboutus_title2"),
                   'desc2' => $this->input->post("aboutus_desc2"),
                   'img2' => 'resources/site/newui-assets2/aboutus/' . $fileData['file_name']
            );
    		 //$data['img1'] = 'resources/site/newui-assets2/aboutus/' . $fileData['file_name'];
    		 // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
    
    		 // $this->godprint($data);
    		                    
    		 //$this->model_base->insert_data($data, 'motorcycles_pictures');
    		 $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		    
    		}  
		}

	    echo "Data successfully updated!";
	}

	public function updateaboutusdescC(){

	    $this->load->library('upload');
	    
	    //$img = $_FILES['aboutus_img1']['name'];
				//$this->godprint($ImageCount); // web img
		if(empty($_FILES['aboutus_img3']['name'])){
		   $data = array(
               'title3' => $this->input->post("aboutus_title3"),
               'desc3' => $this->input->post("aboutus_desc3"),
           ); 
           $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		}else{
		   $_FILES['file']['name']     = $_FILES['aboutus_img3']['name'];
    		$_FILES['file']['type']     = $_FILES['aboutus_img3']['type'];
    		$_FILES['file']['tmp_name'] = $_FILES['aboutus_img3']['tmp_name'];
    		$_FILES['file']['error']     = $_FILES['aboutus_img3']['error'];
    		$_FILES['file']['size']     = $_FILES['aboutus_img3']['size'];
    		                
    		                
    		// File upload configuration
    		$uploadPath = './resources/site/newui-assets2/aboutus';
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
            $data = array(
                   'title3' => $this->input->post("aboutus_title3"),
                   'desc3' => $this->input->post("aboutus_desc3"),
                   'img3' => 'resources/site/newui-assets2/aboutus/' . $fileData['file_name']
            );
    		 //$data['img1'] = 'resources/site/newui-assets2/aboutus/' . $fileData['file_name'];
    		 // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
    
    		 // $this->godprint($data);
    		                    
    		 //$this->model_base->insert_data($data, 'motorcycles_pictures');
    		 $this->model_base->update_data($this->input->post("id"),'aboutus_id',$data,'aboutus');
		    
    		}  
		}

	    echo "Data successfully updated!";
	}

	public function views($id){
		$header = [];
		$header['header_title'] = 'Motorcycles';
		$header['header'] = 'Motorcycles';
		$header['header_small'] = 'View';
		
		$content = [];
		$content["img_names"]= '';


 		// upload mot img start
		$this->form_validation->set_rules('mot_id', 'Name', 'trim|required');
		if($this->input->post("mot_id")) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();

			} else {

				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$data["mot_id"] = $this->input->post("mot_id");

				$ImageCount = count($_FILES['mop_image']['name']); // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];
                $mop_status['mop_status'] = 'deleted';
		        $this->model_base->update_data($id, 'mot_id', $mop_status, 'motorcycles_pictures');
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

		                    $data['mop_image'] = 'uploads/motorcycles/' . $fileData['file_name'];
		                    // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

		                    // $this->godprint($data);
		                    
		                    $this->model_base->insert_data($data, 'motorcycles_pictures');
		                }
		            }
		            echo "Image uploaded!";
					//$this->session->set_flashdata('msg_success', 'Added Photos!');	

				} else {
					echo "Please add photos! ";
					//$this->session->set_flashdata('msg_error', 'Please Add Photos!');	
				}

		  		redirect('admin/motorcycles/view/' . $id,'refresh');
		  	}

		} // upload mot img end	
	}
}