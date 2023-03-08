<?php

session_start();
require_once '../connection/DBconnection.php';

    if (isset($_POST['username']) && isset($_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //include password if no hash
        $stmt = $conn->prepare("SELECT * FROM Users WHERE 
        Username = :Username AND Password = :Password");
        $stmt->execute([
            ':Username' => $username ,
            ':Password' => $password
        ]);
        
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC); //fetch 1 value
        $row = $stmt->rowCount();

         if($row > 0) 
         {
            //Account status validation
            if($fetch['UserStatus'] === 1) 
            {
                if ($fetch['UserRole'] === 'Councilor' || $fetch['UserRole'] === 'Staff' || $fetch['UserRole'] === 'Intern') 
                {
                    $_SESSION['UserID'] = $fetch['UserID'];
                    $_SESSION['UserRole'] = $fetch['UserRole'];
                    $_SESSION['Firstname'] = $fetch['Firstname'];
                    $_SESSION['Lastname'] = $fetch['Lastname'];            
                    //admin folder
                    echo " <script>alert('Login successfully!!')</script>";
                    echo "<script>window.location = '../admin/dashboard.php'</script>";
                    //header('Location: ../admin/dashboard.php');
                } 
                elseif($fetch['UserRole'] === 'Student' || $fetch['UserRole'] === 'Teacher' )
                {
                    $_SESSION['UserID'] = $fetch['UserID'];
                    $_SESSION['UserRole'] = $fetch['UserRole'];
                    $_SESSION['Firstname'] = $fetch['Firstname'];
                    $_SESSION['Lastname'] = $fetch['Lastname'];    
                    
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