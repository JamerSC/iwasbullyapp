<?php 
require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<div class="container my-3">
  <h3 class="text-center">Counseling Appointment Schedule</h3>

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
              <td><button type="button" class="btn btn-secondary">View</button></td>
              <td><button type="button" class="btn btn-success">Update</button></td>
              <td><button type="button" class="btn btn-warning">On-going</button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>20230002</td>
              <td>Ronilo</td>
              <td>03/31/2023</td>
              <td>Friday</td>
              <td>08:00am</td>
              <td>10:00am</td>
              <td><button type="button" class="btn btn-secondary">View</button></td>
              <td><button type="button" class="btn btn-success">Update</button></td>
              <td><button type="button" class="btn btn-warning">On-going</button></td>
            </tr>
          </tbody>
        </table>
      </div>
</div>


<?php require '../components/footer.php' ;?>