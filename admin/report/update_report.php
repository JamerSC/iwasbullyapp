<?php

session_start();

require_once 'connection.php';

if(isset($_POST['update']))
{
    try
    {
        $ReportID = $_GET['id'];
        //Complainant
        $C_FirstnameUpdate = $_POST['C_FirstnameUpdate'];
        $C_LastnameUpdate = $_POST['C_LastnameUpdate'];
        $C_SchoolIDNumberUpdate = $_POST['C_SchoolIDNumberUpdate'];
        $C_UserRoleUpdate = $_POST['C_UserRoleUpdate'];
        $C_EmailUpdate = $_POST['C_EmailUpdate'];
        $C_ContactNumberUpdate = $_POST['C_ContactNumberUpdate'];
        //Respondent
        $R_FirstnameUpdate = $_POST['R_FirstnameUpdate'];
        $R_LastnameUpdate = $_POST['R_LastnameUpdate'];
        $R_SchoolIDNumberUpdate = $_POST['R_SchoolIDNumberUpdate'];
        $R_UserRoleUpdate = $_POST['R_UserRoleUpdate'];
        $R_EmailUpdate = $_POST['R_EmailUpdate'];
        $R_ContactNumberUpdate = $_POST['R_ContactNumberUpdate'];
        //
        $TypeOfBullyingUpdate = $_POST['TypeOfBullyingUpdate'];
        $ImageProofUpdate = $_POST['ImageProofUpdate'];
        $VideoLinkUpdate = $_POST['VideoLinkUpdate'];
        $RemarksUpdate = $_POST['RemarksUpdate'];

        $ModifiedBy = $_SESSION['UserID'];

        $stmt = $conn->prepare
        ("
            UPDATE Report 
                SET
                    C_Firstname = :C_Firstname,
                    C_Lastname = :C_Lastname,
                    C_SchoolIDNumber = :C_SchoolIDNumber,
                    C_UserRole = :C_UserRole,
                    C_Email = :C_Email,
                    C_ContactNumber = :C_ContactNumber,
                    R_Firstname = :R_Firstname,
                    R_Lastname = :R_Lastname,
                    R_SchoolIDNumber = :R_SchoolIDNumber,
                    R_UserRole = :R_UserRole,
                    R_Email = :R_Email,
                    R_ContactNumber = :R_ContactNumber,
                    TypeOfBullying = :TypeOfBullying,
                    ImageProof = :ImageProof,
                    VideoLink = :VideoLink,
                    Remarks = :Remarks,
                    ModifiedBy = :ModifiedBy
                WHERE 
                    ReportID= :ReportID
        ");      
             
        $stmt->execute
        ([
            'C_Firstname' => $C_FirstnameUpdate,
            'C_Lastname' => $C_LastnameUpdate,
            'C_SchoolIDNumber' => $C_SchoolIDNumberUpdate,
            'C_UserRole' => $C_UserRoleUpdate,
            'C_Email' => $C_EmailUpdate,
            'C_ContactNumber' => $C_ContactNumberUpdate,
            'R_Firstname' => $R_FirstnameUpdate,
            'R_Lastname' => $R_LastnameUpdate,
            'R_SchoolIDNumber' => $R_SchoolIDNumberUpdate,
            'R_UserRole' => $R_UserRoleUpdate,
            'R_Email' => $R_EmailUpdate,
            'R_ContactNumber' => $R_ContactNumberUpdate,
            'TypeOfBullying' => $TypeOfBullyingUpdate,
            'ImageProof' => $ImageProofUpdate,
            'VideoLink' => $VideoLinkUpdate,
            'Remarks' => $RemarksUpdate,
            'ModifiedBy' => $ModifiedBy,
            'ReportID' => $ReportID
        ]);

            echo "
            <script>alert('Updated Successfuly !!')</script>";
            echo "<script>window.location = '../report.php'</script>";
    } 

    catch(PDOException $errror) 
    {
            echo $errror->getMessage();
    }  


}


?>