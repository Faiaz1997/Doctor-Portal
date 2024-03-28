<?php 
$pageTitle = 'Doctor Portal';
include('header.php'); ?>

<div class="container">
    <h1>Doctor Portal</h1>

    <?php

    if ($appointments !== null && is_array($appointments)) {
        $appointmentCount = count($appointments);
    } else {
        $appointmentCount = 0; 
        $appointments = array(); 
    }

    if (isset($_COOKIE['appointment_count'])) {
        $appointmentCounter = $_COOKIE['appointment_count'];
    } else {
        $appointmentCounter = $appointmentCount;
    }
    ?>

    <div class="counter-card">
        <p>Total Appointments: <?php echo $appointmentCounter; ?></p>
    </div>


    <div class="appointments-table">
        <table class="appointments-table" border="1">
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Appointment Date</th>
                <th>Appointment Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td><?= $appointment['id'] ?></td>
                    <td><?= $appointment['name'] ?></td>
                    <td><?= $appointment['date'] ?></td>
                    <td><?= $appointment['status'] ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="../Controller/medical.php?patient_id=<?= $appointment['id'] ?>" class="button">Show</a>
                            <a href="../Controller/prescription.php?patient_id=<?= $appointment['id'] ?>" class="button">Add</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>