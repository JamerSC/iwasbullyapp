<?php

session_start();

require_once 'connection.php';

    $id = $_GET['id'];
    $status = 0;

    try{

        $stmt = $conn->prepare
        ("UPDATE users SET status = :status WHERE user_id = :user_id;");
        $stmt->execute([
            'status' => $status,
            'user_id' => $id
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