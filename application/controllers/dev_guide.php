<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dev_guide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session',  'googlemaps', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		

		// if ( $this->session->userdata('usr_id') ) {

		// 	$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		// 	if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
		// 		$this->logout_user();	
		// 	}

			
		// }
	}

	public function index()
	{
		$header = [];
		$content = [];
		$header['header_title'] = 'devhome';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";

		$this->load->view("template/dev_site_header2", $header);
		$this->load->view('site/dev_view_guide', $content);
		$this->load->view("template/dev_site_footer", $footer);
	}

}
