<?php
session_start();

$_SESSION['chk_field_id'] = $_POST['checkout_field_id'];

header('Location: checkout.php');

?>