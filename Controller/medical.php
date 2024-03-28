<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_GET['patient_id'])) {

    $patientId = $_GET['patient_id'];
    

    if ($patientId == '') {
        echo "Error: Patient ID cannot be empty. <br>";
    } else {
     
        if (!ctype_digit($patientId) || $patientId <= 0) {
            echo "Error: Invalid Patient ID. Please provide a valid positive integer. <br>";
        } else {
     
            $prescription = [
                'patient_id' => $patientId,
            ];

         
            $prescriptions = getMedicalHistory($prescription);

       
            if ($prescriptions) {
                include '../View/medical.php';
            } else {
                echo "No medical history found for the provided Patient ID.";
            }
        }
    }
} else {

    echo "Error: Patient ID not provided in the request.";
}
?>
