<?php

require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>

<div class="container position-relative my-3">
  <h1 class="fs-1">HOME</h1>
  <div class="position-absolute top-10 start-50 translate-middle-x grid gap-3">
    <div class="p-4 m-4 g-col-6 bg-info">
      <form action="#" method="#" enctype="multipart/form-data">
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

    //Descending order using id or date/created at
    $stmt = $conn->prepare("SELECT image, post FROM images ORDER BY img_id DESC"); 
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <?php foreach ($images as $image): ?>
    <div class="card p-5 m-5" style="width: 40rem;">
      <?php if(!empty($image['image'])): ?>
      <a href="<?= 'uploads/'.$image['image']; ?>">
      <img src="<?= 'uploads/'.$image['image']; ?>" class="card-img-top" alt="Something error. Can't retrieve image" style="width: 100%; display: flex; height: auto;">
      </a>
      <?php endif; ?>
      <div class="card-body">
        <p class="card-text"><?= $image['post']; ?></p>
      </div>
    </div>
    <?php endforeach; ?>
    
  </div>
</div> 




<?php require '../components/footer.php' ;?>