<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/usersController.php';

$users_controller = new usersController();
$users = $users_controller->getAllUsers();
?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title my-2">Users</h4>
                <p class="card-description"> Admin<code>/users</code></p>

                <a class="btn btn-outline-success my-3" href="user_add.php">Add New User +</a>
                
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th> No</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Password</th>
                            <!--                            <th> Created Date</th>-->
                            <th> Updated Date</th>
                            <th> Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $count = 1;
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td>' . $count++ . '</td>';
                            echo '<td>' . $user['name'] . '</td>';
                            echo '<td>' . $user['email'] . '</td>';
                            echo '<td>' . $user['password'] . '</td>';
//                            echo '<td>'.$user['created_at'].'</td>';
                            echo '<td>' . $user['updated_at'] . '</td>';
                            echo '<td>' . $user['image'] . '</td>';
                            echo '<td><a class="btn btn-outline-primary mx-3" href="user_edit.php">Edit</a>
                                <a class="btn btn-outline-danger">Delete</a></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
include_once __DIR__ . '/../layouts/admin_footer.php';
?>