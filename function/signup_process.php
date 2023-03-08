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
      $stmt = $conn->prepare("SELECT * FROM Users WHERE username=:Username");
      $stmt->execute(['Username' => $createUsername]);
      $user = $stmt->fetch();

      if ($user) 
      {

        echo "<script>alert('Username already taken!!!')</script>";
        echo "<script>window.location = '../index.php'</script>";

      } 
      else 
      {

        // Insert user data into database
        $stmt = $conn->prepare("INSERT INTO Users 
        (UserRole , Username, Password, Firstname, Lastname, SchoolIDNumber, Email, UserStatus) 
        VALUES (:UserRole, :Username, :Password, :Firstname, :Lastname, :SchoolIDNumber, :Email, :UserStatus)");

        // Validate password against the regular expressions
        if (preg_match($password_regex, $createPassword)) 
        {
          $stmt->execute
          ([
              'UserRole' => $createRole,
              'Username' => $createUsername,
              'Password' => $createPassword,
              'Firstname' => $createFirstname, 
              'Lastname' => $createLastname,
              'SchoolIDNumber' => $createSchoolIDNo,
              'Email' => $createEmail,
              'UserStatus' => $status
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