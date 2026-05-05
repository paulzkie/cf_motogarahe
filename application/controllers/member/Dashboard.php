<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');

		if ( $this->have_sess_user() != true ){
			$this->logout_user();	
		}

		$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
			$this->logout_user();	
		}
	}

	public function index()
	{

		$header = [];
		$header['header_title'] = 'Dashboard';
		$header['header'] = 'Dashboard';
		$header['header_small'] = '';
		
		$content = [];

		// $this->db->flush_cache();
		// $this->db->select_sum('sal_total');
		// $this->db->where('sal_status', 'published');
		// $this->db->where('acc_id', $this->session->userdata('bra_id') );
		// $this->db->where('month(sat_created)',date('m'));
		// $sales = $this->db->get('sales')->result_array();
		// $content['total_sale'] = $sales[0]['sal_total'];

		// $this->db->flush_cache();
		// $this->db->where('cli_status !=', 'deleted');
		// $clients = $this->db->get('clients')->result_array();
		// $content['total_client'] = count($clients);

		// $this->db->flush_cache();
		// $this->db->where('pro_status !=', 'deleted');
		// $products = $this->db->get('products')->result_array();
		// $content['total_products'] = count($products);

		$this->db->where('los_status', 'published');
		$content['lottery_seasons'] = $this->model_base->get_all('lottery_seasons');
		$this->db->flush_cache();

		$this->db->where('los_id', $content['lottery_seasons'][0]['los_id']);
		$users_participant = $this->model_base->count_data('lottery_users');

		// echo "<pre>";
		// print_r ($content['lottery_seasons']);
		// echo "</pre>";

		 //echo $users_participant ;
		$percent = $users_participant/$content['lottery_seasons'][0]['los_max_usr'];
		$content['participant_percentage'] = number_format( $percent * 100, 2 );
		// $content['participant_percentage'] = (   / 100) *  ;

		$this->db->where('lottery_seasons.los_id', $content['lottery_seasons'][0]['los_id']);
		$this->db->join("lottery_seasons", "lottery_seasons.los_id = lottery_prizes.los_id");
		$content['lottery_prizes'] = $this->model_base->get_all("lottery_prizes");
		$this->db->flush_cache();
		// echo "<pre>";
		// print_r ($content['lottery_prizes']);
		// echo "</pre>";

		
		$this->db->where('lottery_users.lop_id !=', 0 );
		$this->db->where('lottery_users.los_id <=', ($content['lottery_seasons'][0]['los_id']-1));
		$this->db->join("lottery_prizes", "lottery_prizes.lop_id = lottery_users.lop_id");
		$content['lottery_winners'] = $this->model_base->get_all("lottery_users");

		// echo "<pre>";
		// print_r ($content['lottery_winners']);
		// echo "</pre>";

		$this->load->view("template/member_header", $header);
		$this->load->view('member/dashboard', $content);
		$this->load->view("template/member_footer");
		
	}
} 

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */