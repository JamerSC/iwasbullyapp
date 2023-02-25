<?php
// Get the form data
$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Set up the database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "appointment_db";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// Insert the data into the database
$sql = "INSERT INTO appointments (date, time, name, email, phone)
        VALUES (:date, :time, :name, :email, :phone)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':time', $time);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

// Redirect back to the appointment form
header("Location: appointment_form.php");
exit();

?>
