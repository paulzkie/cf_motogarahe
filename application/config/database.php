<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$query_builder = TRUE;


$whitelist = array(
	"127.0.0.1",
	"::1"
);

// Allow environment variables to override DB credentials (avoid storing secrets in repo)
$db_host = getenv('DB_HOST') ?: '';
$db_username = getenv('DB_USER') ?: '';
$db_password = getenv('DB_PASS') ?: '';
$db_database = getenv('DB_NAME') ?: '';

// Prefer local DB when running on this WAMP machine or common dev hostnames.
// This makes local debugging (assets, JS, etc.) reliable without hitting the
// remote production DB which may be inaccessible from the dev environment.
if (PHP_OS_FAMILY === 'Windows' || isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], $whitelist) || (isset($_SERVER['SERVER_NAME']) && in_array($_SERVER['SERVER_NAME'], array('localhost','127.0.0.1','motogarahe.local')))) {
	if (empty($db_host)) $db_host = "localhost";
	if (empty($db_username)) $db_username = "root";
	if ($db_password === '') $db_password = "";
	if (empty($db_database)) $db_database = "cf_motogarahe";
} else {
	if (empty($db_host)) $db_host = "srv1154.hstgr.io";
	if (empty($db_username)) $db_username = "u460154995_motogarahe";
	if ($db_password === '') $db_password = "";
	if (empty($db_database)) $db_database = "u460154995_motogarahe";
}
$db['default']['hostname'] = $db_host;
$db['default']['username'] = $db_username;
$db['default']['password'] = $db_password ;
$db['default']['database'] = $db_database;

// $db['default']['username'] = 'u347104106_moto';
// $db['default']['password'] = 'e/!wUR[=4NgHn6EK72';
// $db['default']['database'] = 'u347104106_motodb';

$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = FALSE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */

