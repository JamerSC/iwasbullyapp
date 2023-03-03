<?php

session_start();
require_once '../connection/DBconnection.php';

    if (isset($_POST['username']) && isset($_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //include password if no hash
        $stmt = $conn->prepare("SELECT * FROM users WHERE 
        username = :username AND password = :password");
        $stmt->execute([
            ':username' => $username ,
            ':password' => $password
        ]);
        
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC); //fetch 1 value
        $row = $stmt->rowCount();

         if($row > 0) 
         {
            //Account status validation
            if($fetch['status'] === 1) 
            {
                if ($fetch['role'] === 'councilor' || $fetch['role'] === 'staff') 
                {
                    $_SESSION['id'] = $fetch['user_id'];
                    $_SESSION['role'] = $fetch['role'];
                    $_SESSION['fname'] = $fetch['firstname'];
                    $_SESSION['lname'] = $fetch['lastname'];            
                    //admin folder
                    echo " <script>alert('Login successfully!!')</script>";
                    echo "<script>window.location = '../admin/dashboard.php'</script>";
                    //header('Location: ../admin/dashboard.php');
                } 
                elseif($fetch['role'] === 'student' || $fetch['role'] === 'teacher' )
                {
                    $_SESSION['id'] = $fetch['user_id'];
                    $_SESSION['role'] = $fetch['role'];
                    $_SESSION['fname'] = $fetch['firstname'];
                    $_SESSION['lname'] = $fetch['lastname']; 
                    
                    echo " <script>alert('Login successfully!!')</script>";
                    echo "<script>window.location = '../admin/home.php'</script>";
                }
                else 
                {
                    echo " <script>alert('Incorrect username/password!!')</script>";
                    echo "<script>window.location = '../index.php?error=1'</script>";
                    //header('Location: ../index.php?error=1');
                }
            }
            else
            {
                echo " <script>alert('Your Account is deactivated!!')</script>";
                echo "<script>window.location = '../index.php?error=1'</script>";
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