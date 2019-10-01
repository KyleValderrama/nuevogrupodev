<?php
session_start();
include_once('../../sqlconnect.php');

//echo $_POST['res_cancel_id'];

$sql = "DELETE FROM fields WHERE field_custom_id = '".$_POST['del_field_id']."' ";
$con->query($sql);

$sql2 = 'INSERT INTO admin_logs (admin_log_id, admin_log_name, admin_log_desc, admin_log_time) VALUES (NULL, "'.$_SESSION['name'].'", "Deleted the field: '.$_POST['del_field_id'].'", current_timestamp())';
$con->query($sql2);


$_SESSION['deletefield'] = true;
header('Location: index.php');

?>