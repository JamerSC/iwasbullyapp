<?php

session_start();

require_once 'connection.php';

// Check if the form is submitted
if (isset($_POST['create']))
{

  $CreatedBy = $_SESSION['UserID']; //need to change as user_id INT
  // Get form data
  $createRole = $_POST['createRole'];
  $createFirstname = $_POST['createFirstname'];
  $createLastname = $_POST['createLastname'];
  $createSchoolIDNo = $_POST['createSchoolIDNo'];
  $createEmail = $_POST['createEmail'];
  $createUsername = $_POST['createUsername'];
  $createPassword = $_POST['createPassword'];
  //Status to validate account
  $UserStatus = 1;
  // Define the regular expression patterns for username and password
  $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
  try
  {
    // Check if the username is already taken
    $stmt = $conn->prepare("SELECT * FROM Users WHERE Username=:Username");
    $stmt->execute(['Username' => $createUsername]);
    $user = $stmt->fetch();
      if ($user) 
      {
        echo "<script>alert('Username already taken!!!')</script>";
        echo "<script>window.location = '../user_list.php'</script>";
      } 
      else 
      {
        if(!empty($createRole))
        {
        
          // Insert user data into database
          $stmt = $conn->prepare("INSERT INTO Users 
          (UserRole, Username, Password, Firstname, Lastname, SchoolIDNumber, Email, UserStatus, CreatedBy) 
          VALUES (:UserRole, :Username, :Password, :Firstname, :Lastname, :SchoolIDNumber, :Email, :UserStatus, :CreatedBy)");
          
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
                    'UserStatus' => $UserStatus,
                    'CreatedBy' => $CreatedBy
                ]);

                echo " <script>alert('Created User Account Succesfuly!!')</script>";
                echo "<script>window.location = '../user_list.php'</script>";
                //header("location: login.php"); // Redirect to login page
                exit();
            }
            else
            {
              echo " <script>alert('Invalid password format!')</script>";
              echo "<script>window.location = '../user_list.php'</script>";
            }
        }
        else
        {
          echo " <script>alert('Please select user type!!!')</script>";
            echo "<script>window.location = '../user_list.php'</script>";
        }

      }

  }
  catch (PDOException $e) 
  {
      echo "Connection Failed " . $e->getMessage();
      die();
  
  }

}


?>