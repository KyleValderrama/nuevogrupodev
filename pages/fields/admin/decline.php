<?php 
session_start();
include_once('../../sqlconnect.php');

$sql='DELETE FROM reservations WHERE res_field_id = "'.$_POST['res_id'].'"';
$con->query($sql);

$sql2 = "INSERT INTO admin_logs (admin_log_id, admin_log_name, admin_log_desc, admin_log_time) VALUES (NULL, '".$_SESSION['name']."', 'Deleted the reservation for field: ".$_POST['res_id']."', current_timestamp() ) ";
$con->query($sql2);

$sql3='UPDATE fields SET field_status = 1 WHERE field_custom_id = "'.$_POST['res_id'].'"';
$con->query($sql3);

$_SESSION['declined'] = true;
header('Location: reservations.php');

?>