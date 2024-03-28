<?php

include('session.php');


require_once('../Model/appointment.php');


$appointments = getScheduledAppointments();


if (!$appointments) {
    echo "Error: No scheduled appointments found. Please check again later or contact support.";
} else {

    include('../View/home.php');
}
?>
