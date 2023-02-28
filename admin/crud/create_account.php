<?php

session_start();

require_once 'connection.php';

if (isset($_POST['role']) && isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['sch_id_no']) && isset($_POST['email']) && isset($_POST['username']) 
    && isset($_POST['password'])) 
{

  try
  {



    $created_by = $_SESSION['role'];

    // Get form data
    $role = $_POST['role'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sch_id_no = $_POST['sch_id_no'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    

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