<?php
define('BASEPATH', true);
define('APPPATH', __DIR__ . '/application/');
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../application/libraries/Excel_compat.php';
echo "PHPExcel class exists: ";
var_dump(class_exists('PHPExcel'));
$x = new PHPExcel();
echo "getActiveSheet available: ";
var_dump(method_exists($x, 'getActiveSheet'));
