<!-- Deactivate accoount -->

<div class="modal fade" id="deactivateAccount_<?= $users->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deactivate User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Deactivate <strong> <?= $users->firstname ?> <?= $users->lastname ?> </strong> ?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
        <a type="button" class="btn btn-primary" href="crud/deactivate_account.php?id=<?= $users->user_id; ?>">Please Confirm</a>
      </div>
    </div>
  </div>
</div>