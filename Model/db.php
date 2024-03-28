<?php

$dbname = "doctor";
$dbuser = "root";
$dbpass = "";
$host   = "localhost";

function getConnection() {
    global $dbname, $dbpass, $host, $dbuser;

    // Create a connection to the database
    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

?>
