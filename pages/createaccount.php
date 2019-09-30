<?php
include_once('sqlconnect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$con->query("INSERT INTO users (user_id, user_name, user_email, user_password, user_privilege) VALUES (NULL, '$name', '$email', '$password', 'user')");

session_start();
$_SESSION['createuser_token'] = true;
header("Location: login.php");

?>