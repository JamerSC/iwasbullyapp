<nav class="navbar sticky-top navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Iwas Bully App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if($role == 'admin'){ ?>
      <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="post.php">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointment.php">Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report.php">Report</a>
        </li>

        <?php } ?>
        <?php if($role == 'student' || $role == 'teacher'){ ?>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="counsel_sched.php">Counsel Appointment</a>
        </li>
        <?php } ?>

        <?php if($role == 'admin' || $role == 'student' || $role == 'teacher'){ ?>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chat.php">Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../function/logout.php">Logout</a>
        </li>
      </ul>
      <?php } ?>

      <span class="navbar-text text-lg-start">
        <?php echo '<b>' . ucfirst($role) . '</b>'; ?>
      </span>
      
    </div>
  </div>
</nav>