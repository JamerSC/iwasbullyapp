<?php

session_start();

require_once 'connection.php';

// Check if the form is submitted
if (isset($_POST['C_Firstname']) && isset($_POST['C_Lastname']) && isset($_POST['C_SchoolIDNumber'])
    && isset($_POST['C_UserRole']) && isset($_POST['C_Email']) && isset($_POST['C_ContactNumber']) &&
    isset($_POST['R_Firstname']) && isset($_POST['R_Lastname']) && isset($_POST['R_SchoolIDNumber'])
    && isset($_POST['R_UserRole']) && isset($_POST['R_Email']) && isset($_POST['R_ContactNumber'])
    && isset($_POST['TypeOfBullying']) && isset($_POST['ImageProof']) && isset($_POST['VideoLink']) 
    && isset($_POST['VideoLink']) && isset($_POST['Remarks'])
   ) 
{
  //For Foreign key
  $UserID = $_SESSION['UserID'];

  //Complainant
  $C_Firstname = $_POST['C_Firstname'];
  $C_Lastname = $_POST['C_Lastname'];
  $C_SchoolIDNumber = $_POST['C_SchoolIDNumber'];
  $C_UserRole = $_POST['C_UserRole'];
  $C_Email = $_POST['C_Email'];
  $C_ContactNumber = $_POST['C_ContactNumber'];
  //Respondent
  $R_Firstname = $_POST['R_Firstname'];
  $R_Lastname = $_POST['R_Lastname'];
  $R_SchoolIDNumber = $_POST['R_SchoolIDNumber'];
  $R_UserRole = $_POST['R_UserRole'];
  $R_Email = $_POST['R_Email'];
  $R_ContactNumber = $_POST['R_ContactNumber'];
  //
  $TypeOfBullying = $_POST['TypeOfBullying'];
  $ImageProof = $_POST['ImageProof'];
  $VideoLink = $_POST['VideoLink'];
  $Remarks = $_POST['Remarks'];

  //$CreatedBy = $_SESSION['UserID'];
  //Status to validate account
  $ReportStatus = 1;

  try
  {
  
    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO Report 
    (UserID, C_Firstname, C_Lastname, C_SchoolIDNumber, C_UserRole, C_Email, C_ContactNumber,
    R_Firstname, R_Lastname, R_SchoolIDNumber, R_UserRole, R_Email, R_ContactNumber, 
    TypeOfBullying, ImageProof, VideoLink, Remarks, CreatedBy, ReportStatus)

    VALUES (:UserID, :C_Firstname, :C_Lastname, :C_SchoolIDNumber, :C_UserRole, :C_Email, :C_ContactNumber,
    :R_Firstname, :R_Lastname, :R_SchoolIDNumber, :R_UserRole, :R_Email, :R_ContactNumber, 
    :TypeOfBullying, :ImageProof, :VideoLink, :Remarks, :CreatedBy, :ReportStatus)");
    
    $stmt->execute
    ([
      'UserID' => $UserID,
      'C_Firstname' => $C_Firstname,
      'C_Lastname' => $C_Lastname,
      'C_SchoolIDNumber' => $C_SchoolIDNumber,
      'C_UserRole' => $C_UserRole, 
      'C_Email' => $C_Email, 
      'C_ContactNumber' => $C_ContactNumber,
      'R_Firstname' => $R_Firstname, 
      'R_Lastname' => $R_Lastname,
      'R_SchoolIDNumber' => $R_SchoolIDNumber, 
      'R_UserRole' => $R_UserRole, 
      'R_Email' => $R_Email, 
      'R_ContactNumber' => $R_ContactNumber, 
      'TypeOfBullying' => $TypeOfBullying,
      'ImageProof' => $ImageProof, 
      'VideoLink' => $VideoLink, 
      'Remarks' => $Remarks,
      'CreatedBy' => $UserID, 
      'ReportStatus' => $ReportStatus
    ]);

    //echo " <script>alert('Created Report Succesfuly!!')</script>";
    //echo "<script>window.location = '../report.php'</script>";
    //header("location: login.php"); // Redirect to report page
    //exit();
  }
  catch (PDOException $e) 
  {
      echo "Connection Failed " . $e->getMessage();
      die();
  
  }

}


?>