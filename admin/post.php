<?php

require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';

?>

<div class="container position-relative">
  <h1 class="fs-1">HOME</h1>
  <div class="position-absolute top-0 start-50 translate-middle-x grid gap-3">
    <div class="p-4 mb-4 shadow-lg bg-body-tertiary rounded" style="max-width: 800px;">
      <form action="#" method="#" enctype="multipart/form-data">
        <h3>Create Post</h3>
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
        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-outline-primary">
          <i class="bi bi-plus-circle-fill"></i><b> Add Post</b></button>
        </div>
      </form>
      <hr><hr>
<?php 

    //Descending order using id or date/created at
    $stmt = $conn->prepare("
      SELECT * FROM images ORDER BY img_id DESC
    "); 
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
      <?php foreach ($images as $image): ?>

          <div class="card-body my-5">
            <h5 class="card-title">Card Title</h5>
            <p class="card-text"><?= $image['post']; ?></p>
            <p class="card-text"><small class="text-muted">Posted date: mm/dd/yyyy</small></p>
          </div>

          <?php if(!empty($image['image'])): ?>
          <a href="<?= 'uploads/'.$image['image']; ?>" target="_blank">
            <img src="<?= 'uploads/'.$image['image']; ?>" class="card-img-bottom object-fit-cover 
              shadow-lg p-3 mb-5 bg-body-tertiary rounded" alt="Something error. Can't retrieve image"/>
          </a>
          <?php endif; ?>

          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" 
                        data-bs-target="#updatePost<?= $image->img_id ?>">
            <i class="bi bi-pencil"> Update</i>
            </button>
          </div>
          <hr>
          <hr>
          <br>
      <?php endforeach; ?>
    </div>
  </div>
</div> 

<?php include 'post/post_modal.php'; ?>


<?php require '../components/footer.php' ;?>