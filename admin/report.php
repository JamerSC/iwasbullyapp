<?php 

require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>

<?php 
    $stmt = $conn->prepare("SELECT * FROM Report;");
    $stmt->execute();
    $report = $stmt->fetchAll(PDO::FETCH_OBJ);    
?>
<div class="container  my-3">
  <h3 class="text-center">Complaint Report Records</h3>
    <?php if($UserRole == 'Councilor' || $UserRole == 'Staff'): ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewReport">
    <i class="bi bi-person-plus"></i>
    Create Report
    </button>
    <?php endif; ?>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>Report No.</th>
              <th>Complainant</th>
              <th>Respondent</th>
              <th>Type of Bullying</th>
              <th>View</th>
              <th>Update</th>
              <th>Appointment</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php foreach($report as $reports): ?>
              <td><?= $reports->ReportID; ?></td>
              <td><?= $reports->C_Lastname; ?></td>
              <td><?= $reports->R_Lastname; ?></td>
              <td><?= $reports->TypeOfBullying; ?></td>
              <td>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" 
                data-bs-target="#viewReport_<?= $reports->ReportID; ?>">
                <i class="bi bi-eye"> View</i>
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" 
                data-bs-target="#updateReport_<?= $reports->ReportID; ?>">
                  <i class="bi bi-pencil-square"> Update</i>
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" 
                data-bs-target="#createAppointment_<?= $reports->ReportID; ?>">
                <i class="bi bi-calendar-plus"> Create</i>
                </button>
              </td>
              <?php include 'report_modal/view_report_modal.php'; ?>
              <?php include 'report_modal/update_report_modal.php'; ?>
              <?php include 'report_modal/create_appointment_modal.php'; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

</div>

<!-- Create Report -->
<div class="modal fade" id="createNewReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Report form -->
       <form method="post" enctype="multipart/form-data" action="report/create_report.php">
            <!-- Complainant -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Complainant</div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Firstname"
               aria-label="Firstname" name="C_Firstname" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Lastname"
               aria-label="Lastname" name="C_Lastname" required>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="School ID No." 
              aria-label="School ID No." name="C_SchoolIDNumber" required>
            </div>
             <div class="col-sm-3">
              <label class="visually-hidden" for="C_UserRole">Year level</label>
              <select class="form-select" name="C_UserRole">
                <option selected disabled>Year level or Position</option>
                <option value="1">Junior</option>
                <option value="2">Senior</option>
                <option value="3">Teacher</option>
                <option value="4">Guidance Office</option>
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Email" 
              aria-label="Email" name="C_Email" required>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Contact No." 
              aria-label="Contact No." name="C_ContactNumber" required>
            </div>
          </div>

         <!-- Respondent -->
         <div class="row g-3 mb-3">
          <div class="fw-bold">Respondent</div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Firstname"
               aria-label="Firstname" name="R_Firstname" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Lastname"
               aria-label="Lastname" name="R_Lastname" required>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="School ID No." 
              aria-label="School ID No." name="R_SchoolIDNumber" required>
            </div>
             <div class="col-sm-3">
              <label class="visually-hidden" for="R_UserRole">Year level</label>
              <select class="form-select" name="R_UserRole">
                <option selected disabled>Year level or Position</option>
                <option value="1">Junior</option>
                <option value="2">Senior</option>
                <option value="3">Teacher</option>
              </select>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Email" 
              aria-label="Email" name="R_Email" required>
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Contact No." 
              aria-label="Contact No." name="R_ContactNumber" required>
            </div>
          </div>
           <!-- Act of Bullying -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Type of Bullying</div>
            <div class="col-sm-5">
              <label class="visually-hidden" for="autoSizingSelect">Select ...</label>
              <select class="form-select" id="autoSizingSelect" name="TypeOfBullying">
                <option selected disabled>Select ...</option>
                <option value="1">Verbal</option>
                <option value="2">Physical</option>
                <option value="3">Social</option>
                <option value="4">Cyberbullying</option>
              </select>
            </div>
          </div>
           <!-- Attachments -->
          <div class="row g-3 mb-3">
            <div class="fw-bold">Attachments<i class="fw-lighter">(If available)</i></div>
            <div class="col">
              <label class="input-group-text" for="ImageProof">Image</label>
              <input type="file" class="form-control-file" name="ImageProof">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Paste Video Link" 
              aria-label="Paste Video Link" name="VideoLink">
            </div>
          </div>
          <!-- Remarks -->
          <div class="row g-3 mb-3">
          <div class="fw-bold">Remarks <i class="fw-lighter">(If available)</i></div>
            <div class="col">
              <textarea class="form-control" rows="3" placeholder="Leave a comment here"
              aria-label="Leave a comment here" name="Remarks"></textarea>
            </div>
          </div>
          <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="report">Save Report</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
 
<?php require '../components/footer.php' ;?>