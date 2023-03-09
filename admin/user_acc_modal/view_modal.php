<!-- View Account Modal -->
<div class="modal fade" id="viewAccount_<?= $users->UserID; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">View User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
           <!-- user type -->
            <div class="input-group mb-3">
                <label class="input-group-text">User type</label>
                <input type="text" class="form-control"
                value="<?= $users->UserRole; ?>" disabled>
            </div>
            <!-- ID No. -->
            <div class="input-group mb-3">
                <label class="input-group-text">School ID No.</label>
                <input type="text" class="form-control"
                value="<?= $users->SchoolIDNumber; ?>" disabled>
            </div>
            <!-- firstname -->
            <div class="input-group mb-3">
                <label class="input-group-text">Firstname</label>
                <input type="text" class="form-control"
                value="<?= $users->Firstname; ?>" disabled>
            </div>
            <!-- lastname-->
            <div class="input-group mb-3">
                <label class="input-group-text">Lastname</label>
                <input type="text" class="form-control" 
                value="<?= $users->Lastname; ?>" disabled>
            </div>
            <!-- email -->
            <div class="input-group mb-3">
                <label class="input-group-text">Email address</label>
                <input type="email" class="form-control"
                value="<?= $users->Email; ?>" disabled>
            </div>
            <!-- Username -->
            <div class="input-group mb-3">
                <label class="input-group-text">Username</label>
                <input type="email" class="form-control" 
                value="<?= $users->Username; ?>" disabled>
            </div>
            <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </form>        
      </div>
    </div>
  </div>
</div>


