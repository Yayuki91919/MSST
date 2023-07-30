<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/brandsController.php';

$brandsController = new brandsController();
$getAllBrands = $brandsController->getAllBrands();

?>

<div class="col-12 grid-margin stretch-card">
    <div class="card p-5">
        <div class="card-body">
            <h4 class="card-title my-2">Brands</h4>
            <p class="card-description"> Admin<code>/brands</code></p>
            <a href="brand_add.php" class="btn btn-outline-success my-3">Add New Brands +</a>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($getAllBrands as $getBrand){
                            echo '<tr>';
                            echo '<td>'.$getBrand['id'].'</td>';
                            echo '<td>'.$getBrand['name'].'</td>';
                            echo '<td id='.$getBrand['id'].'>
                                <a class="btn btn-outline-primary mx-3" href="brand_edit.php?id='.$getBrand['id'].'"><i class="ri-pencil-line"></i>Edit</a>
                                <a class="btn btn-outline-danger delete_btn_ajax" href="javascript:void(0)"><i class="ri-delete-bin-2-line"></i>Delete</a>
                            </td>';
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