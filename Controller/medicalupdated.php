<?php

include('session.php');


require_once('../Model/medical.php');


if (isset($_POST['submit'])) {

    $prescriptionId = $_POST['prescription_id'];
    $history = $_POST['history'];
    $medicine = $_POST['medicine'];
    $test = $_POST['test'];
    $recommendation = $_POST['recommendation'];
    $date = $_POST['date'];
    $doctor = $_POST['doctor'];


    if ($prescriptionId == '' || $history == '' || $medicine == '' || $recommendation == '' || $test == '' || $doctor == '') {
        echo "Error: Please fill in all required fields. <br>";
    } else {
       
        if (!ctype_digit($prescriptionId) || $prescriptionId <= 0) {
            echo "Error: Invalid Prescription ID. Please provide a valid positive integer. <br>";
        } else {
         
            if (!preg_match("/.*/", $history) ||
                !preg_match("/.*/", $medicine) ||
                !preg_match("/.*/", $test) ||
                !preg_match("/.*/", $recommendation)) {
                echo "Error: Invalid input in text fields. Any character is allowed. <br>";
            } else {
             
                if (!preg_match("/^[a-zA-Z\s]+$/", $doctor)) {
                    echo "Error: Invalid input in doctor field. Only letters and spaces are allowed. <br>";
                } else {
                  
                    $prescription = [
                        'prescription_id' => $prescriptionId,
                        'history' => $history,
                        'medicine' => $medicine,
                        'test' => $test,
                        'recommendation' => $recommendation,
                        'date' => $date,
                        'doctor' => $doctor,
                    ];

                    $prescriptions = updateMedical($prescription);

                    if ($prescriptions) {
                        header('Location: ../Controller/home.php');
                    } else {
                        echo "Error: Failed to update Prescription. Please try again later. <br>";
                    }
                }
            }
        }
    }
} else {
    
    echo "Error: Null submission. <br>";
}
?>
