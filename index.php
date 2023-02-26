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
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                        placeholder="Enter your username"required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Enter your password" required>
                        <button class="btn btn-default" type="button" id="showLoginPassword">
                        <i id="iconEyeLogin" class="bi bi-eye"></i>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Create your account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        <div class="mb-3">
                            <label for="username" class="form-label">Create username</label>
                            <input type="text" class="form-control" id="username" 
                            placeholder="Enter your username"required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Create Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword"
                            name="cpassword" placeholder="Enter your password" required>
                            <button class="btn btn-default" type="button" id="showSignupPassword">
                            <i id="iconEyeSignup" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        <div>
    <div>
</div>

<?php require 'components/footer.php' ;?>