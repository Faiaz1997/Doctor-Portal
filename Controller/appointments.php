<?php

include('session.php');


require_once('../Model/appointment.php');


if (isset($_POST['submit'])) {
   
    $appointmentId = $_POST['appointment_id'];
    $status = $_POST['status'];

 
    if ($appointmentId == '' || $status == '') {
        echo "Error: Please fill in all required fields. <br>";
    } else {
       
        if (!ctype_digit($appointmentId) || $appointmentId <= 0) {
            echo "Error: Invalid Appointment ID. Please provide a valid positive integer. <br>";
        } else {
            
            $validStatusValues = array('Scheduled', 'Canceled', 'Completed');
            if (!in_array($status, $validStatusValues)) {
                echo "Error: Invalid Status. Please select a valid status from the options. <br>";
            } else {
               
                if (updateAppointmentStatus($appointmentId, $status)) {
                    header('Location: ../Controller/appointments.php');
                } else {
                    echo "Error: Failed to update appointment status. Please try again later.";
                }
            }
        }
    }
} else {
 
    $appointments = getAppointments();
    include '../View/appointment.php';
}
