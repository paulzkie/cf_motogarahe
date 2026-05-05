<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	public function index($filter="1")
	{
		$this->session->set_userdata('current_url', current_url());

		$header = [];
		$content = [];
		$header['header_title'] = 'MG News';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";

		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$config = array();
		$config["base_url"] = base_url() . "admin/blogs/index/";
		$this->_sort();
		$total_row = $this->model_base->count_data('blogs');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 30;
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
		$content["current_count_start"] = $offset;
		
		

		//validations

		$this->_sort();
		$content['blogs'] = $this->model_base->get_all('blogs');


		// echo "<pre>";
		// 		print_r ($content['blogs']);
		// 		echo "</pre>";


		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_blogs', $content);
		$this->load->view("template/site_footer", $footer);
	}

	public function _sort () {

		// if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
		// 	$this->db->like($search_type, urldecode($search_val));
		// }

		$this->db->order_by('blo_created', 'DESC');
		$this->db->where('blo_status', 'published');
	}

	public function content($slug)  {



		$slug = $this->clean_input($slug);

		// echo $slug;
		// break;

		$this->session->set_userdata('current_url', current_url());

		if ( empty($slug) ) {
			redirect('home');
		}

		$header = [];
		$content = [];

		$content['blogs'] = $this->model_base->get_one($slug, "blo_slug", "blogs");
		$content['blogs'][0]['blo_content'] = stripcslashes( $content['blogs'][0]['blo_content'] );

		$header['header_title'] = $content['blogs'][0]['blo_title'];
		$header['header_desc'] = $content['blogs'][0]['blo_desc'];

		// $this->godprint($content['blogs']);


		$this->load->view("template/site_header", $header);
		$this->load->view('site/dev_view_blogs_info', $content);
		$this->load->view("template/site_footer");	
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

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */