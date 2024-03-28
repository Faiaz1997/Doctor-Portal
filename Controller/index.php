<?php
session_start();

require_once('../Model/usermodel.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Error: Please fill in both email and password fields.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid email format.";
        } else {
            $result = validateUser($email, $password);
            if ($result) {
                echo "success"; 
            } else {
                echo "Error: Invalid email or password. Please check your credentials and try again.";
            }
        }
    }
} else {
    echo "Error: Invalid request.";
}
?>
