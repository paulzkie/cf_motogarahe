<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captchas extends CI_Controller {

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
		$header['header_title'] = 'Captchas';
		$header['header'] = 'Captchas';
		$header['header_small'] = '';
		
		$content = [];

		//$this->db->order_by('cap_fname', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('cap_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('cap_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('cap_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('cap_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/captchas/index/";
			$total_row = $this->model_base->count_data('captcha');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 15;
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
			$this->db->where('cap_status !=', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
		$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['captchas'] = $this->model_base->like_data($search_value, $search_type, 'captcha');
			}	
		} else {
			$content['captchas'] = $this->model_base->get_all('captcha');
		}


		// $this->db->flush_cache();	
		// $this->db->where('cap_type', "sparkle");	
		// $this->db->join('captchas', 'captchas.cap_id = lottery_captchas.cap_id');
		// $sparkle_captchas = $this->model_base->get_all('lottery_captchas');	
		// $content['sparkle_captchas_count'] = count($sparkle_captchas);
		// $content['sparkle_captchas_amount'] = $content['sparkle_captchas_count'] * 1200.00;

		// $this->db->flush_cache();	
		// $this->db->where('cap_type', "starter");	
		// $starter_captchas = $this->model_base->get_all('captchas');	
		// $content['starter_captchas_count'] = count($starter_captchas);
		// $content['starter_captchas_amount'] = $content['starter_captchas_count'] * 300.00;


		// $content['captchas_count'] = $content['sparkle_captchas_count'] + $content['starter_captchas_count'];
		// $content['captchas_amount'] = $content['sparkle_captchas_amount'] + $content['starter_captchas_amount'];


		// echo "<pre>";
		// print_r ($sparkle_captchas);
		// echo "</pre>";

		$content['controller']=$this; 
		$content['all'] = base_url('admin/captchas/index/all');
		$content['published'] = base_url('admin/captchas/index/published');
		$content['draft'] = base_url('admin/captchas/index/draft');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/captchas/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Captchas';
		$header['header'] = 'Captchas';
		$header['header_small'] = 'Edit';
		
		$content = [];
		$content['captchas'] = $this->model_base->get_one($id, "cap_id", "captchas");

		//validations
		$this->form_validation->set_rules('cap_fname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('cap_mname', 'Middlename', 'required|trim');
		$this->form_validation->set_rules('cap_lname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('cap_address', 'Address', 'required|trim');
		
		
		$this->form_validation->set_rules('cap_bday', 'Birthday', 'required|trim');
		$this->form_validation->set_rules('cap_contact', 'Contact Number', 'required|trim');
		$this->form_validation->set_rules('cap_email', 'Email', 'required|trim|valid_email');

		

		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;

				$data['cap_created'] = $this->getDatetimeNow();
		        $data['cap_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['cap_bday']));

				$this->model_base->update_data($id, 'cap_id', $data, 'captchas');

				$this->session->set_flashdata('msg_success', 'Updated User!');	

				redirect('admin/captchas/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/captchas');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/captchas/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Captchas';
		$header['header'] = 'Captchas';
		$header['header_small'] = 'View';
		
		$content = [];


		$content['captchas'] = $this->model_base->get_one($id, "cap_id", "captchas");
		

		$content['back'] = base_url('admin/captchas');
		$content['edit'] = base_url() . 'admin/captchas/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/captchas/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function activate_account($cap_id) {
		$data = [];
		$data['cap_activate'] = 'yes';
		$this->model_base->update_data($cap_id, 'cap_id', $data, 'captchas');

		$this->db->flush_cache();

		$setting = $this->model_base->get_one(1, "set_id", "settings");

		$direct1 = $this->model_base->get_one($cap_id, "cap_id", "captchas");

		$date_now = $this->getDatetimeNow();
		$data2 = [];
		$data2['dir_from_id'] = 0;	
		$data2['dir_from_username'] = 'Account Activation';	
		$data2['dir_to_id'] = $direct1[0]['cap_id'];	
		$data2['dir_to_username'] = $direct1[0]['cap_username'];	
		$data2['dir_position'] = 0;
		$data2['dir_amount'] = $settings[0]['set_activation'];
		$data2['dir_from_type'] = '';
		$data2['dir_created'] = $date_now;

		$this->model_base->insert_data($data2, 'direct_indirect');

		$this->session->set_flashdata('msg_success', 'Account Activated!');	
		redirect('admin/captchas','refresh');
	}

}