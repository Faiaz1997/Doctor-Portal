<?php
session_start();


if(isset($_SESSION['status']) && $_SESSION['status'] == true) {
  
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['designation']);
    unset($_SESSION['name']);
    unset($_SESSION['password']);


    session_destroy();


    header('location: ../View/index.php');
} else {

    echo "Error: You are not logged in.";
}
?>