<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

$whitelist = array(
    "127.0.0.1",
    "::1"
);

if(in_array($_SERVER["REMOTE_ADDR"], $whitelist)){
    define('BASE_URL', "http://localhost/cf_motogarahe/");
}
else{
}
//define('BASE_URL', "http://localhost/cf_motogarahe/");
//define('BASE_URL', "https://www.motogarahe.com/");
// define('BASE_URL', "https://25c4d63f.ngrok.io/cf_motogarahe/");

define('AUTHOR', " | Motogarahe.com");

define('ADMIN_CSS_PATH', BASE_URL . 'resources/admin/css/');
define('ADMIN_JS_PATH', BASE_URL . 'resources/admin/js/');
define('ADMIN_IMG_PATH', BASE_URL . 'resources/admin/img/');
define('ADMIN_LTE_PATH', BASE_URL . 'resources/admin/lte/');

define('SITE_CSS_PATH', BASE_URL . 'resources/site/css/');
define('SITE_JS_PATH', BASE_URL . 'resources/site/js/');
define('SITE_IMG_PATH', BASE_URL . 'resources/site/images/');
define('SITE_VID_PATH', BASE_URL . 'resources/site/video/');
define('SITE_ASSETS_PATH', BASE_URL . 'resources/site/assets/');

define('MEMBER_CSS_PATH', BASE_URL . 'resources/member/css/');
define('MEMBER_JS_PATH', BASE_URL . 'resources/member/js/');
define('MEMBER_IMG_PATH', BASE_URL . 'resources/member/img/');
define('MEMBER_LTE_PATH', BASE_URL . 'resources/member/lte/');


/* End of file constants.php */
/* Location: ./application/config/constants.php */