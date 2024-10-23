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

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}

		$this->session->unset_userdata('selected_client');	
	}

	public function index()
	{

		$header = [];
		$header['header_title'] = 'Dashboard';
		$header['header'] = 'Dashboard';
		$header['header_small'] = '';
		
		$content = [];

		// ----------------------------------------------------------------------------------

		$starter_amount_settings = $this->model_base->get_one(1, "set_id", "settings");
		$sparkle_amount_settings = $this->model_base->get_one(2, "set_id", "settings");

		$this->db->flush_cache();	
		$this->db->where('usr_type', "sparkle");	
		$this->db->join('users', 'users.usr_id = lottery_users.usr_id');
		$sparkle_users = $this->model_base->get_all('lottery_users');	
		$content['sparkle_users_count'] = count($sparkle_users);
		$content['sparkle_users_amount'] = $content['sparkle_users_count'] * $sparkle_amount_settings[0]['set_amount'];

		$this->db->flush_cache();	
		$this->db->where('usr_type', "starter");	
		$starter_users = $this->model_base->get_all('users');	
		$content['starter_users_count'] = count($starter_users);
		$content['starter_users_amount'] = $content['starter_users_count'] * $starter_amount_settings[0]['set_amount'];


		$content['users_count'] = $content['sparkle_users_count'] + $content['starter_users_count'];
		$content['users_amount'] = $content['sparkle_users_amount'] + $content['starter_users_amount'];

		//echo $this->getDatetimeNow();
		//$month = date("m",strtotime($this->getDatetimeNow()));
		$this->db->flush_cache();	
		$this->db->where('usr_type', "sparkle");	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday this week');
	    $datetime->setTimezone($tz_object);
		$date_start = $datetime->format('Y\-m\-d\ H:i:s');	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday next week');
	    $datetime->setTimezone($tz_object);
		$date_end = $datetime->format('Y\-m\-d\ H:i:s');

		$this->db->where('lou_created >=', $date_start);
		$this->db->where('lou_created <=', $date_end);

		

		// $this->db->where('month(lou_created)',date("m",strtotime($this->getDatetimeNow())));
		$this->db->join('users', 'users.usr_id = lottery_users.usr_id');
		$sparkle_users = $this->model_base->get_all('lottery_users');	
		$content['sparkle_users_count_month'] = count($sparkle_users);
		$content['sparkle_users_amount_month'] = $content['sparkle_users_count_month'] * $sparkle_amount_settings[0]['set_amount'];

		$this->db->flush_cache();	
		$this->db->where('usr_type', "starter");	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday this week');
	    $datetime->setTimezone($tz_object);
		$date_start = $datetime->format('Y\-m\-d\ H:i:s');	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday next week');
	    $datetime->setTimezone($tz_object);
		$date_end = $datetime->format('Y\-m\-d\ H:i:s');
		$this->db->where('usr_created >=', $date_start);
		$this->db->where('usr_created <=', $date_end);

		

		// $this->db->where('month(usr_created)',date("m",strtotime($this->getDatetimeNow())));
		$starter_users = $this->model_base->get_all('users');	
		$content['starter_users_count_month'] = count($starter_users);
		$content['starter_users_amount_month'] = $content['starter_users_count_month'] * $starter_amount_settings[0]['set_amount'];
		//-----------------------------------------------------------
		$this->db->flush_cache();
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$direct_indirect_withdraws = $this->db->get('direct_indirect_withdraw')->result_array();
		$content['total__diw_amount'] = $direct_indirect_withdraws[0]['diw_amount'];

		$this->db->flush_cache();
		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday this week');
	    $datetime->setTimezone($tz_object);
		$date_start = $datetime->format('Y\-m\-d');	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday next week');
		$datetime->setTimezone($tz_object);
		$date_end = $datetime->format('Y\-m\-d');
		
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$this->db->where('diw_created >=', $date_start);
		$this->db->where('diw_created <=', $date_end);

		// echo $date_start . '<br>';echo $date_end . '<br>';
		// echo $this->getDatetimeNow();

		// $this->db->where('month(diw_created)',date("m",strtotime($this->getDatetimeNow())));
		$direct_indirect_withdraws = $this->db->get('direct_indirect_withdraw')->result_array();

		// echo "<pre>";
		// print_r ($direct_indirect_withdraws);
		// echo "</pre>";

		$content['total_monthly_diw_amount'] = $direct_indirect_withdraws[0]['diw_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$this->db->where('diw_get', 'yes');
		$direct_indirect_withdraws = $this->db->get('direct_indirect_withdraw')->result_array();
		$content['total__diw_amount_get'] = $direct_indirect_withdraws[0]['diw_amount'];

		$this->db->flush_cache();
		$this->db->select_sum('diw_amount');
		$this->db->where('diw_status', 'published');
		$this->db->where('diw_get', 'yes');

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday this week');
	    $datetime->setTimezone($tz_object);
		$date_start = $datetime->format('Y\-m\-d\ H:i:s');	

		$tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime('Monday next week');
	    $datetime->setTimezone($tz_object);
		$date_end = $datetime->format('Y\-m\-d\ H:i:s');
		$this->db->where('diw_created >=', $date_start);
		$this->db->where('diw_created <=', $date_end);

		// $this->db->where('month(diw_created)',date("m",strtotime($this->getDatetimeNow())));
		$direct_indirect_withdraws = $this->db->get('direct_indirect_withdraw')->result_array();
		$content['total_monthly_diw_amount_get'] = $direct_indirect_withdraws[0]['diw_amount'];


		//----------------------------------------------------------------------------------

		$this->db->flush_cache();
		$this->db->select_sum('cap_amount');
		$this->db->where('cap_status', 'published');
		$captcha = $this->db->get('captcha')->result_array();
		$content['total_captcha_amount'] = $captcha[0]['cap_amount'];
		$this->db->flush_cache();

		$captchas = $this->model_base->get_all('captcha');	
		$content['captchas_count'] = count($captchas);
		$this->db->flush_cache();

		$this->db->select_sum('dir_amount');
		$this->db->where('dir_status', 'published');
		$direct_indirect = $this->db->get('direct_indirect')->result_array();
		$content['total_direct_indirect_amount'] = $direct_indirect[0]['dir_amount'];
		$this->db->flush_cache();

		$content['total_payable_amount'] = $content['total_direct_indirect_amount'] + $content['total_captcha_amount'];
		$content['total_company_income'] = $content['users_amount'] - $content['total_payable_amount'];

		

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/dashboard', $content);
		$this->load->view("template/admin_footer");
		
	}
} 

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */