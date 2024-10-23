<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgclub extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			//$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($search_type = "xallx", $search_val ="xallx", $filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'MG Club';
		$header['header'] = 'MG Club';
		$header['header_small'] = '';
		
		$content = [];
		
		// $config = array();
		// $config["base_url"] = base_url() . "merchant/mgclub/index/". $search_type ."/". $search_val ."/";
		// $total_row = $this->model_base->count_data('mgclubmembers');
		// $config["total_rows"] = $total_row;
		// $config['per_page'] = 20;
		// $config['uri_segment'] = 6;
		// $config['num_links'] = $total_row;
		// $config['use_page_numbers'] = TRUE;
		// $config['full_tag_open'] = '<ul class="pagination">';
		// $config['full_tag_close'] = '</ul>';
		// $config['prev_link'] = 'Previous';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active"><a href="">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['next_link'] = 'Next';

		// $this->pagination->initialize($config);

		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset);
		// $content["current_count_start"] = $offset;	
		
		//$this->_sort($search_type, $search_val );
		$content['mgclub'] = $this->model_base->get_all('mgclubmembers');

		$this->load->view("merchant/merchant_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('merchant/mgclub', $content);
		$this->load->view("template/admin_footer");
	}

}