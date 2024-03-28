<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <h2>Registration</h2>
        <div class="registration-form">
            <form id="registrationForm" action="../Controller/registration.php" method="post" novalidate>
         
                <label for="name">Name </label>
                <input type="text" placeholder="" required name="name" id="name"><br>

         
                <label for="email">Email </label>
                <input type="email" placeholder="" required name="email" id="email"><br>

              
                <label for="designation">Designation </label>
                <input type="text" placeholder="" required name="designation" id="designation"><br>

               
                <label for="password">Password </label>
                <input type="password" placeholder="" required name="password" id="password"><br>

           
                <input type="submit" name="submit" value="Submit">
            </form>

      
            <a href="../View/index.php" class="button">Login</a>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
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
</body>

</html>
