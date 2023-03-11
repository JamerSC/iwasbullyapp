<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';

//AppointmentID to Roman
function intToRoman($num) {
  $map = array(
      'M' => 1000,
      'CM' => 900,
      'D' => 500,
      'CD' => 400,
      'C' => 100,
      'XC' => 90,
      'L' => 50,
      'XL' => 40,
      'X' => 10,
      'IX' => 9,
      'V' => 5,
      'IV' => 4,
      'I' => 1
  );

  $roman = '';
  foreach ($map as $key => $value) {
      while ($num >= $value) {
          $roman .= $key;
          $num -= $value;
      }
  }
  return $roman;
}

//

    $stmt = $conn->prepare("
    
      
      SELECT * 
      FROM Report as T1
      JOIN Appointment as T2 
      ON T1.ReportID = T2.ReportID
    
    ");

    $stmt->execute();
    $apppointment = $stmt->fetchAll(PDO::FETCH_OBJ);    
?>
<div class="container my-3">
  <h3 class="text-center">Counseling Appointment Schedule</h3>

      <div class="table-responsive my-3">
        <table class="table align-middle table-hover table-striped">
          <thead class="table-dark">
            <tr class="text-start">
              <th>#</th>
              <th>Report No.</th>
              <th>Complainant</th>
              <th>Repondent</th>
              <th>Appointment Date</th>
              <th>Day</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Status</th>
              <th>View</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($apppointment as $apppointments): ?>
            <tr class="text-start">
              <td><b><?= intToRoman($apppointments->AppointmentID); ?></b></td>
              <td class="text-center"><?= $apppointments->ReportID; ?></td>
              <td><?= $apppointments->C_Firstname." ".$apppointments->C_Lastname; ?></td>
              <td><?= $apppointments->R_Firstname." ".$apppointments->R_Lastname; ?></td>
              <td><?= date("F d, Y", strtotime($apppointments->AppointmentDate)); ?></td>
              <td><?= date("l", strtotime($apppointments->AppointmentDate)); ?></td>
              <td><?= date("h:i a", strtotime($apppointments->StartTime))?></td>
              <td><?= date("h:i a", strtotime($apppointments->EndTime))?></td>
              <?php if($apppointments->AppointmentStatus == 0): ?>
              <td><button type="button" class="btn btn-warning">Enabled</button></td>
              <?php else: ?>
              <td><button type="button" class="btn btn-danger">Canceled</button></td>
              <?php endif; ?>  
              <td><button type="button" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></button></td>
              <td><button type="button" class="btn btn-outline-success"><i class="bi bi-pencil-fill"></i></button></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</div>


<?php require '../components/footer.php' ;?>