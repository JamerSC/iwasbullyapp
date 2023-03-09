<!-- Update Report Modal -->
<div class="modal fade" id="updateReport_<?= $reports->ReportID; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Report No. <?= $reports->ReportID; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Update form -->
        <form method="post" enctype="multipart/form-data" action="report/update_report.php">
            <!-- Complainant -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Complainant</div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Firstname"
               aria-label="Firstname" value="<?= $reports->C_Firstname; ?>" name="C_Firstname" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Lastname"
               aria-label="Lastname" value="<?= $reports->C_Lastname; ?>" name="C_Lastname" required>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="School ID No." 
              aria-label="School ID No." value="<?= $reports->C_SchoolIDNumber; ?>" name="C_SchoolIDNumber" required>
            </div>
             <div class="col-sm-3">
              <label class="visually-hidden" for="C_UserRole">Year level</label>
              <select class="form-select" name="C_UserRole">
                <option selected disabled><?= $reports->C_UserRole; ?></option>
                <option value="1">Junior</option>
                <option value="2">Senior</option>
                <option value="3">Teacher</option>
                <option value="4">Guidance Office</option>
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Email" 
              aria-label="Email" value="<?= $reports->C_Email; ?>" name="C_Email" required>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Contact No." 
              aria-label="Contact No." value="<?= $reports->C_ContactNumber; ?>" name="C_ContactNumber" required>
            </div>
          </div>

         <!-- Respondent -->
         <div class="row g-3 mb-3">
          <div class="fw-bold">Respondent</div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Firstname"
               aria-label="Firstname" value="<?= $reports->R_Firstname; ?>" name="R_Firstname" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Lastname"
               aria-label="Lastname" value="<?= $reports->R_Lastname; ?>" name="R_Lastname" required>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="School ID No." 
              aria-label="School ID No." value="<?= $reports->R_SchoolIDNumber; ?>" name="R_SchoolIDNumber" required>
            </div>
             <div class="col-sm-3">
              <label class="visually-hidden" for="R_UserRole">Year level</label>
              <select class="form-select" name="R_UserRole">
                <option selected disabled><?= $reports->R_UserRole; ?></option>
                <option value="1">Junior</option>
                <option value="2">Senior</option>
                <option value="3">Teacher</option>
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Email" 
              aria-label="Email" value="<?= $reports->R_Email; ?>" name="R_Email" required>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Contact No." 
              aria-label="Contact No." value="<?= $reports->R_ContactNumber; ?>"  name="R_ContactNumber" required>
            </div>
          </div>
           <!-- Act of Bullying -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Type of Bullying</div>
            <div class="col-sm-5">
              <label class="visually-hidden" for="autoSizingSelect">Select ...</label>
              <select class="form-select" id="autoSizingSelect" name="TypeOfBullying">
                <option selected disabled><?= $reports->TypeOfBullying; ?></option>
                <option value="1">Verbal</option>
                <option value="2">Physical</option>
                <option value="3">Social</option>
                <option value="3">Cyberbulling</option>
              </select>
            </div>
          </div>
           <!-- Attachments -->
          <div class="row g-3 mb-3">
            <div class="fw-bold">Attachments<i class="fw-lighter">(If available)</i></div>
            <div class="col">
              <label for="ImageProof">Image</label>
              <img src="<?= $reports->ImageProof ?>" alt="image_blank" width="50" height="50">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Paste Video Link" 
              aria-label="Paste Video Link" value="<?= $reports->VideoLink; ?>" name="VideoLink">
            </div>
          </div>
          <!-- Remarks -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Remarks <i class="fw-lighter">(If available)</i></div>
            <div class="col">
              <textarea class="form-control" rows="3" placeholder="Leave a comment here"
              aria-label="Leave a comment here" name="Remarks"><?= $reports->Remarks; ?></textarea>
            </div>
          </div>
          <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="update">Update Report</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>