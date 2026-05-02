<?php
$db = new mysqli('localhost','root','','cf_motogarahe');
if($db->connect_error){echo 'CONNECT_ERR:'.$db->connect_error; exit(1);} 
$pw = md5('12345678');
$res = $db->query("UPDATE accounts SET acc_password='".$db->real_escape_string($pw)."' WHERE acc_username='admin'");
if(!$res){echo 'QUERY_ERR:'.$db->error; exit(1);} 
echo "UPDATED_ROWS: " . $db->affected_rows . "\n";
$db->close();
