<?php

session_start();

require_once 'connection.php';

// Check if the form is submitted
if (isset($_POST['appointment'])){

    $ReportID = $_GET['id'];

    $UserID = $_SESSION['UserID'];

    $AppointmentDate = $_POST['$AppointmentDate'];
    $AppointmentDay = $_POST['$AppointmentDay'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];

    $CreatedBy = $_SESSION['UserID'];

    //$stmt = $conn->prepare("INSERT INTO Appointment (AppointmentDate, AppointmentDay
    //StartTime, EndTime, CreatedBy)");

    echo $ReportID;

}
?>