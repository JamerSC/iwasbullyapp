<!-- Modal -->
<div class="modal fade" id="viewAccount_<?= $users->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">View User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="crud/update_account.php?id=<?= $users->user_id; ?>">
           <!-- user type -->
            <div class="input-group mb-3">
                <label for="ufirstname" class="input-group-text">User type</label>
                <input type="text" class="form-control" id="ufirstname" name="ufirstname" 
                value="<?= ucfirst($users->role); ?>" disabled>
            </div>
            <!-- ID No. -->
            <div class="input-group mb-3">
                <label for="usch_id_no" class="input-group-text">School ID No.</label>
                <input type="text" class="form-control" id="usch_id_no"  name="usch_id_no"
                value="<?= $users->sch_id_no; ?>" disabled>
            </div>
            <!-- firstname -->
            <div class="input-group mb-3">
                <label for="ufirstname" class="input-group-text">Firstname</label>
                <input type="text" class="form-control" id="ufirstname" name="ufirstname" 
                value="<?= $users->firstname; ?>" disabled>
            </div>
            <!-- lastname-->
            <div class="input-group mb-3">
                <label for="ulastname" class="input-group-text">Lastname</label>
                <input type="text" class="form-control" id="ulastname"  name="ulastname"
                value="<?= $users->lastname; ?>" disabled>
            </div>
            <!-- email -->
            <div class="input-group mb-3">
                <label for="uemail" class="input-group-text">Email address</label>
                <input type="email" class="form-control" id="uemail" name="uemail"
                value="<?= $users->email; ?>" disabled>
            </div>
            <!-- Username -->
            <div class="input-group mb-3">
                <label for="uusername" class="input-group-text">Username</label>
                <input type="email" class="form-control" id="uusername" name="uusername" 
                value="<?= $users->username; ?>" disabled>
            </div>
            <!-- Password -->
        </form>        
        
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

