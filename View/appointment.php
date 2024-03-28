
<?php 

include('header.php'); 
?>

<div class="container">
    <h1>Appointments</h1>
    <div class="appointments-table">
        <table class="appointment-table" border="1">
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
                    <td>
                        <form id="appointmentForm" action="../Controller/appointments.php" method="post" novalidate>
                            <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
                            <select name="status" id="status">
                                <option value="Scheduled" <?= $appointment['status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
                                <option value="Canceled" <?= $appointment['status'] == 'Canceled' ? 'selected' : '' ?>>Cancelled</option>
                                <option value="Completed" <?= $appointment['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                    </td>
                    <td>
                        <button type="submit" name="submit" class="button">Submit</button>
                    </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            var status = document.getElementById('status').value;

    
            if (status.trim() === "") {
                event.preventDefault();
                alert('Error: Please select a valid status.');
            }
        });
    });
</script>

<?php include('footer.php'); ?>