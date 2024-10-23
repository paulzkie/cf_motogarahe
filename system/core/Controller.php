<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

	public function have_sess_user(){
		$this->nocache();
		if ($this->session->userdata('usr_type') == 'starter' || $this->session->userdata('usr_type') == 'sparkle') {
			return true;
		} else {
			return false;
		}
	}

	public function have_sess_admin(){
		$this->nocache();
		if ($this->session->userdata('acc_type') == 'super admin' && $this->session->userdata('acc_status') != 'deleted' 
			|| $this->session->userdata('acc_type') == 'admin' && $this->session->userdata('acc_status') != 'deleted'
			|| $this->session->userdata('acc_type') == 'base' && $this->session->userdata('bas_status') != 'deleted') {
			return true;
		} else {
			return false;
		}
	}

	public function have_sess_superadmin(){
		$this->nocache();
		if ($this->session->userdata('acc_type') != 'super admin') {
			$this->logout_admin();
		} else {
			return true;
		}
	}

	public function have_sess_main(){
		$this->nocache();
		if ($this->session->userdata('bra_id') != 1) {
			$this->logout_admin();
		}
	}

	public function logout_user() {
        $this->session->sess_destroy();
        $this->nocache();    
        redirect('home', 'refresh'); 
    }

    public function logout_admin() {
        $this->session->sess_destroy();
        $this->nocache();    
        redirect('admin/login', 'refresh'); 
    }

	public function nocache()
    {
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        clearstatcache() ;
    } 

    public function getDatetimeNow() {
	    $tz_object = new DateTimeZone('Asia/Manila');
	    $datetime = new DateTime();
	    $datetime->setTimezone($tz_object);
	    return $datetime->format('Y\-m\-d\ H:i:s');
	}

	public function godprint($data) {
		echo "<pre>";
		print_r ($data);
		echo "</pre>";
	}

	public function godprintp($data) {
		$this->godprint($data);
		// break;
		return;
	}

}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */