<?php 
require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
<?php 
    $id = $conn->prepare("SELECT * FROM users;");
    $id->execute();
    $user = $id->fetchAll(PDO::FETCH_OBJ);    
?>

    <div class="table-responsive">
        <table class="table table-hover table-striped caption-top m-2 p-2">
            <caption class="fw-bold">List of users</caption>
            <thead class="table-dark">
                <tr>
                    <th>School ID #</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>User type</th>
                    <th>Email</th>
                    <th>View/Updates</th>
                    <th>Deactivate</th>
                </tr>
            </thead>
             <tbody>
            <?php foreach($user as $users): ?>
                <tr>
                    <td><?= $users->sch_id_no; ?></td>
                    <td><?= $users->firstname; ?> </td>
                    <td><?= $users->lastname; ?></td>
                    <td><?= ucfirst($users->role); ?></td>
                    <td><?= $users->email; ?></td>
                    <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-pencil-square"></i>
                    </button>
                    
                    </td>
                    <td>
                    <i class="bi bi-person-x" style="font-size: 20px; cursor:pointer">
                    </i></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

            <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">View and Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="#">
                       <!-- user type -->
                        <div class="input-group mb-3">
                        <select class="form-select" id="role" name="role">
                            <option selected disabled>Choose</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                            <option value="4">Staff</option>
                            <option value="5">Intern</option>
                        </select>
                        <label class="input-group-text" for="role">User type</label>
                        </div>
                        <!-- firstname -->
                        <div class="input-group mb-3">
                            <label for="firstname" class="input-group-text">Firstname</label>
                            <input type="text" class="form-control" id="username" name="firstname" 
                            placeholder="Enter your firstname"required>
                        </div>
                        <!-- lastname-->
                        <div class="input-group mb-3">
                            <label for="lastname" class="input-group-text">Lastname</label>
                            <input type="text" class="form-control" id="lastname"  name="lastname"
                            placeholder="Enter your lastname"required>
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
                            <label for="username" class="input-group-text">Username</label>
                            <input type="text" class="form-control" id="username" name="username" 
                            placeholder="email@example.com"required>
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <label for="password" class="input-group-text">Password</label>
                            <input type="password" class="form-control" id="password"
                            name="password" placeholder="Enter your password" required>
                            <button class="btn btn-secondary" type="button" id="showUpdatePassword">
                            <i id="iconEyeUpdate" class="bi bi-eye"></i>
                            </button>
                        </div>
                            <button type="submit" class="btn btn-primary form-control">Update</button>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

<?php require '../components/footer.php' ;?>