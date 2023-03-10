<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';

    $stmt = $conn->prepare("SELECT * FROM Appointment;");
    $stmt->execute();
    $report = $stmt->fetchAll(PDO::FETCH_OBJ);    
?>
<div class="container my-3">
  <h3 class="text-center">Counseling Appointment Schedule</h3>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Report No.</th>
              <th>Date</th>
              <th>Day</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
              <th>View</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($report as $reports): ?>
            <tr>
              <td><?= $reports->AppointmentID; ?></td>
              <td><?= $reports->ReportID; ?></td>
              <td><?= date("F d, Y", strtotime($reports->AppointmentDate)); ?></td>
              <td><?= $reports->AppointmentDay; ?></td>
              <td><?= date("h:i a", strtotime($reports->StartTime))?></td>
              <td><?= date("h:i a", strtotime($reports->EndTime))?></td>
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