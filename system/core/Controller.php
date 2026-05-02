<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/*
	 * Declare commonly used properties to avoid dynamic property
	 * creation deprecation notices on newer PHP versions.
	 */
	public $benchmark;
	public $hooks;
	public $config;
	public $log;
	public $utf8;
	public $uri;
	public $exceptions;
	public $router;
	public $output;
	public $security;
	public $input;
	public $lang;
	public $db;
	public $session;
	public $form_validation;
	public $googlemaps;
	public $cart;
	public $pagination;
	public $model_base;
	public $model_login;

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
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
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}


	/**
	 * Back-compat helper methods (project-specific)
	 * These were present in the project's customized CI_Controller
	 * prior to upgrading the core. Reintroduce them so existing
	 * controllers that call have_sess_* and logout_* keep working.
	 */

	public function have_sess_user()
	{
		$this->nocache();
		if ($this->session->userdata('usr_type') == 'starter' || $this->session->userdata('usr_type') == 'sparkle') {
			return true;
		} else {
			return false;
		}
	}

	public function have_sess_admin()
	{
		$this->nocache();
		if ($this->session->userdata('acc_type') == 'super admin' && $this->session->userdata('acc_status') != 'deleted'
			|| $this->session->userdata('acc_type') == 'admin' && $this->session->userdata('acc_status') != 'deleted'
			|| $this->session->userdata('acc_type') == 'base' && $this->session->userdata('bas_status') != 'deleted') {
			return true;
		} else {
			return false;
		}
	}

	public function have_sess_superadmin()
	{
		$this->nocache();
		if ($this->session->userdata('acc_type') != 'super admin') {
			$this->logout_admin();
		} else {
			return true;
		}
	}

	public function have_sess_main()
	{
		$this->nocache();
		if ($this->session->userdata('bra_id') != 1) {
			$this->logout_admin();
		}
	}

	public function have_sess_branch()
	{
		$this->nocache();
		if ($this->session->userdata('deb_id') || $this->session->userdata('dea_id')) {
			return true;
		} else {
			return false;
		}
	}

	public function have_sess_brand()
	{
		$this->nocache();
		if ($this->session->userdata('dea_id')) {
			return true;
		} else {
			return false;
		}
	}

	public function logout_user()
	{
		$this->session->sess_destroy();
		$this->nocache();
		redirect('home', 'refresh');
	}

	public function logout_admin()
	{
		$this->session->sess_destroy();
		$this->nocache();
		redirect('admin/login', 'refresh');
	}

	public function logout_branch()
	{
		$this->session->sess_destroy();
		$this->nocache();
		redirect('dealer/login', 'refresh');
	}

	public function logout_brand()
	{
		$this->session->sess_destroy();
		$this->nocache();
		redirect('brand/login', 'refresh');
	}

	public function nocache()
	{
		header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		
		clearstatcache();
	}

	public function getDatetimeNow()
	{
		$tz_object = new DateTimeZone('Asia/Manila');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		return $datetime->format('Y\\-m\\-d\\ H:i:s');
	}

	public function godprint($data)
	{
		echo "<pre>";
		print_r ($data);
		echo "</pre>";
	}

	public function godprintp($data)
	{
		$this->godprint($data);
		return;
	}

}
