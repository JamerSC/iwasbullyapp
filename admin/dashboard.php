<?php 
require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
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
</div>

<?php require '../components/footer.php' ;?>