<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogs extends CI_Controller {

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
		$config["base_url"] = base_url(). "/blogs/index";
		$this->_sort();
		$total_row = $this->model_base->count_data('blogs');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;

		$config['num_links'] = $total_row;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		$this->db->flush_cache();
		$this->_sort();
		$content['blogs'] = $this->model_base->get_all('blogs');

		// echo $filter;
		// echo "test";
		// $this->db->flush_cache();
		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset);
		// $this->_sort();
		// $content['blogs'] = $this->model_base->get_all('blogs');
		// $this->db->flush_cache();

		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset,$config['uri_segment']);
		// $this->_sort();
		// $content['blogs'] = $this->model_base->get_all('blogs');
	
		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/blog-list', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}

	public function _sort() {
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
		$header['header_featured_img'] = $content['blogs'][0]['blo_image'];


		if($this->input->post()) {

			$this->form_validation->set_rules('new_email', 'Email', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors() );
			} else {
				// success
				$data = $this->input->post();
				$data['new_email'] = $this->clean_input($data['new_email']);
				$data['new_created'] = $this->getDatetimeNow();
				$data['new_status'] = 'published';

				$last_id = $this->model_base->insert_data($data, 'newsletter_emails');
				$this->session->set_flashdata('msg_success', 'Sent');	

				$current_url  =  $this->session->userdata('current_url');
				redirect($current_url,'refresh');	
			}
		}


		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/blog-content', $content);
		$this->load->view("newui/template/site_footer", $footer);	
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
	public function scroll(){
		$output = '';
		$limit = intval($this->clean_input($this->input->post("limit")));
		$start = intval($this->clean_input($this->input->post("start")));
		$this->db->limit( $limit, $start );
		$this->_sort();
		$data = $this->model_base->get_all('blogs');
		// echo $start. " limit->".$limit;
		// echo print_r($data);
		
			foreach($data as $result)
			{
				$output .= '
				<div class="col-md-6">
				<div class="blog-box">
				<div class="img-holder"     
				style="background: url('. base_url().$result['blo_image'].');">
				</div> 
				<div class="blog-details">
				<h3 class="blog-title">'.$result["blo_title"].'</h3>
				<h6 class="blog-author">'.$result["blo_author"].' </h6>
				<h6 class="blog-date">'.date("F j, Y",strtotime($result["blo_created"])).' </h6>
				<p>'.$result["blo_desc"].'</p><a href="'.base_url().''."blogs/content/" . $result['blo_slug'].'" class="btn btn-outline-secondary"z>Read More</a></div></div></div>';
			}
		echo $output;
		// <img src="http://localhost/cf_motogarahe/resources/site/newui-assets2/assets/blog1.png" alt=""></div>

	}

}



