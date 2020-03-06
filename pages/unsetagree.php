<?php
session_start();

if(isset($_SESSION['agree'])){
    unset($_SESSION['agree']);
}

header('location: ../pages/')

?>