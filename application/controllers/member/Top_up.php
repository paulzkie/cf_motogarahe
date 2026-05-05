<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top_up extends CI_Controller {

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
		$header['header_title'] = 'Top UP';
		
		$content = [];


		if($this->input->post()) {

			$seasonData = $this->model_base->get_lastData("los_id", "lottery_seasons");

			$seasonMaxUser = $seasonData[0]['los_max_usr'];
			$seasonId = $seasonData[0]['los_id'];
			$this->db->flush_cache();

			// echo "<pre>";
			// print_r ($this->input->post());
			// echo "</pre>";
			// break;


			$this->db->where('los_id', $seasonId);
			$seasonUsersCount = $this->model_base->count_data("lottery_users");
			// echo "<pre>";
			// print_r ($seasonUsersCount);
			// echo "</pre>";
			// break;
			if ($seasonMaxUser > $seasonUsersCount) {
				// echo 'pasok';
				// break;
				$this->form_validation->set_rules('cod_name', 'Code', 'required|trim');

				if ($this->form_validation->run() == FALSE) {
					$content['msg_error'] = validation_errors();
				} else {
					// success
                        $data = $this->input->post();

                        // echo '<pre>'; print_r($this->session->userdata('usr_id'));

                        // break;
                        
                        $userData = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");

						//unset($data['reg_mode']);
						
						
						
						$code_info = $this->model_base->get_one($data['cod_name'], "cod_name", "codes");

						// echo "<pre>";
						// print_r ($code_info);
						// echo "</pre>";
						//break;

						$account_type = $code_info[0]['cod_type'];
						$cod_name = $code_info[0]['cod_name'];
						$set_id = $code_info[0]['set_id'];
						
						$this->_reg_user( $userData[0], $account_type, $cod_name, $set_id, $seasonId );

						redirect('member/dashboard','refresh');
					// } 
				}
			} else {
				// echo 'di pasok';
				// break;
				$content['msg_error'] = 'Users are already Full for Premium Accounts!';
			}
		}

		$this->load->view('member/top_up', $content);	
	}

	public function _reg_user($data, $account_type, $cod_name, $set_id, $seasonId) {

        // echo "<pre>";
		// 				print_r ($data);
        // 				echo "</pre>";
        

        //$upline_details = $this->model_base->get_one($data['dir_to_username'], "usr_username", "users");
        $upline = $data['dir_to_username'];
        
        //echo "uopline:   " . $upline;
        

        $upline_details = $this->model_base->get_one($upline, "usr_username", "users");
        
        // echo "<pre>";
        // print_r ($upline_details);
        // echo "</pre>";
                        
        //break;                 

		$upline_id = $upline_details[0]['usr_id'];

		// get upline invites
		$this->db->flush_cache();
		$this->db->where('alt_from_usrname', $upline_details[0]['usr_username']);
		$upline_invites_count = $this->model_base->count_data("users");

		$upline_invites_count++;
        // echo $upline_invites_count;
        

        // echo 'taena :'  .  count( $upline_details );
        // break;

		if ( count( $upline_details ) == 1 ) {

				
			
				$upline2_details = $this->model_base->get_one($this->session->userdata('alt_from_usrname'), "usr_username", "users");

				// echo "<pre>";
		        // print_r ($upline_details);
                // echo "</pre>";
                
                // echo "<pre>";
		        // print_r ($upline2_details);
                // echo "</pre>";
                

                $this->db->where('dir_from_id', $this->session->userdata('usr_id'));
                $this->db->where('dir_to_id', $this->session->userdata('dir_to_id'));
                $data1 = $this->model_base->get_lastData("dir_id", "direct_indirect");

                if ( count( $data1 ) ) {
                    // echo 'pasok';
                    unset($data1[0]['dir_id']);
                    $data1[0]['dir_created'] = $this->getDatetimeNow();
                    $this->model_base->insert_data( $data1[0], 'direct_indirect');

                    // echo "<pre>";
                    // print_r ($data1[0]);
                    // echo "</pre>";
                } else {
                    // echo 'hindi';
                }

                $this->db->flush_cache();

                $this->db->where('dir_from_id', $this->session->userdata('usr_id'));
                $this->db->where('dir_to_id', $this->session->userdata('alt_from_id'));
                $data2 = $this->model_base->get_lastData("dir_id", "direct_indirect");
                
                if ( count( $data2 ) ) {
                    // echo 'pasok';
                    unset($data2[0]['dir_id']);
                    $data2[0]['dir_created'] = $this->getDatetimeNow();
                    $this->model_base->insert_data( $data2[0], 'direct_indirect');

                    // echo "<pre>";
                    // print_r ($data2[0]);
                    // echo "</pre>";
                } else {
                    // echo 'hindi';
                }

                $this->db->flush_cache();
                

				//break;


                $data_users['usr_type'] = $account_type;
                
				$data_users['dir_to_username'] = $this->session->userdata('dir_to_username');
				$data_users['dir_to_id'] = $this->session->userdata('dir_to_id');

				$data_users['alt_from_usrname'] = $this->session->userdata('alt_from_usrname');
				$data_users['alt_from_id'] = $this->session->userdata('alt_from_id');

				$data_users['usr_updated'] = $this->getDatetimeNow();


                $this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_users, 'users');
                

				$this->db->flush_cache();


				$this->_update_codes($this->session->userdata('usr_username'), $this->session->userdata('usr_id'), $cod_name );

				$this->_save_lottery( $this->session->userdata('usr_id'), $this->session->userdata('usr_username'), $account_type, $seasonId  );
				
				
				//$this->_get_direct_to_indirects( $data_users['dir_to_username'], $data['usr_username'], $last_id, $set_id );

		        $this->session->set_flashdata('msg_success', 'Your Account is Created!');	
			
		} else {
            // echo "gago";
            // break;
			$this->session->set_flashdata('msg_error', 'Invalid Referred by!');	
		}
	}

	public function _update_codes($username, $last_id, $cod_name ) {
		$date_now = $this->getDatetimeNow();
		$data_codes['usr_name'] = $username;
		$data_codes['usr_id'] = $last_id;
		$data_codes['cod_status'] = "deleted";
		$data_codes['cod_updated'] = $date_now;

		// echo "<pre>";
		// print_r ($data_codes);
		// echo "</pre>";

		$this->model_base->update_data($cod_name, 'cod_name', $data_codes, 'codes');
	}

	public function _save_lottery ( $last_id, $username, $account_type, $seasonId ) {
		if ( $account_type == 'sparkle' ) {
			
			$date_now = $this->getDatetimeNow();
			$lottery_details['usr_id'] = $last_id;
			$lottery_details['usr_username'] = $username;
			$lottery_details['los_id'] = $seasonId;
			$lottery_details['lou_created'] = $date_now;	
			// echo "<pre>";
			// print_r ($lottery_details);
			// echo "</pre>";
			// break;
			$this->model_base->insert_data($lottery_details, 'lottery_users');
		}
	}
	
	public function _get_single_direct_to_indirect($username, $user_id, $upline_invites_count, $direct, $amount, $amount_type ) {
		$date_now = $this->getDatetimeNow();
		$direct_details['dir_from_id'] = $user_id;	
		$direct_details['dir_from_username'] = $username;	
		$direct_details['dir_to_id'] = $direct[0]['usr_id'];	
		$direct_details['dir_to_username'] = $direct[0]['usr_username'];	
		$direct_details['dir_position'] = $upline_invites_count;
		$direct_details['dir_amount'] = $amount;
		$direct_details['dir_from_type'] = $amount_type;
		$direct_details['dir_created'] = $date_now;

		$this->model_base->insert_data($direct_details, 'direct_indirect');
		$this->db->flush_cache();
	}

	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('member/login', 'refresh'); 
   }
}