<?php

// Database connection
require_once '../connection/DBconnection.php';

// Check if the form is submitted
if (isset($_POST['role']) && isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['sch_id_no']) && isset($_POST['email']) && isset($_POST['cusername']) 
    && isset($_POST['cpassword'])) 
{

  // Define the regular expression patterns for username and password
  $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";

  // Get form data
  $role = $_POST['role'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $sch_id_no = $_POST['sch_id_no'];
  $email = $_POST['email'];
  $username = $_POST['cusername'];
  $password = $_POST['cpassword'];


  // Check if the username is already taken
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
  $stmt->execute(['username' => $username]);
  $user = $stmt->fetch();
  if ($user) 
  {
     echo "<script>alert('Username already taken!!!')</script>";
     echo "<script>window.location = '../index.php'</script>";
  } 
  else 
  {

    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO users 
    (role, username, password, firstname, lastname, sch_id_no, email) 
    VALUES (:role, :username, :password, :firstname, :lastname, :sch_id_no, :email)");

    // Validate password against the regular expressions
    if (preg_match($password_regex, $password)) 
    {
      $stmt->execute
      ([
          'role' => $role,
          'username' => $username,
          'password' => $password,
          'firstname' => $firstname, 
          'lastname' => $lastname,
          'sch_id_no' => $sch_id_no,
          'email' => $email
      ]);

      echo " <script>alert('Created account succesfuly!!')</script>";
      echo "<script>window.location = '../index.php'</script>";
      //header("location: login.php"); // Redirect to login page
      //exit();
    }
    else 
    {
      echo " <script>alert('Invalid password format!')</script>";
      echo "<script>window.location = '../index.php'</script>";
    }
  }

}

?>