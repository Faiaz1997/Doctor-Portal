<?php 
$pageTitle = 'Update Medical History';
include('header.php'); ?>

<div class="container">
    <h1>Update Medical History</h1>
    <div class="medical-history">
        <?php foreach ($prescriptions as $prescription) : ?>
            <p>Patient Name: <?= $prescription['name'] ?></p>
            <form id="prescriptionForm" action="../Controller/medicalupdated.php" method="post" novalidate>
                <input type="hidden" name="prescription_id" value="<?= $prescription['id'] ?>">
                <label for="history">History </label>
                <input type="text" placeholder="" value="<?= $prescription['history'] ?>" required name="history" id="history"><br>
                <label for="medicine">Medicine </label>
                <input type="text" placeholder="" value="<?= $prescription['medicine'] ?>" required name="medicine" id="medicine"><br>
                <label for="test">Test </label>
                <input type="text" placeholder="" value="<?= $prescription['test'] ?>" required name="test" id="test"><br>
                <label for="recommendation">Recommendation </label>
                <input type="text" placeholder="" value="<?= $prescription['recommendation'] ?>" required name="recommendation" id="recommendation"><br>
                <label for="date">Date </label>
                <input type="date" placeholder="" value="<?= $prescription['date'] ?>" required name="date" id="date"><br>
                <p>Prescribed by <?= $prescription['doctor'] ?></p>
                
                <input type="hidden" value="<?= $_SESSION['name'] ?>" required name="doctor"><br>
                <input type="submit" name="submit" value="Update" class="button">
            </form>
        <?php endforeach; ?>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    document.getElementById('prescriptionForm').addEventListener('submit', function (event) {
        var history = document.getElementById('history').value;
        var medicine = document.getElementById('medicine').value;
        var test = document.getElementById('test').value;
        var recommendation = document.getElementById('recommendation').value;
        var date = document.getElementById('date').value;


        var anyStringRegex = /.*/;
        var alphabetSpaceRegex = /^[a-zA-Z\s]+$/;


        var errorMessages = [];


        if (history.trim() === "") {
            errorMessages.push("History cannot be empty");
        }

        if (medicine.trim() === "") {
            errorMessages.push("Medicine cannot be empty");
        }

        if (test.trim() === "") {
            errorMessages.push("Test cannot be empty");
        }

        if (recommendation.trim() === "") {
            errorMessages.push("Recommendation cannot be empty");
        }

        if (date.trim() === "") {
            errorMessages.push("Date cannot be empty");
        }


        if (!anyStringRegex.test(history) ||
            !anyStringRegex.test(medicine) ||
            !anyStringRegex.test(test) ||
            !anyStringRegex.test(recommendation)) {
            errorMessages.push("Invalid input in text fields. Any character is allowed.");
        }

  
        var doctor = document.getElementsByName('doctor').value;
        if (!alphabetSpaceRegex.test(doctor)) {
            errorMessages.push("Invalid input in doctor field. Only letters and spaces are allowed.");
        }


        if (errorMessages.length > 0) {
            event.preventDefault();
            alert("Please correct the following errors:\n\n" + errorMessages.join("\n"));
        }
    });
</script>
