<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');
        $this->load->model('model_login');
        
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
		$header['header_title'] = 'Captcha';
		
		$content = [];


		if($this->input->post()) {

            $this->form_validation->set_rules('cap_code', 'Captcha', 'required|trim');
            $this->form_validation->set_rules('cap_codeConf', 'Captcha Code', 'required|trim|matches[cap_code]');

            if ($this->form_validation->run() == FALSE) {
                $content['msg_error'] = validation_errors();
            } else {
                // success
                $data = $this->input->post();

                $data['usr_id'] = $this->session->userdata('usr_id');
                $data['usr_username'] = $this->session->userdata('usr_username');
                $data['cap_amount'] = 0.040;
                $data['cap_created'] = $this->getDatetimeNow();

                $this->model_base->insert_data($data, 'captcha');
                $this->session->set_flashdata('msg_success', 'Added Captcha!');	
                redirect('member/captcha','refresh');
            }
		}

		$this->load->view('member/captcha', $content);	
    }
    
    public function view()
	{

		$header = [];
		$header['header_title'] = 'Captcha Earnings';
		$header['header'] = 'Captcha Earnings';
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

		$this->db->flush_cache();
		$this->db->select_sum('cap_amount');
		$this->db->where('cap_status', 'published');
		$this->db->where('usr_id', $this->session->userdata('usr_id'));
		//$this->db->where('month(sat_created)',date('m'));
		$captcha = $this->db->get('captcha')->result_array();
		$content['total_cap_amount'] = $captcha[0]['cap_amount'];

		$this->load->view("template/member_header", $header);
		$this->load->view('member/earnings.php', $content);
		$this->load->view("template/member_footer");
		
	}

	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('member/login', 'refresh'); 
   }
}