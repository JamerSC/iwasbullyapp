<?php

session_start();

require_once 'connection.php';

if(isset($_POST['update']))
{
    try
    {
        $modified_by = $_SESSION['role'];

        $id = $_GET['id'];
        
        
        $role = $_POST['urole'];
        $firstname = $_POST['ufirstname'];
        $lastname = $_POST['ulastname'];
        $sch_id_no = $_POST['usch_id_no'];
        $email = $_POST['uemail'];
        $username = $_POST['uusername'];
        $password = $_POST['upassword'];

        $stmt = $conn->prepare
        ("
            UPDATE users SET
                role = :role,
                username = :username,
                password = :password,
                firstname = :firstname, 
                lastname = :lastname,
                sch_id_no = :sch_id_no,
                email = :email,
                modified_by = :modified_by
                WHERE 
                    user_id= :user_id
        ");      
             
        $stmt->execute
        ([
              'role' => $role,
              'username' => $username,
              'password' => $password,
              'firstname' => $firstname, 
              'lastname' => $lastname,
              'sch_id_no' => $sch_id_no,
              'email' => $email,
              'modified_by' => $modified_by,
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