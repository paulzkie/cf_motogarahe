<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	private function sanitize_coordinate_value($value)
	{
		$value = trim((string) $value);
		if ($value === '' || strtolower($value) === 'undefined') {
			return '';
		}

		return preg_match('/^-?\d+(\.\d+)?$/', $value) ? $value : '';
	}

	private function sanitize_repo_search_payload($post_data)
	{
		$build_segment = function ($key, $default, $max_length = 80) use ($post_data) {
			$value = public_input_plain_text(isset($post_data[$key]) ? $post_data[$key] : '', $max_length);

			if ($value === '') {
				return $default;
			}

			return $this->_slug($value);
		};

		$status = strtoupper(public_input_plain_text(isset($post_data['status']) ? $post_data['status'] : '', 10));
		if ($status !== 'USED') {
			$status = 'NEW';
		}

		return array(
			'mot_model' => $build_segment('mot_model', 'all', 120),
			'mot_brand' => $build_segment('mot_brand', 'brand'),
			'mot_type' => $build_segment('mot_type', 'type'),
			'mot_transmission' => $build_segment('mot_transmission', 'transmission'),
			'mot_diplacement' => $build_segment('mot_diplacement', 'diplacement'),
			'mot_engine_type' => $build_segment('mot_engine_type', 'engine-type'),
			'status' => $status,
		);
	}

	private function sanitize_repo_location_payload($post_data)
	{
		return array(
			'lat' => $this->sanitize_coordinate_value(isset($post_data['lat']) ? $post_data['lat'] : ''),
			'long' => $this->sanitize_coordinate_value(isset($post_data['long']) ? $post_data['long'] : ''),
		);
	}

	private function sanitize_repo_inquiry_payload($post_data)
	{
		return array(
			'mot_id' => (int) public_input_phone(isset($post_data['mot_id']) ? $post_data['mot_id'] : 0),
			'inq_name' => public_input_plain_text(isset($post_data['inq_name']) ? $post_data['inq_name'] : '', 120),
			'inq_address' => public_input_plain_text(isset($post_data['inq_address']) ? $post_data['inq_address'] : '', 255),
			'inq_phone' => public_input_phone(isset($post_data['inq_phone']) ? $post_data['inq_phone'] : ''),
			'inq_email' => public_input_email(isset($post_data['inq_email']) ? $post_data['inq_email'] : ''),
			'inq_tentative' => public_input_plain_text(isset($post_data['inq_tentative']) ? $post_data['inq_tentative'] : '', 64),
			'inq_occupation' => public_input_plain_text(isset($post_data['inq_occupation']) ? $post_data['inq_occupation'] : '', 120),
			'inq_position' => public_input_plain_text(isset($post_data['inq_position']) ? $post_data['inq_position'] : '', 120),
			'inq_message' => public_input_plain_text(isset($post_data['inq_message']) ? $post_data['inq_message'] : '', 1000),
		);
	}

	public function index($slug="all", $brand="brand", $type="type", $transmission="transmission", $diplacement="diplacement", $engine="engine-type", $filter="1" )
	{

		$this->session->set_userdata('current_url', current_url());

		// $current_url  =  $this->session->userdata('current_url');
		// echo $current_url;

		// $this->useraccount->pota();
		$header = [];
		$content = [];
		$header['header_title'] = 'Repo';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		$header['header_featured_img'] = "";
		
		

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
			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email|max_length[254]|is_unique[users.usr_email]');
			$this->form_validation->set_rules('usr_password', 'Password', 'trim|required|matches[usr_password_conf]|min_length[8]|md5'); 
			$this->form_validation->set_rules('usr_password_conf', 'Confirm Password', 'trim|required|md5');
			$this->form_validation->set_rules('usr_fname', 'Firstname', 'required|trim|max_length[120]');
			// $this->form_validation->set_rules('usr_mname', 'Middlename', 'required|trim');
			$this->form_validation->set_rules('usr_lname', 'Lastname', 'required|trim|max_length[120]');
			// $this->form_validation->set_rules('usr_address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('usr_bday', 'Birthday', 'required|trim');
			$this->form_validation->set_rules('usr_contact', 'Contact Number', 'required|trim|max_length[20]|regex_match[/^[0-9]+$/]');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data_users = public_input_registration_payload($this->input->post(NULL, FALSE));
				$data_users['usr_created'] = $this->getDatetimeNow();
		        // $data_users['usr_bday'] = date("Y\-m\-d\ H:i:s", strtotime($data['usr_bday']));
		        $data_users['usr_session'] = $this->session->userdata('session_id');

		        $this->model_base->insert_data($data_users, 'users');
		        $last_id = $this->db->insert_id();
		        $this->session->set_flashdata('msg_success', 'Successfully Registered!');	
				redirect('invoice','refresh');
			}
		}

		if($this->input->post('login_mode')) {

			$this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = public_input_login_payload($this->input->post(NULL, FALSE));
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

		$content['mot_slug'] = $this->uri->segment(3);
		$content['mot_model'] = str_replace('-', ' ', $content['mot_slug']);
		$content['mot_brand'] = $this->uri->segment(4);
		$content['mot_type'] = $this->uri->segment(5);
		$content['mot_transmission'] = $this->uri->segment(6);
		$content['mot_diplacement'] = $this->uri->segment(7);
		$content['mot_engine_type'] = $this->uri->segment(8);

		$content['mot_slug'] = $this->clean_input($content['mot_slug']);
		$content['mot_model'] = $this->clean_input($content['mot_model']);
		$content['mot_brand'] = $this->clean_input($content['mot_brand']);
		$content['mot_type'] = $this->clean_input($content['mot_type']);
		$content['mot_transmission'] = $this->clean_input($content['mot_transmission']);
		$content['mot_diplacement'] = $this->clean_input($content['mot_diplacement']);
		$content['mot_engine_type'] = $this->clean_input($content['mot_engine_type']);

		if($this->input->post('search_mode')) {

			$this->form_validation->set_rules('mot_model', 'Motorcycle', 'trim|max_length[120]');
			$this->form_validation->set_rules('mot_brand', 'Brand', 'trim|max_length[80]');
			$this->form_validation->set_rules('mot_type', 'Type', 'trim|max_length[80]');
			$this->form_validation->set_rules('mot_transmission', 'Transmission', 'trim|max_length[80]');
			$this->form_validation->set_rules('mot_diplacement', 'Displacement', 'trim|max_length[80]');
			$this->form_validation->set_rules('mot_engine_type', 'Engine Type', 'trim|max_length[80]');
			$this->form_validation->set_rules('status', 'Status', 'trim|in_list[NEW,USED]');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->sanitize_repo_search_payload($this->input->post(NULL, FALSE));
				
				if ( $data['status'] == "NEW") {

					// $this->godprintp($data);

					redirect('repo/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {

				}
			}
		}
		
		$config = array();
		$config["base_url"] = base_url() . "repo/index/" . $content['mot_slug'] . "/" . $content['mot_brand']. "/" . $content['mot_type']. "/" . $content['mot_transmission']. "/" . $content['mot_diplacement']. "/" . $content['mot_engine_type'];

		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$total_row = $this->model_base->count_data('repo');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 20;
		$config['uri_segment'] = 20;
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
		
		$this->db->flush_cache();
		$this->db->order_by('mot_id',"DESC");
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['repo'] = $this->model_base->get_all('repo');
		$this->db->flush_cache();
		

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";
		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_repo', $content);
		$this->load->view("template/site_footer", $footer);
	}

	public function _sorting($slug, $brand, $type, $transmission, $diplacement, $engine) {
		$this->db->where('mot_status !=', 'deleted');

		if ($slug != "all") {
			$this->db->like('mot_slug', $slug);
		} 

		if ( $brand != 'brand' ) {
			// $this->db->like('title', $result);
			// $this->db->or_like('artist', $result);
			// $this->db->or_like('gen_name', $result);
			$this->db->where('mot_brand', $brand);
		}

// 		if ($type != "type") {
// 			$this->db->where('mot_type', $type);
// 		} 

// 		if ($transmission != "transmission") {
// 			$this->db->where('mot_transmission', $transmission);
// 		} 

// 		if ($diplacement != "diplacement") {
// 			$this->db->where('mot_diplacement >=', $diplacement);
// 		} 

// 		if ($engine != "engine-type") {
// 			$this->db->where('mot_engine_type', $engine);
// 		} 
	}

	public function info($slug, $id) {

		$slug = $this->clean_input($slug);
		$id = $this->clean_input($id);

		$this->session->set_userdata('current_url', current_url());

		if ( empty($slug) ) {
			redirect('home');
		}

		$header = [];
		$content = [];
		$header["header_featured_img"] = '';
		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$this->db->where('mot_id', $id);
		$content['repo'] = $this->model_base->get_one($slug, "mot_slug", "repo");
		
	


		// $this->godprint($content['motorcycles']);

		$header['header_title'] = $content['repo'][0]['mot_model'];
		// $header['header_slug'] = $content['motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['repo'][0]['mot_model']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['repo'][0]['mot_model'] .",".$content['repo'][0]['mot_slug'].",".$content['repo'][0]['mot_brand'].",motogarahe.com";

		$content['repo'][0]['keywords'] = $header['header_keywords'];
		
		// $this->godprintp($header);

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
        $(".lat").val(mapCentre.lat());
        $("#myPlaceTextBox3").text(mapCentre.lng());
        $(".long").val(mapCentre.lng());

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

		if($this->input->post('dealers_mode')) {

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim|required|decimal');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim|required|decimal');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->sanitize_repo_location_payload($this->input->post(NULL, FALSE));

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				redirect('repo/dealers/' . $slug . '/' . $data['lat'] . '/' . $data['long'] . '/' . 20 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}
        
        $this->db->where('mop_status', 'published');
		$content['repo_pictures'] = $this->model_base->get_one($id, "mot_id", "repo_pictures");
		
		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_repo_info', $content);
		$this->load->view("template/site_footer");	
	}

	public function fill_up($id) {
		$id = $this->clean_input($id);

		$header = [];
		
		$content = [];
        $header["header_featured_img"] = '';
		$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['repo'] = $this->model_base->get_one($id, "mot_id", "repo");

		// $content['colors'] = explode (",", $content['repo'][0]['mot_color_variant']); 

		// $this->godprint($content['repo']);
		// $this->godprint($content['colors']);


		$header['header_title'] = $content['repo'][0]['mot_model'] . ' - ' . $content['repo'][0]['dea_name'];
		// $header['header_slug'] = $content['repo'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['repo'][0]['mot_model'] . ' - ' . $content['repo'][0]['dea_name']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['repo'][0]['mot_model'] .",".$content['repo'][0]['dea_name'].",".$content['repo'][0]['mot_slug'].",".$content['repo'][0]['mot_brand'].",motogarahe.com";

		$content['repo'][0]['keywords'] = $header['header_keywords'];


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

		if($this->input->post('fill_mode')) {

			$this->form_validation->set_rules('mot_id', 'Model', 'trim|required|integer');
			// $this->form_validation->set_rules('inq_color', 'Color Variant', 'trim|required');
			$this->form_validation->set_rules('inq_name', 'Name', 'trim|required|max_length[120]');
			$this->form_validation->set_rules('inq_address', 'Address', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('inq_phone', 'Phone', 'trim|required|max_length[20]|regex_match[/^[0-9]+$/]');
			$this->form_validation->set_rules('inq_email', 'Email', 'trim|required|valid_email|max_length[254]');
			// $this->form_validation->set_rules('inq_payment', 'Mode of Payment', 'trim|required');
			$this->form_validation->set_rules('inq_tentative', 'Tentative', 'trim|required|max_length[64]');
			$this->form_validation->set_rules('inq_occupation', 'Occupation', 'trim|required|max_length[120]');
			$this->form_validation->set_rules('inq_position', 'Position', 'trim|required|max_length[120]');
			$this->form_validation->set_rules('inq_message', 'Message', 'trim|max_length[1000]');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->sanitize_repo_inquiry_payload($this->input->post(NULL, FALSE));

				$data['inq_tentative'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative']));
				$data['inq_created'] = $this->getDatetimeNow();

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$this->model_base->insert_data($data, 'inquiries_repo');
				$this->session->set_flashdata('msg_success', 'Successfully send inquiry!');
				redirect('home' ,'refresh');
				
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_fill_up2', $content);
		$this->load->view("template/site_footer");	
	}


	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	public static function slug(){
	    //Lower case everything
	    $string = strtolower("MC Specs");
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    echo $string;
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
}