<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/modelsController.php';

$models_controller = new modelsController();
$get_all_models = $models_controller->getAllModels();
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card p-5">
        <div class="card-body">
            <h4 class="card-title my-2">Models</h4>
            <p class="card-description"> Admin<code>/models</code></p>

            <a class="btn btn-outline-success my-3" href="model_add.php">Add New Model +</a>

            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Name</th>
                            <th> Image</th>
                            <th> Brand</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($get_all_models as $get_model) {
                            echo '<tr>';
                            echo '<td>' . $count++ . '</td>';
                            echo '<td>' . $get_model['name'] . '</td>';
                            // echo '<td>' . $get_model['image'] . '</td>';
                            echo '<td><img src="../uploads/'     . $get_model['image'] .  '"style="width: 60px;height:80px;"class="rounded-0"></td>';

                            echo '<td>' . $get_model['brand'] . '</td>';
                            echo '<td>
                                    <a class="btn btn-outline-primary mx-3" href="model_edit.php?id='.$get_model['id'].'">
                                        <i class="ri-pencil-line"></i>Edit
                                    </a>

                                    <a class="btn btn-outline-danger delete_btn_ajax" href="">
                                        <i class="ri-delete-bin-2-line"></i>Delete
                                    </a>
                                </td>';
                            echo '</tr>';
                        }

                        ?>
                        <!-- <td>1</td>
                        <td>name</td>
                        <td>image</td>
                        <td>image</td>
                        <td><a class="btn btn-outline-primary mx-3" href="#">Edit</a>
                            <a class="btn btn-outline-danger">Delete</a>
                        </td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include_once __DIR__ . '/../layouts/admin_footer.php';
?>