<?php
$db = new mysqli('localhost','root','','cf_motogarahe');
if($db->connect_error){echo 'CONNECT_ERR:'.$db->connect_error; exit(1);} 
$res = $db->query("SELECT acc_id,acc_username,acc_password,acc_status FROM accounts WHERE acc_username='admin'");
if(!$res){echo 'QUERY_ERR:'.$db->error; exit(1);} 
if($res->num_rows==0){echo 'NOT_FOUND'; exit(0);} 
while($row=$res->fetch_assoc()){echo json_encode($row)."\n";} 
$db->close();
