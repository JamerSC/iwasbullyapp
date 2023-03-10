<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<?php 
    $stmt = $conn->prepare("SELECT * FROM Users;");
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_OBJ);    
?>
    <div class="container my-3">
        <h3 class="text-center">List of Users</h3>   
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <?php if($UserRole == 'Councilor'): ?>
            <button class="btn btn-primary" 
            data-bs-toggle="modal" data-bs-target="#createNewAccount">
            <i class="bi bi-person-plus"></i>
            Create Account
            </button>
        <?php endif; ?>
        </div>
        <div class="table-responsive my-3">
<!-- User list table-->
            <table class="table align-middle table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Sch. ID No.</th>
                        <th>User</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Status</th>
                        <th>View</th>
                        <?php if($UserRole == 'Councilor'): ?>
                            <th>Update</th>
                            <th>Activate/Deactivate</th>
                        <?php endif; ?>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($user as $users): ?>
                    <tr>
                        <td><?= $users->UserID; ?></td>
                        <td><?= $users->SchoolIDNumber; ?></td>
                        <td><?= ucfirst($users->UserRole); ?></td>
                        <td><?= $users->Firstname; ?> </td>
                        <td><?= $users->Lastname; ?></td>
                        <?php if($users->UserStatus == 1): ?>
                            <td>Actived</td>
                        <?php else: ?>
                            <td>Deactivated</td>
                        <?php endif; ?>
                        <td>
                        <button <?php if($users->UserRole == 'Councilor') { echo 'style="display: none;"'; } ?> type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" 
                        data-bs-target="#viewAccount_<?= $users->UserID; ?>">
                        <i class="bi bi-eye-fill"></i>
                        </button>
                        </td>
                        <?php if($UserRole == 'Councilor'): ?>
                            <td>
                            <button <?php if($users->UserRole == 'Councilor') { echo 'style="display: none;"'; } ?> type="button" class="btn btn-outline-success" data-bs-toggle="modal" 
                            data-bs-target="#updateAccount_<?= $users->UserID; ?>">
                            <i class="bi bi-pencil-square"></i>
                            </button>
                            </td>
                            <td>
                            <?php if($users->UserStatus == 0): ?>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" 
                                data-bs-target="#activateAccount_<?= $users->UserID; ?>">
                                <i class="bi bi-person-check">  Activate . .</i>
                                </button>
                            <?php else: ?>
                                <!-- echo 'style="display: none;"' ||  echo 'disabled';-->
                                <button <?php if($users->UserRole == 'Councilor') { echo 'style="display: none;"'; } ?> 
                                type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                data-bs-target="#deactivateAccount_<?= $users->UserID; ?>">
                                <i class="bi bi-person-dash"> Deactivate</i>
                                </button>
                            <?php endif; ?>       
                            </td>
                        <?php endif; ?>
                        
                        <?php include 'user_acc_modal/view_modal.php'; ?>
                        <?php include 'user_acc_modal/update_modal.php'; ?>
                        <?php include 'user_acc_modal/activate_modal.php'; ?>
                        <?php include 'user_acc_modal/deactivate_modal.php'; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
        <!-- Create New Account -->
        <div class="modal fade" id="createNewAccount" data-bs-backdrop="static" 
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    <form method="POST" action="user_account/create_account.php">
                       <!-- user type -->
                        <div class="input-group mb-3">
                        <label class="input-group-text" for="createRole">User type</label>
                        <select class="form-select" id="createRole" name="createRole">
                            <option selected disabled>Choose</option>
                            <option value="2">Office Staff</option>
                            <option value="3">Intern/Ojt</option>
                            <option value="4">Student</option>
                            <option value="5">Teacher</option>
                        </select>
                        </div>
                        <!-- firstname -->
                        <div class="input-group mb-3">
                            <label for="createFirstname" class="input-group-text">Firstname</label>
                            <input type="text" class="form-control" id="createFirstname" name="createFirstname" 
                            placeholder="Enter firstname" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="createLastname" class="input-group-text">Lastname</label>
                            <input type="text" class="form-control" id="createLastname"  name="createLastname"
                            placeholder="Enter lastname" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="createSchoolIDNo" class="input-group-text">School ID #</label>
                            <input type="text" class="form-control" id="createSchoolIDNo"  name="createSchoolIDNo"
                            placeholder="Enter school ID no." required>
                        </div>
                        <!-- email -->
                        <div class="input-group mb-3">
                            <label for="createEmail" class="input-group-text">Email</label>
                            <input type="email" class="form-control" id="createEmail" name="createEmail"
                            placeholder="Enter email add" required>
                        </div>
                        <!-- Username -->
                        <div class="input-group mb-3">
                            <label for="createUsername" class="input-group-text">Username</label>
                            <input type="email" class="form-control" id="createUsername" name="createUsername" 
                            placeholder="email@example.com" required>
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <label for="createPassword" class="input-group-text">Password</label>
                            <input type="password" class="form-control" id="createPassword" name="createPassword" 
                            placeholder="Example@123" required>
                            <button class="btn btn-secondary" type="button" id="showCreatePassword">
                            <i id="iconEyeCreate" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="create">Create Account</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/createToggle.js?v1"></script>

        


<?php require '../components/footer.php' ;?>