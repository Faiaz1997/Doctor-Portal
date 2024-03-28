<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_GET['patient_id'])) {
 
    $patientId = $_GET['patient_id'];

    
    if ($patientId == '') {
        echo "Error: Null Submission <br>";
    } else {
       
        if (!ctype_digit($patientId) || $patientId <= 0) {
            echo "Error: Invalid Patient ID. Please provide a valid positive integer. <br>";
        } else {
            
            $prescription = [
                'patient_id' => $patientId,
            ];

           
            $prescriptions = getPatientHistory($prescription);

          
            if ($prescriptions) {
               
                include '../View/addprescription.php';
            } else {
                echo "Error: Patient not found. <br>";
            }
        }
    }
} else {
   
    echo "Error: Null submission. <br>";
}
?>
