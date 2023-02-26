<?php 
require '../function/session.php';
require '../components/header.php'; 
require '../components/navigation.php';
?>
    <div class="container-fluid">
        <h1>User table</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Juan</td>
                                    <td>juan@gmail.com</td>
                                    <td>1</td>
                                    <td>Juan</td>
                                    <td>juan@gmail.com</td>
                                    
                                </tr>
                                <!-- 
                                
                                // Retrieve users from database and display in table
                                $stmt = $pdo->query("SELECT * FROM users");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "</tr>";
                                }
                            -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require '../components/footer.php' ;?>