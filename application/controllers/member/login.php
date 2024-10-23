<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		
	}

	public function index($username ="")
	{
		$header = [];
		$header['header_title'] = 'Home';
		
		$content = [];

		$content['inviter'] =  $username;


		if($this->input->post('reg_mode')) {

			// $seasonData = $this->model_base->get_lastData("los_id", "lottery_seasons");

			// $seasonMaxUser = $seasonData[0]['los_max_usr'];
			// $seasonId = $seasonData[0]['los_id'];
			// $this->db->flush_cache();

			// echo "<pre>";
			// print_r ($seasonUsersCount);
			// echo "</pre>";
			// break;


			// $this->db->where('los_id', $seasonId);
			// $seasonUsersCount = $this->model_base->count_data("lottery_users");

			// echo "<pre>";
			// print_r ($seasonUsersCount);
			// echo "</pre>";
			// break;

			//if ($seasonMaxUser > $seasonUsersCount) {
				// echo 'pasok';
				// break;
				$this->form_validation->set_rules('usr_username', 'Username','trim|required|is_unique[users.usr_username]');  
				$this->form_validation->set_rules('usr_password', 'Password', 'trim|required|matches[usr_password_conf]|min_length[8]|md5'); 
				$this->form_validation->set_rules('usr_password_conf', 'Confirm Password', 'trim|required|md5');

				$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim');
				$this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
				$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim');
				$this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
				$this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
				$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim');
				$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
				$this->form_validation->set_rules('dir_to_username', 'Referred by', 'required|trim');

				if ($this->form_validation->run() == FALSE) {
					$content['msg_error'] = validation_errors();
				} else {
					// success
						$data = $this->input->post();

						unset($data['reg_mode']);
						
						// echo "<pre>";
						// print_r ($data);
						// echo "</pre>";
						
						$code_info = $this->model_base->get_one($data['cod_name'], "cod_name", "codes");

						// echo "<pre>";
						// print_r ($code_info);
						// echo "</pre>";
						// break;

						$account_type = $code_info[0]['cod_type'];
						$cod_name = $code_info[0]['cod_name'];
						$set_id = $code_info[0]['set_id'];
						
						$this->_reg_user( $data, $account_type, $cod_name, $set_id, 0 );

						redirect('member/login','refresh');
					// } 
				}
			//} else {
				// echo 'di pasok';
				// break;
				//$content['msg_error'] = 'Users are already Full for Premium Accounts!';
			//}
		}


		

		if($this->input->post('login_mode')) {


			$this->form_validation->set_rules('usr_username', 'Username', 'required|trim');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|trim|min_length[8]');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$table = "users";

				unset($data['login_mode']);

    			$user = $this->model_login->login_user($data, $table);

    			if ( count( $user ) >= 1 ) {
    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
					$this->session->set_userdata($user[0]);
					
					// echo '<pre>' .  print_r($this->session->all_userdata()) . '</pre>'; 

					$data_update['usr_session'] = $this->session->userdata('session_id');
					$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_update, 'users');

    				redirect('member/dashboard','refresh');

    			} else {	
    				$content['msg_error'] = 'Invalid Account';
    			}
			}
				
		}


		$this->load->view('member/login', $content);	
	}

	public function _reg_user($data, $account_type, $cod_name, $set_id, $seasonId) {

		$upline = $data['dir_to_username'];
		$upline_details = $this->model_base->get_one($upline, "usr_username", "users");
		$upline_id = $upline_details[0]['usr_id'];

		// get upline invites
		$this->db->flush_cache();
		$this->db->where('alt_from_usrname', $upline_details[0]['usr_username']);
		$upline_invites_count = $this->model_base->count_data("users");

		//$upline_invites_count++;
		//echo $upline_invites_count;

		if ( count( $upline_details ) == 1 ) {
			// if ( $upline_details[0]['usr_type'] == $account_type ) {
				//echo  $upline_details[0]['dir_to_username'];

				$data_users['usr_username'] = $data['usr_username'];
				$data_users['usr_password'] = $data['usr_password'];
				$data_users['usr_fname'] = $data['usr_fname'];
				$data_users['usr_mname'] = $data['usr_mname'];
				$data_users['usr_lname'] = $data['usr_lname'];
				$data_users['usr_address'] = $data['usr_address'];
				$data_users['usr_gender'] = $data['usr_gender'];
				$data_users['usr_contact'] = $data['usr_contact'];
				$data_users['usr_email'] = $data['usr_email'];
				$data_users['usr_type'] = $account_type;
				$data_users['dir_to_username'] = $upline_details[0]['usr_username'];
				$data_users['dir_to_id'] = $upline_details[0]['usr_id'];
				$data_users['usr_activate'] = 'yes';
				$data_users['alt_from_usrname'] = $upline_details[0]['usr_username'];
				$data_users['alt_from_id'] = $upline_details[0]['usr_id'];
				//$data_users['dir_to_accounttype'] = $upline_details[0]['usr_type'];

				$data_users['usr_created'] = $this->getDatetimeNow();
		        $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));


		        // echo "<pre>";
		        // print_r ($data_users);
				// echo "</pre>";
				//break;

				
				$last_id = 0;

				// pasok sa 1 3 5 7 9 at 0 lang ZERO LANG
				// pasok as direct mo
				// echo "Odd"; 
				// break;
				//aj 
																								$this->model_base->insert_data($data_users, 'users');
				//aj 
																								$last_id = $this->db->insert_id();

				//aj 
																								$this->_update_codes($data['usr_username'], $last_id, $cod_name );

				if ( $data_users['usr_type'] == 'starter' && $upline_details[0]['usr_type'] == 'starter' ) {
					//lite to lite
					//aj 
																														$this->_get_single_direct_to_indirect( $data['usr_username'], $last_id, $upline_invites_count, $upline_details, 5, 'lite to lite', 0 );
				}

				if ( $data_users['usr_type'] == 'sparkle' && $upline_details[0]['usr_type'] == 'sparkle' ) {
					//premium to premium
					//aj 
																														$this->_get_single_direct_to_indirect( $data['usr_username'], $last_id, $upline_invites_count, $upline_details, 30, 'premium to premium', 0 );
				} 


				if ( $data_users['usr_type'] == 'sparkle' && $upline_details[0]['usr_type'] == 'starter' ) {
					//premium to lite
					//aj 
																														$this->_get_single_direct_to_indirect( $data['usr_username'], $last_id, $upline_invites_count, $upline_details, 15, 'premium to lite', 15 );
				} 

				if ( $data_users['usr_type'] == 'starter' && $upline_details[0]['usr_type'] == 'sparkle' ) {
					//lite to premium
					//aj 
																														$this->_get_single_direct_to_indirect( $data['usr_username'], $last_id, $upline_invites_count, $upline_details, 5, 'lite to premium', 0 );
				} 
				
				$this->_getUplineGroup($upline_details, $data_users['usr_type'], $last_id);


				$this->db->flush_cache();


				//$this->_save_lottery( $last_id, $data['usr_username'], $account_type, $seasonId  );
				
				
				//$this->_get_direct_to_indirects( $data_users['dir_to_username'], $data['usr_username'], $last_id, $set_id );

		        $this->session->set_flashdata('msg_success', 'Your Account is Created!');	
			// } else {
			// 	$this->session->set_flashdata('msg_error', 'Missed match account type!');	
			// }
		} else {
			$this->session->set_flashdata('msg_error', 'Invalid Referred by!');	
		}
	}

	public function _getUplineGroup($upline_details, $userAccountType,  $last_id) {
		// icheck kung anong type ng upline
		$upline_account_type = $upline_details[0]['usr_type'];

		echo "<pre>";
        print_r ($upline_details);
		echo "</pre>";

		$this->db->flush_cache();
		$this->db->where('usp_status', 'process');
		$this->db->where('usr_id', $upline_details[0]['usr_id']);
		$group_details = $this->model_base->get_firstData("usp_id", "users_position");

		echo "<pre>";
        print_r ($group_details);
		echo "</pre>";
		
		$firstMember_details = $this->model_base->get_one($group_details[0]["usp_group"], "usr_id", "users");
		echo 'upline account: ' . $firstMember_details[0]["usr_type"] . "<br>";

		echo "<pre>";
        print_r ($firstMember_details);
		echo "</pre>";

		//break;
		

		if ( $firstMember_details[0]["usr_type"] == 'starter' ) {
			echo "loob starter";
			// kunin ung upline user id as group no ng batch
			$group_no = $group_details[0]['usp_group'];
			echo 'grpoup no: ' . $group_no . "<br>";

			// pag starter
			// check ung group # ng batch kung tatlo  na
			$this->db->flush_cache();
			$this->db->where('usp_group', $group_no);
			$group_members_count = $this->model_base->count_data("users_position");

			if ( $group_members_count >= 4 ) {
				// pag tatlo  na, means GRADUATE na ung unang naretrieve ng array

				echo 'pasok sa GRADUATE';

				$this->db->where('usp_group', $group_no);
				//$this->db->where('usp_tbl', 1);
				$this->db->join("users", "users.usr_id = users_position.usr_id");
				$current_downlines = $this->model_base->get_all('users_position');

				echo "<pre>";
		        print_r ($current_downlines);
				echo "</pre>";

				foreach ($current_downlines as $current_downline) {
					
						$old_data_user_pos['usp_status'] = "done";
						$old_data_user_pos['usp_updated'] = $date_now;
					//aj 
																													$this->model_base->update_data($current_downline["usp_id"], 'usp_id', $old_data_user_pos, 'users_position');
						
					if ($current_downline["usr_id"] != $firstMember_details[0]["usr_id"]) {
						$this->db->flush_cache();
						$date_now = $this->getDatetimeNow();
						$data_new_users_position['usr_id'] = $current_downline["usr_id"];
						$data_new_users_position['usp_group'] = $current_downline["usr_id"];
						$data_new_users_position['usp_tbl'] = $current_downline["usp_tbl"];
						$data_new_users_position['usp_type'] = $current_downline["usr_type"];
						$data_new_users_position['usp_status'] = 'process';
						$data_new_users_position['usp_created'] = $date_now;

						echo "<pre>";
				        print_r ($data_new_users_position);
						echo "</pre>";

						//aj 
																																		$this->model_base->insert_data($data_new_users_position, 'users_position');

					}
				}

				//pasok sa next table
				
				$this->db->flush_cache();
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $firstMember_details[0]["usr_id"];
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 2;
				$data_users_position['usp_type'] = 'starter';
				$data_users_position['usp_status'] = 'process';
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				$bonus_details['dir_from_id'] = 1;	
				$bonus_details['dir_from_username'] = 'company bonus';	
				$bonus_details['dir_to_id'] = $firstMember_details[0]["usr_id"];	
				$bonus_details['dir_to_username'] = $firstMember_details[0]["usr_username"];	
				$bonus_details['dir_amount'] = 120.00;
				$bonus_details['dir_created'] = $date_now;
				$bonus_details['dir_flush_amount'] = 0;

				//aj 
																								$this->model_base->insert_data($bonus_details, 'direct_indirect');
				$this->db->flush_cache();

				echo "<pre>";
		        print_r ($bonus_details);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');

				
				// as new member declare as current group, tb1   (remember tb1 - tb8 lang)
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $last_id;
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 1;
				$data_users_position['usp_type'] = 'starter';
				if ( $userAccountType == 'sparkle' ) {
					$data_users_position['usp_tbl'] = 6;

				}
				$data_users_position['usp_status'] = 'process';
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');




			} else {
				// pag tatlo pababa
				// pasok naman ung bagong member dun sa group
				// as new member declare as current group, tb1   (remember tb1 - tb8 lang)
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $last_id;
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 1;
				$data_users_position['usp_type'] = 'starter';
				if ( $userAccountType == 'sparkle' ) {
					$data_users_position['usp_tbl'] = 6;
				}
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');
			}

		} else {

			echo 'loob srpakle <br>';

			// kunin ung upline user id as group no ng batch
			$group_no = $group_details[0]['usp_group'];
			echo 'grpoup no: ' . $group_no . "<br>";

			// pag starter
			// check ung group # ng batch kung 7  na
			$this->db->flush_cache();
			$this->db->where('usp_group', $group_no);
			
			$group_members_count = $this->model_base->count_data("users_position");

			if ( $group_members_count >= 8 ) {
				// pag 7  na, means GRADUATE na ung unang naretrieve ng array

				echo 'pasok sa GRADUATE';

				$this->db->where('usp_group', $group_no);
				
				$this->db->join("users", "users.usr_id = users_position.usr_id");
				$current_downlines = $this->model_base->get_all('users_position');

				echo "<pre>";
		        print_r ($current_downlines);
				echo "</pre>";

				foreach ($current_downlines as $current_downline) {
					
						$old_data_user_pos['usp_status'] = "done";
						$old_data_user_pos['usp_updated'] = $this->getDatetimeNow();
					//aj 
																													$this->model_base->update_data($current_downline["usp_id"], 'usp_id', $old_data_user_pos, 'users_position');
						
					if ($current_downline["usr_id"] != $firstMember_details[0]["usr_id"]) {
						$this->db->flush_cache();
						$date_now = $this->getDatetimeNow();
						$data_new_users_position['usr_id'] = $current_downline["usr_id"];
						$data_new_users_position['usp_group'] = $current_downline["usr_id"];
						$data_new_users_position['usp_tbl'] = $current_downline["usp_tbl"];
						$data_new_users_position['usp_type'] = $current_downline["usr_type"];
						$data_new_users_position['usp_status'] = 'process';
						$data_new_users_position['usp_created'] = $date_now;

						echo "<pre>";
				        print_r ($data_new_users_position);
						echo "</pre>";

						//aj 
																																		$this->model_base->insert_data($data_new_users_position, 'users_position');

					}
				}

				//pasok sa next table
				
				$this->db->flush_cache();
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $firstMember_details[0]["usr_id"];
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 7;
				$data_users_position['usp_type'] = 'sparkle';
				$data_users_position['usp_status'] = 'process';
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				$bonus_details['dir_from_id'] = 1;	
				$bonus_details['dir_from_username'] = 'company bonus';	
				$bonus_details['dir_to_id'] = $firstMember_details[0]["usr_id"];	
				$bonus_details['dir_to_username'] = $firstMember_details[0]["usr_username"];	
				$bonus_details['dir_amount'] = 3000.00;
				$bonus_details['dir_created'] = $date_now;
				$bonus_details['dir_flush_amount'] = 0;

				//aj 
																								$this->model_base->insert_data($bonus_details, 'direct_indirect');
				$this->db->flush_cache();

				echo "<pre>";
		        print_r ($bonus_details);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');

				
				// as new member declare as current group, tb1   (remember tb1 - tb8 lang)
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $last_id;
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 6;
				$data_users_position['usp_type'] = 'sparkle';
				if ( $userAccountType == 'starter' ) {
					$data_users_position['usp_tbl'] = 1;

				}
				$data_users_position['usp_status'] = 'process';
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');


			} else {
				// pag 7 pababa
				// pasok naman ung bagong member dun sa group
				// as new member declare as current group, tb1   (remember tb1 - tb8 lang)
				$date_now = $this->getDatetimeNow();
				$data_users_position['usr_id'] = $last_id;
				$data_users_position['usp_group'] = $group_no;
				$data_users_position['usp_tbl'] = 6;
				$data_users_position['usp_type'] = 'sparkle';
				if ( $userAccountType == 'starter' ) {
					$data_users_position['usp_tbl'] = 1;

				}
				$data_users_position['usp_status'] = 'process';
				$data_users_position['usp_created'] = $date_now;

				echo "<pre>";
		        print_r ($data_users_position);
				echo "</pre>";

				//aj 
																								$this->model_base->insert_data($data_users_position, 'users_position');
			}	
		
		}


		//break;

		//-----------------------------
		// pag starter 
		// check ung group # ng batch kung tatlo  na
		
		// pag tatlo  na, means GRADUATE na ung unang naretrieve ng array
		// ++++++++++++++++++++++++++++++++++++++++++++++++++
		// 
		// UNG GRADUATE na member kukunin ung current table nya
		// kung ang current table nya is less than equal 7
		// add 1 sa current table nya 
		// then kuha ng profit depending sa new table  nya


		// kung ang current table  nya is 8
		// stay nalang sa table nya
		// then kuha ng profit sa table nya
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		// pasok naman ung bagong member dun sa group -DONE
		// as new member declare as current group, tb1   (remember tb1 - tb8 lang) -DONE





		// pag hindi tatlo ung member ng group join lang sa batch ung new member


    	//--------------------------
		// pag vip 8 lang dapat ang doenline


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
	
	public function _get_single_direct_to_indirect($username, $user_id, $upline_invites_count, $direct, $amount, $amount_type, $flush_amount ) {
		$date_now = $this->getDatetimeNow();
		$direct_details['dir_from_id'] = $user_id;	
		$direct_details['dir_from_username'] = $username;	
		$direct_details['dir_to_id'] = $direct[0]['usr_id'];	
		$direct_details['dir_to_username'] = $direct[0]['usr_username'];	
		$direct_details['dir_position'] = $upline_invites_count;
		$direct_details['dir_amount'] = $amount;
		$direct_details['dir_from_type'] = $amount_type;
		$direct_details['dir_created'] = $date_now;
		$direct_details['dir_flush_amount'] = $flush_amount;

		$this->model_base->insert_data($direct_details, 'direct_indirect');
		$this->db->flush_cache();
	}

	public function _get_direct_to_indirects( $usr_username, $username, $user_id, $set_id ) {
		$date_now = $this->getDatetimeNow();

		$this->db->where('set_status', "published");
		$settings = $this->model_base->get_one($set_id, "set_id", "settings");

		$this->db->flush_cache();

		$this->db->where('usr_status', "published");
		$direct1 = $this->model_base->get_one($usr_username, "usr_username", "users");

		

		if ( count( $direct1 ) == 1) {
			$direct1_details['dir_from_id'] = $user_id;	
			$direct1_details['dir_from_username'] = $username;	
			$direct1_details['dir_to_id'] = $direct1[0]['usr_id'];	
			$direct1_details['dir_to_username'] = $direct1[0]['usr_username'];	
			$direct1_details['dir_position'] = 1;
			$direct1_details['dir_amount'] = $settings[0]['set_direct1'];
			$direct1_details['dir_from_type'] = $settings[0]['set_name'];
			$direct1_details['dir_created'] = $date_now;

			$this->model_base->insert_data($direct1_details, 'direct_indirect');
			$this->db->flush_cache();

			$this->db->where('usr_status', "published");
			$direct2 = $this->model_base->get_one($direct1[0]['dir_to_username'], "usr_username", "users");

			if ( count( $direct2 ) == 1) {
				$direct2_details['dir_from_id'] = $user_id;	
				$direct2_details['dir_from_username'] = $username;	
				$direct2_details['dir_to_id'] = $direct2[0]['usr_id'];	
				$direct2_details['dir_to_username'] = $direct2[0]['usr_username'];	
				$direct2_details['dir_position'] = 2;
				$direct2_details['dir_amount'] = $settings[0]['set_direct2'];
				$direct2_details['dir_from_type'] = $settings[0]['set_name'];
				$direct2_details['dir_created'] = $date_now;

				$this->model_base->insert_data($direct2_details, 'direct_indirect');
				$this->db->flush_cache();

				$this->db->where('usr_status', "published");
				$direct3 = $this->model_base->get_one($direct2[0]['dir_to_username'], "usr_username", "users");

				if ( count( $direct3 ) == 1) {
					$direct3_details['dir_from_id'] = $user_id;	
					$direct3_details['dir_from_username'] = $username;	
					$direct3_details['dir_to_id'] = $direct3[0]['usr_id'];	
					$direct3_details['dir_to_username'] = $direct3[0]['usr_username'];	
					$direct3_details['dir_position'] = 3;
					$direct3_details['dir_amount'] = $settings[0]['set_direct3'];
					$direct3_details['dir_from_type'] = $settings[0]['set_name'];
					$direct3_details['dir_created'] = $date_now;

					$this->model_base->insert_data($direct3_details, 'direct_indirect');
					$this->db->flush_cache();

					$this->db->where('usr_status', "published");
					$direct4 = $this->model_base->get_one($direct3[0]['dir_to_username'], "usr_username", "users");

					if ( count( $direct4 ) == 1) {
						$direct4_details['dir_from_id'] = $user_id;	
						$direct4_details['dir_from_username'] = $username;	
						$direct4_details['dir_to_id'] = $direct4[0]['usr_id'];	
						$direct4_details['dir_to_username'] = $direct4[0]['usr_username'];	
						$direct4_details['dir_position'] = 4;
						$direct4_details['dir_amount'] = $settings[0]['set_direct4'];
						$direct4_details['dir_from_type'] = $settings[0]['set_name'];
						$direct4_details['dir_created'] = $date_now;

						$this->model_base->insert_data($direct4_details, 'direct_indirect');
						$this->db->flush_cache();

						$this->db->where('usr_status', "published");
						$direct5 = $this->model_base->get_one($direct4[0]['dir_to_username'], "usr_username", "users");

						if ( count( $direct5 ) == 1) {
							$direct5_details['dir_from_id'] = $user_id;	
							$direct5_details['dir_from_username'] = $username;	
							$direct5_details['dir_to_id'] = $direct5[0]['usr_id'];	
							$direct5_details['dir_to_username'] = $direct5[0]['usr_username'];	
							$direct5_details['dir_position'] = 5;
							$direct5_details['dir_amount'] = $settings[0]['set_direct5'];
							$direct5_details['dir_from_type'] = $settings[0]['set_name'];
							$direct5_details['dir_created'] = $date_now;

							$this->model_base->insert_data($direct5_details, 'direct_indirect');
							$this->db->flush_cache();

							$this->db->where('usr_status', "published");
							$direct6 = $this->model_base->get_one($direct5[0]['dir_to_username'], "usr_username", "users");
							if ( count( $direct6 ) == 1) {
								$direct6_details['dir_from_id'] = $user_id;	
								$direct6_details['dir_from_username'] = $username;	
								$direct6_details['dir_to_id'] = $direct6[0]['usr_id'];
								$direct6_details['dir_to_username'] = $direct6[0]['usr_username'];	
								$direct6_details['dir_position'] = 6;
								$direct6_details['dir_amount'] = $settings[0]['set_direct6'];
								$direct6_details['dir_from_type'] = $settings[0]['set_name'];
								$direct6_details['dir_created'] = $date_now;

								$this->model_base->insert_data($direct6_details, 'direct_indirect');
								$this->db->flush_cache();

								$this->db->where('usr_status', "published");
								$direct7 = $this->model_base->get_one($direct6[0]['dir_to_username'], "usr_username", "users");
								if ( count( $direct7 ) == 1) {
									$direct7_details['dir_from_id'] = $user_id;	
									$direct7_details['dir_from_username'] = $username;	
									$direct7_details['dir_to_id'] = $direct7[0]['usr_id'];	
									$direct7_details['dir_to_username'] = $direct7[0]['usr_username'];	
									$direct7_details['dir_position'] = 7;
									$direct7_details['dir_amount'] = $settings[0]['set_direct7'];
									$direct7_details['dir_from_type'] = $settings[0]['set_name'];
									$direct7_details['dir_created'] = $date_now;

									$this->model_base->insert_data($direct7_details, 'direct_indirect');
									$this->db->flush_cache();

									$this->db->where('usr_status', "published");
									$direct8 = $this->model_base->get_one($direct7[0]['dir_to_username'], "usr_username", "users");
									if ( count( $direct8 ) == 1) {
										$direct8_details['dir_from_id'] = $user_id;	
										$direct8_details['dir_from_username'] = $username;	
										$direct8_details['dir_to_id'] = $direct8[0]['usr_id'];	
										$direct8_details['dir_to_username'] = $direct8[0]['usr_username'];	
										$direct8_details['dir_position'] = 8;
										$direct8_details['dir_amount'] = $settings[0]['set_direct8'];
										$direct8_details['dir_from_type'] = $settings[0]['set_name'];
										$direct8_details['dir_created'] = $date_now;

										$this->model_base->insert_data($direct8_details, 'direct_indirect');
										$this->db->flush_cache();
									}
								}
							}
						}

					}

				}

			}

		}
	}

	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('member/login', 'refresh'); 
   }
}