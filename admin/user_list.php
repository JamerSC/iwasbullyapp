<?php 
require '../function/session.php';
require_once '../connection/DBconnection.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<?php 
    $id = $conn->prepare("SELECT * FROM users;");
    $id->execute();
    $user = $id->fetchAll(PDO::FETCH_OBJ);    
?>
    <div class="container my-3">
        <h3 class="text-center">List of Users</h3>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <?php if($role == 'councilor')
        { ?>
            <button class="btn btn-primary" 
            data-bs-toggle="modal" data-bs-target="#createNewAccount">
            <i class="bi bi-person-plus"></i>
            Create Account
            </button>
        <?php } ?>
        </div>
        <div class="table-responsive my-3">
<!-- User table list -->
            <table class="table align-middle table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>School ID No.</th>
                        <th>User</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Status</th>
                        <th>View</th>
                        <?php if($role == 'councilor') 
                        { ?>
                            <th>Update</th>
                            <th>Activate/Deactivate</th>
                        <?php 
                         } ?>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($user as $users): ?>
                    <tr>
                        <td><?= $users->user_id; ?></td>
                        <td><?= $users->sch_id_no; ?></td>
                        <td><?= ucfirst($users->role); ?></td>
                        <td><?= $users->firstname; ?> </td>
                        <td><?= $users->lastname; ?></td>
                        <?php if($users->status == 1): ?>
                            <td>Actived</td>
                        <?php else: ?>
                            <td>Deactivated</td>
                        <?php endif; ?>
                        <td>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" 
                        data-bs-target="#viewAccount_<?= $users->user_id; ?>">
                        <i class="bi bi-search"></i>
                        </button>
                        </td>
                        <?php if($role == 'councilor')
                        {?>
                            <td>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" 
                            data-bs-target="#updateAccount_<?= $users->user_id; ?>">
                            <i class="bi bi-pencil-square"></i>
                            </button>
                            </td>
                        

                            <td>
                            <?php if($users->status == 0): ?>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" 
                                data-bs-target="#activateAccount_<?= $users->user_id; ?>">
                                <i class="bi bi-person-check">  Activate . .</i>
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" 
                                data-bs-target="#deactivateAccount_<?= $users->user_id; ?>">
                                <i class="bi bi-person-dash"> Deactivate</i>
                                </button>
                            <?php endif; ?>       
                            </td>
                        <?php } ?>
                        
                        <?php include 'modal/view_modal.php'; ?>
                        <?php include 'modal/update_modal.php'; ?>
                        <?php include 'modal/activate_modal.php'; ?>
                        <?php include 'modal/deactivate_modal.php'; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
            <!-- Modal -->
        <div class="modal fade" id="createNewAccount" data-bs-backdrop="static" 
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    <form method="POST" action="crud/create_account.php">
                       <!-- user type -->
                        <div class="input-group mb-3">
                        <select class="form-select" id="c8role" name="c8role">
                            <option selected disabled>Choose</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                            <option value="4">Office Staff</option>
                            <option value="5">Intern</option>
                        </select>
                        <label class="input-group-text" for="c8role">User type</label>
                        </div>
                        <!-- firstname -->
                        <div class="input-group mb-3">
                            <label for="c8firstname" class="input-group-text">Firstname</label>
                            <input type="text" class="form-control" id="c8firstname" name="c8firstname" 
                            placeholder="Enter your firstname" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="c8lastname" class="input-group-text">Lastname</label>
                            <input type="text" class="form-control" id="c8lastname"  name="c8lastname"
                            placeholder="Enter your lastname" required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="c8sch_id_no" class="input-group-text">School ID No.</label>
                            <input type="text" class="form-control" id="c8sch_id_no"  name="c8sch_id_no"
                            placeholder="Enter school ID no." required>
                        </div>
                        <!-- email -->
                        <div class="input-group mb-3">
                            <label for="c8email" class="input-group-text">Email address</label>
                            <input type="email" class="form-control" id="c8email" name="c8email"
                            placeholder="Enter your email add" required>
                        </div>
                        <!-- Username -->
                        <div class="input-group mb-3">
                            <label for="c8username" class="input-group-text">Username</label>
                            <input type="email" class="form-control" id="c8username" name="c8username" 
                            placeholder="email@example.com" required>
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <label for="c8password" class="input-group-text">Password</label>
                            <input type="password" class="form-control" id="c8password" name="c8password" 
                            placeholder="Enter your password" required>
                            <button class="btn btn-secondary" type="button" id="showCreatePassword">
                            <i id="iconEyeCreate" class="bi bi-eye"></i>
                            </button>
                        </div>
                            <button type="submit" class="btn btn-primary form-control">
                            Create Account
                            </button>
                    </form>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>

        <script src="../assets/createToggle.js"></script>

        


<?php require '../components/footer.php' ;?>