<?php
require_once('db.php');

function insertUser($user){
    $conn = getConnection();

    
    $sql = "INSERT INTO registration VALUES('', ?, ?, ?, ?)";
    
  
    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "ssss", $user['name'], $user['email'], $user['designation'], $user['password']);


    $success = mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);

    return $success;
}

function validateUser($email, $password)
{
    $conn = getConnection();

  
    $sql = "SELECT * FROM registration WHERE email=? AND password=?";
    
  
    $stmt = mysqli_prepare($conn, $sql);

   
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);


    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);


        setcookie('user_id', $row['id'], time() + (86400 * 30), "/"); // 86400 seconds = 1 day
        setcookie('user_email', $row['email'], time() + (86400 * 30), "/");
        setcookie('user_designation', $row['designation'], time() + (86400 * 30), "/");
        setcookie('user_name', $row['name'], time() + (86400 * 30), "/");
        setcookie('user_password', $row['password'], time() + (86400 * 30), "/");

        
        $_SESSION['status'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['designation'] = $row['designation'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['password'] = $row['password'];

        return true;
    } else {
        return false;
    }
}

function getUser(){
    $conn = getConnection();

    
    $sql = "SELECT * FROM registration WHERE Name = ? AND id = ?";
    
   
    $stmt = mysqli_prepare($conn, $sql);

  
    mysqli_stmt_bind_param($stmt, "si", $_SESSION['name'], $_SESSION['id']);

   
    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    $users = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

 
    mysqli_stmt_close($stmt);

    return $users;
}

function updateuser($user){
    $conn = getConnection();

  
    $sql = "UPDATE registration SET name = ?, email = ?, designation = ?, password = ? WHERE id = ?";
    
 
    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "ssssi", $user['name'], $user['email'], $user['designation'], $user['password'], $_SESSION['id']);


    $success = mysqli_stmt_execute($stmt);


    $_SESSION['email'] = $user['email'];
    $_SESSION['designation'] = $user['designation'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['password'] = $user['password'];


    mysqli_stmt_close($stmt);

    return $success;
}

function getPassword() {
    $conn = getConnection();

   
    $sql = "SELECT password FROM registration WHERE Name = ? AND id = ?";
    
   
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $_SESSION['name'], $_SESSION['id']);
    mysqli_stmt_execute($stmt);

  
    $result = mysqli_stmt_get_result($stmt);

    $user = mysqli_fetch_assoc($result);


    mysqli_stmt_close($stmt);

    return $user['password'];
}

function updatePassword($userId, $newPassword) {
    $conn = getConnection();

 
    $sql = "UPDATE registration SET password = ? WHERE id = ?";
    
  
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newPassword, $userId);
    $success = mysqli_stmt_execute($stmt);

   
    $_SESSION['password'] = $newPassword;


    mysqli_stmt_close($stmt);

    return $success;
}

?>
