<!-- Modal -->
<div class="modal fade" id="updateAccount_<?= $users->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="user_account/update_account.php?id=<?= $users->user_id; ?>">
           <!-- user type -->
            <div class="input-group mb-3">
            <select class="form-select" name="updateRole">
                <option selected><?= ucfirst($users->role); ?></option>
                <option value="2">Student</option>
                <option value="3">Teacher</option>
                <option value="4">Staff</option>
                <option value="5">Intern</option>
            </select>
            <label class="input-group-text" for="updateRole">User type</label>
            </div>
            <!-- firstname -->
            <div class="input-group mb-3">
                <label for="updateFirstname" class="input-group-text">Firstname</label>
                <input type="text" class="form-control" name="updateFirstname" 
                value="<?= $users->firstname; ?>" placeholder="Enter your firstname" required>
            </div>
            <!-- lastname-->
            <div class="input-group mb-3">
                <label for="updateLastname" class="input-group-text">Lastname</label>
                <input type="text" class="form-control" name="updateLastname"
                value="<?= $users->lastname; ?>" placeholder="Enter your lastname" required>
            </div>
            <!-- lastname-->
            <div class="input-group mb-3">
                <label for="updateSchoolIDNo" class="input-group-text">School ID No.</label>
                <input type="text" class="form-control" name="updateSchoolIDNo"
                value="<?= $users->sch_id_no; ?>" placeholder="Enter school ID no." required>
            </div>
            <!-- email -->
            <div class="input-group mb-3">
                <label for="updateEmail" class="input-group-text">Email address</label>
                <input type="email" class="form-control" name="updateEmail"
                value="<?= $users->email; ?>" placeholder="Enter your email add" required>
            </div>
            <!-- Username -->
            <div class="input-group mb-3">
                <label for="updateUsername" class="input-group-text">Username</label>
                <input type="email" class="form-control" name="updateUsername" 
                value="<?= $users->username; ?>" placeholder="email@example.com" required>
            </div>
            <!-- Password -->
            <div class="input-group mb-3">
                <label for="updatePassword" class="input-group-text">Password</label>
                <input type="text" class="form-control" name="updatePassword" 
                value="<?= $users->password; ?>" placeholder="Enter your password" required>
            </div>
            <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="update">Update Account</button>
            </div>
        </form>        
      </div>
    </div>
  </div>
</div>

