<?php

session_start();

require_once 'connection.php';

// Check if the form is submitted
if (isset($_POST['appointment'])){

    $ReportID = $_GET['id'];

    $UserID = $_SESSION['UserID'];

    $AppointmentDate = $_POST['AppointmentDate'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];

    $CreatedBy = $_SESSION['UserID'];

    $ReportStatus = 1;

    try {

            $stmt = $conn->prepare("
            
                INSERT INTO Appointment 
                (UserID, ReportID, AppointmentDate, StartTime, EndTime, CreatedBy)
                VALUES 
                (:UserID, :ReportID, :AppointmentDate, :StartTime, :EndTime, :CreatedBy)");
            
            if($stmt->execute([
                'UserID' => $UserID,
                'ReportID' => $ReportID,
                'AppointmentDate' => $AppointmentDate,
                'StartTime' => $StartTime,
                'EndTime' => $EndTime,
                'CreatedBy' => $CreatedBy
            ]))
            {
                $query = $conn->prepare("

                    UPDATE Report 
                        SET 
                            ReportStatus = :ReportStatus,
                            ModifiedBy = :ModifiedBy

                        WHERE
                            ReportID = :ReportID
                ");

                $query->execute([
                    'ReportStatus' => $ReportStatus,
                    'ModifiedBy' => $UserID,
                    'ReportID' => $ReportID
                ]);

                echo " <script>alert('Schedule Created Succesfuly!!')</script>";
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