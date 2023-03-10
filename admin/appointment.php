<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';

    $stmt = $conn->prepare("SELECT * FROM Appointment;");
    $stmt->execute();
    $apppointment = $stmt->fetchAll(PDO::FETCH_OBJ);    
?>
<div class="container my-3">
  <h3 class="text-center">Counseling Appointment Schedule</h3>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Report No.</th>
              <th>Appointment Date</th>
              <th>Appointment Day</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
              <th>View</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($apppointment as $apppointments): ?>
            <tr>
              <td><?= $apppointments->AppointmentID; ?></td>
              <td><?= $apppointments->ReportID; ?></td>
              <td><?= date("F d, Y", strtotime($apppointments->AppointmentDate)); ?></td>
              <td><?= $apppointments->AppointmentDay; ?></td>
              <td><?= date("h:i a", strtotime($apppointments->StartTime))?></td>
              <td><?= date("h:i a", strtotime($apppointments->EndTime))?></td>
              <td><button type="button" class="btn btn-primary">In-process</button></td>
              <td><button type="button" class="btn btn-secondary">View</button></td>
              <td><button type="button" class="btn btn-success">Update</button></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</div>


<?php require '../components/footer.php' ;?>