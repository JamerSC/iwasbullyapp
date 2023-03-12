<nav class="navbar fixed-top navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <i class="bi bi-slash-circle"></i> Iwas Bully App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        <!-- < ?php if($users->role == 'councilor') { echo 'display: none;'; } ? > -->
      <?php if($UserRole == 'Councilor' || $UserRole == 'Staff' || $UserRole == 'Intern'  ): ?>
      
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
          <i class="bi bi-speedometer"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="post.php">
          <i class="bi bi-megaphone"></i> Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointment.php">
          <i class="bi bi-calendar-check"></i> Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report.php">
          <i class="bi bi-pencil-square"></i> Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_list.php">
          <i class="bi bi-people"></i> Users</a>
        </li>
      <?php endif; ?>

      <?php if($UserRole == 'Student' || $UserRole == 'Teacher'): ?>
        <li class="nav-item">
          <a class="nav-link" href="home.php">
          <i class="bi bi-house"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="counsel_sched.php">
          <i class="bi bi-calendar"></i> Schedule</a>
        </li>
      <?php endif; ?>
      <?php if($UserRole == 'Councilor' || $UserRole == 'Student' || $UserRole == 'Teacher'): ?>
        <li class="nav-item">
          <a class="nav-link" href="chat.php">
          <i class="bi bi-chat-left-dots"></i> Chat</a>
        </li>
      <?php endif; ?>
      <?php if($UserRole == 'Student' || $UserRole == 'Teacher'): ?>
          <li class="nav-item">
          <a class="nav-link" href="profile.php">
          <i class="bi bi-person-circle"></i> Profile</a>
        </li>
      <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="../function/logout.php"
          onclick="return confirm('Are you sure you want to LOGOUT? \n\n Just click \'OK\'!');">
          <i class="bi bi-box-arrow-in-left"></i> Logout</a>
        </li>
        
      </ul>
        <span class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <?php echo '<b>['.$UserRole."] ".$Firstname." ".$Lastname.'</b>'; ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li class="dropdown-item">
            <a class="nav-link" href="profile.php">
            <i class="bi bi-person-circle"></i> My Profile</a>
            </li>
            <li class="dropdown-item">
              <a class="nav-link" href="../function/logout.php"
              onclick="return confirm('Are you sure you want to LOGOUT? \n\n Just click \'OK\'!');">
              <i class="bi bi-box-arrow-in-left"></i> Logout</a>
            </li>
        </ul>
      </span>
    </div>
  </div>
</nav>