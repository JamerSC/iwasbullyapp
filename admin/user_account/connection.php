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

} 
catch (PDOException $e) 
{
    echo "Connection Failed " . $e->getMessage();
    die();

}


?>