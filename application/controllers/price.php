<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {

	private $currency = 'USD'; // currency for the transaction
	private $ec_action = 'Sale'; // for PAYMENTREQUEST_0_PAYMENTACTION, it's either Sale, Order or Authorization

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'cart'));
		$this->load->model('model_base');
		$this->load->model('model_login');

		// if ( $this->session->userdata('usr_id') ) {
		// 	$account_info = $this->model_base->get_one($this->session->userdata('usr_id'), "usr_id", "users");
		// 	if ( $account_info[0]['usr_session'] != $this->session->userdata('session_id') ){
		// 		$this->logout_user();	
		// 	}
		// }

		$paypal_credentials = array(
			'API_username' => 'm-beatortreat_api1.gmail.com', 
			'API_signature' => 'ADj7UVX-G23LofpaFx1n0qYcxvwxAzoZL9SZ-rOheo7BdcfPLihwOpMT', 
			'API_password' => '7VK44L5MG3SLVGZ6',
			// Paypal_ec defaults sandbox status to true
			// Change to false if you want to go live and
			// update the API credentials above

			// 'API_username' => 'mi17kko20_api1.gmail.com', 
			// 'API_signature' => 'AnCkIJdUn07HkaXk-YgqYs6rrI8jAiT-cXk1ebCRj3vTrUlyGmv4u00n', 
			// 'API_password' => 'G78LTTFFJ4G92BYD',

			// 'sandbox_status' => false,
		);

		$this->load->library('paypal_ec', $paypal_credentials);
	}

	public function index()
	{

		// $this->useraccount->pota();
		$header = [];
		$header['header_title'] = 'Price';
		
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
				redirect('price','refresh');
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




		$this->db->flush_cache();
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

		$this->load->view("template/site_header", $header);
		$this->load->view('site/view_price', $content);
		$this->load->view("template/site_footer");
	}

	public function process_payment() {
		if ( $this->session->userdata('usr_id') ) {
			$this->buy();	
		} else {
			$this->session->set_flashdata('msg_error', 'Need to Sign In');	
			redirect('price','refresh');
		}	

	}

	/*******************************
	*
	*              Paypal
	*
	*********************************/

	public function payed() {
		//SALE PROCESS IN DATABASE
		
	}

	//PAYPAL

	/* -------------------------------------------------------------------------------------------------
	* a sample buy function in your Controller that does the SetExpressCheckout and redirects to Paypal
	* --------------------------------------------------------------------------------------------------
	*/
	function buy() {
		$to_buy = array(
			'desc' => 'Boutiquetracks', 
			'currency' => $this->currency, 
			'type' => $this->ec_action, 
			'return_URL' => site_url('price/back'), 
			// see below have a function for this -- function back()
			// whatever you use, make sure the URL is live and can process
			// the next steps
			'cancel_URL' => site_url('price'), // this goes to this controllers index()
			'shipping_amount' => 0.00, 
			'get_shipping' => false);
		// I am just iterating through $this->product from defined
		// above. In a live case, you could be iterating through
		// the content of your shopping cart.
		
		// $product = array(
		// 	'name' => 'Premium Boutiquetracks Plan', 
		// 	'desc' => 'Premium Boutiquetracks Plan', 
		// 	'price' => 300.00
		// );

		// $product[] = [];
		// $product[]['name'] = 'Premium Boutiquetracks Plan';
		// $product[]['desc'] = 'Premium Boutiquetracks Plan';
		// $product[]['price'] = 300.00;
		// $this->godprint($product);

		$product = array(
				array('name' => 'Premium Boutiquetracks Plan', 
					'desc' => 'Premium Boutiquetracks Plan', 
					'price' => 300.00),
		);


		foreach($product as $p) {
			// $this->godprintp($p);
			$temp_product = array(
				'name' => $p["name"], 
				'desc' => $p["desc"],
				'quantity' => 1, // simple example -- fixed to 1
				'amount' => $p['price']);
				
			// add product to main $to_buy array
			$to_buy['products'][] = $temp_product;
		}
		// enquire Paypal API for token
		$set_ec_return = $this->paypal_ec->set_ec($to_buy);
		if (isset($set_ec_return['ec_status']) && ($set_ec_return['ec_status'] === true)) {
			// redirect to Paypal
			$this->paypal_ec->redirect_to_paypal($set_ec_return['TOKEN']);
			// You could detect your visitor's browser and redirect to Paypal's mobile checkout
			// if they are on a mobile device. Just add a true as the last parameter. It defaults
			// to false
			// $this->paypal_ec->redirect_to_paypal( $set_ec_return['TOKEN'], true);
		} else {
			$this->_error($set_ec_return);
		}
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a sample back function that handles
	* --------------------------------------------------------------------------------------------------
	*/
	function back() {
		// we are back from Paypal. We need to do GetExpressCheckoutDetails
		// and DoExpressCheckoutPayment to complete.
		$token = $_GET['token'];
		$payer_id = $_GET['PayerID'];
		// GetExpressCheckoutDetails
		$get_ec_return = $this->paypal_ec->get_ec($token);
		if (isset($get_ec_return['ec_status']) && ($get_ec_return['ec_status'] === true)) {
			// at this point, you have all of the data for the transaction.
			// you may want to save the data for future action. what's left to
			// do is to collect the money -- you do that by call DoExpressCheckoutPayment
			// via $this->paypal_ec->do_ec();
			//
			// I suggest to save all of the details of the transaction. You get all that
			// in $get_ec_return array
			$ec_details = array(
				'token' => $token, 
				'payer_id' => $payer_id, 
				'currency' => $this->currency, 
				'amount' => $get_ec_return['PAYMENTREQUEST_0_AMT'], 
				'IPN_URL' => site_url('test/ipn'), 
				// in case you want to log the IPN, and you
				// may have to in case of Pending transaction
				'type' => $this->ec_action);
				
			// DoExpressCheckoutPayment
			$do_ec_return = $this->paypal_ec->do_ec($ec_details);
			if (isset($do_ec_return['ec_status']) && ($do_ec_return['ec_status'] === true)) {
				// at this point, you have collected payment from your customer
				// you may want to process the order now.
				// $this->payed();

				$data_sales['usr_id'] = $this->session->userdata('usr_id');
				$data_sales['usr_email'] = $this->session->userdata('usr_email');
				$data_sales['sal_total'] = 300.00;
				// $this->godprint($data_sales);
				// $this->model_base->insert_data($data_sales, 'sales');
				$this->db->insert('sales', $data_sales);

				$last_id = $this->db->insert_id();
				$this->db->flush_cache();

				$product = array(
						array('name' => 'Premium Boutiquetracks Plan', 
							'desc' => 'Premium Boutiquetracks Plan', 
							'price' => 300.00),
				);

				foreach($product as $item) {
					// $this->godprintp($item);
					$data_items = [];
					$data_items['sal_id'] = $last_id;
					$data_items['usr_id'] = $this->session->userdata('usr_id');
					$data_items['son_amount'] = $item["price"];
					$data_items['title'] = 'Premium Boutiquetracks Plan';
					$this->model_base->insert_data($data_items, 'sales_items');
				}

				$this->cart->destroy();
				// $this->session->sess_destroy();
				$this->db->flush_cache();

				$subscribe = [];
				$subscribe['uss_date'] = $this->getDatetimeNow();
				$subscribe['uss_status'] = 'active';
				$subscribe['uss_date_start'] = $this->getDatetimeNow();
				$subscribe['uss_date_end'] = date("Y\-m\-d\ H:i:s", strtotime('today GMT' . ' + 1 year'));
				$this->model_base->insert_data($subscribe, 'users_subscriptions');

				$last_id2 = $this->db->insert_id();

				$data_users['uss_id'] = $last_id2;
				$this->model_base->update_data($this->session->userdata('usr_id'), 'usr_id', $data_users, 'users');

				echo "<h1>Thank you. We will process your order now.</h1>";
				// echo "<pre>";
				// echo "\nGetExpressCheckoutDetails Data\n" . print_r($get_ec_return, true);
				// echo "\n\nDoExpressCheckoutPayment Data\n" . print_r($do_ec_return, true);
				// echo "</pre>";
				echo "<a href='http://boutiquetracks.com/'>go back to our site</a>";
			} else {
				$this->_error($do_ec_return);
			}
		} else {
			$this->_error($get_ec_return);
		}
	}
	
	/* -------------------------------------------------------------------------------------------------
	* The location for your IPN_URL that you set for $this->paypal_ec->do_ec(). obviously more needs to
	* be done here. this is just a simple logging example. The /ipnlog folder should the same level as
	* your CodeIgniter's index.php
	* --------------------------------------------------------------------------------------------------
	*/
	function ipn() {
		$logfile = 'ipnlog/' . uniqid() . '.html';
		$logdata = "<pre>\r\n" . print_r($_POST, true) . '</pre>';
		file_put_contents($logfile, $logdata);
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a simple message to display errors. this should only be used during development
	* --------------------------------------------------------------------------------------------------
	*/
	function _error($ecd) {
		echo "<br>error at Express Checkout<br>";
		echo "<pre>" . print_r($ecd, true) . "</pre>";
		echo "<br>CURL error message<br>";
		echo 'Message:' . $this->session->userdata('curl_error_msg') . '<br>';
		echo 'Number:' . $this->session->userdata('curl_error_no') . '<br>';
	}
}