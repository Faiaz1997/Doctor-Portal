<?php 
$pageTitle = 'Update Profile';
include('header.php'); ?>

<div class="container">
    <h1>Update Profile</h1>
    <div class="update-profile">
        <?php foreach ($users as $user) : ?>
            <form id="updateProfileForm" action="../Controller/profile.php" method="post" novalidate>
      
                <label for="name">Name </label>
                <input type="text" placeholder="" value="<?= $user['name'] ?>" required name="name" id="name"><br>

         
                <label for="email">Email </label>
                <input type="email" placeholder="" value="<?= $user['email'] ?>" required name="email" id="email"><br>

            
                <label for="designation">Designation </label>
                <input type="text" placeholder="" value="<?= $user['designation'] ?>" required name="designation" id="designation"><br>

            
                <label for="password">Password </label>
                <input type="password" placeholder="" value="<?= $user['password'] ?>" required name="password" id="password"><br>

           
                <input type="submit" name="submit" value="Submit">
            </form>
        <?php endforeach; ?>
    </div>
</div>

<script>
   
    document.getElementById('updateProfileForm').addEventListener('submit', function (event) {
      
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var designation = document.getElementById('designation').value;
        var password = document.getElementById('password').value;

       
        var nameRegex = /^[a-zA-Z ]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var designationRegex = /^[a-zA-Z, ]+$/;
        var passwordRegex = /[@$#%]/;

     
        var errorMessages = [];

     
        if (name.trim() === "") {
            errorMessages.push("Name cannot be empty");
        }

        if (email.trim() === "") {
            errorMessages.push("Email cannot be empty");
        }

        if (designation.trim() === "") {
            errorMessages.push("Designation cannot be empty");
        }

        if (password.trim() === "") {
            errorMessages.push("Password cannot be empty");
        }


        if (!nameRegex.test(name)) {
            errorMessages.push("Invalid Name Format (Only letters and spaces allowed)");
        }

  
        if (!emailRegex.test(email)) {
            errorMessages.push("Invalid Email Format");
        }

      
        if (!designationRegex.test(designation)) {
            errorMessages.push("Invalid Designation Format (Only letters, spaces, and commas allowed)");
        }

  
        if (!passwordRegex.test(password) || password.length < 4) {
            errorMessages.push("Password must contain at least one of the special characters (@, $, %, or #) and be at least 4 characters long");
        }

      
        if (errorMessages.length > 0) {
            event.preventDefault();
            alert(errorMessages.join("\n"));
        }
    });
</script>

<?php include('footer.php'); ?>
