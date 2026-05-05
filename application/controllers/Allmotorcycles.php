<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allmotorcycles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination', 'session'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	public function index()
	{
		$header = [];
		$content = [];
		$header['header_title'] = 'Motorcycles';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		$header['header_featured_img'] = "";
		$header['mot_model'] = "";
		
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->where('motorcycles.mot_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		$datas = $this->model_base->get_all('motorcycles');
		foreach ($datas as $key) {
			echo "<a style='display:block;'class='urlcrawl' href=".base_url()."motorcycles"."/".strtolower($key["mot_brand"])."/".$key["mot_slug"].">".$key["mot_brand"].' '.$key["mot_slug"].' 2121 |'." motogarahe.com</a>";
			$header['header_keywords'] = $key["mot_brand"].' '.$key["mot_slug"].' 2121 |'." motogarahe.com";
			//echo strtolower($key["mot_brand"])."/".$key["mot_slug"];
		}
		redirect('motorcycles', 'refresh');
	}
	
}