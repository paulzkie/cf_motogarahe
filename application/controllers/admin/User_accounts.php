<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_accounts extends CI_Controller {

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
	}

    public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Accounts';
		$header['header'] = 'Accounts';
		$header['header_small'] = '';
		
		$content = [];

		$this->db->where('cod_status', 'deleted');
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				// $this->db->where('cod_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('cod_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('cod_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('cod_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/user_accounts/index/";
			$total_row = $this->model_base->count_data('codes');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 20;
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
            $this->db->where('cod_status', 'deleted');
            
            $content['codes_count'] = $total_row;
		}
		//validations
		$this->form_validation->set_rules('date_from', 'date from', 'trim');
		$this->form_validation->set_rules('date_to', 'date to', 'trim');
        $this->db->where('cod_status', 'deleted');
		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;

				if ( isset($data['date_from']) && !empty($data['date_from']) ) {
					$this->db->where('cod_updated >=', date("Y\-m\-d\ H:i:s", strtotime($data['date_from'])));
				}

				if ( isset($data['date_to']) && !empty($data['date_to']) ) {
					$this->db->where('cod_updated <=', date("Y\-m\-d\ H:i:s", strtotime($data['date_to'] . ' +1 day')));
				}

				$content['codes'] = $this->model_base->get_all('codes');
                $content['codes_count'] = count($content['codes']);
            }	
		} else {
            $content['codes'] = $this->model_base->get_all('codes');
            $content['codes_count'] = count($content['codes']);
        }
        
        

		$content['controller']=$this; 
		// $content['all'] = base_url('admin/user_accounts/index/all');
		// $content['published'] = base_url('admin/user_accounts/index/published');
		// $content['draft'] = base_url('admin/user_accounts/index/draft');
		// $content['deleted'] = base_url('admin/user_accounts/index/deleted');
		// $content['create'] = base_url('admin/user_accounts/create');
		// $content['history'] = base_url('admin/user_accounts/history');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/user_accounts/index', $content);
		$this->load->view("template/admin_footer");
	}

	
}