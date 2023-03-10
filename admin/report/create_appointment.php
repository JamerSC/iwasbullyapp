<?php

session_start();

require_once 'connection.php';

// Check if the form is submitted
if (isset($_POST['appointment'])){

    $ReportID = $_GET['id'];

    $UserID = $_SESSION['UserID'];

    $AppointmentDate = $_POST['AppointmentDate'];
    $AppointmentDay = $_POST['AppointmentDay'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];

    $CreatedBy = $_SESSION['UserID'];

    try {

        if(!empty($AppointmentDay))
        {

            $stmt = $conn->prepare("INSERT INTO Appointment 
            (UserID, ReportID, AppointmentDate, AppointmentDay, 
            StartTime, EndTime, CreatedBy)
            VALUES (:UserID, :ReportID, :AppointmentDate, :AppointmentDay, 
            :StartTime, :EndTime, :CreatedBy)");
            $stmt->execute([
                'UserID' => $UserID,
                'ReportID' => $ReportID,
                'AppointmentDate' => $AppointmentDate,
                'AppointmentDay' => $AppointmentDay, 
                'StartTime' => $StartTime,
                'EndTime' => $EndTime,
                'CreatedBy' => $CreatedBy
            ]);

            echo " <script>alert('Created Report Succesfuly!!')</script>";
            echo "<script>window.location = '../report.php'</script>";
        }
        else
        {
            echo " <script>alert('Please Select Day!!')</script>";
            echo "<script>window.location = '../report.php'</script>";
        }

    } 
    catch (PDOException $e) 
    {
        echo "Connection Failed " . $e->getMessage();
        die();
    
    }
}
?>