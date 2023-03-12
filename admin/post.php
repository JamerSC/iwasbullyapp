<?php

require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';

?>

<div class="container position-relative">
  
  <div class="position-absolute top-0 start-50 translate-middle-x grid gap-3">
    <div class="p-5 mb-5 shadow-lg bg-body-tertiary rounded" style="width: 700px">
      
    <form action="post/create_post.php?" method="POST" enctype="multipart/form-data">
        <h1 class="fs-1">HOME</h1>
        <hr>
        <h3>Create Post</h3>
        <br>
        <div class="form-group">
          <label for="PostHeader">Title</label>
          <input type="text" class="form-control" 
          placeholder="Create title" name="PostHeader" required>
        </div>
        <br>
        <div class="form-group">
          <label for="PostBody">Content</label>
          <textarea class="form-control" placeholder="Create a post" name="PostBody" required></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="PostImage">Image</label>
          <input type="file" class="form-control-file" name="PostImage">
        </div>
        <br>
        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-outline-primary" name="post">
          <i class="bi bi-plus-circle-fill"></i><b> Add Post</b></button>
        </div>
      </form>
      <hr><hr>
      
<?php 
    $stmt = $conn->prepare
    ("SELECT * FROM
            Users as T1 
            INNER JOIN 
            Post as T2 
            ON T1.UserID = T2.UserID 
            ORDER BY T2.PostID DESC;"
    ); 
    $stmt->execute();
    $post = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
        <?php foreach($post as $posted): ?>
          <div class="card-body my-5">
            <h5 class="card-title"><?= $posted->PostHeader; ?></h5>
            <p class="card-text"><?= $posted->PostBody; ?></p>
            <p class="card-text"><small class="text-muted">#<?= $posted->PostID;?>.
              Posted By: <?= $posted->UserRole." - ".date("F d, Y; h:i a", strtotime($posted->CreatedDate)); ?>
            </small></p>
          </div>
          <?php if(!empty($posted->PostImage)): ?>
          <a href="<?= 'uploads/'.$posted->PostImage; ?>" target="_blank">
            <img src="<?= 'uploads/'.$posted->PostImage; ?>" class="card-img-bottom object-fit-cover 
              shadow-lg p-3 mb-5 bg-body-tertiary rounded" alt="Error! Can't load image"/>
          </a>
          <?php endif;?>
          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" 
            data-bs-target="#updatePost_<?= $posted->PostID; ?>">
              <i class="bi bi-pencil"> Update</i>
            </button>
          </div>
          <hr><hr>
        <?php endforeach; ?>
    </div>
  </div>
</div> 




<?php require '../components/footer.php' ;?>