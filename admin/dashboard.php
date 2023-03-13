<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<!-- COMMENT
    <div class="container-fluid">
    <h3 class="fs-1">Dashboard</h3>
    <div class="row">
        <div class="col-sm-6">
        <h2>Panel 1</h2>
        <p>Some text goes here.</p>
    </div>
    <div class="col-sm-6">
        <h2>Panel 2</h2>
        <p>Some text goes here.</p>
    </div>
    </div>
     <div class="row">
    <div class="col-sm-12">
    <h2>Chart</h2>
        <canvas id="myChart"></canvas>
    </div>
    </div>
</div> -->


<?php 
    $stmt = $conn->prepare
    ("SELECT 
    COUNT(DISTINCT T1.UserID) as TotalUser, 
    COUNT(DISTINCT T2.ReportID) as TotalReport, 
    COUNT(DISTINCT T3.AppointmentID) as TotalAppointment
    FROM Users as T1
    LEFT JOIN Report as T2 
    ON T1.UserID = T2.UserID
    LEFT JOIN Appointment as T3
    ON T1.UserID = T3.UserID;
    "); 
    $stmt->execute();
    $fetch = $stmt->fetch(PDO::FETCH_ASSOC);  
?>  

<div class="container bg-dark d-flex justify-content-between" style="--bs-bg-opacity: .5;">
<div class="card text-bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Iwas Bully App Users</div>
  <div class="card-body">
    <h1 class="card-title">Total of Users <?php echo $fetch['TotalUser']; ?> </h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
    </svg>
  </div>
</div>
<div class="card text-bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Counseling Scheduled</div>
  <div class="card-body">
    <h1 class="card-title">Total Appointment <?php echo $fetch['TotalAppointment']; ?> 
    </h1>
    <span>
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar-day" viewBox="0 0 16 16">
    <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z"/>
    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
    </svg>
    </span>
    
  </div>
</div>
<div class="card text-bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Reports</div>
  <div class="card-body d-flex">
    <h1 class="card-title">Total of Reports <?php echo $fetch['TotalAppointment']; ?>  </h1>
  <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
  </svg>
  </div>
</div>

</div>

<?php require '../components/footer.php' ;?>