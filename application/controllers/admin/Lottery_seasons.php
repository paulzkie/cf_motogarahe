<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery_seasons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = "" )
	{
		$header = [];
		$header['header_title'] = 'Lucky Draw';
		$header['header'] = 'Lucky Draw';
		$header['header_small'] = '';
		
		$content = [];
		
		if ( $filter == '') {
			$this->db->where('los_status', 'published');
		} elseif ( $filter == 'published' ) {
			$this->db->where('los_status', 'published');
		} elseif ( $filter == 'draft' ) {
			$this->db->where('los_status', 'draft');
		} elseif ( $filter == 'deleted' ) {
			$this->db->where('los_status', 'deleted');
		}elseif ( $filter == 'all' ) {
			
		}

		//validations
		$this->form_validation->set_rules('los_name', 'Client Name', 'required|trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				$content['lottery_seasons'] = $this->model_base->like_data($data['los_name'], 'los_name', 'lottery_seasons');
			}	
		} else {
			$content['lottery_seasons'] = $this->model_base->get_all('lottery_seasons');
		}

		// echo "<pre>";
		// print_r ($content['lottery_seasons']);
		// echo "</pre>";
		// break;

		$content['all'] = base_url('admin/lottery_seasons/index/all');
		$content['published'] = base_url('admin/lottery_seasons/index/published');
		$content['draft'] = base_url('admin/lottery_seasons/index/draft');
		$content['deleted'] = base_url('admin/lottery_seasons/index/deleted');
		$content['create'] = base_url('admin/lottery_seasons/create');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_seasons/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function create()
	{

		$header = [];
		$header['header_title'] = 'Lucky Draw';
		$header['header'] = 'Lucky Draw';
		$header['header_small'] = 'Create';
		
		$content = [];

		//validations
		$this->form_validation->set_rules('los_name', 'Season Name', 'required|trim');
		$this->form_validation->set_rules('los_max_usr', 'Max Usrs', 'required|trim|integer');
		$this->form_validation->set_rules('los_status', 'Status', 'required|trim');
		
		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['los_created'] = $this->getDatetimeNow();

				$lastData = $this->model_base->get_lastData('los_id', 'lottery_seasons');
				$data_update['los_status'] = 'deleted';
				$this->model_base->update_data($lastData[0]['los_id'], 'los_id', $data_update, 'lottery_seasons');
				$this->db->flush_cache();
				
				$this->model_base->insert_data($data, 'lottery_seasons');
				$this->session->set_flashdata('msg_success', 'Added Season Lottery!');	
				redirect('admin/lottery_seasons','refresh');
			}
		}

		$content['back'] = base_url('admin/lottery_seasons');
		$content['controller'] = $this; 
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_seasons/create', $content);
		$this->load->view("template/admin_footer");
	}

	public function edit($id)
	{
		$header = [];
		$header['header_title'] = 'Lucky Draw';
		$header['header'] = 'Lucky Draw';
		$header['header_small'] = 'Edit';
		
		$content = [];

		$this->db->where('los_status !=', 'deleted');
		$content['lottery_seasons'] = $this->model_base->get_one($id, "los_id", "lottery_seasons");

		//validations
		$this->form_validation->set_rules('los_name', 'Season Name', 'required|trim');
		$this->form_validation->set_rules('los_max_usr', 'Max Usrs', 'required|trim|integer');
		$this->form_validation->set_rules('los_status', 'Status', 'required|trim');
		if($this->input->post()) {

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$data['los_updated'] = $this->getDatetimeNow();

				$this->model_base->update_data($id, 'los_id', $data, 'lottery_seasons');

				$this->session->set_flashdata('msg_success', 'Updated Personalized Price!');	

				redirect('admin/lottery_seasons/view/' . $id,'refresh');
			}
		}

		$content['back'] = base_url('admin/lottery_seasons');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_seasons/edit', $content);
		$this->load->view("template/admin_footer");
	}

	public function view($id)
	{
		$header = [];
		$header['header_title'] = 'Lucky Draw';
		$header['header'] = 'Lucky Draw';
		$header['header_small'] = 'View';
		
		$content = [];

		$this->db->where('lottery_seasons.los_id', $id);
		$this->db->join("lottery_seasons", "lottery_seasons.los_id = lottery_prizes.los_id");
		$content['lottery_prizes'] = $this->model_base->get_all("lottery_prizes");

		

		$content['back'] = base_url('admin/lottery_seasons');
		$content['edit'] = base_url() . 'admin/lottery_seasons/edit/' . $id;
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_seasons/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function draw($lop_id, $los_id) 
	{
		$this->db->join("lottery_seasons", "lottery_seasons.los_id = lottery_prizes.los_id");
		$content['lottery_prizes'] = $this->model_base->get_one($lop_id, "lop_id", "lottery_prizes");
		$this->db->flush_cache();

		$this->db->where('los_id', $los_id);
		$this->db->where('lop_id', 0);
		$content['lottery_users'] = $this->model_base->get_all("lottery_users");
		$this->db->flush_cache();

		$this->db->where('los_id', $los_id);
		$content['lottery_user_cheater'] = $this->model_base->get_one($lop_id, "lop_id", "lottery_users");
		$this->db->flush_cache();

		$winner = 0;

		if ( empty( $content['lottery_user_cheater'] )  ) {
			//walang cheater
			//echo 'walang cheater'  . '<br/>';
			$winner = array_rand(array_flip(range(1, count($content['lottery_users']) )),1);
			//echo $winner  . '<br/>';
			$winner = $winner-1;
			$lou_id  = $content['lottery_users'][$winner]['lou_id'];
			$winner = $content['lottery_users'][$winner]['usr_id'];

			$data['lop_id'] = $lop_id;
			$data['lou_updated'] = $this->getDatetimeNow();
			$this->model_base->update_data($lou_id, 'lou_id', $data, 'lottery_users');
		} else {
			// may cheaeter
			//echo 'may cheaeter';
			$winner = $content['lottery_user_cheater'][0]['usr_id'];

			$insert_array['usr_id'] = $content['lottery_user_cheater'][0]['usr_id'];
			$insert_array['usr_username'] = $content['lottery_user_cheater'][0]['usr_username'];

			array_push($content['lottery_users'], $insert_array);
		}
		
		$content['lottery_users'] = $this->_shuffle_assoc($content['lottery_users']);
		
		
		// echo $winner . '<br/>';

		// echo "<pre>";
		// print_r ($content['lottery_users'] );
		// echo "</pre>";
		//break;

		$content['winner'] = $winner;
		$this->load->view('admin/lottery_seasons/draw', $content);	
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Lucky Draw';
		$header['header'] = 'Lucky Draw';
		$header['header_small'] = 'View';
		
		$content = [];

		$content['lottery_seasons'] = $this->model_base->delete_data($id, 'los_id', 'los_status', 'lottery_seasons');

		$this->session->set_flashdata('msg_success', 'Deleted Category!');	

		redirect('admin/lottery_seasons/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/lottery_seasons/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_category_name($pro_id) {
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$product = $this->model_base->get_one($pro_id, "pro_id", "products");
		return $product[0]['cat_name'];
	}

	private function _shuffle_assoc($list) { 
		if (!is_array($list)) return $list; 
	  
		$keys = array_keys($list); 
		shuffle($keys); 
		$random = array(); 
		foreach ($keys as $key) { 
		  $random[$key] = $list[$key]; 
		}
		return $random; 
	  } 

	
}