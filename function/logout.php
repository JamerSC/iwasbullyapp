<?php

session_start();
session_destroy();
echo "<script>alert('Logout successfully!!')</script>";
echo "<script>window.location = '..//index.php'</script>";
//header('location: ../index.php');

?>