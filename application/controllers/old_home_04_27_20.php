<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session',  'googlemaps', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		

		if ( $this->session->userdata('usr_id') ) {

			$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
			if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
				$this->logout_user();	
			}

			
		}
	}

	public function getSongs() {
		$this->db->where('son_featured', 'yes');
	    $songs = $this->model_base->get_all('songs');
	    echo json_encode($songs);
	}

	public function index()
	{

		$header = [];
		$content = [];
		$header['header_title'] = 'Home';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		
		

		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		//document.getElementById("myPlaceTextBox2").value = mapCentre.lat();
        //document.getElementById("myPlaceTextBox3").value = mapCentre.lng();

        $("#myPlaceTextBox2").text(mapCentre.lat());
        $("#myPlaceTextBox3").text(mapCentre.lng());

        var geocoder  = new google.maps.Geocoder();             // create a geocoder object
		var location  = new google.maps.LatLng(mapCentre.lat(), mapCentre.lng());    // turn coordinates into an object          
		geocoder.geocode({"latLng": location}, function (results, status) {
			if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
				var add=results[0].formatted_address;         // if address found, pass to processing function
				//document.getElementById("myPlaceTextBox").value = add;
				$("#myPlaceTextBox").text(add);
			}
		});     
		centreGot = true;';

		$marker = array();
		$marker['animation'] = 'BOUNCE';
		$marker['draggable'] = 'true';
		// $marker['ondragend'] = "showCoords(event.latLng.lat(), event.latLng.lng());";

		$marker['ondragend'] = 'document.getElementById("myPlaceTextBox2").value = event.latLng.lat();
            					document.getElementById("myPlaceTextBox3").value = event.latLng.lng(); 

            					var geocoder  = new google.maps.Geocoder();             // create a geocoder object
								var location  = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());    // turn coordinates into an object          
								geocoder.geocode({"latLng": location}, function (results, status) {
									if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
										var add=results[0].formatted_address;         // if address found, pass to processing function
										// document.getElementById("myPlaceTextBox").value = add;
										$("#myPlaceTextBox").text(add);
									}
								});     
        ';

		$config['zoom'] = 15;
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = "   markers_map[0].setVisible(false);
												    var place = placesAutocomplete.getPlace();
												    document.getElementById('myPlaceTextBox2').value = place.geometry.location.lat();
            document.getElementById('myPlaceTextBox3').value = place.geometry.location.lng();
												    if (!place.geometry) {
												      return;
												    }

												    // If the place has a geometry, then present it on a map.
												    if (place.geometry.viewport) {
												      map.fitBounds(place.geometry.viewport);
												      map.setZoom(15);
												    } else {
												      map.setCenter(place.geometry.location);
												      map.setZoom(15);
												    }

												    markers_map[0].setPosition(place.geometry.location);
												    markers_map[0].setVisible(true);

												    var address = '';
												    if (place.address_components) {
												      address = [
												        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
												      ].join(' ');
												    }";

		$this->googlemaps->initialize($config);
		
		$header['map'] = $this->googlemaps->add_marker($marker);
		$header['map'] = $this->googlemaps->create_map();

		/*************END MAP******************/

		if($this->input->post('reg_mode')) {

			// $this->form_validation->set_rules('usr_username', 'Username','trim|required|is_unique[users.usr_username]');  
			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email|is_unique[users.usr_email]');
			$this->form_validation->set_rules('usr_password', 'Password', 'trim|required|matches[usr_password_conf]|min_length[8]|md5'); 
			$this->form_validation->set_rules('usr_password_conf', 'Confirm Password', 'trim|required|md5');
			$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim');
			// $this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
			$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim');
			// $this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
			$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['reg_mode']);

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;

				// $data_users['usr_username'] = $data['usr_username'];
				$data_users['usr_password'] = $data['usr_password'];
				$data_users['usr_fname'] = $data['usr_fname'];
				// $data_users['usr_mname'] = $data['usr_mname'];
				$data_users['usr_lname'] = $data['usr_lname'];
				// $data_users['usr_address'] = $data['usr_address'];
				// $data_users['usr_gender'] = $data['usr_gender'];
				$data_users['usr_contact'] = $data['usr_contact'];
				$data_users['usr_email'] = $data['usr_email'];
				$data_users['usr_created'] = $this->getDatetimeNow();
		        // $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));
		        $data_users['usr_session'] = $this->session->userdata('session_id');

		        $this->model_base->insert_data($data_users, 'users');
		        $last_id = $this->db->insert_id();
		        $this->session->set_flashdata('msg_success', 'Successfully Registered!');	
				redirect('home','refresh');
			}
		}

		if($this->input->post('login_mode')) {

			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$table = "users";

				$this->db->select('usr_id, usr_fname, usr_lname, usr_mname, usr_email, usr_username, usr_session, uss_id, usr_status');
				$this->db->where('usr_status !=', 'deleted');
    			$user = $this->model_login->login_user_by_email($data, $table);

    			if ( count( $user ) >= 1 ) {
    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
    				$this->session->set_userdata($user[0]);

    				$data_update['usr_session'] = $this->session->userdata('session_id');
					$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_update, 'users');

    				redirect('home','refresh');

    			} else {	
    				$content['msg_error'] = 'Invalid Account';
    			}
			}
		}

		if($this->input->post('search_mode')) {

			$this->form_validation->set_rules('mot_model', 'Motorcycle', 'trim');

			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['search_mode']);

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;	


				// $this->session->set_userdata('mot_model', $data['mot_model']);
				/*
				print_r ($data['mot_model']);
				from devhome value , and space explode
				if wala ganyan 
				( !empty($data['mot_model']) ) {
					$data['mot_model'] = $this->_slug($data['mot_model']);
				} 
				*/

				if ( !empty($data['mot_model']) ) {

					// $data['mot_model'] = $this->_slug($data['mot_model']);
					$searchForComma = ',';
					// if has a comma value 
					if(strpos($data["mot_model"], $searchForComma) !== false){
						$searchResult = explode(",", $data['mot_model'], 2);
						$explodeCount = count($searchResult);
						if($explodeCount == 1){
							$data['mot_model'] = $this->_slug($data['mot_model']);
						}else{
							
							$data["mot_model"] = ltrim($searchResult[1]);
							$data['mot_model'] = $this->_slug($data["mot_model"]);

						}

					}else{
						// with no comma value
						$searchResult = explode(" ", $data['mot_model'], 2);
						$explodeCount = count($searchResult);
						if($explodeCount == 1){
							$data['mot_model'] = $this->_slug($data['mot_model']);
						}else{
							
							$data["mot_model"] = ltrim($searchResult[1]);
							$data['mot_model'] = $this->_slug($data["mot_model"]);

						}

					}

				} else {
					$data['mot_model'] = "all";
				}

				if ( empty($data['mot_brand']) ) {
					$data['mot_brand'] = "brand";	
				}

				if ( empty($data['mot_type']) ) {
					$data['mot_type'] = "type";	
				}

				if ( empty($data['mot_transmission']) ) {
					$data['mot_transmission'] = "transmission";	
				}

				if ( empty($data['mot_diplacement']) ) {
					$data['mot_diplacement'] = "diplacement";	
				}

				if ( empty($data['mot_engine_type']) ) {
					$data['mot_engine_type'] = "engine-type";	
				}

				if ( empty($data['status']) ) {
					$data['status'] = "NEW";	
				}
				
				if ( $data['status'] == "NEW") {

					// $this->godprintp($data);

					redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {
					redirect('repo/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				}
			}
		}



		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');
		// $this->godprintp($content['dealers_motorcycles']);


		// $this->godprintp($content);

		// $this->db->flush_cache();
	 //    if ( $this->session->userdata('uss_id') != 0 ) {
		// 	$plan = $this->model_base->get_one($this->session->userdata('uss_id'), "uss_id", "users_subscriptions");
		// 	if ($plan[0]['uss_date_end'] >= date("d/m/Y H:i:s", strtotime('today'))) {
		// 		$content['plan'] = 'Premium Account';
		// 		$header['plan'] = 'Premium Account';
		// 	} else {
		// 		$content['plan'] = 'Regular Account';
		// 		$header['plan'] = 'Regular Account';	
		// 	}
		// 	// $this->godprintp($plan);
		// } else {
		// 	$content['plan'] = 'Regular Account';
		// 	$header['plan'] = 'Regular Account';	
		// }

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_home2', $content);
		$this->load->view("template/site_footer", $footer);

		// echo '<pre>' .  print_r($this->session->all_userdata()) . '</pre>'; 
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


	public function _get_direct( $usr_username, $username, $user_id, $set_id ) {
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
						}

					}

				}

			}

		}
	}


	public function _iscode_exist( $cod_name, $data ) {
		$exist = false;
		$this->db->where('cod_status', "published");
		$code = $this->model_base->get_one($cod_name, "cod_name", "codes");
		$set_id = $code[0]['set_id'];

		if ( count( $code ) == 1 ) {
			$this->_reg_user($data, $code[0]['cod_type'], $cod_name, $set_id);
			
			$exist = true;						
		} else {
			$this->session->set_flashdata('msg_error', 'Invalid code!');
		}
		return $exist;
	}

	public function _incentives( $dir_to_username ) {
		$this->db->flush_cache();
		$this->db->where('dir_to_username', $dir_to_username );
		$this->db->where('month(usr_created)',date('m'));
		$total_row = $this->model_base->count_data('users');

		if ( $total_row == 10 ) {
			$incentive = $this->model_base->get_one("10", "set_name", "settings2");	

			$data_incentive["usr_username"] = $dir_to_username;
			$data_incentive["set_desc"] = $incentive[0]["set_desc"];
			$data_incentive["int_status"] = "draft";
			$data_incentive["int_created"] = $this->getDatetimeNow();
			$this->model_base->insert_data($data_incentive, 'incentives');
		}

		if ( $total_row == 100 ) {
			$incentive = $this->model_base->get_one("100", "set_name", "settings2");

			$data_incentive["usr_username"] = $dir_to_username;
			$data_incentive["set_desc"] = $incentive[0]["set_desc"];
			$data_incentive["int_status"] = "draft";
			$data_incentive["int_created"] = $this->getDatetimeNow();
			$this->model_base->insert_data($data_incentive, 'incentives');	
		}

		//total row for 1000 sponsors in 6 months	
		$this->db->flush_cache();
		$currentday = date("Y\-m\-d\ H:i:s", strtotime("12:00am August 20 2017"));	
		$enddate = date("Y\-m\-d\ H:i:s", strtotime($currentday . "+6 months"));

		$this->db->where('usr_created >=', $currentday);
		$this->db->where('usr_created <=', $enddate);
		$this->db->where('dir_to_username', $dir_to_username );
		$total_row2 = $this->model_base->count_data('users');

		if ( $total_row2 == 1000 ) {
			$incentive = $this->model_base->get_one("1000", "set_name", "settings2");

			$data_incentive["usr_username"] = $dir_to_username;
			$data_incentive["set_desc"] = $incentive[0]["set_desc"];
			$data_incentive["int_status"] = "draft";
			$data_incentive["int_created"] = $this->getDatetimeNow();
			$this->model_base->insert_data($data_incentive, 'incentives');	
		}


		
	}

	public function _reg_user($data, $account_type, $cod_name, $set_id) {

		$upline = $data['dir_to_username'];
		$upline_details = $this->model_base->get_one($upline, "usr_username", "users");
		$upline_id = $upline_details[0]['usr_id'];

		// echo "<pre>";
		// print_r ($upline_details);
		// echo "</pre>";

		// echo "<pre>";
		// print_r ($account_type);
		// echo "</pre>";

		

		if ( count( $upline_details ) == 1 ) {
			// if ( $upline_details[0]['usr_type'] == $account_type ) {
				$this->_incentives($upline, $upline_id);

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

				$data_users['usr_created'] = $this->getDatetimeNow();
		        $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));


		        // echo "<pre>";
		        // print_r ($data_users);
		        // echo "</pre>";

		        $this->model_base->insert_data($data_users, 'users');
		        $last_id = $this->db->insert_id();
		        
		        $data_codes['usr_name'] = $data['usr_username'];
		        $data_codes['usr_id'] = $last_id;
		        $data_codes['cod_status'] = "deleted";

		        // echo "<pre>";
		        // print_r ($data_codes);
		        // echo "</pre>";

		        $this->model_base->update_data($cod_name, 'cod_name', $data_codes, 'codes');

		        $this->_get_direct( $data_users['dir_to_username'], $data['usr_username'], $last_id, $set_id );
		        $this->session->set_flashdata('msg_success', 'Your Account is Created!');	
			// } else {
			// 	$this->session->set_flashdata('msg_error', 'Missed match account type!');	
			// }
		} else {
			$this->session->set_flashdata('msg_error', 'Invalid Referred by!');	
		}
	}

	public function products() {

		$this->db->order_by('cat_name', 'ASC');
		$this->db->join("categories", "categories.cat_id = products.cat_id");
		$this->db->where('pro_status !=', 'deleted');
		$content['products'] = $this->model_base->get_all('products');

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_products', $content);
		$this->load->view("template/site_footer");
	}

	public static function slug(){
	    //Lower case everything
	    $string = strtolower("Carburetor");
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    echo $string;
	} 

	public function logout() {
       $this->logout_user();	
   }
   public function devhome()
   {

		$header = [];
		$content = [];
		$header['header_title'] = 'Home';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		
		

		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		//document.getElementById("myPlaceTextBox2").value = mapCentre.lat();
        //document.getElementById("myPlaceTextBox3").value = mapCentre.lng();

        $("#myPlaceTextBox2").text(mapCentre.lat());
        $("#myPlaceTextBox3").text(mapCentre.lng());

        var geocoder  = new google.maps.Geocoder();             // create a geocoder object
		var location  = new google.maps.LatLng(mapCentre.lat(), mapCentre.lng());    // turn coordinates into an object          
		geocoder.geocode({"latLng": location}, function (results, status) {
			if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
				var add=results[0].formatted_address;         // if address found, pass to processing function
				//document.getElementById("myPlaceTextBox").value = add;
				$("#myPlaceTextBox").text(add);
			}
		});     
		centreGot = true;';

		$marker = array();
		$marker['animation'] = 'BOUNCE';
		$marker['draggable'] = 'true';
		// $marker['ondragend'] = "showCoords(event.latLng.lat(), event.latLng.lng());";

		$marker['ondragend'] = 'document.getElementById("myPlaceTextBox2").value = event.latLng.lat();
            					document.getElementById("myPlaceTextBox3").value = event.latLng.lng(); 

            					var geocoder  = new google.maps.Geocoder();             // create a geocoder object
								var location  = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());    // turn coordinates into an object          
								geocoder.geocode({"latLng": location}, function (results, status) {
									if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
										var add=results[0].formatted_address;         // if address found, pass to processing function
										// document.getElementById("myPlaceTextBox").value = add;
										$("#myPlaceTextBox").text(add);
									}
								});     
        ';

		$config['zoom'] = 15;
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = "   markers_map[0].setVisible(false);
												    var place = placesAutocomplete.getPlace();
												    document.getElementById('myPlaceTextBox2').value = place.geometry.location.lat();
            document.getElementById('myPlaceTextBox3').value = place.geometry.location.lng();
												    if (!place.geometry) {
												      return;
												    }

												    // If the place has a geometry, then present it on a map.
												    if (place.geometry.viewport) {
												      map.fitBounds(place.geometry.viewport);
												      map.setZoom(15);
												    } else {
												      map.setCenter(place.geometry.location);
												      map.setZoom(15);
												    }

												    markers_map[0].setPosition(place.geometry.location);
												    markers_map[0].setVisible(true);

												    var address = '';
												    if (place.address_components) {
												      address = [
												        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
												      ].join(' ');
												    }";

		$this->googlemaps->initialize($config);
		
		$header['map'] = $this->googlemaps->add_marker($marker);
		$header['map'] = $this->googlemaps->create_map();

		/*************END MAP******************/

		if($this->input->post('reg_mode')) {

			// $this->form_validation->set_rules('usr_username', 'Username','trim|required|is_unique[users.usr_username]');  
			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email|is_unique[users.usr_email]');
			$this->form_validation->set_rules('usr_password', 'Password', 'trim|required|matches[usr_password_conf]|min_length[8]|md5'); 
			$this->form_validation->set_rules('usr_password_conf', 'Confirm Password', 'trim|required|md5');
			$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim');
			// $this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
			$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim');
			// $this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
			$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['reg_mode']);

				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";

				// break;

				// $data_users['usr_username'] = $data['usr_username'];
				$data_users['usr_password'] = $data['usr_password'];
				$data_users['usr_fname'] = $data['usr_fname'];
				// $data_users['usr_mname'] = $data['usr_mname'];
				$data_users['usr_lname'] = $data['usr_lname'];
				// $data_users['usr_address'] = $data['usr_address'];
				// $data_users['usr_gender'] = $data['usr_gender'];
				$data_users['usr_contact'] = $data['usr_contact'];
				$data_users['usr_email'] = $data['usr_email'];
				$data_users['usr_created'] = $this->getDatetimeNow();
		        // $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));
		        $data_users['usr_session'] = $this->session->userdata('session_id');

		        $this->model_base->insert_data($data_users, 'users');
		        $last_id = $this->db->insert_id();
		        $this->session->set_flashdata('msg_success', 'Successfully Registered!');	
				redirect('home','refresh');
			}
		}

		if($this->input->post('login_mode')) {

			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				$table = "users";

				$this->db->select('usr_id, usr_fname, usr_lname, usr_mname, usr_email, usr_username, usr_session, uss_id, usr_status');
				$this->db->where('usr_status !=', 'deleted');
    			$user = $this->model_login->login_user_by_email($data, $table);

    			if ( count( $user ) >= 1 ) {
    				$this->session->set_flashdata('msg_success', 'Successfully log in!');	
    				$this->session->set_userdata($user[0]);

    				$data_update['usr_session'] = $this->session->userdata('session_id');
					$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_update, 'users');

    				redirect('home','refresh');

    			} else {	
    				$content['msg_error'] = 'Invalid Account';
    			}
			}
		}

		if($this->input->post('search_mode')) {

			$this->form_validation->set_rules('mot_model', 'Motorcycle', 'trim');

			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['search_mode']);


				if ( !empty($data['mot_model']) ) {

					// $data['mot_model'] = $this->_slug($data['mot_model']);
					$searchForComma = ',';
					// if has a comma value 
					if(strpos($data["mot_model"], $searchForComma) !== false){
						$searchResult = explode(",", $data['mot_model'], 2);
						$explodeCount = count($searchResult);
						if($explodeCount == 1){
							$data['mot_model'] = $this->_slug($data['mot_model']);
						}else{
							
							$data["mot_model"] = ltrim($searchResult[1]);
							$data['mot_model'] = $this->_slug($data["mot_model"]);

						}

					}else{
						// with no comma value
						$searchResult = explode(" ", $data['mot_model'], 2);
						$explodeCount = count($searchResult);
						if($explodeCount == 1){
							$data['mot_model'] = $this->_slug($data['mot_model']);
						}else{
							
							$data["mot_model"] = ltrim($searchResult[1]);
							$data['mot_model'] = $this->_slug($data["mot_model"]);

						}

					}




					









				} else {
					$data['mot_model'] = "all";
				}

				if ( empty($data['mot_brand']) ) {
					$data['mot_brand'] = "brand";	
				}

				if ( empty($data['mot_type']) ) {
					$data['mot_type'] = "type";	
				}

				if ( empty($data['mot_transmission']) ) {
					$data['mot_transmission'] = "transmission";	
				}

				if ( empty($data['mot_diplacement']) ) {
					$data['mot_diplacement'] = "diplacement";	
				}

				if ( empty($data['mot_engine_type']) ) {
					$data['mot_engine_type'] = "engine-type";	
				}

				if ( empty($data['status']) ) {
					$data['status'] = "NEW";	
				}
				
				if ( $data['status'] == "NEW") {

					// $this->godprintp($data);

					redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {
					redirect('repo/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				}
			}
		}



		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');
		// $this->godprintp($content['dealers_motorcycles']);


		// $this->godprintp($content);

		// $this->db->flush_cache();
	 //    if ( $this->session->userdata('uss_id') != 0 ) {
		// 	$plan = $this->model_base->get_one($this->session->userdata('uss_id'), "uss_id", "users_subscriptions");
		// 	if ($plan[0]['uss_date_end'] >= date("d/m/Y H:i:s", strtotime('today'))) {
		// 		$content['plan'] = 'Premium Account';
		// 		$header['plan'] = 'Premium Account';
		// 	} else {
		// 		$content['plan'] = 'Regular Account';
		// 		$header['plan'] = 'Regular Account';	
		// 	}
		// 	// $this->godprintp($plan);
		// } else {
		// 	$content['plan'] = 'Regular Account';
		// 	$header['plan'] = 'Regular Account';	
		// }

		$this->load->view("template/site_header", $header);
		$this->load->view('site/dev_view_home2', $content);
		$this->load->view("template/site_footer", $footer);

		// echo '<pre>' .  print_r($this->session->all_userdata()) . '</pre>'; 
	
   }
   public function searchajax()
   {
		$this->load->model('model_base');
		$search = $this->input->post("search");
		// echo "Test".$search;

		$allmotors = $this->model_base->get_ajax($search);
		//  print_r($allmotors);

		if($allmotors == null){ 
			// echo '<li class="list-group-item">No result found</li>';
			return null;
		}
		  foreach($allmotors as $result){
		  			$values = "'".$result["mot_brand"]."',". "'".$result["mot_model"]."'";
			   echo  '<li class="list-group-item moto-result"  onmouseover="hoverInRes(event)" onmouseout="hoverOutRes(event)" onclick="pickResult('.$values.')" >' .$result["mot_brand"] . " ".$result["mot_model"] . " </li>"; 
			   
			}

   }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */