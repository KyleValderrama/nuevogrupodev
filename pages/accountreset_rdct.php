<?php
session_start();
include_once('sqlconnect.php');



        if($_POST['new_pass'] == $_POST['confirm_pass'])
        {
            $sql = 'UPDATE users SET user_password = "'.$_POST['new_pass'].'" WHERE user_email = "'.$_SESSION['reset_email'].'"';
            $con->query($sql);

            unset($_SESSION['reset_email']);
            unset($_SESSION['reset_token']);

            $_SESSION['reset_success'] = true;

            header('Location: login.php');
        }
        else
        {
            $_SESSION['not_matched'] = true;
            header('Location: accountreset.php');
        }
?>