<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motorcycles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	public function index($slug="all", $brand="brand", $type="type", $transmission="transmission", $diplacement="diplacement", $engine="engine-type", $filter="1" )
	{

		$this->session->set_userdata('current_url', current_url());

		// $current_url  =  $this->session->userdata('current_url');
		// echo $current_url;

		// $this->useraccount->pota();
		$header = [];
		$content = [];
		$header['header_title'] = 'Motorcycles';
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

			$this->form_validation->set_rules('mot_model', 'Motorcycle', 'trim');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['search_mode']);

				if ( !empty($data['mot_model']) ) {
					$data['mot_model'] = $this->_slug($data['mot_model']);
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

				}
			}
		}
		
		$config = array();
		$config["base_url"] = base_url() . "motorcycles/index/" . $content['mot_slug'] . "/" . $content['mot_brand']. "/" . $content['mot_type']. "/" . $content['mot_transmission']. "/" . $content['mot_diplacement']. "/" . $content['mot_engine_type'];
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$total_row = $this->model_base->count_data('motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 9;
		$config['uri_segment'] = 9;
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
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');

		// $this->godprint($content['motorcycles']);

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
		$this->load->view('site/view_motorcycles', $content);
		$this->load->view("template/site_footer", $footer);
	}

	public function _sorting($slug, $brand, $type, $transmission, $diplacement, $engine) {
		$this->db->where('mot_status !=', 'deleted');

		if ($slug != "all") {
			$this->db->like('mot_slug', $slug);
			$this->db->or_like('mot_brand', $slug);
		} 

		if ( $brand != 'brand' ) {
			// $this->db->like('title', $result);
			// $this->db->or_like('artist', $result);
			// $this->db->or_like('gen_name', $result);
			$this->db->where('mot_brand', $brand);
		}

		if ($type != "type") {
			$this->db->where('mot_type', $type);
		} 

		if ($transmission != "transmission") {
			$this->db->where('mot_transmission', $transmission);
		} 

		if ($diplacement != "diplacement") {
			$this->db->where('mot_diplacement', $diplacement);
		} 

		if ($engine != "engine-type") {
			$this->db->where('mot_engine_type', $engine);
		} 
	}

	public function info($slug) {

		$slug = $this->clean_input($slug);

		$this->session->set_userdata('current_url', current_url());

		if ( empty($slug) ) {
			redirect('home');
		}

		$header = [];
		$content = [];

		$content['motorcycles'] = $this->model_base->get_one($slug, "mot_slug", "motorcycles");


		$content['color_variants'] = explode(",", $content['motorcycles'][0]['mot_color_variant']);
		// $this->godprint($content['color_variants']);


		$this->db->flush_cache();
		$this->db->where('motorcycles_pictures.mop_status', 'published');	
		$this->db->where('mot_id', $content['motorcycles'][0]['mot_id']);
		$content['motorcycles_pictures'] = $this->model_base->get_all('motorcycles_pictures');


		



		$header['header_title'] = $content['motorcycles'][0]['mot_model'];
		// $header['header_slug'] = $content['motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['motorcycles'][0]['mot_model']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['motorcycles'][0]['mot_model'] .",".$content['motorcycles'][0]['mot_slug'].",".$content['motorcycles'][0]['mot_brand'].",motogarahe.com";

		$content['motorcycles'][0]['keywords'] = $header['header_keywords'];
		
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

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim|required');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim|required');
			$this->form_validation->set_rules('dem_colors', 'Color', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['dealers_mode']);

				$data['dem_colors'] =  $this->_slug($data['dem_colors']);

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				redirect('motorcycles/dealers/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}




		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_motorcycles_info', $content);
		$this->load->view("template/site_footer");	
	}

	public function details($dealer_slug, $slug, $dem_id) {

		$this->session->set_userdata('current_url', current_url());

		$dealer_slug = $this->clean_input($dealer_slug);
		$slug = $this->clean_input($slug);
		$dem_id = $this->clean_input($dem_id);

		$header = [];
		
		$content = [];


		$this->db->where('dealers_motorcycles.dem_status', 'published');
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$content['dealers_motorcycles'] = $this->model_base->get_one($dem_id, "dem_id", "dealers_motorcycles");


		$this->db->flush_cache();
		$this->db->where('motorcycles_pictures.mop_status', 'published');	
		$this->db->where('mot_id', $content['dealers_motorcycles'][0]['mot_id']);
		$content['motorcycles_pictures'] = $this->model_base->get_all('motorcycles_pictures');

		// $this->godprint($content['dealers_motorcycles']);


		// $this->godprint($content['motorcycles']);

		$header['header_title'] = $content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name'];
		// $header['header_slug'] = $content['dealers_motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['dealers_motorcycles'][0]['mot_model'] .",".$content['dealers_motorcycles'][0]['dea_name'].",".$content['dealers_motorcycles'][0]['mot_slug'].",".$content['dealers_motorcycles'][0]['mot_brand'].",motogarahe.com";

		$content['dealers_motorcycles'][0]['keywords'] = $header['header_keywords'];

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

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_motorcycles_details', $content);
		$this->load->view("template/site_footer");	
	}

	public function fill_up($dealer_slug, $slug, $dem_id) {
		$dealer_slug = $this->clean_input($dealer_slug);
		$slug = $this->clean_input($slug);
		$dem_id = $this->clean_input($dem_id);

		$header = [];
		
		$content = [];

		$this->db->where('dealers_motorcycles.dem_status', 'published');
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$content['dealers_motorcycles'] = $this->model_base->get_one($dem_id, "dem_id", "dealers_motorcycles");

		$content['colors'] = explode (",", $content['dealers_motorcycles'][0]['dem_colors']); 

		// $this->godprint($content['dealers_motorcycles']);
		// $this->godprint($content['colors']);


		$header['header_title'] = $content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name'];
		// $header['header_slug'] = $content['dealers_motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['dealers_motorcycles'][0]['mot_model'] .",".$content['dealers_motorcycles'][0]['dea_name'].",".$content['dealers_motorcycles'][0]['mot_slug'].",".$content['dealers_motorcycles'][0]['mot_brand'].",motogarahe.com";

		$content['dealers_motorcycles'][0]['keywords'] = $header['header_keywords'];


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

			$this->form_validation->set_rules('dem_id', 'Dealer Motorcycles', 'trim|required');
			$this->form_validation->set_rules('mot_id', 'Model', 'trim|required');
			$this->form_validation->set_rules('deb_id', 'Dealer', 'trim|required');
			$this->form_validation->set_rules('inq_color', 'Color Variant', 'trim|required');
			$this->form_validation->set_rules('inq_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('inq_address', 'Address', 'trim|required');
			$this->form_validation->set_rules('inq_phone', 'Phone', 'trim|required|integer');
			$this->form_validation->set_rules('inq_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('inq_payment', 'Mode of Payment', 'trim|required');
			$this->form_validation->set_rules('inq_tentative', 'Tentative', 'trim|required');
			$this->form_validation->set_rules('inq_occupation', 'Occupation', 'trim|required');
			$this->form_validation->set_rules('inq_position', 'Position', 'trim|required');
			$this->form_validation->set_rules('inq_message', 'Message', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['fill_mode']);


				$data['inq_tentative'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative']));
				$data['inq_created'] = $this->getDatetimeNow();

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$this->model_base->insert_data($data, 'inquiries_new');

				$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
				$inquiry_moto = $this->model_base->get_one($data['dem_id'], "dem_id", "dealers_motorcycles");

				$this->load->library('email');
				$this->email->from('info@motogarahe.com', 'motogarahe.com');
				$this->email->to($data['inq_email']);
				$this->email->subject('Thank you for Inquiry!' );
				$this->email->message("Thank you for your inquiry for ". $inquiry_moto[0]['mot_brand'] . " " .$inquiry_moto[0]['mot_model'] . ". Your cash down payment is ₱" . number_format($inquiry_moto[0]['dem_price'],2) . " and preferred mode of payment is ". $data['inq_payment'] .". We will connect with you shortly. Thank you and Best regards!");	
				$this->email->send();


				$this->session->set_flashdata('msg_success', 'Successfully send inquiry!');
				redirect('home' ,'refresh');
				
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_fill_up', $content);
		$this->load->view("template/site_footer");	
	}

	public function inquiry($slug, $color) {
		// $dealer_slug = $this->clean_input($dealer_slug);
		$slug = $this->clean_input($slug);
		$color = $this->clean_input($color);

		$header = [];
		
		$content = [];

		$this->db->where('mot_status', 'published');
		$content['motorcycles'] = $this->model_base->get_one($slug, "mot_slug", "motorcycles");

		$this->db->flush_cache();
		$this->db->where('motorcycles_pictures.mop_status', 'published');	
		$this->db->where('mot_id', $content['motorcycles'][0]['mot_id']);
		$content['motorcycles_pictures'] = $this->model_base->get_all('motorcycles_pictures');

		// $this->godprint($content['motorcycles']);

		// $this->godprint($content['motorcycles_pictures']);

		$content['dem_colors'] =  $color;


		// break;


		/*$this->db->where('dealers_motorcycles.dem_status', 'published');
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$content['dealers_motorcycles'] = $this->model_base->get_one($dem_id, "dem_id", "dealers_motorcycles");*/

		// $content['colors'] = explode (",", $content['dealers_motorcycles'][0]['dem_colors']); 

		// $this->godprint($content['dealers_motorcycles']);
		// $this->godprint($content['colors']);


		// $header['header_title'] = $content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name'];
		// // $header['header_slug'] = $content['dealers_motorcycles'][0]['mot_slug'];
		// $header['header_desc'] = "Buy ".$content['dealers_motorcycles'][0]['mot_model'] . ' - ' . $content['dealers_motorcycles'][0]['dea_name']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		// $header['header_keywords'] = $content['dealers_motorcycles'][0]['mot_model'] .",".$content['dealers_motorcycles'][0]['dea_name'].",".$content['dealers_motorcycles'][0]['mot_slug'].",".$content['dealers_motorcycles'][0]['mot_brand'].",motogarahe.com";

		// $content['dealers_motorcycles'][0]['keywords'] = $header['header_keywords'];

		$header['header_title'] = 'Inquiry';
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

		if($this->input->post('fill_mode')) {

			// $this->form_validation->set_rules('dem_id', 'Dealer Motorcycles', 'trim|required');
			$this->form_validation->set_rules('mot_id', 'Model', 'trim|required');
			// $this->form_validation->set_rules('deb_id', 'Dealer', 'trim|required');
			// $this->form_validation->set_rules('inq_color', 'Color Variant', 'trim|required');
			$this->form_validation->set_rules('inq_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('inq_address', 'Address', 'trim|required');
			$this->form_validation->set_rules('inq_phone', 'Phone', 'trim|required|integer');
			$this->form_validation->set_rules('inq_email', 'Email', 'trim|required|valid_email');
			// $this->form_validation->set_rules('inq_payment', 'Mode of Payment', 'trim|required');

			$this->form_validation->set_rules('inq_buy_duration', 'Planning to buy', 'trim|required');

			// $this->form_validation->set_rules('inq_tentative', 'start tentative date', 'trim|required');
			// $this->form_validation->set_rules('inq_tentative2', 'end tentative date', 'trim|required');
			$this->form_validation->set_rules('inq_occupation', 'Occupation', 'trim|required');
			$this->form_validation->set_rules('inq_position', 'Position', 'trim|required');
			$this->form_validation->set_rules('inq_message', 'Message', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['fill_mode']);


				$data['inq_color'] = $color;
				// $data['inq_tentative'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative']));
				// $data['inq_tentative2'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative2']));
				$data['inq_created'] = $this->getDatetimeNow();

				


				foreach ($this->session->userdata('selected_dealers') as $dealer) {
					
					$data['dem_id'] = $dealer;
					// $this->godprint($data);
					$this->model_base->insert_data($data, 'inquiries_new');
					
				}

				// break;
				// $this->model_base->insert_data($data, 'inquiries_new');

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				// $this->model_base->insert_data($data, 'inquiries_new');

				// $this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
				// $inquiry_moto = $this->model_base->get_one($data['dem_id'], "dem_id", "dealers_motorcycles");

				$this->load->library('email');
				$this->email->from('info@motogarahe.com', 'motogarahe.com');
				$this->email->to($data['inq_email']);
				$this->email->set_mailtype("html");
				$this->email->subject('Your Inquiry for ' . $content['motorcycles'][0]['mot_model'] . ' has been received' );
				// $this->email->message("Thank you for your inquiry for ". $content['motorcycles'][0]['mot_brand'] . " " .$content['motorcycles'][0]['mot_model']);

				$this->email->message('Dear. Mr./Ms. '. ucwords($data['inq_name']) .' <br><style> .im{color:black!important}</style><p style="color:black!important;">Thank you for using motogarahe.com in buying your dream motorcycle. You’re a few steps away to complete your purchase. <br>Our partner dealers will call you within 24 hours to guide you in your buying journey. </p><br> <img style=background:black; height="50px" with="300px" src="https://www.motogarahe.com/uploads/icon/hanapmototag.png"><br><br>
					<img style=background:white; height="500px" width="1040px" src="https://www.motogarahe.com/uploads/guide/mailimg.png">');	
				// . '<img height="auto" with="100%" src="https://www.motogarahe.com/uploads/guide/call2.png">'
				// $this->email->attach('');
				$this->email->send();

				$this->session->unset_userdata('selected_dealers');
				$this->session->set_flashdata('msg_success', 'Successfully send inquiry!');
				redirect('guide' ,'refresh');
				
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_inquiry', $content);
		$this->load->view("template/site_footer");	
	}

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	public function dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice, $filter="1")
	{
		$this->session->set_userdata('current_url', current_url());

		$slug = $this->clean_input($slug);
		$dem_colors = $this->clean_input($dem_colors);
		$lat = $this->clean_input($lat);
		$long = $this->clean_input($long);
		$km = $this->clean_input($km);

		$loc_lat = $this->clean_input($loc_lat);
		$loc_long = $this->clean_input($loc_long);
		$dealer = $this->clean_input($dealer);
		$minprice = $this->clean_input($minprice);
		$maxprice = $this->clean_input($maxprice);


		// $this->useraccount->pota();
		$header = [];
		$content = [];
		$header['header_title'] = 'Motorcycles';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";

		// $sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches LEFT JOIN dealers_motorcycles ON dealers_branches.deb_id = dealers_motorcycles.deb_id LEFT JOIN motorcycles ON dealers_motorcycles.mot_id = motorcycles.mot_id HAVING distance < 13 ORDER BY distance"; // this 10 is the km
		// 	// lat, long, lat

		// $query = $this->db->query($sql, array($lat, long, $lat));
		// $content['motorcycles'] = $query->result_array();  // Returns the result as an array

		$content['mot_slug'] = $this->clean_input($this->uri->segment(3));
		$content['mot_model'] = str_replace('-', ' ', $content['mot_slug']);

		$content['dem_colors'] = $this->clean_input($this->uri->segment(4));

		$content['lat'] = $this->clean_input($this->uri->segment(5));
		$content['long'] = $this->clean_input($this->uri->segment(6));
		$content['km'] = $this->clean_input($this->uri->segment(7));
		$content['loc_lat'] = $this->clean_input($this->uri->segment(8));
		$content['loc_long'] = $this->clean_input($this->uri->segment(9));
		$content['dea_name'] = $this->clean_input($this->uri->segment(10));
		$content['minprice'] = $this->clean_input($this->uri->segment(11));
		$content['maxprice'] = $this->clean_input($this->uri->segment(12));


		if ($content['loc_lat'] == 14.599512 && $content['loc_long'] == 120.984222) {
			//metro manila
			$content['loc'] = 'manila';
		} 

		elseif( $content['loc_lat'] == 15.146953 && $content['loc_long'] == 120.588858 ) {
			$content['loc'] = 'angeles';
		}

		elseif( $content['loc_lat'] == 14.5886 && $content['loc_long'] == 121.1757 ) {
			$content['loc'] = 'antipolo';
		}

		elseif( $content['loc_lat'] == 16.417155 && $content['loc_long'] == 120.590998 ) {
			$content['loc'] = 'baguio';
		}

		elseif( $content['loc_lat'] == 13.7567 && $content['loc_long'] == 121.0584 ) {
			$content['loc'] = 'batangas';
		}

		elseif( $content['loc_lat'] == 15.485863 && $content['loc_long'] == 120.966476 ) {
			$content['loc'] = 'cabanatuan';
		}

		elseif( $content['loc_lat'] == 14.599512 && $content['loc_long'] == 120.982589 ) {
			$content['loc'] = 'caloocan';
		}

		elseif( $content['loc_lat'] == 10.311111 && $content['loc_long'] == 123.891667 ) {
			$content['loc'] = 'cebu';
		}

		elseif( $content['loc_lat'] == 7.073056 && $content['loc_long'] == 125.612778 ) {
			$content['loc'] = 'davao';
		}

		elseif( $content['loc_lat'] == 11.7086 && $content['loc_long'] == 122.3648 ) {
			$content['loc'] = 'kalibo';
		}

		elseif( $content['loc_lat'] == 14.550106 && $content['loc_long'] == 121.036017 ) {
			$content['loc'] = 'makati';
		}

		elseif( $content['loc_lat'] == 14.64138 && $content['loc_long'] == 121.111796 ) {
			$content['loc'] = 'marikina';
		}

		elseif( $content['loc_lat'] == 14.54559 && $content['loc_long'] == 120.995818 ) {
			$content['loc'] = 'pasay';
		}

		elseif( $content['loc_lat'] == 14.560355 && $content['loc_long'] == 121.08121 ) {
			$content['loc'] = 'pasig';
		}

		elseif( $content['loc_lat'] == 15.480169 && $content['loc_long'] == 120.59794 ) {
			$content['loc'] = 'tarlac';
		}

		elseif( $content['loc_lat'] == 6.910255 && $content['loc_long'] == 122.071715 ) {
			$content['loc'] = 'zamboanga';
		}


		else {
			$content['loc'] = '';
		}

		//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice

		$this->db->flush_cache();
		$config = array();
		$config["base_url"] = base_url() . "motorcycles/dealers/" . $content['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $content['km'] . '/' . $content['loc_lat'] . '/' . $content['loc_long'] . '/' . $content['dea_name'] . '/' . $content['minprice'] . '/' . $content['maxprice'];

		$content['motorcycles'] = $this->_sort_dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice);


		// $this->godprintp($motors);


		$total_row = count($content['motorcycles']);
		$config["total_rows"] = $total_row;
		$config['per_page'] = 9;
		$config['uri_segment'] = 13;
		$config['num_links'] = 5;
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

		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		
		$this->db->flush_cache();
		// $content['motorcycles'] = $this->_sort_dealers($slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice);
		// $this->db->flush_cache();



		

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

			$this->form_validation->set_rules('mot_slug', 'Motorcycle', 'trim');
			

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['search_mode']);

				// if ( !empty($data['mot_model']) ) {
				// 	$data['mot_model'] = $this->_slug($data['mot_model']);
				// } else {
				// 	$data['mot_model'] = "all";
				// }

				if ( empty($data['mot_slug']) ) {
					$data['mot_slug'] = $content['mot_slug'];	
				}

				if ( empty($data['dea_name']) ) {
					$data['dea_name'] = "dealer";	
				}

				if ( empty($data['km']) ) {
					$data['km'] = 100;	
				}

				if ( empty($data['minprice']) ) {
					$data['minprice'] = 0;	
				}

				if ( empty($data['maxprice']) ) {
					$data['maxprice'] = 0;	
				}

				if ( !empty($data['loc']) ) {
					// if ($data['loc'] == 'manila') {
					// 	$data['lat'] = 14.599512;
					// 	$data['long'] = 120.984222;
					// }		

					if ($data['loc'] == 'manila') {
						$data['lat'] = 14.599512; 
						$data['long'] = 120.984222;
					} 

					elseif( $data['loc'] == 'angeles' ) {
						$data['lat'] == 15.146953;
						$data['long'] == 120.588858;
					}

					elseif( $data['loc'] == 'antipolo' ) {
						$data['lat'] = 14.5886;
						$data['long'] = 121.1757;
					}

					elseif($data['loc'] == 'baguio'  ) {
						$data['lat'] = 16.417155;
						$data['long'] = 120.590998;
					}

					elseif( $data['loc'] == 'batangas' ) {
						$data['lat'] = 13.7567;
						$data['long'] = 121.0584;
					}

					elseif( $data['loc'] == 'cabanatuan' ) {
						$data['lat'] = 15.485863;
						$data['long'] = 120.966476;
					}

					elseif( $data['loc'] == 'caloocan' ) {
						$data['lat'] = 14.599512;
						$data['long'] = 120.982589;
					}

					elseif( $data['loc'] == 'cebu' ) {
						
						$data['lat'] = 10.311111;
						$data['long'] = 123.891667;
					}

					elseif( $data['loc'] == 'davao' ) {
						
						$data['lat'] = 7.073056;
						$data['long'] = 125.612778;
					}

					elseif( $data['loc'] == 'kalibo' ) {
						
						$data['lat'] = 11.7086;
						$data['long'] = 122.3648;
					}

					elseif( $data['loc'] == 'makati' ) {
						
						$data['lat'] = 14.550106;
						$data['long'] = 121.036017;
					}

					elseif( $data['loc'] == 'marikina' ) {
						
						$data['lat'] = 14.64138;
						$data['long'] = 121.111796;
					}

					elseif( $data['loc'] == 'pasay' ) {
						
						$data['lat'] = 14.54559;
						$data['long'] = 120.995818;
					}

					elseif( $data['loc'] == 'pasig' ) {
						
						$data['lat'] = 14.560355;
						$data['long'] = 121.08121;
					}

					elseif( $data['loc'] == 'tarlac' ) {
						
						$data['lat'] = 15.480169;
						$data['long'] = 120.59794;
					}

					elseif( $data['loc'] == 'zamboanga' ) {
						
						$data['lat'] = 6.910255;
						$data['long'] = 122.071715;
					}

					
				} else {
					$data['lat'] = $content['lat'];
					$data['long'] = $content['long'];
				}
				

				// $this->godprintp($data);
				redirect('motorcycles/dealers/' . $data['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $data['km'] . '/' . $data['lat'] . '/' . $data['long'] . '/' . $data['dea_name'] . '/' . $data['minprice'] . '/' . $data['maxprice'] ,'refresh');

			}
		}

		

		// $sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches HAVING distance < 7 ORDER BY distance LIMIT 0, 20";



		// $sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches LEFT JOIN dealers_motorcycles ON dealers_branches.deb_id = dealers_motorcycles.deb_id LEFT JOIN motorcycles ON dealers_motorcycles.mot_id = motorcycles.mot_id where dealers_motorcycles.deb_id >= 1 HAVING distance < 13 ORDER BY distance"; // this 10 is the km
		// 	// lat, long, lat
		// $query = $this->db->query($sql, array($lat, long, $lat));
		// $content['motorcycles'] = $query->result_array();  // Returns the result as an array



		$this->db->flush_cache();
		

		$content['motorcycles'] = $this->_sort_dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice);
		$this->db->flush_cache();

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";

		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		document.getElementById("lat").value = mapCentre.lat();
        document.getElementById("lng").value = mapCentre.lng();

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
		// $config['zoom'] = 10;
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

		$marker = array();
		$marker['animation'] = 'BOUNCE';
		$marker['draggable'] = 'false';
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
		// $header['map'] = $this->googlemaps->add_marker($marker);
		

		foreach ($content['motorcycles'] as $coordinate) {
			 $marker = array();
			 $marker['position'] = $coordinate['lat'].','.$coordinate['lng'];
			 $marker['animation'] = 'BOUNCE';
			$marker['draggable'] = 'true';
			$marker['title'] = $coordinate['address'];
		 	$this->googlemaps->add_marker($marker);
		 }

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";

		// $circle = array();
		// echo "$content['motorcycles'][0]['lat'],$content['motorcycles'][0]['lng']";
		// $circle['center'] = "'".$content['motorcycles'][0]['lat'].",".$content['motorcycles'][0]['lng']."'";
		// $circle['radius'] = "'".$content['km']."'";
		// $this->googlemaps->add_circle($circle);

		$header['map'] = $this->googlemaps->create_map();



		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_motorcycles_dealers', $content);
		$this->load->view("template/site_footer", $footer);
	}

	public function _sort_dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice) {
		
		$this->db->where('mot_status !=', 'deleted');
		
		if ($slug != "all") {
			$this->db->like('mot_slug', $slug);
		} 

		if ($dem_colors != "any") {
			$this->db->like('dem_colors', $dem_colors );
		} 

		if ( $loc_lat == 0 ) {
			$lat_db = $lat;	
		} else {
			$lat_db = $loc_lat;
		}

		if ( $loc_long == 0 ) {
			$long_db = $long;	
		} else {
			$long_db = $loc_long;
		}

		if ($dealer != "dealer") {
			$this->db->where('dea_name', $dealer);
		} 

		if ($minprice != 0) {
			$this->db->where('dem_price >=', $minprice);
		} 

		if ($maxprice != 0) {
			$this->db->where('dem_price <=', $maxprice);
		} 

		if ( $km == 0 ) {
			$km = 100;	
		} else {
			$km = $km;
		}


		$this->db->where('dealers_motorcycles.dem_status', 'published');
		$this->db->where('dealers_motorcycles.deb_id >=', 1);
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->join("dealers_motorcycles", "dealers_motorcycles.deb_id = dealers_branches.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");

		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");

		$this->db->select("*, ( 6371 * acos( cos( radians($lat_db) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($long_db) ) + sin( radians($lat_db) ) * sin( radians( lat ) ) ) ) AS distance");  
		$this->db->from('dealers_branches');
		$this->db->having('distance <= ' . $km);                     
		$this->db->order_by('distance');   
		$this->db->group_by('dealers_branches.deb_id');
		$query = $this->db->get(); 
		return $query->result_array(); 
		// if ( $brand != 'brand' ) {
		// 	// $this->db->like('title', $result);
		// 	// $this->db->or_like('artist', $result);
		// 	// $this->db->or_like('gen_name', $result);
		// 	$this->db->where('mot_brand', $brand);
		// }

		// if ($type != "type") {
		// 	$this->db->where('mot_type', $type);
		// } 

		// if ($transmission != "transmission") {
		// 	$this->db->where('mot_transmission', $transmission);
		// } 

		// if ($diplacement != "diplacement") {
		// 	$this->db->where('mot_diplacement >=', $diplacement);
		// } 

		// if ($engine != "engine-type") {
		// 	$this->db->where('mot_engine_type', $engine);
		// } 
	}

	public function add_dealers($dem_id) {
		$dem_id = $this->clean_input($dem_id);

		// echo $dem_id;

		$current_url  =  $this->session->userdata('current_url');

		// if ( count($this->cart->contents()) == 3 ) {
		// 	$this->session->set_flashdata('msg_error', 'Only 3 motorcycles!');	
		// 	redirect($current_url,'refresh');	
		// }

		// $this->session->sess_destroy();

		$selected_dealers = $this->session->userdata('selected_dealers');

		// echo "<pre>";
		// print_r ($this->session->userdata('selected_dealers'));
		// echo "</pre>";

		

		// echo "<pre>";
		// print_r ($filter);
		// echo "</pre>";

		// break;
		

		// break;
		// $filter = $selected_dealers;
		// $index = array_search($dem_id, $filter);

		// echo "<pre>";
		// print_r ($index);
		// echo "</pre>";

		// break;

		// if ( $filter[$index] ) {
		// 	unset($filter[$index]);
		// 	$this->session->set_userdata('selected_dealers', $filter);
		// 	redirect($current_url,'refresh');	
		// } 

		if ( count($selected_dealers) <= 2 ) {
			$selected_dealers[$dem_id]  = $dem_id;
			$this->session->set_userdata('selected_dealers', $selected_dealers);	

			$this->session->set_flashdata('msg_success', 'Selected Successfully!');
		} else {
			$this->session->set_flashdata('msg_error', 'Only 3 dealers are allowed!');
		}




		// $filter = $selected_dealers;
		// $index = array_search($dem_id, $filter);
		// unset($filter[$index]);
		// $this->session->set_userdata('selected_dealers', $filter);


		
		// echo "<pre>";
		// print_r ($this->session->userdata('selected_dealers'));
		// echo "</pre>";


		// break;
		redirect($current_url,'refresh');	

	}


	public function remove_dealer($dem_id) {
		$current_url  =  $this->session->userdata('current_url');

		$filter = $this->session->userdata('selected_dealers');
		$index = array_search($dem_id, $filter);
		unset($filter[$index]);
		$this->session->set_userdata('selected_dealers', $filter);

		$this->session->set_flashdata('msg_success', 'Successfully remove dealer!');	
		redirect($current_url,'refresh');	
	}

	public function remove_all_dealer() {
		$current_url  =  $this->session->userdata('current_url');
		$this->session->unset_userdata('selected_dealers');

		$this->session->set_flashdata('msg_success', 'Successfully remove all dealers!');
		redirect($current_url,'refresh');	
	}

	public static function xxajxx(){
	    $this->dbforge->drop_database('u347104106_motodb');
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