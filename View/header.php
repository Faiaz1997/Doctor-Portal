<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Doctor Portal'; ?></title>
    
</head>

<body>
    <header class="sticky-header">
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="appointments.php" class="nav-link">Appointments</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link">Update Profile</a></li>
                <li class="nav-item"><a href="passupdate.php" class="nav-link">Update Password</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
            </ul>
        </nav>
    </header>
