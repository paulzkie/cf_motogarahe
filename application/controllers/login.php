<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination'));
		$this->load->model('model_base');
		$this->load->model('model_login');
		
    }
    public function index(){
        $this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-login', $content);
		$this->load->view("newui/template/site_footer", $footer);	
    }

	

}



