<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_motorcycles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination', 'session'));
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
		$header['mot_model'] = $this->clean_input($content['mot_model']);
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
				if ( empty($data['brand']) ) {
					$data['brand'] = "brand";	
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
					redirect('dev_motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {

				}
			}
		}
		if($this->input->post('search_mode2')){
			$content["multi_brand"] = $this->clean_array($this->input->post("multi_brand"));
			$content["multi_categ"] = $this->clean_array($this->input->post("muti_categ"));
			$brand = $content["multi_brand"];
		}
	

	
		
		
	
		
		$config = array();
		$config["base_url"] = base_url() . "motorcycles/index/" . $content['mot_slug'] . "/" . $content['mot_brand']. "/" . $content['mot_type']. "/" . $content['mot_transmission']. "/" . $content['mot_diplacement']. "/" . $content['mot_engine_type'];
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$total_row = $this->model_base->count_data('motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = $this->isMobile();
		$config['uri_segment'] = 9;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		// first
		$config['first_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</span></li>';
		// last
		$config['last_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		
		$this->db->flush_cache();
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		// $this->sort_multiple($content["brand"]);
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		// $header['motorcycles'] = $this->model_base->get_all('motorcycles');

		
		$this->db->flush_cache();
		

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";
		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-list', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}
	public function isMobileDealers(){
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			return 10;

		}else{
			return 12;
		}

	}

	public function isMobile(){
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			return 10;

		}else{
			return 9;
		}

	}
	
	public function _sorting($slug, $brand, $type, $transmission, $diplacement, $engine) {
		$this->db->where('mot_status !=', 'deleted');

		
		if ($slug != "all") {
			$slug = str_replace("-", " ", $slug);
			$this->db->like('mot_keyword', $slug, 'both');
			// $this->db->like('mot_slug', $slug);
			// $this->db->or_like('mot_brand', $slug);
			$slug = str_replace(" ", "-", $slug);

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


		
		// $this->godprintp($content['motorcycles_pictures']);

		$header['header_title'] = $content['motorcycles'][0]['mot_model'] . " - ₱" . number_format( $content['motorcycles'][0]['mot_srp'], 2);
		// $header['header_slug'] = $content['motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['motorcycles'][0]['mot_model']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['motorcycles'][0]['mot_model'] .",".$content['motorcycles'][0]['mot_slug'].",".$content['motorcycles'][0]['mot_brand'].",motogarahe.com";
		$header['header_featured_img'] = $content['motorcycles_pictures'][0]['mop_image'];

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
			// echo "test";
			// echo print_r($this->input->post());

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim');
			$this->form_validation->set_rules('dem_colors', 'Color', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['dealers_mode']);

				$data['dem_colors'] =  $this->_slug($data['dem_colors']);

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$data["lat"] = ($data["lat"] == "" || $data["lat"] == 0 || $data["lat"] == null) ? 0 : $data["lat"] ; // if lat null
				$data["long"] = ($data["long"] == "" || $data["long"] == 0 || $data["long"] == null) ? 0 : $data["long"] ; // if long null
				redirect('dev_motorcycles/dealers/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}


		// $this->load->view("template/site_header", $header);

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-info', $content);
		$this->load->view("newui/template/site_footer");	

		// $this->load->view("template/site_header", $header);
		// $this->load->view('site/view_motorcycles_info', $content);
		// $this->load->view("template/site_footer");	
	}

	public function infov2($slug) {

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


		
		// $this->godprintp($content['motorcycles_pictures']);

		$header['header_title'] = $content['motorcycles'][0]['mot_model'] . " - ₱" . number_format( $content['motorcycles'][0]['mot_srp'], 2);
		// $header['header_slug'] = $content['motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['motorcycles'][0]['mot_model']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['motorcycles'][0]['mot_model'] .",".$content['motorcycles'][0]['mot_slug'].",".$content['motorcycles'][0]['mot_brand'].",motogarahe.com";
		$header['header_featured_img'] = $content['motorcycles_pictures'][0]['mop_image'];

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
			// echo "test";
			// echo print_r($this->input->post());

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim');
			$this->form_validation->set_rules('dem_colors', 'Color', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['dealers_mode']);

				$data['dem_colors'] =  $this->_slug($data['dem_colors']);

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$data["lat"] = ($data["lat"] == "" || $data["lat"] == 0 || $data["lat"] == null) ? 0 : $data["lat"] ; // if lat null
				$data["long"] = ($data["long"] == "" || $data["long"] == 0 || $data["long"] == null) ? 0 : $data["long"] ; // if long null
				redirect('dev_motorcycles/dealersv2/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}


		// $this->load->view("template/site_header", $header);

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-infov2', $content);
		$this->load->view("newui/template/site_footer");	

		// $this->load->view("template/site_header", $header);
		// $this->load->view('site/view_motorcycles_info', $content);
		// $this->load->view("template/site_footer");	
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


				$this->session->set_flashdata('msg_success', 'Inquiry sent successfully!');
				redirect('home' ,'refresh');
				
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_fill_up', $content);
		$this->load->view("template/site_footer");	
	}

	public function inquiry($slug, $color) {
		$current_url  =  $this->session->userdata('current_url');
		$selected_dealers = $this->session->userdata('selected_dealers');

		if ( empty($selected_dealers)  ) {
			$this->session->set_flashdata('msg_error', 'Please choose up to 3 dealers!');
			redirect($current_url ,'refresh');
		}

		// $this->godprint(count($selected_dealers));

		// break;

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
			$this->form_validation->set_rules('inq_payment', 'Mode of Payment', 'trim|required');

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
				// echo print_r($data);

				unset($data['fill_mode']);


				$data['inq_color'] = $color;
				// $data['inq_tentative'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative']));
				// $data['inq_tentative2'] = date("Y\-m\-d\ H:i:s", strtotime($data['inq_tentative2']));
				$data['inq_created'] = $this->getDatetimeNow();

				
				// $this->godprint($this->session->userdata('selected_dealers'));
				// break;

				foreach ($this->session->userdata('selected_dealers') as $dealer) {

					$data['dem_id'] = $dealer[0];

					$this->db->where('dealers_motorcycles.dem_status', 'published');
					$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
					$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
					$this->db->join("dealers", "dealers.dea_id = dealers_branches.dea_id");
					$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
					$content['dealers_motorcycles'] = $this->model_base->get_one($data['dem_id'], "dem_id", "dealers_motorcycles");
					$this->db->flush_cache();

					// $this->godprint($dealer);
					
					  
					
					// $this->godprint($data);
					$this->model_base->insert_data($data, 'inquiries_new');
					$this->db->flush_cache();

					// $this->godprint($dealer[1]);

					$dealerr = $this->model_base->get_one($dealer[1], "dea_id", "dealers");
					$this->db->flush_cache(); 

					// $this->godprint($dealerr);

					$list = array('motogaraheinquiries@gmail.com', $data['inq_email']);
					// $list = array($data['inq_email']);

					$this->load->library('email');
					$this->email->from('info@motogarahe.com', 'motogarahe.com');
					$this->email->to($dealerr[0]['dea_email']);
					// $this->email->to('ajgarrigues2014@gmail.com');
					$this->email->cc($list);
					$this->email->set_mailtype("html");
					$this->email->subject('Your Inquiry for ' . $content['motorcycles'][0]['mot_model'] . ' has been received' );
					// $this->email->message("Thank you for your inquiry for ". $content['motorcycles'][0]['mot_brand'] . " " .$content['motorcycles'][0]['mot_model']);

					$this->email->message('Dear. Mr./Ms. '. ucwords($data['inq_name']) .' <br/><style>.im{color: black !important;}</style><p style="color: black !important;"> Thank you for using motogarahe.com in buying your dream motorcycle. You’re a few steps away to complete your purchase. <br/> Our Partner-dealer will call you within 24hrs to guide you in your buying journey.</p><table><tr><td>Name:</td><td>'. ucwords($data['inq_name']) .'</td></tr><tr><td>Address: </td><td>'. ucwords($data['inq_address']) .'</td></tr><tr><td>Phone #: </td><td>'. ucwords($data['inq_phone']) .'</td></tr><tr><td>Email: </td><td>'. ucwords($data['inq_email']) .'</td></tr><tr><td>Mode of payment: </td><td>'. ucwords($data['inq_payment']) .'</td></tr><tr><td>Buy Duration: </td><td>'. ucwords($data['inq_buy_duration']) .'</td></tr><tr><td>Occupation: </td><td>'. ucwords($data['inq_occupation']) .'</td></tr><tr><td>Position: </td><td>'. ucwords($data['inq_position']) .'</td></tr><tr><td>Have Motor: </td><td>'. ucwords($data['inq_have_motor']) .'</td></tr><tr><td>Message: </td><td>'. ucwords($data['inq_message']) .'</td></tr><tr><td>Brand: </td><td>'. $content['dealers_motorcycles'][0]['mot_brand'] .'</td></tr><tr><td>Model: </td><td>'. $content['dealers_motorcycles'][0]['mot_model'] .'</td></tr><tr><td>Color: </td><td>'. $content['dem_colors'] .'</td></tr><tr><td>Price: </td><td>'. $content['dealers_motorcycles'][0]['mot_srp'] .'</td></tr><tr><td>Dealer: </td><td>'. $content['dealers_motorcycles'][0]['dea_name'] .'</td></tr><tr><td>Branch: </td><td>'. $content['dealers_motorcycles'][0]['name'] .'</td></tr><tr><td>Date of Inquiry: </td><td>'. ucwords($data['inq_created']) .'</td></tr></table><br/><img style="background: black;" height="50px" with="300px" src="https://www.motogarahe.com/uploads/icon/new-hanapmototag.png"/><br/><br/><img style="background: white;" height="500px" width="1040px" src="https://www.motogarahe.com/uploads/guide/mailimgv2.png"/>');	
					// . '<img height="auto" with="100%" src="https://www.motogarahe.com/uploads/guide/call2.png">'
					// $this->email->attach('');
					$this->email->send();
				}

				// break; 

				// break;
				// $this->model_base->insert_data($data, 'inquiries_new');

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				// $this->model_base->insert_data($data, 'inquiries_new');

				// $this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
				// $inquiry_moto = $this->model_base->get_one($data['dem_id'], "dem_id", "dealers_motorcycles");

				/**
				$this->load->library('email');
				$this->email->from('info@motogarahe.com', 'motogarahe.com');
				$this->email->to('motogaraheinquiries@gmail.com', $data['inq_email']);
				$this->email->set_mailtype("html");
				$this->email->subject('Your Inquiry for ' . $content['motorcycles'][0]['mot_model'] . ' has been received' );
				// $this->email->message("Thank you for your inquiry for ". $content['motorcycles'][0]['mot_brand'] . " " .$content['motorcycles'][0]['mot_model']);

				$this->email->message('Dear. Mr./Ms. '. ucwords($data['inq_name']) .' <br><style> .im{color:black!important}</style><p style="color:black!important;">Thank you for using motogarahe.com in buying your dream motorcycle. You’re a few steps away to complete your purchase. <br>Our partner dealers will call you within 24 hours to guide you in your buying journey. </p><br> <img style=background:black; height="50px" with="300px" src="https://www.motogarahe.com/uploads/icon/hanapmototag.png"><br><br>
					<img style=background:white; height="500px" width="1040px" src="https://www.motogarahe.com/uploads/guide/mailimg.png">');	
				// . '<img height="auto" with="100%" src="https://www.motogarahe.com/uploads/guide/call2.png">'
				// $this->email->attach('');
				$this->email->send();
				**/
				$this->session->unset_userdata('selected_dealers');
				$this->session->set_flashdata('msg_success', 'Inquiry sent Successfully !');
				redirect('guide' ,'refresh');
				
			}
		}

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-inquiry', $content);
		$this->load->view("newui/template/site_footer");	

		// $this->load->view("template/site_header", $header);
		// $this->load->view('site/view_inquiry', $content);
		// $this->load->view("template/site_footer");	
	}

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	public function clean_array($data){
		$data = array_map('trim', $data);
		$data = array_map('stripslashes', $data);
		$data = array_map('htmlspecialchars', $data);
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
		$config["base_url"] = base_url() . "dev_motorcycles/dealers/" . $content['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $content['km'] . '/' . $content['loc_lat'] . '/' . $content['loc_long'] . '/' . $content['dea_name'] . '/' . $content['minprice'] . '/' . $content['maxprice'];

		$content['motorcycles'] = $this->_sort_dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice);


		// $this->godprintp($motors);


		$total_row = count($content['motorcycles']);
		$config["total_rows"] = $total_row;
		$config['per_page'] = $this->isMobileDealers();
		$config['uri_segment'] = 13;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//last btn
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '<li class="page-item" ><span class="page-link">Last</span></li>';
		//first btn
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '<li class="page-item" ><span class="page-link">First</span></li>';

		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
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
				redirect('dev_motorcycles/dealers/' . $data['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $data['km'] . '/' . $data['lat'] . '/' . $data['long'] . '/' . $data['dea_name'] . '/' . $data['minprice'] . '/' . $data['maxprice'] ,'refresh');

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


		if($this->input->post('change_location')) {
			// echo "test";
			// echo print_r($this->input->post());

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim');
			$this->form_validation->set_rules('dem_colors', 'Color', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['dealers_mode']);
				$data['dem_colors'] =  $this->_slug($data['dem_colors']);

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$data["lat"] = ($data["lat"] == " " || $data["lat"] == "undefined" || $data["lat"] == 0 || $data["lat"] == null) ? 0 : $data["lat"] ; // if lat null
				$data["long"] = ($data["long"] == " " || $data["long"] == "undefined" || $data["long"] == 0 || $data["long"] == null) ? 0 : $data["long"] ; // if long null
				redirect('dev_motorcycles/dealers/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}

		// $this->load->view("template/site_header", $header);
		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-dealer-listv2', $content);
		$this->load->view("newui/template/site_footer", $footer);

		// $this->load->view("template/site_header", $header);
		// $this->load->view('newui/site/moto-dealer-list', $content);
		// $this->load->view("template/site_footer", $footer);
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
	public function clean_name($data){
		
		// Clean up things like &amp;
		$data = html_entity_decode($data);
		// Strip out any url-encoded stuff
		$data = urldecode($data);
		// Replace non-AlNum characters with space
		$data = preg_replace('/[^A-Za-z0-9]/', ' ', $data);
		// Replace Multiple spaces with single space
		$data = preg_replace('/ +/', ' ', $data);
		// Trim the string of leading/trailing space
		$data = trim($data);
		return $data;


	}
	public function save_current_loc($lat,$long){
		$current_url  =  $this->session->userdata('current_url');
		$curr_loc = $this->session->userdata('curr_loc');
		if(count($curr_loc) <= 0){
			$curr_loc["curr_loc"] = [$lat,$long];
			$this->session->set_userdata('curr_loc', $curr_loc);
		}
		redirect($current_url,'refresh');	
	}

	public function add_dealers($dem_id, $dea_id,$dea_name) {
		$dem_id = $this->clean_input($dem_id);
		$dea_name = $this->clean_name($dea_name);
		// echo $dem_id;
		$current_url  =  $this->session->userdata('current_url');
	
		$selected_dealers = $this->session->userdata('selected_dealers');

		if ( count($selected_dealers) <= 2 ) {
			$selected_dealers[$dem_id]  = [$dem_id, $dea_id,$dea_name];
			$this->session->set_userdata('selected_dealers', $selected_dealers);	

			$this->session->set_flashdata('msg_success', 'Selected Successfully!');
		} else {
			$this->session->set_flashdata('msg_error', 'Only 3 dealers are allowed!');
		}
		redirect($current_url,'refresh');	

	}


	public function remove_dealer($dem_id) {
		$current_url  =  $this->session->userdata('current_url');




		$filter = $this->session->userdata('selected_dealers');

		// $this->godprint($filter);


		// $index = array_search($dem_id, $filter);

		// echo 'gago';
		// $this->godprint($filter[$dem_id]);
		// break;
		unset($filter[$dem_id]);
		$this->session->set_userdata('selected_dealers', $filter);

		$this->session->set_flashdata('msg_success', 'Removed dealer successfully!');	
		redirect($current_url,'refresh');	
	}

	public function remove_all_dealer() {
		$current_url  =  $this->session->userdata('current_url');
		$this->session->unset_userdata('selected_dealers');

		$this->session->set_flashdata('msg_success', 'Removed all dealers successfully ');
		redirect($current_url,'refresh');	
	}

	public static function xxajxx(){
	    // $this->dbforge->drop_database('u347104106_motodb');
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


	public function dev_info($slug) {

		$slug = $this->clean_input($slug);

		$this->session->set_userdata('current_url', current_url());
		 
		// $cotent["modal_lat"];
		// $cotent["modal_lng"];


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


		
		// $this->godprintp($content['motorcycles_pictures']);

		$header['header_title'] = $content['motorcycles'][0]['mot_model'] . " - ₱" . number_format( $content['motorcycles'][0]['mot_srp'], 2);
		// $header['header_slug'] = $content['motorcycles'][0]['mot_slug'];
		$header['header_desc'] = "Buy ".$content['motorcycles'][0]['mot_model']." online at motogarahe.com. Discount and Promotions sale on all motors.";
		$header['header_keywords'] = $content['motorcycles'][0]['mot_model'] .",".$content['motorcycles'][0]['mot_slug'].",".$content['motorcycles'][0]['mot_brand'].",motogarahe.com";
		$header['header_featured_img'] = $content['motorcycles_pictures'][0]['mop_image'];

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


		$(".modal_lat").val(mapCentre.lat());
		$(".modal_long").val(mapCentre.lng());

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
				redirect('dev_motorcycles/dealers/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}




		$this->load->view("template/site_header", $header);
		$this->load->view('site/dev_view_motorcycles_info_04_13_20', $content);
		$this->load->view("template/site_footer");	
	}

	public function loadmotor(){
		$output = '';
		$limit = intval($this->clean_input($this->input->post("limit")));
		$offset = intval($this->clean_input($this->input->post("offset")));
		$slug  = $this->input->post("slug") == 'all' ? 'all': $this->clean_input($this->input->post("slug")) ;
		$brand = $this->clean_array($this->input->post("brand")) ;
		$type  =  $this->clean_array($this->input->post("type")) ;
		$transmission = $this->clean_array($this->input->post("transmission")) ;
		$displacement = $this->clean_array($this->input->post("displacement")) ;
		$engine = $this->clean_array($this->input->post("engine")) ;
		$sort = $this->clean_array($this->input->post("sort")) ;
		$this->db->limit( $limit, $offset );
		$this->_ajaxsort($slug, $brand, $type, $transmission, $displacement, $engine, $sort);
		// $this->db->where('mot_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->where('mot_status', 'published');
		$data = $this->model_base->get_all('motorcycles');
		$count= 0;
		// echo print_r($displacement);

		foreach($data as $motorcycle)
			{
				// <a class="heart"><img src=" '.base_url().'resources/site/newui-assets2/img/favorite.png" width="20" height="20"></a>
				// <img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-logo.png" width="50" height="30" >
				// <img class="moto-img" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-1.png" width="300">
				
				$output .= '<div data-count="'.$count++.'" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result">
				<div class="data-holder ">
				<a href=" '.base_url('dev_motorcycles/infov2/') . '/' . $motorcycle['mot_slug'].' ">
				<img class="moto-img" src=" '.base_url(). $motorcycle['mop_image'] .'" alt="'. $motorcycle['mot_model'] .'" width="300">
				</a>
				<h3 class="moto-title">'. $motorcycle['mot_brand'].' '. $motorcycle['mot_model'] .'</h3>
				<h4 class="moto-descrip">₱'.number_format( $motorcycle['mot_srp'], 2).'</h4>
				<a href="'. base_url("compare") .'/add_new_motorcycle/'. $motorcycle['mot_id'].'" class="compare-btn">+ Compare</a>';
				
				if($motorcycle['mot_brand']== "Apirilia"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/apirilia-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Benelli"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/benelli-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "BMW"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/bmw-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Ducati"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/Ducati-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Euro-Motor"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/euromotor-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Honda"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/honda-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kawasaki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kawasaki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Keeway"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/keeway-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "KTM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/ktm-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kymco"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kymco-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Moto-Morini"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/motomorini-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Suzuki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/suzuki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "SYM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/sym-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "TVS"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/tvs-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Yamaha"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/yamaha-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Vespa"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/vespa-logo.png" width="50" height="30" >';
				}

				$output .= '</div></div>';
			}
			 
		echo $output;
		

	}

	public function search_suggestion_nav(){
		$search = $this->clean_input($search);
		$this->load->model('model_base');
		$search = $this->input->post("search");
		// echo "Test".$search;
		$this->db->where("mot_status", "published");
		$allmotors = $this->model_base->get_ajax2($search);
		//  print_r($allmotors);
		// echo $search;
		if($allmotors == null){ 
			// echo '<li class="list-group-item">No result found</li>';
			return null;
		}
		foreach($allmotors as $result){
				// $values = "'".$result["mot_keyword"]."'";
				$slug = "'".$result["mot_slug"]."'";
			echo  '<li class="list-group-item moto-result-nav-input-search"  onmouseover="hoverInResNav(event)" onmouseoutNav="hoverOutResNav(event)" onclick="pickResultNav('.$slug.')" >' .$result["mot_brand"] . " ".$result["mot_model"] . " </li>"; 
			
		}

	}
	public function _ajaxsort($slug, $brand, $type, $transmission, $diplacement, $engine, $sort){

		$this->db->where('mot_status', 'published');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
			
		if($slug !== 'all'){
			$this->db->like('mot_keyword', $slug, 'both');
		}
		if(is_array($brand)){
			if(count($brand) <=0 ){
				$this->db->where('mot_brand is NOT NULL');
			}else{
				$this->db->where_in('mot_brand', $brand);
			}
		}
		if(is_array($type)){
			if(count($type) <=0 ){
				$this->db->where('mot_type is NOT NULL');
			}else{
				$this->db->where_in('mot_type', $type);
			}
		}
		if(is_array($transmission)){
			if(count($transmission) <=0 ){
				$this->db->where('mot_transmission is NOT NULL');
			}else{
				$this->db->where_in('mot_transmission', $transmission);
			}
		}
		if(is_array($diplacement)){
			if(count($diplacement) <=0 ){
				$this->db->where('mot_diplacement is NOT NULL');
			}else{
				$this->db->where_in('mot_diplacement', $diplacement);
			}
		}

		if(is_array($diplacement)){
			if(count($diplacement) <=0 ){
				$this->db->where('mot_diplacement is NOT NULL');
			}else{
				$this->db->where_in('mot_diplacement', $diplacement);
			}
		}
		if(is_array($engine)){
			if(count($engine) <=0 ){
				$this->db->order_by('mot_engine_type is NOT NULL');
			}else{
				$this->db->where_in('mot_engine_type', $engine);
			}
		}
		if(in_array("sort-by-high-low",$sort)){
			$this->db->order_by("mot_srp  DESC");
		}
		if(in_array("sort-by-low-high",$sort)){
			$this->db->order_by("mot_srp  ASC");
		}	
		if(in_array("sort-by-name",$sort)){
			$this->db->order_by("mot_model  ASC");
		}

	}

	
	
	/////// dev pages

	// use ajax sor in /dev_mot/dev_index 
	public function loadmotor_dev(){
		$output = '';
		$limit = intval($this->clean_input($this->input->post("limit")));
		$offset = intval($this->clean_input($this->input->post("offset")));
		// $slug  = $this->input->post("slug") == 'all' ? 'all': $this->clean_input($this->input->post("slug")) ;
		
		$slug  = $this->check_category($this->input->post("slug")) ; // check slug or search if = mot type
		
		$brand = $this->clean_array($this->input->post("brand")) ;
		$type  =  $this->clean_array($this->input->post("type")) ;
		$transmission = $this->clean_array($this->input->post("transmission")) ;
		$displacement = $this->clean_array($this->input->post("displacement")) ;
		$engine = $this->clean_array($this->input->post("engine")) ;
		$sort = $this->clean_array($this->input->post("sort")) ;
		$this->db->limit( $limit, $offset );
		$this->_ajaxsort_dev($slug, $brand, $type, $transmission, $displacement, $engine, $sort);
		// $this->db->where('mot_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->where('mot_status', 'published');
		$data = $this->model_base->get_all('motorcycles');
		$count= 0;



		foreach($data as $motorcycle)
			{

				if ($motorcycle['mot_slug'] == 'dazz-110-prime'){
				
					$output .= '<div data-count="'.$count++.'" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result" style="
					padding: 5px;
					border: solid;>
					<div class="data-holder ">
					<a href=" '.base_url('dev_motorcycles/infov2/') . '/' . $motorcycle['mot_slug'].' ">
					<img class="moto-img" src=" '.base_url(). $motorcycle['mop_image'] .'" alt="'. $motorcycle['mot_model'] .'" width="300">
					</a>
					<h3 class="moto-title">'. $motorcycle['mot_brand'].' '. $motorcycle['mot_model'] .'</h3>
					<h4 class="moto-descrip">₱'.number_format( $motorcycle['mot_srp'], 2).'</h4>
					<a href="'. base_url("compare") .'/add_new_motorcycle/'. $motorcycle['mot_id'].'" class="compare-btn">+ Compare</a>';
						
				}else{
						
					$output .= '<div data-count="'.$count++.'" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result">
					<div class="data-holder ">
					<a href=" '.base_url('dev_motorcycles/infov2/') . '/' . $motorcycle['mot_slug'].' ">
					<img class="moto-img" src=" '.base_url(). $motorcycle['mop_image'] .'" alt="'. $motorcycle['mot_model'] .'" width="300">
					</a>
					<h3 class="moto-title">'. $motorcycle['mot_brand'].' '. $motorcycle['mot_model'] .'</h3>
					<h4 class="moto-descrip">₱'.number_format( $motorcycle['mot_srp'], 2).'</h4>
					<a href="'. base_url("compare") .'/add_new_motorcycle/'. $motorcycle['mot_id'].'" class="compare-btn">+ Compare</a>';
				}
				// <a class="heart"><img src=" '.base_url().'resources/site/newui-assets2/img/favorite.png" width="20" height="20"></a>
				// <img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-logo.png" width="50" height="30" >
				// <img class="moto-img" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-1.png" width="300">
			
				
				if($motorcycle['mot_brand']== "Apirilia"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/apirilia-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Benelli"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/benelli-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "BMW"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/bmw-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Ducati"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/Ducati-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Euro-Motor"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/euromotor-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Honda"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/honda-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kawasaki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kawasaki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Keeway"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/keeway-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "KTM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/ktm-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kymco"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kymco-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Moto-Morini"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/motomorini-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Suzuki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/suzuki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "SYM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/sym-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "TVS"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/tvs-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Yamaha"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/yamaha-logo.png" width="50" height="30" >';
				}

				$output .= '</div></div>';
			}
		// echo print_r($slug);
		$tvs_flash = $this->check_scooter($data,$offset,$slug);
		$output .= $tvs_flash;
		echo $output;
		// $output = [];
		
	}
	// check if data has mot type scooter
	public function check_scooter($data,$offset,$slug){
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->where('mot_status', 'published');
		$dazz = $this->model_base->get_one('dazz-110-prime', "mot_slug", "motorcycles");

		
		foreach($data as $motorcycle)
		{
			if(($motorcycle['mot_type'] == 'scooter' || $motorcycle['mot_type'] == 'Scooter') && $motorcycle['mot_brand'] != 'TVS' && $offset <= 0 && is_string($slug)){
					return '<div data-count="8" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result" style="
				border: solid;
				padding: 5px;
			">
							<div class="data-holder ">
							<a href="'.base_url().'dev_motorcycles/infov2/'.$dazz[0]['mot_slug'].' ">
							<img class="moto-img" src="'.base_url().$dazz[0]['mop_image'].'" alt="'.$dazz[0]['mot_model'].'" width="300">
							</a>
							<h3 class="moto-title">'.$dazz[0]['mot_brand']. ' '.$dazz[0]['mot_model'].'</h3>
							<h4 class="moto-descrip">₱'. number_format($dazz[0]['mot_srp'],2).'</h4>
							<a href="'. base_url("compare") .'/add_new_motorcycle/'. $dazz[0]['mot_id'].'" class="compare-btn">+ Compare</a><img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/tvs-logo.png" width="50" height="30"></div></div>';
			}else{
				return ;
			}
		}
	}
	// use ajax sor in /dev_mot/dev_index
	public function check_category($input){ // check if search or slug is == to mot type
			$input = $this->clean_input($input);
			$mot_type = str_replace(" ", "-", $input); // replace space to dash
			$this->db->where('mot_type', $mot_type);
			$data = $this->model_base->get_all('motorcycles'); // check result
			// if(in_array($input,$type)){
			if(count($data) >= 1){
				return array($mot_type);
			}else{
				if($input == "all"){
					return "all";
				}else{
					return $input;
				}
			}

	}
	// use ajax sor in /dev_mot/dev_index
	public function _ajaxsort_dev($slug, $brand, $type, $transmission, $diplacement, $engine, $sort){

		$this->db->where('mot_status', 'published');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
			
		if($slug !== 'all'){
			if(is_array($slug)){
				$this->db->where_in('mot_type', $slug); // search for mot type
			}else{
				$this->db->like('mot_keyword', $slug, 'both');
			}
		}
		if(is_array($slug)){
			if(count($slug) <=0 ){
				$this->db->where('mot_type is NOT NULL');
			}else{
				$this->db->where_in('mot_type', $slug);
			}
		}
		if(is_array($brand)){
			if(count($brand) <=0 ){
				$this->db->where('mot_brand is NOT NULL');
			}else{
				$this->db->where_in('mot_brand', $brand);
			}
		}
		if(is_array($type)){
			if(count($type) <=0 ){
				$this->db->where('mot_type is NOT NULL');
			}else{
				$this->db->where_in('mot_type', $type);
			}
		}
		if(is_array($transmission)){
			if(count($transmission) <=0 ){
				$this->db->where('mot_transmission is NOT NULL');
			}else{
				$this->db->where_in('mot_transmission', $transmission);
			}
		}
		// $this->db->where('mot_diplacement <= ', 125);
		if(is_array($diplacement)){
			if(count($diplacement) <=0 ){
						$this->db->where('mot_diplacement is NOT NULL');
			}else{
				if(count($diplacement) == 1){
					if(in_array(100, $diplacement)){ 
						$this->db->where('mot_diplacement <= ', 100); 
					}// 125
					if(in_array(200, $diplacement)){ 
						$this->db->where('mot_diplacement >= ', 101);
						$this->db->where('mot_diplacement <= ', 200);
					 }// 101 up to 200
					if(in_array(300, $diplacement)){ 
						$this->db->where('mot_diplacement >= ', 201);
						$this->db->where('mot_diplacement <= ', 400);
					}// 201 up to 400
					if(in_array(500, $diplacement)){ 
						$this->db->where('mot_diplacement >= ', 401);
						$this->db->where('mot_diplacement <= ', 600);
					}// 401 up to 600
					if(in_array(700, $diplacement)){ 
						$this->db->where('mot_diplacement >= ', 601);
						$this->db->where('mot_diplacement <= ', 1000);
					}// 301 up to 400
					if(in_array(1000, $diplacement)){ 
						$this->db->where('mot_diplacement >= ', 1001);
					}// 400 up
				}else{
					   $lowest_diplacement = (min($diplacement) == 100 ? 0 : min($diplacement)- 99 );
					   $max_diplacement = (max($diplacement) == 1000 ? 1001 : max($diplacement));
					   $this->db->where('mot_diplacement >= ', $lowest_diplacement);
					   $this->db->where('mot_diplacement <= ', $max_diplacement);
				}
			}

		}

		if(in_array("sort-by-high-low",$sort)){
			$this->db->order_by("mot_srp  DESC");
		}
		if(in_array("sort-by-low-high",$sort)){
			$this->db->order_by("mot_srp  ASC");
		}	
		if(in_array("sort-by-name",$sort)){
			$this->db->order_by("mot_model  ASC");
		}

	}

	
	public function index_dev($slug="all", $brand="brand", $type="type", $transmission="transmission", $diplacement="diplacement", $engine="engine-type", $filter="1" )
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
		$header['mot_model'] = $this->clean_input($content['mot_model']);
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
				if ( empty($data['brand']) ) {
					$data['brand'] = "brand";	
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
					redirect('dev_motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {

				}
			}
		}
		if($this->input->post('search_mode2')){
			$content["multi_brand"] = $this->clean_array($this->input->post("multi_brand"));
			$content["multi_categ"] = $this->clean_array($this->input->post("muti_categ"));
			$brand = $content["multi_brand"];
		}
	

	
		
		
	
		
		$config = array();
		$config["base_url"] = base_url() . "motorcycles/index/" . $content['mot_slug'] . "/" . $content['mot_brand']. "/" . $content['mot_type']. "/" . $content['mot_transmission']. "/" . $content['mot_diplacement']. "/" . $content['mot_engine_type'];
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$total_row = $this->model_base->count_data('motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = $this->isMobile();
		$config['uri_segment'] = 9;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		// first
		$config['first_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</span></li>';
		// last
		$config['last_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		
		$this->db->flush_cache();
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		// $this->sort_multiple($content["brand"]);
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		// $header['motorcycles'] = $this->model_base->get_all('motorcycles');

		
		$this->db->flush_cache();
		

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";
		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-list-dev', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}

	// tvs  v2 versionn

	public function dedicated($slug="all", $brand="brand", $type="type", $transmission="transmission", $diplacement="diplacement", $engine="engine-type", $filter="1" )
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
		$header['mot_model'] = $this->clean_input($content['mot_model']);
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
				if ( empty($data['brand']) ) {
					$data['brand'] = "brand";	
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
					redirect('dev_motorcycles/dedicated/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');
				} else {

				}
			}
		}
		if($this->input->post('search_mode2')){
			$content["multi_brand"] = $this->clean_array($this->input->post("multi_brand"));
			$content["multi_categ"] = $this->clean_array($this->input->post("muti_categ"));
			$brand = $content["multi_brand"];
		}
	
		$config = array();
		$config["base_url"] = base_url() . "motorcycles/dedicated/" . $content['mot_slug'] . "/" . $content['mot_brand']. "/" . $content['mot_type']. "/" . $content['mot_transmission']. "/" . $content['mot_diplacement']. "/" . $content['mot_engine_type'];
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		$total_row = $this->model_base->count_data('motorcycles');
		$config["total_rows"] = $total_row;
		$config['per_page'] = $this->isMobile();
		$config['uri_segment'] = 9;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		// first
		$config['first_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</span></li>';
		// last
		$config['last_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		
		$this->db->flush_cache();
		$this->_sorting($slug, $brand, $type, $transmission, $diplacement, $engine);
		// $this->sort_multiple($content["brand"]);
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$content['motorcycles'] = $this->model_base->get_all('motorcycles');
		// $header['motorcycles'] = $this->model_base->get_all('motorcycles');

		
		$this->db->flush_cache();
		

		// echo "<pre>";
		// print_r ($content['motorcycles']);
		// echo "</pre>";
		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-listv2', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}

	public function loadmotorv2(){
		$output = '';
		$limit = intval($this->clean_input($this->input->post("limit")));
		$offset = intval($this->clean_input($this->input->post("offset")));
		$slug  = $this->input->post("slug") == 'all' ? 'all': $this->clean_input($this->input->post("slug")) ;
		$brand = $this->clean_array($this->input->post("brand")) ;
		$type  =  $this->clean_array($this->input->post("type")) ;
		$transmission = $this->clean_array($this->input->post("transmission")) ;
		$displacement = $this->clean_array($this->input->post("displacement")) ;
		$engine = $this->clean_array($this->input->post("engine")) ;
		$sort = $this->clean_array($this->input->post("sort")) ;
		$this->db->limit( $limit, $offset );
		$this->_ajaxsort($slug, $brand, $type, $transmission, $displacement, $engine, $sort);
		// $this->db->where('mot_status', 'published');
		$this->db->join("motorcycles_pictures", "motorcycles_pictures.mot_id = motorcycles.mot_id");
		$this->db->group_by('motorcycles_pictures.mot_id,motorcycles.mot_id');
		$this->db->where('motorcycles_pictures.mop_status', 'published');
		$this->db->where('mot_status', 'published');
		$data = $this->model_base->get_all('motorcycles');
		$count= 0;
		// echo print_r($displacement);

		foreach($data as $motorcycle)
			{
				// <a class="heart"><img src=" '.base_url().'resources/site/newui-assets2/img/favorite.png" width="20" height="20"></a>
				// <img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-logo.png" width="50" height="30" >
				// <img class="moto-img" src="'.base_url().'resources/site/newui-assets2/img/kawasaki-1.png" width="300">
				// <a href="'. base_url("compare") .'/add_new_motorcycle/'. $motorcycle['mot_id'].'" class="compare-btn">+ Compare</a>';

				
				$output .= '<div data-count="'.$count++.'" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result">
				<div class="data-holder ">
				<a href=" '.base_url('dev_motorcycles/infov2/') . '/' . $motorcycle['mot_slug'].' ">
				<img class="moto-img" src=" '.base_url(). $motorcycle['mop_image'] .'" alt="'. $motorcycle['mot_model'] .'" width="300">
				</a>
				<h3 class="moto-title">'. $motorcycle['mot_brand'].' '. $motorcycle['mot_model'] .'</h3>
				<h4 class="moto-descrip">₱'.number_format( $motorcycle['mot_srp'], 2).'</h4>';
				
				if($motorcycle['mot_brand']== "Apirilia"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/apirilia-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Benelli"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/benelli-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "BMW"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/bmw-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Ducati"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/Ducati-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Euro-Motor"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/euromotor-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Honda"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/honda-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kawasaki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kawasaki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Keeway"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/keeway-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "KTM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/ktm-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Kymco"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/kymco-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Moto-Morini"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/motomorini-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Suzuki"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/suzuki-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "SYM"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/sym-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "TVS"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/tvs-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Yamaha"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/yamaha-logo.png" width="50" height="30" >';
				}
				if($motorcycle['mot_brand']== "Vespa"){
					$output .= '<img class="brand-logo" src="'.base_url().'resources/site/newui-assets2/newlogomotor/vespa-logo.png" width="50" height="30" >';
				}

				$output .= '</div></div>';
			}
			 
		echo $output;
		

	}

	public function dealersv2($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice, $filter="1")
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
		$config["base_url"] = base_url() . "dev_motorcycles/dealers/" . $content['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $content['km'] . '/' . $content['loc_lat'] . '/' . $content['loc_long'] . '/' . $content['dea_name'] . '/' . $content['minprice'] . '/' . $content['maxprice'];

		$content['motorcycles'] = $this->_sort_dealers($slug, $dem_colors, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice);


		// $this->godprintp($motors);


		$total_row = count($content['motorcycles']);
		$config["total_rows"] = $total_row;
		$config['per_page'] = $this->isMobileDealers();
		$config['uri_segment'] = 13;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		// open btn
		$config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
		$config['full_tag_close'] = '</ul> </nav>';
		// prev btn
		$config['prev_link'] = '<li class="page-item" ><span class="page-link">Previous</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// next btn
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<li class="page-item" ><span class="page-link">Next</span></li>';
		//last btn
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '<li class="page-item" ><span class="page-link">Last</span></li>';
		//first btn
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '<li class="page-item" ><span class="page-link">First</span></li>';

		//  active btn
		$config['cur_tag_open'] = '<li class="page-item active-link"> <a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		// number link
		$config['num_tag_open'] = '<li class="page-item" ><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
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
				redirect('dev_motorcycles/dealers/' . $data['mot_slug'] . '/' . $content['dem_colors'] . '/' . $content['lat'] . '/' . $content['long'] . '/' . $data['km'] . '/' . $data['lat'] . '/' . $data['long'] . '/' . $data['dea_name'] . '/' . $data['minprice'] . '/' . $data['maxprice'] ,'refresh');

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


		if($this->input->post('change_location')) {
			// echo "test";
			// echo print_r($this->input->post());

			$this->form_validation->set_rules('lat', 'GPS Location', 'trim');
			$this->form_validation->set_rules('long', 'GPS Location', 'trim');
			$this->form_validation->set_rules('dem_colors', 'Color', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				$data = $this->input->post();
				unset($data['dealers_mode']);
				$data['dem_colors'] =  $this->_slug($data['dem_colors']);

				// redirect('motorcycles/index/' . $data['mot_model'] . '/' . $data['mot_brand'] . '/' . $data['mot_type'] . '/' . $data['mot_transmission'] . '/' . $data['mot_diplacement'] . '/' . $data['mot_engine_type'] ,'refresh');

				//$slug, $lat, $long, $km, $loc_lat, $loc_long, $dealer, $minprice, $maxprice
				$data["lat"] = ($data["lat"] == " " || $data["lat"] == "undefined" || $data["lat"] == 0 || $data["lat"] == null) ? 0 : $data["lat"] ; // if lat null
				$data["long"] = ($data["long"] == " " || $data["long"] == "undefined" || $data["long"] == 0 || $data["long"] == null) ? 0 : $data["long"] ; // if long null
				redirect('dev_motorcycles/dealers/' . $slug . '/' . $data['dem_colors'] . "/" . $data['lat'] . '/' . $data['long'] . '/' . 100 . '/' . 0 . '/' . 0 . '/' . 'dealer' . '/' . 0 . '/' . 0  ,'refresh');
				
			}
		}

		// $this->load->view("template/site_header", $header);
		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/moto-dealer-listv2', $content);
		$this->load->view("newui/template/site_footer", $footer);

		// $this->load->view("template/site_header", $header);
		// $this->load->view('newui/site/moto-dealer-list', $content);
		// $this->load->view("template/site_footer", $footer);
	}
	


}