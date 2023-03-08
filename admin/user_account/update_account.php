<?php

session_start();

require_once 'connection.php';

if(isset($_POST['update']))
{
    try
    {
        $modifiedBy = $_SESSION['role']; //need to update INT user id

        $id = $_GET['id'];
        
        
        $updateRole = $_POST['updateRole'];
        $updateFirstname = $_POST['updateFirstname'];
        $updateLastname = $_POST['updateLastname'];
        $updateSchoolIDNo = $_POST['updateSchoolIDNo'];
        $updateEmail = $_POST['updateUsername'];
        $updateUsername = $_POST['updateUsername'];
        $updatePassword = $_POST['updatePassword'];

        $stmt = $conn->prepare
        ("
            UPDATE users SET
                role = :role,
                username = :username,
                password = :password,
                firstname = :firstname, 
                lastname = :lastname,
                sch_id_no = :schoolIdNo,
                email = :email,
                modified_by = :modifiedBy
                WHERE 
                    user_id= :user_id
        ");      
             
        $stmt->execute
        ([
              'role' => $updateRole,
              'username' => $updatePassword,
              'password' => $updateUsername,
              'firstname' => $updateFirstname, 
              'lastname' => $updateLastname,
              'schoolIdNo' => $updateSchoolIDNo,
              'email' => $updateEmail,
              'modifiedBy' => $modifiedBy,
              'user_id' => $id
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