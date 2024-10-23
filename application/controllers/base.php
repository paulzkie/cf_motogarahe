<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form', 'breadcrumb', 'cookie'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_login');
		$this->load->model('model_base');
	}

	public function index()
	{
		$header = [];
		$header['header_title'] = 'Base';
		
		$content = [];
		

		if ( $this->have_sess_admin() == true ){
			redirect('base/home','refresh');
		} else {

			//validation
			$this->form_validation->set_rules('bas_name', 'Username', 'required|trim|max_lenght[10]');
			$this->form_validation->set_rules('bas_pass', 'Password', 'required|trim|min_lenght[8]');

			if ($this->input->post()) {

				// echo 'asd';
				// break;

				if ($this->form_validation->run() == FALSE) {
					$content['msg_error'] = validation_errors();

					// echo "<pre>";
					// print_r ($content['msg_error']);
					// echo "</pre>";
					// break;

				} else {
					$data = $this->input->post();

					// echo "<pre>";
					// print_r ($data);
					// echo "</pre>";

					$base = $this->model_login->login_base($data, 'bases');

					// echo "<pre>";
					// print_r ($base);
					// echo "</pre>";
					// break;

					if ( count( $base) >= 1 && $base[0]['bas_status'] == 'active') {
						$this->session->set_flashdata('msg_success', 'Successfully log in!');
						$this->session->set_userdata($base[0]);
						$this->session->set_userdata('acc_type', 'base');

						//$cookie = $this->input->cookie('ci_session'); // we get the cookie
						//$this->input->set_cookie('ci_session', $cookie, '35580000'); // and add one year to it's expiration

						// echo "<pre>";
						// print_r ($this->session->all_userdata());
						// echo "</pre>";

						// echo "<pre>";
						// print_r ($this->session->userdata('bas_id'));
						// echo "</pre>";
						// break;
						redirect('base/home','refresh');	
					} else {
						$content['msg_error'] = 'Invalid Account';

						// echo "<pre>";
						// print_r ($content['msg_error']);
						// echo "</pre>";
					}
				}
			}
		}

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_baseindex', $content);
		$this->load->view("template/site_footer");
	}

	public function convertimages(){
		// $getall = $this->db->query("SELECT mot_id, mot_fb_img FROM motorcycles
		// 	where mot_fb_img not in ('deleted','none') order by mot_id DESC")->result_array();

		// foreach ($getall as $key) {
		// 	$mot_id = array($key["mot_id"]);
		// 	//print_r( $imagename = array($key["mot_fb_img"]));

		// 	$rename = substr($key["mot_fb_img"], 0, -4);
		// 	$rename1 = substr($rename, 20);
		// 	//$rename = 'kawasaki-ninja-400-black-fb';
		// 	$file = base_url().$key["mot_fb_img"];
		// 	$image = imagecreatefromstring(file_get_contents($file));
		// 	ob_start();
		// 	imagejpeg($image,NULL,100);
		// 	$cont = ob_get_contents();
		// 	ob_end_clean();
		// 	imagedestroy($image);
		// 	$content = imagecreatefromstring($cont);
		// 	$output = $rename.'.webp';
		// 	imagewebp($content,$output);
		// 	imagedestroy($content);
		// 	echo '<h4>Output Image Saved as '.$output.'</h4>';

		// 	//$this->model_base->update_data($key["mot_id"],$output,'mot_fb_img','motorcycles');
		// 	$data = array(
		// 		'mot_fb_img' => $output
		// 	);

		// 	echo $key["mot_id"]."<br>";
		// 	echo $output."<br>";
		// 	$this->model_base->updateimages($key["mot_id"],$data);
		// }

		$getallimages = $this->db->query("SELECT * FROM homepage_testimonial
			where status = 'published' order by testimonialid DESC")->result_array();

		foreach ($getallimages as $key) {
			$mot_id = array($key["testimonialid"]);
			//print_r( $imagename = array($key["mot_fb_img"]));

			$rename = substr($key["testimonialimg"], 0, -4);
			$rename1 = substr($rename, 20);
			//$rename = 'kawasaki-ninja-400-black-fb';
			$file = base_url().$key["testimonialimg"];
			$image = imagecreatefromstring(file_get_contents($file));
			ob_start();
			imagejpeg($image,NULL,100);
			$cont = ob_get_contents();
			ob_end_clean();
			imagedestroy($image);
			$content = imagecreatefromstring($cont);
			$output = $rename.'.webp';
			imagewebp($content,$output);
			imagedestroy($content);
			echo '<h4>Output Image Saved as '.$output.'</h4>';

			//$this->model_base->update_data($key["mot_id"],$output,'mot_fb_img','motorcycles');
			$data = array(
				'testimonialimg' => $output
			);

			$this->model_base->updateimages($key["testimonialid"],$data);
		}
	}
	
	public function showimagesfolder(){
		 //$all_files = glob("resources/site/newui-assets2/mgclub/*.*");
		$all_files = glob("resources/site/newui-assets2/landingimg/banner/*.*");
		  for ($i=0; $i<count($all_files); $i++)
		    {
		      $image_name = $all_files[$i];
		      $supported_format = array('jpg','jpeg','png');
		      $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
		      if (in_array($ext, $supported_format))
		          {
		            //echo '<img src="'.base_url().$image_name .'" alt="'.$image_name.'" />'."<br /><br />";
				    $link_array = explode('/',$image_name);
				    $page = end($link_array);

				    $rename = substr($page, 0, -4);

		            $image = imagecreatefromstring(file_get_contents($image_name));
					ob_start();
					imagejpeg($image,NULL,100);
					$cont = ob_get_contents();
					ob_end_clean();
					imagedestroy($image);
					$content = imagecreatefromstring($cont);
					$output = 'resources/site/newui-assets2/landingimg/banner/'.$rename.'.webp';
					imagewebp($content,$output);
					imagedestroy($content);
					echo '<h4>Output Image Saved as '.$output.'</h4>';

		          } else {
		              continue;
		          }
		    }
	}
	
	public function home() {
		$header = [];
		$header['header_title'] = 'Base';
		
		$content = [];
		$content['controller']=$this; 

		// echo "<pre>";
		// 				print_r ($this->session->all_userdata());
		// 				echo "</pre>";

		$this->db->flush_cache();
		$this->db->select_sum('bac_credit');
		$this->db->where('bac_type', 'accept');
		$this->db->where('bas_id', $this->session->userdata('bas_id') );
		$bases_credits = $this->db->get('bases_credits')->result_array();

		$this->db->flush_cache();
		$this->db->select_sum('bac_credit');
		$this->db->where('bac_type', 'release');
		$this->db->where('bas_id', $this->session->userdata('bas_id') );
		$bases_credits_minus = $this->db->get('bases_credits')->result_array();

		$content['total_bases_credits'] = $bases_credits[0]['bac_credit'] - $bases_credits_minus[0]['bac_credit'];

		

		if ( $this->input->post('add_player') ) {	
			$this->form_validation->set_rules('pla_name', 'Player Name', 'required|trim|max_lenght[10]|is_unique[players.pla_name]|required');
			$this->form_validation->set_rules('pla_fullname', 'Full Name', 'required|trim|max_lenght[100]|required');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
				// success
				$data = $this->input->post();
				array_pop($data);

				$data['pla_created'] = $this->getDatetimeNow();
				$this->model_base->insert_data($data, 'players');

				$this->session->set_flashdata('msg_success', 'Added player!');	
				redirect('base/home','refresh');
			}
		}

		if ( $this->input->post('add_credit') ) {	

			$data = $this->input->post();

			$players = $this->model_base->get_one($data['pla_name'], 'pla_name', 'players');

			// echo "<pre>";
			// print_r ($content['total_bases_credits']);
			// echo "</pre>";


			if ( $content['total_bases_credits'] >= 0 && $content['total_bases_credits'] >= $data['cre_credit']  ) {

				if ( count( $players) >= 1 && $players[0]['pla_status'] == 'active') {
				
					$this->form_validation->set_rules('pla_name', 'Player Name', 'required|trim|max_lenght[10]|required');
					$this->form_validation->set_rules('cre_credit', 'Credit', 'required|trim|required');

					if ($this->form_validation->run() == FALSE) {
						$content['msg_error'] = validation_errors();
					} else {
						// success
						
						array_pop($data);

						$data['cre_created'] = $this->getDatetimeNow();
						$this->model_base->insert_data($data, 'credits');

						$this->db->flush_cache();
						$data_base['bas_id'] =  $this->session->userdata('bas_id');
						$data_base['bac_credit'] =  $data['cre_credit'];
						$data_base['bac_from'] =  'admin';
						$data_base['bac_type'] =  'release';
						$data_base['bac_created'] = $this->getDatetimeNow();
						$this->model_base->insert_data($data_base, 'bases_credits');

						$this->session->set_flashdata('msg_success', 'Added load!');	
						redirect('base/home','refresh');
					}

				} else {
					$content['msg_error'] = 'Invalid Account';
				}

			} else {
				$content['msg_error'] = 'Insuficient amount of credits';
			}

		}

		$this->db->where('bas_id', $this->session->userdata('bas_id'));
		// $this->db->join('credits', 'credits.pla_name = players.pla_name', 'left');
		$content['players_sum'] = $this->model_base->get_all('players');
		// echo "<pre>";
		// print_r ($content['players']);
		// echo "</pre>";

		// $sum = array_reduce($content['players'], function ($a, $b) {
		//     isset($a[$b['pla_name']]) ? $a[$b['pla_name']]['cre_credit'] += $b['cre_credit'] : $a[$b['pla_name']] = $b;  
		//     return $a;
		// });

		// echo "<pre>";
		// print_r ( array_values($sum) );
		// echo "</pre>";

		// $content['players_sum'] = array_values($sum);




		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_base', $content);
		$this->load->view("template/site_footer");
	}

	public function withdraw ($pla_name) {
			// echo $pla_name;

		//echo $this->load_balance($pla_name);

		$credits['pla_name'] = $pla_name;
		// $credits['gam_id'] = $betval['gam_id'];
		$credits['cre_created'] = $this->getDatetimeNow();
		$credits['bas_id'] = $this->session->userdata('bas_id');
		$credits['cre_credit'] = $this->load_balance($pla_name);
		$credits['cre_type'] = 'release';

		// $base_credit['bas_id'] = $this->session->userdata('bas_id');
		// $base_credit['bac_from'] = 'player';
		// $base_credit['bac_created'] = $this->getDatetimeNow();
		// $base_credit['bac_credit'] = $this->load_balance($pla_name);
		// $base_credit['bac_type'] = 'accept';

		$this->db->flush_cache();
						$this->model_base->insert_data($credits, 'credits');

						// $this->db->flush_cache();
						// $this->model_base->insert_data($base_credit, 'bases_credits');

		redirect('base/home','refresh');
	}

	public function load_balance($pla_name) {
		$this->db->flush_cache();
			$this->db->select_sum('cre_credit');
			$this->db->where('players.pla_name', $pla_name);
			$this->db->where('players.pla_status', 'active');
			$this->db->where('players.bas_id', $this->session->userdata('bas_id'));
			$this->db->where('cre_type', 'accept');
			$this->db->join('players', 'players.pla_name = credits.pla_name', 'left outer');
			
			$credits = $this->db->get('credits')->result_array();

			// echo "<pre>";
			// print_r ($credits);
			// echo "</pre>";

			$this->db->flush_cache();
			$this->db->select_sum('cre_credit');
			$this->db->where('players.pla_name', $pla_name);
			$this->db->where('players.pla_status', 'active');
			$this->db->where('players.bas_id', $this->session->userdata('bas_id'));
			$this->db->where('cre_type', 'release');
			$this->db->join('players', 'players.pla_name = credits.pla_name', 'left outer');
			
			$credits_minus = $this->db->get('credits')->result_array();

			// echo "<pre>";
			// print_r ($credits_minus);
			// echo "</pre>";

			$echo = $credits[0]['cre_credit'] - $credits_minus[0]['cre_credit'];
			return $echo;
	}



	public function logout() {
       $this->session->sess_destroy();
       $this->nocache();    
       redirect('base', 'refresh'); 
   }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */