<?php
// Create PDO connection
$pdo = new PDO("mysql:host=localhost;dbname=my_database", "username", "password");

  // Prepare SQL statement
$stmt = $pdo->prepare("INSERT INTO posts (title, content, image) VALUES (:title, :content, :image)");

  // Retrieve form values
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$image_name = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

// Move uploaded image to server
$uploads_dir = 'uploads/';
$image_path = $uploads_dir . uniqid() . '_' . $image_name;
move_uploaded_file($image_temp, $image_path);

// Bind values to SQL statement
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':image', $image_path);

// Execute SQL statement
$stmt->execute();

// Redirect user to post display page
header("Location: post.php?id=" . $pdo->lastInsertId());
exit();

?>