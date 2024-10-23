<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session'));
		$this->load->model('model_base');

		if ( $this->have_sess_admin() != true ){
			$this->logout_admin();	
		}
	}

	public function index($filter = "" )
	{
		$header = [];
		$header['header_title'] = 'Notifications';
		$header['header'] = 'Notifications';
		$header['header_small'] = '';
		
		$content = [];
		
		$content['notifs'] = array();
		//$this->db->where('bra_status !=', 'deleted');
		//$branches = $this->model_base->get_all('branches');
		$this->db->join('categories', 'categories.cat_id = products.cat_id');
		$content['products'] = $this->model_base->get_all('products');

		$branches_count = 5;
		$i = 1;
		
		//$branches_count = $branches_count - 1;
		// echo $branches_count;
		while ( $i != $branches_count ) {
			
			foreach ( $content['products'] as $product ) {

				if ( $product['pro_bal_stock'] > $this->get_stocks_counts( $product['pro_id'], $i, 'published' ) ) {

					

					$data['branch_name'] = $this->get_branchname($i);
					$data['product'] = $product['pro_name'];
					$data['category'] = $product['cat_name'];
					$data['stock'] = $product['pro_bal_stock'];
					$data['message'] = "running out of stock. stock is now " . $this->get_stocks_counts( $product['pro_id'], $i, 'published' ) . "!" ;

					array_push($content['notifs'], $data);

				}	
				
			}
			
			$i = $i + 1;
		}



		// echo "<pre>";
		// print_r ($content['notifs']);
		// echo "</pre>";

		$this->load->view("template/admin_header", $header);
		$this->load->view('admin/notifications/index', $content);
		$this->load->view("template/admin_footer");
	}

	public function get_branchname ($bra_id) {
		$data = $this->model_base->get_one($bra_id, "bra_id", "branches");
		return $data[0]['bra_name'];
	}

	public function get_stocks_counts ($pro_id, $bra_id, $status) {
		$overall_stocks = 0;
		$overall_stocks_sub = 0;
		$total = 0;

		$this->db->flush_cache();
			
		// gets sum of all inventory
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'add');
		$this->db->where('inventory_info.bra_id_to', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks = $overall_stocks + $inventory[0]['ini_qty'];

		$this->db->flush_cache();

		// SUM ALL SUBTRACT PRODUCTS
		$this->db->select_sum('ini_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('ini_type', 'sub');
		$this->db->where('inventory_info.bra_id_from', $bra_id);
		$this->db->where('int_status', $status);
		$this->db->join('inventory', 'inventory.int_id = inventory_info.int_id');
		$inventory = $this->db->get('inventory_info')->result_array();
		$overall_stocks_sub = $overall_stocks_sub + $inventory[0]['ini_qty'];
		$total  = $overall_stocks - $overall_stocks_sub;

		$this->db->flush_cache();
		
		// gets sum of all stocks
		$this->db->select_sum('sti_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('stocks.bra_id', $bra_id);
		$this->db->join('stocks', 'stocks.sto_id = stocks_info.sto_id');
		$warehouse = $this->db->get('stocks_info')->result_array();
		$total = $total + $warehouse[0]['sti_qty'];

		$this->db->flush_cache();
		$this->db->select_sum('sai_qty');
		$this->db->where('pro_id', $pro_id);
		$this->db->where('sales.bra_id', $bra_id);
		$this->db->where('sales.sal_status', 'published');
		$this->db->join('sales', 'sales.sal_id = sales_info.sal_id');
		$sales = $this->db->get('sales_info')->result_array();
		$total = $total - $sales[0]['sai_qty'];

		// }

		return $total;
	}
}