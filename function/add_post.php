<?php
$title = $_POST['title'];
$content = $_POST['content'];
$date_created = date('Y-m-d H:i:s');

$stmt = $pdo->prepare("INSERT INTO posts (title, content, date_created) VALUES (:title, :content, :date_created)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':date_created', $date_created);

if ($stmt->execute()) {
  echo "Post added successfully.";
} else {
  echo "Error adding post.";
}
?>
