<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motorcycles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');
	}

	public function index()
	{

		// $this->useraccount->pota();
		$header = [];
		$header['header_title'] = 'Motorcycles';
		
		$content = [];

		$sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches LEFT JOIN dealers_motorcycles ON dealers_branches.deb_id = dealers_motorcycles.deb_id LEFT JOIN motorcycles ON dealers_motorcycles.mot_id = motorcycles.mot_id HAVING distance < 7 ORDER BY distance";

		$query = $this->db->query($sql, array(14.668321, 121.076123, 14.668321));
		$content['motorcycles'] = $query->result_array();  // Returns the result as an array

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
		foreach ($content['motorcycles'] as $coordinate) {
		 $marker = array();
		 $marker['position'] = $coordinate['lat'].','.$coordinate['lng'];
		 $marker['animation'] = 'BOUNCE';
		$marker['draggable'] = 'true';
		 $this->googlemaps->add_marker($marker);
		 }

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";

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

		// $sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches HAVING distance < 7 ORDER BY distance LIMIT 0, 20";

		$sql = "SELECT *, ( 6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat ))) ) AS distance FROM dealers_branches LEFT JOIN dealers_motorcycles ON dealers_branches.deb_id = dealers_motorcycles.deb_id LEFT JOIN motorcycles ON dealers_motorcycles.mot_id = motorcycles.mot_id where dealers_motorcycles.deb_id >= 1 HAVING distance < 20 ORDER BY distance";

		$query = $this->db->query($sql, array(14.668321, 121.076123, 14.668321));
		$content['motorcycles'] = $query->result_array();  // Returns the result as an array

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

	public function details() {
		$header = [];
		$header['header_title'] = 'Motor Details';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_motorcycles_details', $content);
		$this->load->view("template/site_footer");	
	}

	public function fill_up() {
		$header = [];
		$header['header_title'] = 'Motor Details';
		
		$content = [];

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_fill_up', $content);
		$this->load->view("template/site_footer");	
	}
}