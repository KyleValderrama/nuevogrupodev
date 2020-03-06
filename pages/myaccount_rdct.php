<?php
session_start();
include_once('sqlconnect.php');

$_SESSION['name'] = $_POST['user_name'];
$_SESSION['email'] = $_POST['user_email'];


if(!isset($_POST['change_pass']))
{
    $sql = 'UPDATE users SET user_name = "'.$_SESSION['name'].'", user_email = "'.$_SESSION['email'].'" WHERE user_id = "'.$_SESSION['id'].'"';
    $con->query($sql);

    $_SESSION['saved'] = true;
    header('Location: myaccount.php');
}
else
{
    if($_SESSION['password'] == $_POST['old_pass'])
    {
        if($_POST['new_pass'] == $_POST['confirm_pass'])
        {
            $sql = 'UPDATE users SET user_name = "'.$_SESSION['name'].'", user_email = "'.$_SESSION['email'].'" , user_password = "'.$_POST['new_pass'].'" WHERE user_id = "'.$_SESSION['id'].'"';
            $con->query($sql);

            $_SESSION['password'] = $_POST['new_pass'];
            $_SESSION['change_pass'] = true;

            header('Location: myaccount.php');
        }
        else
        {
            $_SESSION['not_matched'] = true;
            header('Location: myaccount.php');
        }
    }
    else
    {
        $_SESSION['wrong_pass'] = true;
        header('Location: myaccount.php'); 
    }
}



?>