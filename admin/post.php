<?php

require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>

  <h3>Post</h3>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create Post
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Post form -->

        <form action="create_post.php" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label class="input-group-text" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group mb-3">
            <label class="input-group-text" for="content">Content</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
          </div>
          <div class="form-group mb-3">
            <label class="input-group-text" for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
          </div>
          <button type="submit" class="btn btn-primary form-control">Post</button>
        </form>

        
        <!--
        <form method="post" action="add_post.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Post</button>
        </form> 
          -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<?php require '../components/footer.php' ;?>