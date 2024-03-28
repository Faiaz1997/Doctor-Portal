<?php
include('session.php');
require_once('../Model/usermodel.php');
$errorMessages = [];

if (isset($_POST['submit'])) {

    $password = $_POST['password'];


    if (empty($password)) {
        $errorMessages[] = "Password cannot be empty";
    } else {
    
        if (!preg_match("/[@$#%]/", $password) || strlen($password) < 4) {
            $errorMessages[] = 'Password must contain at least one of the special characters (@, $, % or #) and be at least 4 characters long';
        }
    }

  
    if (empty($errorMessages)) {
 
        $result = updatePassword($_SESSION['id'], $password);

        
        if ($result) {
            
            header('Location: ../Controller/passupdate.php');
            exit();
        } else {
            $errorMessages[] = "Error updating profile";
        }
    }
} else {
 
    $users = getPassword();
  
    include '../View/passupdate.php';
}
?>
