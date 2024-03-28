<?php 
$pageTitle = 'Update Password';
include('header.php'); ?>

<div class="container">
    <h1>Update Password</h1>
    <div class="update-password">
            <form id="updatePasswordForm" action="../Controller/passupdate.php" method="post" novalidate>
               
                <label for="password">New Password </label>
                <input type="password" placeholder="" required name="password" id="password"><br>

               
                <label for="confirm_password">Confirm Password </label>
                <input type="password" placeholder="" required name="confirm_password" id="confirm_password"><br>

           
                <input type="submit" name="submit" value="Update Password">
            </form>
    </div>
</div>

<script>
   
    document.getElementById('updatePasswordForm').addEventListener('submit', function (event) {
   
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

   
        var passwordRegex = /[@$#%]/;

    
        var errorMessages = [];

   
        if (password.trim() === "") {
            errorMessages.push("Password cannot be empty");
        } else if (!passwordRegex.test(password) || password.length < 4) {
            errorMessages.push("Password must contain at least one of the special characters (@, $, %, or #) and be at least 4 characters long");
        }

      
        if (confirmPassword.trim() === "") {
            errorMessages.push("Confirm Password cannot be empty");
        } else if (password !== confirmPassword) {
            errorMessages.push("Passwords do not match");
        }

      
        if (errorMessages.length > 0) {
            event.preventDefault();
            alert(errorMessages.join("\n"));
        }
    });
</script>

<?php include('footer.php'); ?>
