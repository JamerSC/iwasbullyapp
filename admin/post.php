<?php

require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>

<div class="position-relative my-3">
  <h1 class="fs-1">HOME</h1>
  <div class="position-absolute top-10 start-50 translate-middle-x grid gap-3">
    <div class="p-4 m-4 g-col-6 bg-info">
      <form action="create_post.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <br>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
      <br><br>
    </div>

<?php 

    //$stmt = $conn->prepare("SELECT image FROM images");
    $stmt = $conn->prepare("SELECT image, post FROM images ORDER BY img_id DESC"); 
    //Descending order using id or date/created at

    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($images as $image) {
        $url = 'uploads/' . $image['image'];
        $posted = $image['post'];

        echo '<div class="p-4 m-5 g-col-6 bg-info">';
        echo '<a target="_blank" href="' . $url . '">';   //Open new tab for new image
        echo '<img src="' . $url . '" alt="report" style="width: 100%; display: flex; height: auto;">'; //display image
        echo '</a>';
        echo '<br>';
        echo '<br>';
        echo '<p>'. $posted .'</p>';
        echo '<br>';
        echo '</div>';
    }
?>
  </div>
</div> 




<?php require '../components/footer.php' ;?>