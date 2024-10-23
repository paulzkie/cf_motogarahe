<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajpogigar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}
	
	}

	public function index($filter = "" )
	{
		$header = [];
		$header['header_title'] = 'Codes';
		$header['header'] = 'Codes';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('cod_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('cod_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('cod_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('cod_status', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('cod_name', 'Code Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['codes'] = $this->model_base->like_data($data['cod_name'], 'cod_name', 'codes');
			}	
		} else {
			$content['codes'] = $this->model_base->get_all('codes');
		}

		$content['all'] = base_url('admin/codes/');
		$content['published'] = base_url('admin/codes/index/published');
		$content['draft'] = base_url('admin/codes/index/draft');
		$content['deleted'] = base_url('admin/codes/index/deleted');
		$content['create'] = base_url('admin/codes/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/codes/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Codes';
		$header['header'] = 'Codes';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('cod_name', 'Code Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cod_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'codes');

				$this->session->set_flashdata('msg_success', 'Added Code!');	

				redirect('admin/codes','refresh');
			}
		}

		$content['back'] = base_url('admin/codes');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/codes/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Codes';
		$header['header'] = 'Codes';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['codes'] = $this->model_base->get_one($id, "cod_id", "codes");

		//validations
		$this->form_validation->set_rules('cod_name', 'Code Name', 'required|trim');

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['cod_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'cod_id', $data, 'codes');

				$this->session->set_flashdata('msg_success', 'Updated Code!');	

				redirect('admin/codes/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/codes');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/codes/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Codes';
		$header['header'] = 'Codes';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['codes'] = $this->model_base->get_one($id, "cod_id", "codes");

		$content['back'] = base_url('admin/codes');
		$content['edit'] = base_url() . 'admin/codes/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/codes/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Codes';
		$header['header'] = 'Codes';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['codes'] = $this->model_base->delete_data($id, 'cod_id', 'cod_status', 'codes');

		$this->session->set_flashdata('msg_success', 'Deleted Code!');	

		redirect('admin/codes/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/codes/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function generate() {

		$date = strtotime(date("Y:m:d H:i:s"));

		$pinInt = 00000;  //last to 

	        for ($i=0; $i < 101; $i++) {   


	            $hashCode = md5($date . $i . "ajlovetoni06");

	            $code = "ST" . $hashCode[5] . $hashCode[3] . $hashCode[0] . $hashCode[9] . $hashCode[11] . $hashCode[7] . $hashCode[13] . $hashCode[12] .$hashCode[15]; 
	           
	            $pinInt = $pinInt + 1;  

	            $data['cod_name'] = $code . $pinInt ;
 
	            //starter code setting
	            $data['set_id'] = 1;
	            $data['cod_type'] = "starter";

	            //sparkle code setting
	            // $data['set_id'] = 2;
	            // $data['cod_type'] = "sparkle";
	            
	            $data['cod_status'] = "published";


	            //echo code
	            echo $data['cod_name'] . '<br/>';
	            $this->model_base->insert_data($data, 'codes');

	         
	    }

	}
}