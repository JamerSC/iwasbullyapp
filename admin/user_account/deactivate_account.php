<?php

session_start();

require_once 'connection.php';

    $UserID = $_GET['id'];

    $UserStatus = 0;

    try{

        $stmt = $conn->prepare
        ("UPDATE Users SET UserStatus = :UserStatus WHERE UserID = :UserID;");
        $stmt->execute([
            'UserStatus' => $UserStatus,
            'UserID' => $UserID
        ]);

        echo "
            <script>alert('Account Deactivated Successfuly!!')</script>";
        echo "<script>window.location = '../user_list.php'</script>";

    }
    catch (PDOException $e) 
    {
        echo "Connection Failed " . $e->getMessage();
        die();

    }

?>