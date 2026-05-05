<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgclub extends CI_Controller {

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

	public function index($search_type = "xallx", $search_val ="xallx", $filter = 1 )
	{
		$header = [];
		$header['header_title'] = 'MG Club';
		$header['header'] = 'MG Club';
		$header['header_small'] = '';
		
		$content = [];
		
		// $config = array();
		// $config["base_url"] = base_url() . "admin/mgclub/index/". $search_type ."/". $search_val ."/";
		// $total_row = $this->model_base->count_data('mgclubmembers');
		// $config["total_rows"] = $total_row;
		// $config['per_page'] = 20;
		// $config['uri_segment'] = 6;
		// $config['num_links'] = $total_row;
		// $config['use_page_numbers'] = TRUE;
		// $config['full_tag_open'] = '<ul class="pagination">';
		// $config['full_tag_close'] = '</ul>';
		// $config['prev_link'] = 'Previous';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active"><a href="">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['next_link'] = 'Next';

		// $this->pagination->initialize($config);

		// $offset = ($filter - 1) * $config["per_page"];
		// $this->db->limit( $config["per_page"] , $offset);
		// $content["current_count_start"] = $offset;	
		
		//$this->_sort($search_type, $search_val );
		$content['mgclub'] = $this->model_base->get_all('mgclubmembers');

		$this->load->view("template/admin_header", $header);
		$this->load->view("template/popupmsg");
		$this->load->view('admin/accounts/mgclub', $content);
		$this->load->view("template/admin_footer");
	}

	function itexmo($number, $message, $apicode, $passwd){
		$ch = curl_init();
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		 curl_setopt($ch, CURLOPT_POSTFIELDS, 
				  http_build_query($itexmo));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		return curl_exec ($ch);
		curl_close ($ch);
	}

	public function addmgclubmember(){

 		// upload mot img start
 		if($this->input->post("addmgclub")=="addmgclub"){
		if(empty($this->input->post("accountno"))) {
			echo "Enter account number!";
		}
		else if(empty($this->input->post("fullname"))){
				echo "Enter full name!";
		}
		else if(empty($this->input->post("contactno"))){
				echo "Enter contact number!";
		}
		else {	
			$accountno = $this->input->post("accountno");
			if($this->model_base->get_one($accountno,'accountno','mgclubmembers')){
				echo "This account number is exist in database!";
			}
			else{
				$this->load->library('upload');

				$data = array();
				$data["accountno"] = $this->input->post("accountno");
				$data["fullname"] = $this->input->post("fullname");
				$data["address"] = $this->input->post("address");
				$data["contactno"] = $this->input->post("contactno");
				$data["email"] = $this->input->post("email");
				$data["status"] = $this->input->post("mot_status");
				$data["datecreated"] = $this->getDatetimeNow();

				$mgclubimg = $_FILES['mgclubimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				$msg = 'Thank you '.$data["fullname"]. "\n". 
					   'for buying your dream motorcycle through'."\n".
					   'www.motogarahe.com. Your'."\n".
					   'account number is '.$data["accountno"].'.'."\n".
					   'You are now a member of'."\n".
					   'MG Club for 2 years. Visit'."\n".
					   'https://www.motogarahe.com/mgclub for more information.'."\n".
					   'Thanks!';

				if (empty($mgclubimg)) {

					if ( $data["contactno"] ) {
						$zero = substr($data["contactno"], 0, 1);
                        $add = '';
                        $cp = '';
                        if($zero == "0"){
                        	$add = '0';
                        	$cp = $add.$data["contactno"];
                        	$this->itexmo( $cp, $msg , 'PR-MOTOG075800_3LKG5', 'mmlpfrk4bu');
                        }else{
                        	$this->itexmo( $data["contactno"], $msg , 'PR-MOTOG075800_3LKG5', 'mmlpfrk4bu');
                        }
						
					}

					$this->model_base->insert_data($data, 'mgclubmembers');
					echo "MG Club member added!";
				}else{	

		                $_FILES['file']['name']     = $_FILES['mgclubimg']['name'];
		                $_FILES['file']['type']     = $_FILES['mgclubimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['mgclubimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['mgclubimg']['error'];
		                $_FILES['file']['size']     = $_FILES['mgclubimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/banner';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();

		                    // $this->godprint($fileData);

		                    $data['mgclubimg'] = 'resources/site/newui-assets2/landingimg/banner/' . $fileData['file_name'];

		                    // $this->godprint($data);
		                    if ( $data["contactno"] ) {
								$this->itexmo( $data["contactno"], $msg , 'PR-MOTOG075800_3LKG5', 'mmlpfrk4bu');
							}
		                    $this->model_base->insert_data($data, 'mgclubmembers');
		                }
					echo "MG Club member added!";	
				}
			  }
		  	} // upload mot img end	
		}
	}

	public function updatemgclubmember(){

 		// upload mot img start
 		if($this->input->post("updatemgclub")=="updatemgclub"){
		if(empty($this->input->post("accountno"))) {
			echo "Enter account number!";
		}
		else if(empty($this->input->post("fullname"))){
				echo "Enter full name!";
		}
		else if(empty($this->input->post("contactno"))){
				echo "Enter contact number!";
		}
		else {	
				$this->load->library('upload');
				// $data = $this->input->post("");
				$data = array();
				$mgclubid = $this->input->post("mgclubid");
				$data["accountno"] = $this->input->post("accountno");
				$data["fullname"] = $this->input->post("fullname");
				$data["address"] = $this->input->post("address");
				$data["contactno"] = $this->input->post("contactno");
				$data["email"] = $this->input->post("email");
				$data["status"] = $this->input->post("mot_status");
				//$data["datecreated"] = $this->getDatetimeNow();
				$mgclubimg = $_FILES['mgclubimg']['name']; // web img
				//$this->godprint($ImageCount); // web img

				$dataInfo = [];

				if (empty($mgclubimg)) {
					$this->model_base->update_data($mgclubid,'mgclubid',$data, 'mgclubmembers');
					echo "MG Club member updated!";
				}else{	

		                $_FILES['file']['name']     = $_FILES['mgclubimg']['name'];
		                $_FILES['file']['type']     = $_FILES['mgclubimg']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['mgclubimg']['tmp_name'];
		                $_FILES['file']['error']     = $_FILES['mgclubimg']['error'];
		                $_FILES['file']['size']     = $_FILES['mgclubimg']['size'];
		                
		                // File upload configuration
		                $uploadPath = './resources/site/newui-assets2/landingimg/banner';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png';
		                $config['encrypt_name'] = FALSE; 
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();

		                   // $this->godprint($fileData);

		                    $data['mgclubimg'] = 'resources/site/newui-assets2/landingimg/banner/' . $fileData['file_name'];

		                    // $this->godprint($data);
		                    $this->model_base->update_data($mgclubid,'mgclubid',$data, 'mgclubmembers');
		                }
					echo "MG Club member updated!";	
				}
		  	} // upload mot img end	
		}
	}

	public function removemgclubmember() {
		if($this->input->post("mgclub")=="mgclub"){
			$mgclubid = $this->input->post("id");
			$content['mgclub'] = $this->model_base->delete_data($mgclubid, 'mgclubid', 'status', 'mgclubmembers');
		}
		echo "Data deleted!";
	}
	public function updatepassword(){
		$this->db->join('dealers b','a.dea_id=b.dea_id');
		$this->db->order_by('b.dea_name', 'asc');
		$dealerdata = $this->model_base->get_all('dealers_branches a');
		echo '<table>
			<tr>
				<td>ID</td>
				<td>Dealer Name</td>
				<td>Branches</td>
				<td>Username</td>
				<td>Password</td>
			</tr>';
		foreach ($dealerdata as $key) {
			echo 
			'<tr>
			<td>'.$key['deb_id'].'</td>
			<td>'.$key['dea_name'].'</td>
			<td>'.$key['name'].'</td>
			<td>'.$key['acc_username'].'</td>
			<td>'.$key['acc_password'].'</td>
			</tr>';
		}
		echo '</table>';
	}

}