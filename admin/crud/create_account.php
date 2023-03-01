<?php

session_start();

require_once 'connection.php';

if (isset($_POST['c8role']) && isset($_POST['c8firstname']) && isset($_POST['c8lastname'])
    && isset($_POST['c8sch_id_no']) && isset($_POST['c8email']) && isset($_POST['c8username']) 
    && isset($_POST['c8password'])) 
{

  try
  {



    $created_by = $_SESSION['role'];

    // Get form data
    $role = $_POST['c8role'];
    $firstname = $_POST['c8firstname'];
    $lastname = $_POST['c8lastname'];
    $sch_id_no = $_POST['c8sch_id_no'];
    $email = $_POST['c8email'];
    $username = $_POST['c8username'];
    $password = $_POST['c8password'];
    

    // Check if the username is already taken
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
      if ($user) 
      {
        echo "<script>alert('Username already taken!!!')</script>";
        echo "<script>window.location = '../user_list.php'</script>";
      } 
      else 
      {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into database
        $stmt = $conn->prepare("INSERT INTO users 
        (role, username, password, firstname, lastname, sch_id_no, email, created_by) 
        VALUES (:role, :username, :password, :firstname, :lastname, :sch_id_no, :email, :created_by)");
        $stmt->execute
        ([
            'role' => $role,
            'username' => $username,
            'password' => $hashed_password,
            'firstname' => $firstname, 
            'lastname' => $lastname,
            'sch_id_no' => $sch_id_no,
            'email' => $email,
            'created_by' => $created_by

        ]);

        echo " <script>alert('Created account succesfuly!!')</script>";
        echo "<script>window.location = '../user_list.php'</script>";
        //header("location: login.php"); // Redirect to login page
        exit();
      }

  }
  catch (PDOException $e) 
  {
      echo "Connection Failed " . $e->getMessage();
      die();
  
  }

}


?>