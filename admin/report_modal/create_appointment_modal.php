<!-- Appointment Modal -->
<div class="modal fade" id="createAppointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Appointment form -->
        <form method="post" action="insert_appointment.php">

         <div class="row g-3 mb-3">
              <div class="input-group col">
              <label class="input-group-text" for="day">Report No.</label>
              <input type="text" class="form-control" value="20230001" disabled>
            </div>
            <div class="input-group col">
              <label class="input-group-text" for="day">Act of Bullying</label>
              <input type="text" class="form-control" value="Verbal" disabled>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="fw-bold">Complainant</div>
              <div class="col">
                <input type="text" class="form-control" value="Firstname" disabled>
              </div>
              <div class="col">
                <input type="text" class="form-control" value="Lastname" disabled>
              </div>
          </div>

          <div class="row g-3 mb-3">
          <div class="fw-bold">Respondent</div>
            <div class="col">
              <input type="text" class="form-control" value="Firstname" disabled>
            </div>
            <div class="col">
              <input type="text" class="form-control" value="Lastname" disabled>
            </div>
          </div>
        

         <div class="row g-3 mb-3">
          <div class="fw-bold">Appoinment Date</div>
          <div class="input-group col">
              <label class="input-group-text" for="day">Date</label>
               <input type="date" class="form-control" id="date" name="date" required>
          </div>
            <div class="input-group col">
              <label class="input-group-text" for="day">Day</label>
              <select class="form-select" id="day" name="day">
                <option selected disabled>Select ...</option>
                <option value="1">Monday</option>
                <option value="2">Tuesday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
                <option disabled>Saturday</option>
                <option disabled>Sunday</option>
              </select>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="fw-bold">Appoinment Time</div>
          <div class="input-group col">
          <label class="input-group-text" for="start">Start</label>
          <input type="time" class="form-control" id="start" name="start" required> 
          </div>
          <div class="input-group col">
          <label class="input-group-text" for="end">End</label>
            <input type="time" class="form-control" id="end" name="end" required>
          </div>
        </div>
        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Appointment</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>