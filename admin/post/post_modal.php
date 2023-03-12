
<!-- Update Post Modal -->
<div class="modal fade" id="updatePost_<?= $image->img_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="#" method="#" enctype="multipart/form-data">
        <h3>Create Post</h3>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <br>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content">
           <?= $image->post; ?>
          </textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <br>
        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">
          <i class="bi bi-pencil"></i> Update Post</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>