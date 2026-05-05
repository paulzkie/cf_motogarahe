<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rebates_confirmation extends CI_Controller {

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

		$this->session->unset_userdata('selected_client');	
	}

	public function index($filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'Rebates Confirmation';
		$header['header'] = 'Rebates Confirmation';
		$header['header_small'] = '';
		
		$content = [];

		//$this->db->order_by('rec_name', 'ASC'); //DESC
		if (!is_numeric($filter)) {
			if ( $filter == 'all') {
				$this->db->where('rec_status !=', 'deleted');
			} elseif ( $filter == 'published' ) {
				$this->db->where('rec_status', 'published');
			} elseif ( $filter == 'draft' ) {
				$this->db->where('rec_status', 'draft');
			} elseif ( $filter == 'deleted' ) {
				$this->db->where('rec_status', 'deleted');
			}
		} else {
			$config = array();
			$config["base_url"] = base_url() . "admin/rebates_confirmation/index/";
			$total_row = $this->model_base->count_data('rebates_confirmation');
			$config["total_rows"] = $total_row;
			$config['per_page'] = 50;
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
			$this->db->where('rec_status !=', 'deleted');
		}

		//validations
		$this->form_validation->set_rules('search_type', 'Product Name', 'trim');
		$this->form_validation->set_rules('search_val', 'Product Name', 'trim');

		if ( $this->input->post() ) {
			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();

				$search_value = $data['search_val'];
				$search_type = $data['search_type'];

				$data = [];

				$content['rebates_confirmations'] = $this->model_base->like_data($search_value, $search_type, 'rebates_confirmation');
			}	
		} else {
			$content['rebates_confirmations'] = $this->model_base->get_all('rebates_confirmation');
		}

		$content['controller']=$this; 
		$content['all'] = base_url('admin/rebates_confirmation/index/all');
		$content['published'] = base_url('admin/rebates_confirmation/index/published');
		$content['draft'] = base_url('admin/rebates_confirmation/index/draft');
		$content['deleted'] = base_url('admin/rebates_confirmation/index/deleted');
		$content['create'] = base_url('admin/rebates_confirmation/create');
		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/rebates_confirmation/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function confirmed_rebates($id) {
		$date_now = $this->getDatetimeNow();

		$content['rebates_confirmations'] = $this->model_base->get_one($id, "rec_id", "rebates_confirmation");



		if ( $content['rebates_confirmations'][0]['rec_status'] == "draft" ) {

			// echo "<pre>";
			// print_r ($content['rebates_confirmations']);
			// echo "</pre>";

			$rec_id = $content['rebates_confirmations'][0]['rec_id'];
			$sale_id = $content['rebates_confirmations'][0]['sale_id'];
			$pro_code = $content['rebates_confirmations'][0]['pro_code'];
			$amount = $content['rebates_confirmations'][0]['rec_amount'];

			$rec_from_id = $content['rebates_confirmations'][0]['rec_from_id'];
			$this->db->where('usr_status', "published");
			$content['user'] = $this->model_base->get_one($rec_from_id, "usr_id", "users");	


			// echo "<pre>";
			// print_r ($content['user']);
			// echo "</pre>";

			$user_type = $content['user'][0]['usr_type'];
			$user_id = $content['user'][0]['usr_id'];
			$username = $content['user'][0]['usr_username'];
			$usr_username = $content['user'][0]['dir_to_username'];

			$this->db->where('set_status', "published");
			$settings = $this->model_base->get_one($user_type, "set_name", "settings");


			$data_rebate_conf['rec_status'] = "published";
			$this->model_base->update_data($rec_id, 'rec_id', $data_rebate_conf, 'rebates_confirmation');

			// echo "<pre>";
			// print_r ($settings);
			// echo "</pre>";


			$this->db->where('usr_status', "published");
			$rebate1 = $this->model_base->get_one($username, "usr_username", "users");

			if ( count( $rebate1 ) == 1) {
				$rebate1_details['reb_from_id'] = $user_id;	
				$rebate1_details['reb_from_username'] = $username;	
				$rebate1_details['reb_from_type'] = $user_type;	
				$rebate1_details['reb_to_id'] = $rebate1[0]['usr_id'];	
				$rebate1_details['reb_to_username'] = $rebate1[0]['usr_username'];	
				$rebate1_details['reb_position'] = 1;
				$rebate1_details['reb_amount'] = $amount * $settings[0]['set_rebate1'];
				$rebate1_details['reb_created'] = $date_now;
				$rebate1_details['sale_id'] = $sale_id;
				$rebate1_details['pro_code'] = $pro_code;

				// echo "<pre>";
				// print_r ($rebate1_details);
				// echo "</pre>";
				$this->model_base->insert_data($rebate1_details, 'rebates');
				$this->db->flush_cache();

				$this->db->where('usr_status', "published");
				$rebate2 = $this->model_base->get_one($rebate1[0]['dir_to_username'], "usr_username", "users");

				if ( count( $rebate2 ) == 1) {
					$rebate2_details['reb_from_id'] = $user_id;	
					$rebate2_details['reb_from_username'] = $username;	
					$rebate2_details['reb_from_type'] = $user_type;	
					$rebate2_details['reb_to_id'] = $rebate2[0]['usr_id'];	
					$rebate2_details['reb_to_username'] = $rebate2[0]['usr_username'];	
					$rebate2_details['reb_position'] = 2;
					$rebate2_details['reb_amount'] = $amount * $settings[0]['set_rebate2'];
					$rebate2_details['reb_created'] = $date_now;
					$rebate2_details['sale_id'] = $sale_id;
					$rebate2_details['pro_code'] = $pro_code;
					
					// echo "<pre>";
					// print_r ($rebate2_details);
					// echo "</pre>";
					$this->model_base->insert_data($rebate2_details, 'rebates');
					$this->db->flush_cache();

					$this->db->where('usr_status', "published");
					$rebate3 = $this->model_base->get_one($rebate2[0]['dir_to_username'], "usr_username", "users");

					if ( count( $rebate3 ) == 1) {
						$rebate3_details['reb_from_id'] = $user_id;	
						$rebate3_details['reb_from_username'] = $username;	
						$rebate3_details['reb_from_type'] = $user_type;	
						$rebate3_details['reb_to_id'] = $rebate3[0]['usr_id'];	
						$rebate3_details['reb_to_username'] = $rebate3[0]['usr_username'];	
						$rebate3_details['reb_position'] = 3;
						$rebate3_details['reb_amount'] = $amount * $settings[0]['set_rebate3'];
						$rebate3_details['reb_created'] = $date_now;
						$rebate3_details['sale_id'] = $sale_id;
						$rebate3_details['pro_code'] = $pro_code;
						
						// echo "<pre>";
						// print_r ($rebate3_details);
						// echo "</pre>";
						$this->model_base->insert_data($rebate3_details, 'rebates');
						$this->db->flush_cache();

						$this->db->where('usr_status', "published");
						$rebate4 = $this->model_base->get_one($rebate3[0]['dir_to_username'], "usr_username", "users");

						if ( count( $rebate4 ) == 1) {
							$rebate4_details['reb_from_id'] = $user_id;	
							$rebate4_details['reb_from_username'] = $username;	
							$rebate4_details['reb_from_type'] = $user_type;	
							$rebate4_details['reb_to_id'] = $rebate4[0]['usr_id'];	
							$rebate4_details['reb_to_username'] = $rebate4[0]['usr_username'];	
							$rebate4_details['reb_position'] = 4;
							$rebate4_details['reb_amount'] = $amount * $settings[0]['set_rebate4'];
							$rebate4_details['reb_created'] = $date_now;
							$rebate4_details['sale_id'] = $sale_id;
							$rebate4_details['pro_code'] = $pro_code;

							// echo "<pre>";
							// print_r ($rebate4_details);
							// echo "</pre>";
							$this->model_base->insert_data($rebate4_details, 'rebates');
							$this->db->flush_cache();

							$this->db->where('usr_status', "published");
							$rebate5 = $this->model_base->get_one($rebate4[0]['dir_to_username'], "usr_username", "users");

							if ( count( $rebate5 ) == 1) {
								$rebate5_details['reb_from_id'] = $user_id;	
								$rebate5_details['reb_from_username'] = $username;	
								$rebate5_details['reb_from_type'] = $user_type;	
								$rebate5_details['reb_to_id'] = $rebate5[0]['usr_id'];	
								$rebate5_details['reb_to_username'] = $rebate5[0]['usr_username'];	
								$rebate5_details['reb_position'] = 5;
								$rebate5_details['reb_amount'] = $amount * $settings[0]['set_rebate5'];
								$rebate5_details['reb_created'] = $date_now;
								$rebate5_details['sale_id'] = $sale_id;
								$rebate5_details['pro_code'] = $pro_code;

								// echo "<pre>";
								// print_r ($rebate5_details);
								// echo "</pre>";
								$this->model_base->insert_data($rebate5_details, 'rebates');
								$this->db->flush_cache();

								$this->db->where('usr_status', "published");
								$rebate6 = $this->model_base->get_one($rebate5[0]['dir_to_username'], "usr_username", "users");

								if ( count( $rebate6 ) == 1) {
									$rebate6_details['reb_from_id'] = $user_id;	
									$rebate6_details['reb_from_username'] = $username;	
									$rebate6_details['reb_from_type'] = $user_type;	
									$rebate6_details['reb_to_id'] = $rebate6[0]['usr_id'];	
									$rebate6_details['reb_to_username'] = $rebate6[0]['usr_username'];	
									$rebate6_details['reb_position'] = 6;
									$rebate6_details['reb_amount'] = $amount * $settings[0]['set_rebate6'];
									$rebate6_details['reb_created'] = $date_now;
									$rebate6_details['sale_id'] = $sale_id;
									$rebate6_details['pro_code'] = $pro_code;

									// echo "<pre>";
									// print_r ($rebate6_details);
									// echo "</pre>";
									$this->model_base->insert_data($rebate6_details, 'rebates');
									$this->db->flush_cache();

									$this->db->where('usr_status', "published");
									$rebate7 = $this->model_base->get_one($rebate6[0]['dir_to_username'], "usr_username", "users");

									if ( count( $rebate7 ) == 1) {
										$rebate7_details['reb_from_id'] = $user_id;	
										$rebate7_details['reb_from_username'] = $username;	
										$rebate7_details['reb_from_type'] = $user_type;	
										$rebate7_details['reb_to_id'] = $rebate7[0]['usr_id'];	
										$rebate7_details['reb_to_username'] = $rebate7[0]['usr_username'];	
										$rebate7_details['reb_position'] = 7;
										$rebate7_details['reb_amount'] = $amount * $settings[0]['set_rebate6'];
										$rebate7_details['reb_created'] = $date_now;
										$rebate7_details['sale_id'] = $sale_id;
										$rebate7_details['pro_code'] = $pro_code;

										// echo "<pre>";
										// print_r ($rebate7_details);
										// echo "</pre>";
										$this->model_base->insert_data($rebate7_details, 'rebates');
										$this->db->flush_cache();

										$this->db->where('usr_status', "published");
										$rebate8 = $this->model_base->get_one($rebate7[0]['dir_to_username'], "usr_username", "users");

										if ( count( $rebate8 ) == 1) {
											$rebate8_details['reb_from_id'] = $user_id;	
											$rebate8_details['reb_from_username'] = $username;	
											$rebate8_details['reb_from_type'] = $user_type;	
											$rebate8_details['reb_to_id'] = $rebate8[0]['usr_id'];	
											$rebate8_details['reb_to_username'] = $rebate8[0]['usr_username'];	
											$rebate8_details['reb_position'] = 8;
											$rebate8_details['reb_amount'] = $amount * $settings[0]['set_rebate6'];
											$rebate8_details['reb_created'] = $date_now;
											$rebate8_details['sale_id'] = $sale_id;
											$rebate8_details['pro_code'] = $pro_code;

											// echo "<pre>";
											// print_r ($rebate8_details);
											// echo "</pre>";
											$this->model_base->insert_data($rebate8_details, 'rebates');
											$this->db->flush_cache();

											$this->db->where('usr_status', "published");
											$rebate9 = $this->model_base->get_one($rebate8[0]['dir_to_username'], "usr_username", "users");

											if ( count( $rebate9 ) == 1) {
												$rebate9_details['reb_from_id'] = $user_id;	
												$rebate9_details['reb_from_username'] = $username;	
												$rebate9_details['reb_from_type'] = $user_type;	
												$rebate9_details['reb_to_id'] = $rebate9[0]['usr_id'];	
												$rebate9_details['reb_to_username'] = $rebate9[0]['usr_username'];	
												$rebate9_details['reb_position'] = 9;
												$rebate9_details['reb_amount'] = $amount * $settings[0]['set_rebate6'];
												$rebate9_details['reb_created'] = $date_now;
												$rebate9_details['sale_id'] = $sale_id;
												$rebate9_details['pro_code'] = $pro_code;

												// echo "<pre>";
												// print_r ($rebate9_details);
												// echo "</pre>";
												$this->model_base->insert_data($rebate9_details, 'rebates');
												$this->db->flush_cache();

												$this->db->where('usr_status', "published");
												$rebate10 = $this->model_base->get_one($rebate9[0]['dir_to_username'], "usr_username", "users");

												if ( count( $rebate10 ) == 1) {
													$rebate10_details['reb_from_id'] = $user_id;	
													$rebate10_details['reb_from_username'] = $username;	
													$rebate10_details['reb_from_type'] = $user_type;	
													$rebate10_details['reb_to_id'] = $rebate10[0]['usr_id'];	
													$rebate10_details['reb_to_username'] = $rebate10[0]['usr_username'];	
													$rebate10_details['reb_position'] = 10;
													$rebate10_details['reb_amount'] = $amount * $settings[0]['set_rebate6'];
													$rebate10_details['reb_created'] = $date_now;
													$rebate10_details['sale_id'] = $sale_id;
													$rebate10_details['pro_code'] = $pro_code;

													// echo "<pre>";
													// print_r ($rebate10_details);
													// echo "</pre>";
													$this->model_base->insert_data($rebate10_details, 'rebates');
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

			}

			// if ( $user_type == 'sparkle' ) {
			// 	$this->_get_profit_share($user_id, $username, $amount);
			// }

			$this->session->set_flashdata('msg_success', 'Rebates Applied!');	

		} else {
			$this->session->set_flashdata('msg_error', 'Rebates Previously applied!');	
		}
		redirect('admin/rebates_confirmation/','refresh');
	}

	public function delete($id)
	{
		$header = [];
		$header['header_title'] = 'Rebates Confirmation';
		$header['header'] = 'Rebates Confirmation';
		$header['header_small'] = '';
		
		$content = [];

		$content['rebates_confirmations'] = $this->model_base->delete_data($id, 'rec_id', 'rec_status', 'rebates_confirmation');

		$this->session->set_flashdata('msg_success', 'Deleted Rebate Request!');	

		redirect('admin/rebates_confirmation/','refresh');

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/rebates_confirmation/view', $content);
		$this->load->view("template/admin_footer");
	}

	public function _get_profit_share($user_id, $username, $amount) {
		$profit_share['usr_username'] = $username;
		$profit_share['usr_id'] = $user_id;
		$profit_share['prs_amount'] = $amount;	
		$profit_share['prs_status'] = "draft";

		if ( $amount <= 1999 ) { $profit_share['prs_share'] = 1; }
		if ( $amount >= 2000 && $amount <= 2999 ) { $profit_share['prs_share'] = 3; }
		if ( $amount >= 3000 && $amount <= 4999 ) { $profit_share['prs_share'] = 5; }
		if ( $amount >= 5000 ) { $profit_share['prs_share'] = 10; }

		$this->model_base->insert_data($profit_share, 'profit_shares');
		$this->db->flush_cache();

	}
}