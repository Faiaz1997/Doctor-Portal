<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <div class="login-form">
            <form id="loginForm" action="../Controller/index.php" method="post" novalidate>
              
                <label for="email">Email </label>
                <input type="email" placeholder="" required name="email" id="email"><br>

            
                <label for="password">Password </label>
                <input type="password" placeholder="" required name="password" id="password"><br>

                <input type="submit" name="submit" value="Login">
            </form>

          
            <a href="../View/registration.php" class="button">Register</a>
        </div>
    </div>

    <?php include('footer.php'); ?>



<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault(); 

            var email = $('#email').val();
            var password = $('#password').val();

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var errorMessages = [];

            if (email.trim() === "") {
                errorMessages.push("Email cannot be empty");
            }

            if (password.trim() === "") {
                errorMessages.push("Password cannot be empty");
            }

            if (!emailRegex.test(email)) {
                errorMessages.push("Invalid Email Format");
            }

            if (errorMessages.length > 0) {
                alert(errorMessages.join("\n"));
                return; 
            }

      
            $.ajax({
                type: 'POST',
                url: '../Controller/index.php', 
                data: { email: email, password: password },
                success: function (response) {
                    if (response === 'success') {
                   
                        window.location.href = '../Controller/home.php';
                    } else {
                   
                        alert(response);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while processing your request. Please try again.");
                }
            });
        });
    });
</script>


</body>

</html>
