<?php

session_start();

require_once 'connection.php';

if(isset($_POST['update']))
{
    try
    {
        $ModifiedBy = $_SESSION['UserID']; //need to update INT user id

        $UserID = $_GET['id'];
        
        
        $updateRole = $_POST['updateRole'];
        $updateFirstname = $_POST['updateFirstname'];
        $updateLastname = $_POST['updateLastname'];
        $updateSchoolIDNumber = $_POST['updateSchoolIDNumber'];
        $updateEmail = $_POST['updateUsername'];
        $updateUsername = $_POST['updateUsername'];
        $updatePassword = $_POST['updatePassword'];

        $stmt = $conn->prepare
        ("
            UPDATE Users 
                SET
                    UserRole = :UserRole,
                    Username = :Username,
                    Password = :Password,
                    Firstname = :Firstname, 
                    Lastname = :Lastname,
                    SchoolIDNumber = :SchoolIDNumber,
                    Email = :Email,
                    ModifiedBy = :ModifiedBy
                WHERE 
                    UserID= :UserID
        ");      
             
        $stmt->execute
        ([
              'UserRole' => $updateRole,
              'Username' => $updateUsername,
              'Password' => $updatePassword,
              'Firstname' => $updateFirstname, 
              'Lastname' => $updateLastname,
              'SchoolIDNumber' => $updateSchoolIDNumber,
              'Email' => $updateEmail,
              'ModifiedBy' => $ModifiedBy,
              'UserID' => $UserID
        ]);

            echo "
            <script>alert('User acccount updated successfuly!!')</script>";
            echo "<script>window.location = '../user_list.php'</script>";
    } 

    catch(PDOException $errror) 
    {
            echo $errror->getMessage();
    }  


}


?>