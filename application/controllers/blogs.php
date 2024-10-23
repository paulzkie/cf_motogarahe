<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session','googlemaps', 'cart', 'pagination'));
		$this->load->model('model_base');
		$this->load->model('model_login');
		
	}

	public function index($filter="1")
	{
		$this->session->set_userdata('current_url', current_url());

		$header = [];
		$content = [];
		$header['header_title'] = 'MG News';
		$header['header_desc'] = "Motogarahe.com is an interactive website that helps you to search, compare and purchase the right motorcycle for you.";
		$header['header_keywords'] = "";
		$header['header_featured_img'] = "";
		$header['mot_model'] = "";

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

		$this->db->order_by('dem_id',"DESC");
		$this->db->limit(4);
		$this->db->join("dealers_branches", "dealers_branches.deb_id = dealers_motorcycles.deb_id");
		$this->db->join("motorcycles", "motorcycles.mot_id = dealers_motorcycles.mot_id");
		$footer['latest_motorcycles'] = $this->model_base->get_all('dealers_motorcycles');

		$config = array();
		$config["base_url"] = base_url(). "/blogs/index";
		$this->_sort();
		$total_row = $this->model_base->count_data('blogs');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;

		$config['num_links'] = $total_row;
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

		$this->pagination->initialize($config);
		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		$this->db->flush_cache();
		$this->_sort();
		$content['blogs'] = $this->model_base->get_all('blogs');

		// echo $filter;
		// echo "test";
		// $this->db->flush_cache();
		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset);
		// $this->_sort();
		// $content['blogs'] = $this->model_base->get_all('blogs');
		// $this->db->flush_cache();

		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset,$config['uri_segment']);
		// $this->_sort();
		// $content['blogs'] = $this->model_base->get_all('blogs');
	
		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/blog-list', $content);
		$this->load->view("newui/template/site_footer", $footer);
	}

	public function _sort() {
		// if ( $search_type != 'xallx'  &&  $search_val != 'xallx' ) {
		// 	$this->db->like($search_type, urldecode($search_val));
		// }
		$this->db->order_by('blo_created', 'DESC');
		$this->db->where('blo_status', 'published');
	}

	public function allblogs(){
		$this->db->limit(6);
		$this->db->order_by('blo_created', 'DESC');
		$this->db->where('blo_status', 'published');
		$landingpageblogs = $this->model_base->get_all('blogs');
		foreach ($landingpageblogs as $blogs) {
			echo '<a href='.base_url().'blogs/content/'.$blogs["blo_slug"].'>'.'</a> ';
		}
	}

	public function landingpageblogs(){
		$this->db->limit(3);
		$this->db->order_by('blo_created', 'DESC');
		$this->db->where('blo_status', 'published');
		$landingpageblogs = $this->model_base->get_all('blogs');
		foreach ($landingpageblogs as $blogs) {
			if(empty($blogs["blo_image"])){
				$img = 'No image';
			}else{
				$img = base_url().$blogs['blo_image'];
			}
			$stringCut = substr($blogs["blo_desc"], 0, 250);
            $endPoint = strrpos($stringCut, ' ');
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
			echo '<div class="col-lg-4 col-md-6">
	                <div class="blog-hm-wrapper mb-40">
	                    <div class="blog-img">
	                        <a href='.base_url().'blogs/content/'.$blogs["blo_slug"].'> 
	                        <img src='.$img.' alt='.$blogs["blo_title"].'></a>
	                        <div class="blog-date">
	                            <h4>'.date("F j, Y",strtotime($blogs["blo_created"])).'</h4>
	                        </div>
	                        <div class="blog-hm-social fb-share-button" data-href='.base_url().$blogs['blo_image'].' data-layout="button_count" data-size="small">
	                        <ul>
	                            <li><a rel="noopener" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.base_url().'blogs/content/'.$blogs["blo_slug"].'  class="fb-xfbml-parse-ignore"><i class="fa fa-facebook"></i></a></li>
	                            <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
	                            </ul>
	                        </div>
	                        </div>
	                        <div class="blog-hm-content">
	                        <h3><a href='.base_url().'blogs/content/'.$blogs["blo_slug"].'>'.$blogs["blo_title"].'</a></h3>
	                        <p><span>'.$blogs["blo_author"].'</span><br>'.$string.'...</p>
	                        <a href='.base_url().'blogs/content/'.$blogs["blo_slug"].' class="btn btn-primary btnReadmore" style="background: #fff;color:#000;border-color: #000">Read More</a>
	                    </div>
	                </div>
	            </div>';
		}
	}

	public function content($slug)  {

		$slug = $this->clean_input($slug);

		// echo $slug;
		// break;

		$this->session->set_userdata('current_url', current_url());

		if ( empty($slug) ) {
			redirect('home');
		}

		$header = [];
		$content = [];
		$footer = [];
		$header['header_keywords'] = "";
		$header['mot_model'] = "";
		$this->db->where('blo_status','published');
		$content['blogs'] = $this->model_base->get_one($slug, "blo_slug", "blogs");
		$content['blogs'][0]['blo_content'] = stripcslashes( $content['blogs'][0]['blo_content'] );

		$header['header_title'] = $content['blogs'][0]['blo_title'];
		$header['header_desc'] = $content['blogs'][0]['blo_desc'];
		$header['header_featured_img'] = $content['blogs'][0]['blo_image'];

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

		if($this->input->post()) {

			$this->form_validation->set_rules('new_email', 'Email', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors() );
			} else {
				// success
				$data = $this->input->post();
				$data['new_email'] = $this->clean_input($data['new_email']);
				$data['new_created'] = $this->getDatetimeNow();
				$data['new_status'] = 'published';

				$last_id = $this->model_base->insert_data($data, 'newsletter_emails');
				$this->session->set_flashdata('msg_success', 'Sent');	

				$current_url  =  $this->session->userdata('current_url');
				redirect($current_url,'refresh');	
			}
		}


		$this->load->view("newui/template/site_header", $header);
		$this->load->view('newui/site/blog-content', $content);
		$this->load->view("newui/template/site_footer", $footer);	
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

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	public function scroll(){
		$output = '';
		$limit = intval($this->clean_input($this->input->post("limit")));
		$start = intval($this->clean_input($this->input->post("start")));
		$this->db->limit( $limit, $start );
		$this->_sort();
		$data = $this->model_base->get_all('blogs');
		// echo $start. " limit->".$limit;
		// echo print_r($data);
			foreach($data as $result)
			{
				$output .= '
				<div class="col-md-6">
				<div class="blog-box">
				<a href="'.base_url().''."blogs/content/" . $result['blo_slug'].'">
				<div class="img-holder"     
				style="background: url('. base_url().$result['blo_image'].');">
				</div> 
				</a>
				<div class="blog-details">
				<h3 class="blog-title">'.$result["blo_title"].'</h3>
				<h6 class="blog-author">'.$result["blo_author"].' </h6>
				<h6 class="blog-date">'.date("F j, Y",strtotime($result["blo_created"])).' </h6>
				<p>'.$result["blo_desc"].'</p><a href="'.base_url().''."blogs/content/" . $result['blo_slug'].'" class="btn btn-outline-secondary"z>Read More</a></div></div></div>';
			}
		echo $output;
		// <img src="http://localhost/cf_motogarahe/resources/site/newui-assets2/assets/blog1.png" alt=""></div>

	}

}



