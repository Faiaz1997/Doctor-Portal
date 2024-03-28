<?php
session_start();
require_once('../Model/usermodel.php');


$errorflag = false;


if (isset($_POST['submit'])) {
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $password = $_POST['password'];


    if (empty($name) || empty($email) || empty($designation) || empty($password)) {
        echo "Null Submission <br>";
        $errorflag = true;
    } else {
      
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            echo "Invalid Name Format (Only letters and spaces allowed)<br>";
            $errorflag = true;
        }

     
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid Email Format<br>';
            $errorflag = true;
        }


        if (!preg_match("/^[a-zA-Z ]+$/", $designation)) {
            echo "Invalid Designation Format (Only letters and spaces allowed)<br>";
            $errorflag = true;
        }

   
        if (!preg_match("/[@$#%]/", $password) || strlen($password) < 4) {
            echo 'Password must contain at least one of the special characters (@, $, % or #) and be at least 4 characters long<br>';
            $errorflag = true;
        }
    }

   
    if (!$errorflag) {
        $user = [
            'name' => $name,
            'email' => $email,
            'designation' => $designation,
            'password' => $password,
        ];

        $result = insertUser($user);

        if ($result) {
            header('location: ../View/index.php');
        } else {
            echo "Failed to create user...";
        }
    }
} else {
    echo ('Null submission');
}
?>
