<!-- Create Appointment Modal -->
<div class="modal fade" id="createAppointment_<?= $reports->ReportID; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Appointment form -->
        <form method="post" action="report/create_appointment.php?id=<?= $reports->ReportID; ?>">

         <div class="row g-3 mb-3">
              <div class="input-group col">
              <label class="input-group-text" for="day">Report No.</label>
              <input type="text" class="form-control" value="<?= $reports->ReportID; ?>" disabled>
            </div>
            <div class="input-group col">
              <label class="input-group-text" for="day">Act of Bullying</label>
              <input type="text" class="form-control" value="<?= $reports->TypeOfBullying; ?>" disabled>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="fw-bold">Complainant</div>
              <div class="col">
                <input type="text" class="form-control" name="ComplainantName"
                value="<?= $reports->C_Firstname." ".$reports->C_Lastname; ?>" disabled>
              </div>
          </div>

          <div class="row g-3 mb-3">
          <div class="fw-bold">Respondent</div>
            <div class="col">
              <input type="text" class="form-control" name="RespondentName"
              value="<?= $reports->R_Firstname." ".$reports->R_Lastname; ?>" disabled>
            </div>
          </div>
        

         <div class="row g-3 mb-3">
          <div class="fw-bold">Appoinment Date</div>
          <div class="input-group col">
              <label class="input-group-text" for="AppointmentDate">Date</label>
               <input type="date" class="form-control" name="AppointmentDate"  required>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="fw-bold">Appoinment Time</div>
          <div class="input-group col">
          <label class="input-group-text" for="start">Start</label>
          <input type="time" class="form-control" name="StartTime" required> 
          </div>
          <div class="input-group col">
          <label class="input-group-text" for="end">End</label>
            <input type="time" class="form-control" name="EndTime" required>
          </div>
        </div>
        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="appointment">Save Appointment</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>