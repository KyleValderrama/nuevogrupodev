<?php
session_start();
include_once('../../sqlconnect.php');

echo $_POST['field_name'].", ".$_POST['field_category'].", ".$_POST['field_address'].", ".$_POST['field_custom_id'].", ".$_POST['field_img_url'];
$sql = 'INSERT INTO fields (field_id, field_category, field_name, field_address, field_status, field_custom_id, field_img_url) VALUES (NULL, "'.$_POST['field_category'].'", "'.$_POST['field_name'].'", "'.$_POST['field_address'].'", 1, "'.$_POST['field_custom_id'].'", "'.$_POST['field_img_url'].'")';
$con->query($sql);

$sql2 = 'INSERT INTO admin_logs (admin_log_id, admin_log_name, admin_log_desc, admin_log_time) VALUES (NULL, "'.$_SESSION['name'].'", "added new Field in '.$_POST['field_category'].' - '.$_POST['field_custom_id'].'", current_timestamp())';
$con->query($sql2);


header('Location: ../admin/');
?>

