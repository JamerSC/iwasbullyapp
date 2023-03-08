<?php

// Database connection
require_once '../connection/DBconnection.php';

// Check if the form is submitted
if (isset($_POST['createRole']) && isset($_POST['createFirstname']) && isset($_POST['createLastname'])
    && isset($_POST['createSchoolIDNo']) && isset($_POST['createEmail']) && isset($_POST['createUsername']) 
    && isset($_POST['createPassword'])) 
{

  // Get form data
  $createRole = $_POST['createRole'];
  $createFirstname = $_POST['createFirstname'];
  $createLastname = $_POST['createLastname'];
  $createSchoolIDNo = $_POST['createSchoolIDNo'];
  $createEmail = $_POST['createEmail'];
  $createUsername = $_POST['createUsername'];
  $createPassword = $_POST['createPassword'];
  //Status to validate account
  $status = 1;
  // Define the regular expression patterns for username and password
  $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
  try
  {
      // Check if the username is already taken
      $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
      $stmt->execute(['username' => $createUsername]);
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
        (role, username, password, firstname, lastname, sch_id_no, email, status) 
        VALUES (:role, :username, :password, :firstname, :lastname, :sch_id_no, :email, :status)");

        // Validate password against the regular expressions
        if (preg_match($password_regex, $createPassword)) 
        {
          $stmt->execute
          ([
              'role' => $createRole,
              'username' => $createUsername,
              'password' => $createPassword,
              'firstname' => $createFirstname, 
              'lastname' => $createLastname,
              'sch_id_no' => $createSchoolIDNo,
              'email' => $createEmail,
              'status' => $status
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

  }catch (PDOException $e) 
  {
    echo "Connection Failed " . $e->getMessage();
    die();
  }
  

}

?>