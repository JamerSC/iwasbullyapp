<?php

session_start();

$id = $_SESSION['id'];
$role = $_SESSION['role'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];


if(!isset($id) && isset($role) && isset($fname) && isset($lname)){
    header('location:../index.php');
}


?>