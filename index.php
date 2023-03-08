<?php 
require 'components/header.php'; 
require 'components/indexnav.php';
?>
 <!-- login -->
<div class="container mt-3">
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="loginModalLabel">Login</h4>
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
                    <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
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
                    <h4 class="modal-title" id="signupModalLabel">Sign Up</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="function/signup_process.php">
                       <!-- user type -->
                        <div class="input-group mb-3">
                        <label class="input-group-text" for="createRole">User type</label>
                        <select class="form-select" id="createRole" name="createRole">
                            <option selected disabled>Select your user type.</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                        </select>
                        </div>
                        <!-- firstname -->
                        <div class="input-group mb-3">
                            <label for="createFirstname" class="input-group-text">Firstname</label>
                            <input type="text" class="form-control" id="createFirstname" name="createFirstname" 
                            placeholder="Enter your first name" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="createLastname" class="input-group-text">Lastname</label>
                            <input type="text" class="form-control" id="createLastname"  name="createLastname"
                            placeholder="Enter your last name" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="createSchoolIDNo" class="input-group-text">Sch. ID No.</label>
                            <input type="text" class="form-control" id="createSchoolIDNo"  name="createSchoolIDNo"
                            placeholder="Enter school ID no." required>
                        </div>
                        <!-- email -->
                        <div class="input-group mb-3">
                            <label for="createEmail" class="input-group-text">Email add</label>
                            <input type="email" class="form-control" id="createEmail" name="createEmail"
                            placeholder="Enter your email add" required>
                        </div>
                        <!-- Username -->
                        <div class="input-group mb-3">
                            <label for="createUsername" class="input-group-text">Create Username</label>
                            <input type="email" class="form-control" id="createUsername" name="createUsername" 
                            placeholder="email@example.com" required>
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <label for="createPassword" class="input-group-text">Create Password</label>
                            <input type="password" class="form-control" id="createPassword" name="createPassword" 
                            placeholder="Example@123" required>
                            <button class="btn btn-secondary" type="button" id="showSignupPassword">
                            <i id="iconEyeSignup" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="mb-3">
                            <p><small class="fst-italic lh-1">Enter atleast 8 character with number, sysmbol, small, and capital letter.</small></p>
                        </div>
                        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        <div>
    <div>
</div>

    <!-- JS password toggle -->
    <script src="assets/loginSignupToggle.js?v1"></script>
    
<?php require 'components/footer.php' ;?>