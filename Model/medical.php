<?php

require_once('db.php');


function getMedicalHistory($prescription) {
    $conn = getConnection();

   
    $sql = "SELECT patient.name, prescription.history, prescription.id, prescription.patient_id, prescription.medicine, prescription.test, prescription.recommendation, prescription.date, prescription.doctor 
            FROM patient 
            JOIN prescription ON patient.id = prescription.patient_id 
            WHERE patient.id = ?";


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "i", $prescription['patient_id']);

 
    mysqli_stmt_execute($stmt);

 
    $result = mysqli_stmt_get_result($stmt);

    $prescriptions = [];

 
    while ($row = mysqli_fetch_assoc($result)) {
        $prescriptions[] = $row;
    }


    mysqli_stmt_close($stmt);

    return $prescriptions;
}


function getPatientHistory($prescription) {
    $conn = getConnection();

    
    $sql = "SELECT id, name FROM patient WHERE id = ?";

  
    $stmt = mysqli_prepare($conn, $sql);

  
    mysqli_stmt_bind_param($stmt, "i", $prescription['patient_id']);

   
    mysqli_stmt_execute($stmt);

  
    $result = mysqli_stmt_get_result($stmt);

    $patients = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $patients[] = $row;
    }


    mysqli_stmt_close($stmt);

    return $patients;
}


function getMedicalUpdate($prescription) {
    $conn = getConnection();


    $sql = "SELECT patient.name, prescription.history, prescription.id, prescription.medicine, prescription.test, prescription.recommendation, prescription.date, prescription.doctor 
            FROM patient 
            JOIN prescription ON patient.id = prescription.patient_id 
            WHERE prescription.id = ?";

   
    $stmt = mysqli_prepare($conn, $sql);

  
    mysqli_stmt_bind_param($stmt, "i", $prescription['prescription_id']);


    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    $prescriptions = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $prescriptions[] = $row;
    }


    mysqli_stmt_close($stmt);

    return $prescriptions;
}


function updateMedical($prescription){
    $conn = getConnection();


    $sql = "UPDATE prescription 
            SET history = ?, medicine = ?, test = ?, recommendation = ?, date = ?, doctor = ? 
            WHERE id = ?";


    $stmt = mysqli_prepare($conn, $sql);

 
    mysqli_stmt_bind_param($stmt, "ssssssi", 
        $prescription['history'], 
        $prescription['medicine'], 
        $prescription['test'], 
        $prescription['recommendation'], 
        $prescription['date'], 
        $prescription['doctor'], 
        $prescription['prescription_id']
    );


    $success = mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);

    return $success;
}


function insertPrescription($prescription){
    $conn = getConnection();


    $sql = "INSERT INTO prescription (patient_id, history, medicine, test, recommendation, date, doctor) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";


    $stmt = mysqli_prepare($conn, $sql);

  
    mysqli_stmt_bind_param($stmt, "issssss", 
        $prescription['patient_id'], 
        $prescription['history'], 
        $prescription['medicine'], 
        $prescription['test'], 
        $prescription['recommendation'], 
        $prescription['date'], 
        $_SESSION['name']
    );


    $success = mysqli_stmt_execute($stmt);

  
    mysqli_stmt_close($stmt);

    return $success;
}


function deleteMedical($prescriptionId) {
    $conn = getConnection();


    $sql = "DELETE FROM prescription WHERE id = ?";

  
    $stmt = mysqli_prepare($conn, $sql);

 
    mysqli_stmt_bind_param($stmt, "i", $prescriptionId);

   
    $success = mysqli_stmt_execute($stmt);

  
    mysqli_stmt_close($stmt);

    return $success;
}
?>
