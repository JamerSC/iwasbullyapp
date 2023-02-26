<?php

session_start();
require_once '../connection/DBconnection.php';

    if (isset($_POST['username']) && isset($_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE 
            username = :username AND password = :password");
        $stmt->execute([
            ':username' => $username, 
            ':password' => $password
        ]);
        
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC); //fetch 1 value

        $row = $stmt->rowCount();

        if ($row > 0) 
        {
            
            if ($fetch['role'] === 'admin') 
            {
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['user_role'] = $fetch['role'];            
                //admin folder
                echo " <script>alert('Login successfully!!')</script>";
                echo "<script>window.location = '../admin/dashboard.php'</script>";
                //header('Location: ../admin/dashboard.php');
            } 
            elseif($fetch['role'] === 'student' || $fetch['role'] === 'teacher' )
            {
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['user_role'] = $fetch['role']; 

                echo " <script>alert('Login successfully!!')</script>";
                echo "<script>window.location = '../admin/home.php'</script>";
            }
            else 
            {
                //back to login
                echo " <script>alert('Incorrect username/password!!')</script>";
                echo "<script>window.location = '../index.php?error=1'</script>";
                //header('Location: ../index.php?error=1');
            }
        } 
        else 
        {
            echo " <script>alert('Incorrect username/password!!')</script>";
            echo "<script>window.location = '../index.php?error=1'</script>";
        }

    }
    else 
    {
        header('Location: ../index.php');
    }


?>