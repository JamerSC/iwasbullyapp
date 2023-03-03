<?php 
require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<div class="container my-3">
  <h3 class="text-center">Counseling Appointment Schedule</h3>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-person-plus"></i>
    Create Appointment
    </button>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Appointment No.</th>
              <th>Complainant Name</th>
              <th>Date</th>
              <th>Day</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>View</th>
              <th>Update</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>20230001</td>
              <td>Juan</td>
              <td>03/15/2023</td>
              <td>Wednesday</td>
              <td>04:00pm</td>
              <td>05:00pm</td>
              <td>View</td>
              <td>Update</td>
              <td>On-going</td>
            </tr>
            <tr>
              <td>2</td>
              <td>20230002</td>
              <td>Ronilo</td>
              <td>03/31/2023</td>
              <td>Friday</td>
              <td>08:00am</td>
              <td>10:00am</td>
              <td>View</td>
              <td>Update</td>
              <td>Pending</td>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <!-- Appointment Form -->

      <form method="post" action="#insert_appointment.php">
        <div class="input-group mb-3">
          <label class="input-group-text" for="date">Date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="time">Time</label>
          <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="phone">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary form-control">Save</button>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
 


<?php require '../components/footer.php' ;?>