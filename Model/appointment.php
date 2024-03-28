<?php

require_once('db.php');

function getAppointments() {
    $conn = getConnection();


    $sql = "SELECT patient.id, patient.name, appointments.date, appointments.status, appointments.id FROM patient JOIN appointments ON patient.id = appointments.patient_id WHERE appointments.doctor_id = ?";
    
   
    $stmt = mysqli_prepare($conn, $sql);

    
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);

  
    mysqli_stmt_execute($stmt);

 
    $result = mysqli_stmt_get_result($stmt);

    $appointments = array();


    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

   
    mysqli_stmt_close($stmt);

    return $appointments;
}

function getScheduledAppointments() {
    $conn = getConnection();

  
    $sql = "SELECT patient.id, patient.name, appointments.date, appointments.status FROM patient JOIN appointments ON patient.id = appointments.patient_id WHERE appointments.status = 'Scheduled' AND appointments.doctor_id = ?";

 
    $stmt = mysqli_prepare($conn, $sql);

   
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);

    
    mysqli_stmt_execute($stmt);

   
    $result = mysqli_stmt_get_result($stmt);

    $appointments = array();

  
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    
    mysqli_stmt_close($stmt);

    return $appointments;
}

function updateAppointmentStatus($appointmentId, $status) {
    $conn = getConnection();


    $sql = "UPDATE appointments SET status = ? WHERE id = ?";


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "si", $status, $appointmentId);

 
    $success = mysqli_stmt_execute($stmt);

 
    mysqli_stmt_close($stmt);

    return $success;
}

?>
