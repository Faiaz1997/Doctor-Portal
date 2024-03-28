<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_GET['prescription_id'])) {

    $prescriptionId = $_GET['prescription_id'];

   
    $success = deleteMedical($prescriptionId);

    if ($success) {
    
        header('Location: ../Controller/home.php');
        exit(); 
    } else {
        echo "Error: Failed to delete medical history. Please try again later.";
    }
} else {
    echo "Error: Prescription ID not provided for deletion.";
}
?>
