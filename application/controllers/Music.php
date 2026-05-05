<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		if ( $this->session->userdata('usr_id') ) {
			$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
			if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
				$this->logout_user();	
			}
		}


	}

	public function index($result = "res", $genre = "all", $filter = 1 )
	{
		$this->session->set_userdata('current_url', current_url());
		// $this->useraccount->pota();
		$header = [];
		$header['header_title'] = 'Music';
		
		$content = [];

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
				redirect('music','refresh');
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


		$content['genre'] = $this->uri->segment(4);
		$content['result'] = $this->uri->segment(3);


		if($this->input->post('search_mode')) {

			//unset($data['search_mode']);

			$this->form_validation->set_rules('search', 'Password', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();

				// $this->godprintp($data);

				$content['result'] = $data['search'];
    			redirect('music/index/'.$data['search'].'/all/' ,'refresh');
			}
		}

		


		$config = array();
		$config["base_url"] = base_url() . "music/index/" . $this->uri->segment(3) . "/" . $this->uri->segment(4);
		$this->db->where('son_status !=', 'deleted');
		if ($genre != "all") {
			$this->db->where('genres.gen_slug', $genre);
		} 

		if ( $result != 'res' ) {
			$this->db->like('title', $result);
			$this->db->or_like('artist', $result);
			$this->db->or_like('gen_name', $result);
		}

		$this->db->join("genres", "genres.gen_id = songs.gen_id");
		$total_row = $this->model_base->count_data('songs');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 5;
		$config['uri_segment'] = 5;
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
		 $this->db->where('son_status !=', 'deleted');

		if ($genre != "all") {
			$this->db->where('genres.gen_slug', $genre);
		} 

		if ( $result != 'res' ) {
			$this->db->like('title', $result);
			$this->db->or_like('artist', $result);
			$this->db->or_like('gen_name', $result);
		}


		$this->db->join("genres", "genres.gen_id = songs.gen_id");
	    $content['featuredSongs'] = $this->model_base->get_all('songs');

	    // $this->godprintp($content['featuredSongs']);

	    $this->db->order_by('genres.gen_name', 'ASC');
	    $this->db->flush_cache();
	    $content['genresz'] = $this->model_base->get_all('genres');


	    
	    if ( $this->session->userdata('uss_id') != 0 ) {
			$plan = $this->model_base->get_one($this->session->userdata('uss_id'), "uss_id", "users_subscriptions");
			if ($plan[0]['uss_date_end'] >= date("d/m/Y H:i:s", strtotime('today'))) {
				$content['plan'] = 'Premium Account';
				$header['plan'] = 'Premium Account';
			} else {
				$content['plan'] = 'Regular Account';
				$header['plan'] = 'Regular Account';	
			}
			// $this->godprintp($plan);
		} else {
			$content['plan'] = 'Regular Account';
			$header['plan'] = 'Regular Account';	
		}

		$this->db->flush_cache();


		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_music', $content);
		$this->load->view("template/site_footer2");
	}

	public function getSongs($result = "", $genre = "",$song_id, $song_id2) {
		if ($genre != "all") {
			$this->db->where('genres.gen_slug', $genre);
		}  

		if ( $result != 'res' ) {
			$this->db->like('title', $result);
			$this->db->or_like('artist', $result);
			$this->db->or_like('gen_name', $result);
		}

		$this->db->where('son_id >=', $song_id);
		$this->db->where('son_id <=', $song_id2);

		$this->db->join("genres", "genres.gen_id = songs.gen_id");
	    $songs = $this->model_base->get_all('songs');
	    echo json_encode($songs);
	}

	public function dl_song($id) {
    	$this->load->helper('download');
    	$song = $this->model_base->get_one($id,  'son_id', 'songs');
		


		$this->db->flush_cache();
		if ( $this->session->userdata('uss_id') != 0 ) {
			$plan = $this->model_base->get_one($this->session->userdata('uss_id'), "uss_id", "users_subscriptions");
			if ($plan[0]['uss_date_end'] >= date("d/m/Y H:i:s", strtotime('today'))) {
				$path = file_get_contents(base_url() . $song[0]['mp3_o']); // get file name
			} else {
				$path = file_get_contents(base_url() . $song[0]['mp3']); // get file name
			}
			// $this->godprintp($plan);
		} else {
			$path = file_get_contents(base_url() . $song[0]['mp3']); // get file name	
		}

		


		$song_explode =  explode('/', $song[0]['mp3']);
		// $this->godprint($song_explode);

		$name = $song_explode[2]; // new name for your file

		// $this->godprintp($name);

		force_download($name, $path); // start download`
	}

	public function add_cart($id) {
		$current_url  =  $this->session->userdata('current_url');
		// $this->godprintp($this->session->userdata('current_url'));

		$song = $this->model_base->get_one($id,  'son_id', 'songs');

		$data = array(
	        'id'      => $song[0]['son_id'],
	        'qty'     => 1,
	        'price'   => $song[0]['son_price'],
	        'name'    => $song[0]['title'],
	        'options' => array(
	        	'artist' => $song[0]['artist'],
	        	'son_id' => $song[0]['son_id']
	        )
		);

		$this->cart->insert($data);
		$this->session->set_flashdata('msg_success', $song[0]['title'] . ' was added to cart!');	
		redirect($current_url,'refresh');

	}
}