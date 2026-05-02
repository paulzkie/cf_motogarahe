<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_info extends CI_Controller {

    public function index()
    {
        header('Content-Type: text/plain; charset=utf-8');

        echo "CI_VERSION: " . (defined('CI_VERSION') ? CI_VERSION : 'unknown') . PHP_EOL;
        echo "PHP version: " . phpversion() . PHP_EOL;
        echo "PHP SAPI: " . php_sapi_name() . PHP_EOL;
        echo "PHP binary: " . (defined('PHP_BINARY') ? PHP_BINARY : 'n/a') . PHP_EOL;
        echo "Loaded PHP ini: " . (php_ini_loaded_file() ?: 'n/a') . PHP_EOL;

        // Try to show base_url if available
        if (function_exists('base_url')) {
            echo "Base URL: " . base_url() . PHP_EOL;
        }

        // Database info (uses application config)
        $this->load->database();
        $db_name = isset($this->db->database) ? $this->db->database : 'unknown';
        $db_host = isset($this->db->hostname) ? $this->db->hostname : 'unknown';
        echo "DB name: " . $db_name . PHP_EOL;
        echo "DB host: " . $db_host . PHP_EOL;

        // Error reporting / display status
        echo "display_errors: " . ini_get('display_errors') . PHP_EOL;
        echo "error_reporting: " . error_reporting() . PHP_EOL;
    }
}
