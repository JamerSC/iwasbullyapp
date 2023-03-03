<?php 

require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<div class="container">
  <h3 class="text-center">Complaint Report Records</h3>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-person-plus"></i>
    Create Report
    </button>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Report No.</th>
              <th>Complainant</th>
              <th>Respondent</th>
              <th>Type of Bullying</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>20230001</td>
              <td>Juan</td>
              <td>Jose</td>
              <td>Physical</td>
            </tr>
            <tr>
              <td>2</td>
              <td>20230002</td>
              <td>Ronilo</td>
              <td>Marck</td>
              <td>Cyber</td>
            </tr>
          </tbody>
        </table>
      </div>

</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Report form -->
       <form method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <label class="input-group-text" for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="category">Type of Bullying</label>
              <select class="form-control" id="category" name="category">
                <option selected disabled>Select...</option>
                <option value="1">Verbal</option>
                <option value="2">Physical</option>
                <option value="3">Social</option>
                <option value="3">Cyber</option>
              </select>
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="image">Image</label>
              <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="description">Remarks</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        <button type="submit" class="btn btn-primary form-control">Save</button>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
 
 
<?php require '../components/footer.php' ;?>