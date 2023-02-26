<?php

// Database connection
require_once '../connection/DBconnection.php';

// Check if the form is submitted
if (isset($_POST['role']) && isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['idno']) && isset($_POST['email']) && isset($_POST['username']) 
    && isset($_POST['cpassword'])) 
{

  // Get form data
  $role = $_POST['role'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $id_no = $_POST['idno'];
  $email = $_POST['email'];
  $username = $_POST['username'];
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
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO users 
    (username, password, role, firstname, lastname, id_no, email) 
    VALUES (:username, :password, :role, :firstname, :lastname, :id_no, :email)");
    $stmt->execute
    ([
        'username' => $username,
        'password' => $hashed_password,
        'role' => $role,
        'firstname' => $firstname, 
        'lastname' => $lastname,
        'id_no' => $id_no,
        'email' => $email
    ]);

    echo " <script>alert('Created account succesfuly!!')</script>";
    echo "<script>window.location = '../index.php'</script>";
    //header("location: login.php"); // Redirect to login page
    //exit();
  }

}


?>