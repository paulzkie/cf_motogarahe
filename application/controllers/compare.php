<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'googlemaps', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	public function index()
	{
		$this->session->set_userdata('current_url', current_url());

		$header = [];
		$content = [];
		$header['header_title'] = 'Motorcycles';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		$header['header_featured_img'] = "";
		$header['mot_model'] = "";
		$content['compared_motors'] = $this->cart->contents();
		// $this->godprint($content['compared_motors']);



		

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

		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');
		
		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-compare', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}

	public function add_new_motorcycle($id) {
		$id = $this->clean_input($id);

		// $current_url  =  $this->session->userdata('current_url');
		$current_url = 'compare';
		if ( count($this->cart->contents()) == 3 ) {
			$this->session->set_flashdata('msg_error', 'Only 3 motorcycles!');	
			redirect($current_url,'refresh');	
		}
		// $this->godprintp($this->session->userdata('current_url'));

		$motorcycle = $this->model_base->get_one($id, "mot_id", "motorcycles");

		$this->db->flush_cache();
		$motorcycles_pictures = $this->model_base->get_onev2($id, "mot_id", "motorcycles_pictures", "mop_status", "published");

		$data = array(
			'id' 	  => $motorcycle[0]['mot_id'],
			'price'   => 100.00,
	        'qty'     => 1,
	        'name'    => $motorcycle[0]['mot_slug'],
	        'options' => array(
	        	'data' => $motorcycle[0],
	        	'pics' => $motorcycles_pictures[0],
	        	'info' => base_url('motorcycles').'/'.strtolower($motorcycle[0]['mot_brand']). '/' .$motorcycle[0]['mot_slug']
	        )
		);

		// $this->godprint($data);
		error_reporting(0);
		$this->cart->insert($data);

		// $this->godprint($this->cart->contents());

		$this->session->set_flashdata('msg_success', 'added to compare!');	
		redirect($current_url,'refresh');	
	}

	public function add_repo_motorcycle($id) {
		$id = $this->clean_input($id);
		$current_url  =  $this->session->userdata('current_url');
		if ( count($this->cart->contents()) == 3 ) {
			$this->session->set_flashdata('msg_error', 'Only 3 motorcycles!');	
			redirect($current_url,'refresh');	
		}
		// $this->godprintp($this->session->userdata('current_url'));

		$repo = $this->model_base->get_one($id, "mot_id", "repo");

		$this->db->flush_cache();
		$motorcycles_pictures = $this->model_base->get_one($id, "mot_id", "motorcycles_pictures");

		$data = array(
			'id' 	  => $repo[0]['mot_id'],
			'price'   => 100.00,
	        'qty'     => 1,
	        'name'    => $repo[0]['mot_slug'],
	        'options' => array(
	        	'data' => $repo[0],
	        	'pics' => $motorcycles_pictures[0],
	        	'info' => base_url('repo/info/') . '/' .$repo[0]['mot_slug']
	        )
		);

		// $this->godprint($data);
		error_reporting(0);
		$this->cart->insert($data);

		// $this->godprint($this->cart->contents());

		$this->session->set_flashdata('msg_success', 'added to compare!');	
		redirect($current_url,'refresh');	
	}

	public function add_new_dealer_motorcycle($id) {
		$id = $this->clean_input($id);
		$current_url  =  $this->session->userdata('current_url');

		if ( count($this->cart->contents()) == 3 ) {
			$this->session->set_flashdata('msg_error', 'Only 3 motorcycles!');	
			redirect($current_url,'refresh');	
		}

		// $this->godprintp($this->session->userdata('current_url'));

		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
		$motorcycle = $this->model_base->get_one($id, "dem_id", "dealers_motorcycles");

		$this->db->flush_cache();
		$motorcycles_pictures = $this->model_base->get_one($motorcycle[0]['mot_id'], "mot_id", "motorcycles_pictures");
		// $this->godprintp($motorcycles_pictures);

		$data = array(
			'id' 	  => $motorcycle[0]['dem_id'],
			'price'   => 100.00,
	        'qty'     => 1,
	        'name'    => $motorcycle[0]['dem_created'],
	        'options' => array(
	        	'data' => $motorcycle[0],
	        	'pics' => $motorcycles_pictures[0],
	        	'info' => base_url('motorcycles/details/') . '/' . $motorcycle[0]['dea_slug'] . '/' . $motorcycle[0]['mot_slug'] . '/' . $motorcycle[0]['dem_id']
	        )
		);

		// $this->godprint($data);
		error_reporting(0);
		$this->cart->insert($data);

		// $this->godprintp($this->cart->contents());



		$this->session->set_flashdata('msg_success', 'added to compare!');	
		redirect($current_url,'refresh');	
	}

	public function remove_item($id) {
		$id = $this->clean_input($id);
		$current_url  =  $this->session->userdata('current_url');

		$data = array(
	        'rowid' => $id,
	        'qty'   => 0
		);

		$this->cart->update($data);
		$this->session->set_flashdata('msg_success', 'Removed motorcycle!');	
		redirect($current_url,'refresh');
	}

	public function remove_all() {
		$this->cart->destroy();
		$current_url  =  $this->session->userdata('current_url');
		$this->session->set_flashdata('msg_success', 'All motorcycles Have been removed in compare list!');
// 		$this->session->set_flashdata('msg_success', 'All motorcycles has been removed in compare list!');
		
		redirect($current_url,'refresh');	
	}

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
}