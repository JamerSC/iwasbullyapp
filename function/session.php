<?php

session_start();

$UserID = $_SESSION['UserID'];
$UserRole = $_SESSION['UserRole'];
$Firstname = $_SESSION['Firstname'];
$Lastname = $_SESSION['Lastname'];


if(!isset($UserID) && isset($UserRole) && isset($Firstname) && isset($Lastname)){
    header('location:../index.php');
}


?>