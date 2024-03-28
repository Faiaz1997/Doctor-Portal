<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_GET['prescription_id'])) {

    $prescriptionId = $_GET['prescription_id'];


    if ($prescriptionId == '') {
        echo "Error: Null Submission <br>";
    } else {

        if (!ctype_digit($prescriptionId) || $prescriptionId <= 0) {
            echo "Error: Invalid Prescription ID. Please provide a valid positive integer. <br>";
        } else {
      
            $prescription = [
                'prescription_id' => $prescriptionId,
            ];

          
            $prescriptions = getMedicalUpdate($prescription);

         
            if ($prescriptions) {
          
                include '../View/medicalupdate.php';
            } else {
                echo "Error: Medical history doesn't match. <br>";
            }
        }
    }
} else {
 
    echo "Error: Null submission. <br>";
}
