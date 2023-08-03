<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/registerController.php';
include_once __DIR__ . '/../controller/accountsController.php';

$users_controller = new RegisterController();
$acc_controller = new AccountsController();
$acc_id=1;
$users = $acc_controller->getUserAccount($acc_id);
?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title my-2">Admins</h4>
                <p class="card-description"> Admin<code>/users</code></p>

                <a class="btn btn-outline-success my-3" href="register.php">Add New User +</a>
                
                <div class="table-responsive">
                    <table class="table table-dark" id="mytable">
                        <thead>
                        <tr>
                            <th> No</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Password</th>
                            <th> Image</th>
                            <th> Created Date</th>
                            <th> Updated Date</th>
                            <th>Actions</th>
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
                            echo "<td><img src='../uploads/".$user['image']."' alt='' style='width: 60px;height:80px;' class='rounded-0'></td>";
                            echo '<td>' . $user['created_at'] . '</td>';
                            echo '<td>' . $user['updated_at'] . '</td>';
                            echo '<td id='.$user['uid'].'><a class="btn btn-outline-primary mx-3" href="user_edit.php?id='.$user['id'].'&type=admin">Edit</a>
                                <a class="delete_user btn btn-outline-danger">Delete</a></td>';
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