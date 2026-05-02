<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiries extends CI_Controller {
	private $allowed_search_types = array('mot_model', 'dealers.dea_name', 'mot_brand');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

		if ( $this->have_sess_brand() != true ){
			$this->logout_brand();	
		}

		$this->session->unset_userdata('selected_client');	
    }

    public function index($search_type = "xallx", $search_val ="xallx", $filter = 1 )
	{
		$search_type = $this->normalize_search_type($search_type);
		$search_val = $this->normalize_search_value($search_val);

        $this->session->set_userdata('current_url', current_url());

		$header = [];
		$header['header_title'] = 'Inquiries';
		$header['header'] = 'Inquiries';
		$header['header_small'] = '';
		
        $content = [];
        
        // echo "<pre>";
        // print_r($this->session->all_userdata());
        // echo "</pre>";

		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('search_type', 'Search Type', 'required|trim');
			$this->form_validation->set_rules('search_val', 'Search Value', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('brand/inquiries/index/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$search_val = $this->normalize_search_value($data['search_val']);
				$search_type = $this->normalize_search_type($data['search_type']);
				// $this->godprintp($data);
				redirect('brand/inquiries/index/' . $search_type . '/' . rawurlencode($search_val), 'refresh');
			}	
		}

		$config = array();
		$config["base_url"] = base_url() . "brand/inquiries/index/". $search_type ."/". $search_val ."/";
		$this->_sort($search_type, $search_val );
		$total_row = $this->model_base->count_data('inquiries_new');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 6;
		$config['num_links'] = 10;
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

		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		$content["current_count_start"] = $offset;
		
		$this->_sort($search_type, $search_val );
		$content['inquiries'] = $this->model_base->get_all('inquiries_new');

		$content['controller']=$this; 
		$content['all'] = base_url('brand/inquiries/index/xallx/xallx');
		$content['published'] = base_url('brand/inquiries/index/inq_status/published');
		$content['draft'] = base_url('brand/inquiries/index/inq_status/draft');
		$content['deleted'] = base_url('brand/inquiries/index/inq_status/deleted');
		$content['create'] = base_url('brand/inquiries/create');

		$this->load->view("template/brand_header", $header);
		$this->load->view('brand/inquiries/index', $content);
		$this->load->view("template/brand_footer");
    }

	private function normalize_search_type($search_type)
	{
		if ($search_type === 'xallx') {
			return 'xallx';
		}

		return in_array($search_type, $this->allowed_search_types, true) ? $search_type : 'xallx';
	}

	private function normalize_search_value($search_val)
	{
		if ($search_val === 'xallx') {
			return 'xallx';
		}

		return trim(rawurldecode((string) $search_val));
	}

    public function _sort ($search_type, $search_val) {

		if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
			$this->db->like($search_type, $search_val);
        }

        $this->db->order_by('inquiries_new.inq_created', 'DESC');
        
		// $this->db->where('dealers_branches.deb_id', $this->session->userdata('deb_id'));
		$this->db->where('motorcycles.mot_brand', $this->session->userdata('acc_name'));
		$this->db->join("motorcycles", "motorcycles.mot_id = inquiries_new.mot_id");
        $this->db->join("dealers_motorcycles", "dealers_motorcycles.dem_id = inquiries_new.dem_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
    }
    
    public function edit($id)
	{

		$header = [];
		$header['header_title'] = 'Inquiry';
		$header['header'] = 'Inquiry';
		$header['header_small'] = 'Edit';
		
		$content = [];

		//validations

		// if($this->input->post()) {

		// 	//validations
		// 	$this->form_validation->set_rules('inq_process', 'Inquiry Status', 'required|trim');

		// 	if ($this->form_validation->run() == FALSE) {
		// 		$content['msg_error'] = validation_errors();
		// 	} else {
  //               // success
                
		//   		$data = $this->input->post();

		// 		$data['inq_updated'] = $this->getDatetimeNow();

		//         $this->model_base->update_data($id, 'inq_id', $data, 'inquiries_new');
		// 		$this->session->set_flashdata('msg_success', 'Inquiry Updated!');	

		// 		redirect('brand/inquiries/edit/' . $id, 'refresh');
		// 	}
		// }

		// $this->db->where('dealers_branches.deb_id', $this->session->userdata('deb_id'));
		$this->db->where('motorcycles.mot_brand', $this->session->userdata('acc_name'));
		$this->db->join("motorcycles", "motorcycles.mot_id = inquiries_new.mot_id");
        $this->db->join("dealers_motorcycles", "dealers_motorcycles.dem_id = inquiries_new.dem_id");
        $this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
        $content['inquiries'] = $this->model_base->get_one($id, "inq_id", "inquiries_new");
		$this->db->flush_cache();

        // $this->godprint($content['inquiries']);

        $current_url  =  $this->session->userdata('current_url');
        $content['back'] = $current_url;
        
		$this->load->view("template/brand_header", $header);
		$this->load->view('brand/inquiries/edit', $content);
		$this->load->view("template/brand_footer");
	}


}