<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwasbullyapp_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected!";
    //echo "<script>alert('Connected!');</script>";

    //$stmt = $conn->prepare("
    //    INSERT INTO Users (UserRole, Firstname, Lastname,
    //    SchoolIDNumber, Email, Username, Password, UserStatus)
    //    VALUES('1', 'Jamer', 'Catalla', '20230001', 'mr.catalla28@gmail.com',
    //    'admin', '123', 1);
    //");
    //$stmt->execute();

    //echo "Data inserted!";
    
} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
    die();
}

?>