<!-- Activate account modal-->

<div class="modal fade" id="activateAccount_<?= $users->UserID; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Activate User No. <?= $users->UserID; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to activate<h1 class="modal-title fs-5" id="staticBackdropLabel"> <?= $users->Firstname ?> <?= $users->Lastname ?> ?</h1>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
        <a type="button" class="btn btn-primary" href="user_account/activate_account.php?id=<?= $users->UserID; ?>">Please Confirm</a>
      </div>
    </div>
  </div>
</div>