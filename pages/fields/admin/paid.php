<?php 
session_start();
include_once('../../sqlconnect.php');

$sql = "UPDATE reservations SET res_payment_status = 1 WHERE res_field_id = '".$_POST['res_id']."' ";
$con->query($sql);

$sql2 = "INSERT INTO admin_logs (admin_log_id, admin_log_name, admin_log_desc, admin_log_time) VALUES (NULL, '".$_SESSION['name']."', 'Approved the payment for field: ".$_POST['res_id']."', current_timestamp() ) ";
$con->query($sql2);

$_SESSION['paid'] = true;
header('Location: reservations.php');

?>