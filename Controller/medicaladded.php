<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_POST['submit'])) {
  
    $patientId = $_POST['patient_id'];
    $history = $_POST['history'];
    $medicine = $_POST['medicine'];
    $test = $_POST['test'];
    $recommendation = $_POST['recommendation'];
    $date = $_POST['date'];


    if ($patientId == '' || $history == '' || $medicine == '' || $recommendation == '' || $test == '' || $date == '') {
        echo "Error: Please fill in all required fields. <br>";
    } else {
   
        if (!ctype_digit($patientId) || $patientId <= 0) {
            echo "Error: Invalid Patient ID. Please provide a valid positive integer. <br>";
        } else {
           
            if (!preg_match("/.*/", $history) ||
                !preg_match("/.*/", $medicine) ||
                !preg_match("/.*/", $test) ||
                !preg_match("/.*/", $recommendation)) {
                echo "Error: Invalid input in text fields. Only alphanumeric characters, spaces, and punctuation marks are allowed. <br>";
            } else {
             
                $prescription = [
                    'patient_id'    => $patientId,
                    'history'       => $history,
                    'medicine'      => $medicine,
                    'test'          => $test,
                    'recommendation' => $recommendation,
                    'date'          => $date,
                ];

                $prescriptions = insertPrescription($prescription);

                if ($prescriptions) {
                    header("location: ../Controller/medical.php?patient_id=$patientId");
                    exit(); 
                } else {
                    echo "Error: Failed to add prescription. Please try again later.";
                }
            }
        }
    }
} else {

    echo "Error: Form not submitted.";
}
?>
