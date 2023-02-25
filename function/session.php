<?php

session_start();

$id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];

if(!isset($id) && isset($role)){
    header('location:../index.php');
}


?>