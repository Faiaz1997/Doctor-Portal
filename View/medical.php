<?php 
$pageTitle = 'Medical History';
include('header.php'); ?>

<div class="container">
    <h1>Medical History</h1>
    <div class="medical-history">
        <a href="../Controller/prescription.php?patient_id=<?= $prescription['patient_id'] ?>" class="button">Add New Prescription</a>
        <table border="1">
            <tr>
                <th>Patient Name</th>
                <th>Medical History</th>
                <th>Medicine</th>
                <th>Test</th>
                <th>Recommendations</th>
                <th>Date</th>
                <th>Prescribed by</th>
                <th>Action</th>
            </tr>
            <?php foreach ($prescriptions as $prescription) : ?>
                <tr>
                    <td><?= $prescription['name'] ?></td>
                    <td><?= $prescription['history'] ?></td>
                    <td><?= $prescription['medicine'] ?></td>
                    <td><?= $prescription['test'] ?></td>
                    <td><?= $prescription['recommendation'] ?></td>
                    <td><?= $prescription['date'] ?></td>
                    <td><?= $prescription['doctor'] ?></td>
                    <td>
                        <a href="../Controller/medicalupdate.php?prescription_id=<?= $prescription['id'] ?>" class="button">Edit</a>
                        <button class="delete-button" data-prescription-id="<?= $prescription['id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const prescriptionId = this.getAttribute('data-prescription-id');
            if (confirm('Are you sure you want to delete this medical history?')) {
                window.location.href = `../Controller/medicaldelete.php?prescription_id=${prescriptionId}`;
            }
        });
    });
</script>
