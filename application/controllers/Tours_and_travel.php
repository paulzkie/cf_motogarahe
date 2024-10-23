<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tours_and_travel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form'));
		$this->load->library(array('form_validation', 'security'));
	}

	public function index()
	{
		$header = [];
		$header['header_title'] = 'Tours and Travel';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_tours_and_travel', $content);
		$this->load->view("template/site_footer");
	}

	public function tour_details()
	{
		$header = [];
		$header['header_title'] = 'Tours and Travel';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_details', $content);
		$this->load->view("template/site_footer");
	}

	public function tour_booking()
	{
		$header = [];
		$header['header_title'] = 'Tours and Travel';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_booking', $content);
		$this->load->view("template/site_footer");
	}

	public function tour_thankyou()
	{
		$header = [];
		$header['header_title'] = 'Tours and Travel';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_thankyou', $content);
		$this->load->view("template/site_footer");
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */