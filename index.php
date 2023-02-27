<?php 
require 'components/header.php'; 
require 'components/indexnav.php';
?>

<div class="container mt-3">
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="function/login_process.php">
                    <div class="input-group mb-3">
                        <label for="username" class="input-group-text">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                        placeholder="Enter your username"required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Enter your password" required>
                        <button class="btn btn-secondary" type="button" id="showLoginPassword">
                        <i id="iconEyeLogin" class="bi bi-eye"></i>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Sign up -->
    <div class="modal fade" id="signupModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Create your account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="function/signup_process.php">
                       <!-- user type -->
                        <div class="input-group mb-3">
                        <select class="form-select" id="role" name="role">
                            <option selected disabled>Select your user type.</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                        </select>
                        <label class="input-group-text" for="role">User type</label>
                        </div>
                        <!-- firstname -->
                        <div class="input-group mb-3">
                            <label for="firstname" class="input-group-text">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" 
                            placeholder="Enter your firts name"required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="lastname" class="input-group-text">Lastname</label>
                            <input type="text" class="form-control" id="lastname"  name="lastname"
                            placeholder="Enter your last name"required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="sch_id_no" class="input-group-text">School ID No.</label>
                            <input type="text" class="form-control" id="sch_id_no"  name="sch_id_no"
                            placeholder="Enter school ID no."required>
                        </div>
                        <!-- email -->
                        <div class="input-group mb-3">
                            <label for="email" class="input-group-text">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email add" required>
                        </div>
                        <!-- Username -->
                        <div class="input-group mb-3">
                            <label for="username" class="input-group-text">Create username</label>
                            <input type="text" class="form-control" id="username" name="username" 
                            placeholder="email@example.com"required>
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <label for="cpassword" class="input-group-text">Create Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" 
                            placeholder="Enter your password" required>
                            <button class="btn btn-secondary" type="button" id="showSignupPassword">
                            <i id="iconEyeSignup" class="bi bi-eye"></i>
                            </button>
                        </div>
                            <button type="submit" class="btn btn-primary form-control">Sign Up</button>
                    </form>
                </div>
            </div>
        <div>
    <div>
</div>

    <!-- JS password toggle -->
    <script src="assets/passToggle.js"></script>
    
<?php require 'components/footer.php' ;?>