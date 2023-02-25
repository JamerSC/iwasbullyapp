<?php
$dsn = 'mysql:host=localhost;dbname=mydatabase';
$username = 'myusername';
$password = 'mypassword';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Upload image file to server
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    // Insert data into database
    $stmt = $pdo->prepare('INSERT INTO reports (name, email, category, description, image) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, $category, $description, $image]);

    // Redirect to success page
    header('Location: success.php');
}
?>
