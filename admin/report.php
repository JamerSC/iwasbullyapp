<?php 

require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>

  <h1>Complaint Report</h1>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create New Report
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Report form -->
      
       <h1>Complaint Report</h1>

       <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="category">Type of Bullying:</label>
              <select class="form-control" id="category" name="category">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="description">Remarks:</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
 
 


<?php require '../components/footer.php' ;?>