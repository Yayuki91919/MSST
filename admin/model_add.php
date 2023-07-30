<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/modelsController.php';
include_once __DIR__ . '/../controller/brandsController.php';

$models_controller = new modelsController();
$brands_controller = new brandsController();
$brands = $brands_controller->getAllBrands();
// echo '<script>location.href="brands.php";</script>';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $image = $_FILES['image'];
    $brand_id = $_POST['brand'];
    $add = $models_controller->createNewBrand($name, $image, $brand_id);
    if($add){
        echo '<script>location.href = \'app_models.php\';</script>';
    }
}
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card p-5">
        <div class="card-body">
            <h4 class="card-title my-2">Models</h4>
            <p class="card-description"> Admin<code>/models/add_new_model</code></p>
            <div class="table-responsive">

                <form action="" class="p-3" method="post" enctype="multipart/form-data">

                    <label for="name">Model Name</label>
                    <input type="text" class="form-control mb-3" name="name" id="name" autocomplete="off">

                    <label for="fileimg">Image</label>
                    <input type="file" class="form-control mb-3" name="image" id="fileimg" autocomplete="off">

                    <label for="options">Brand</label>
                    <select id="options" name="brand" class="form-control mb-3 text-secondary">
                        <!-- <option value="" disabled selected hidden>Choose Your Brand</option> -->
                        <?php
                        foreach ($brands as $brand) {

                            echo ' <option value=' . $brand['id'] . '>' . $brand['name'] . '</option>';
                        }
                        ?>
                    </select>

                    <button type="submit" class="btn btn-success" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once __DIR__ . '/../layouts/admin_footer.php';
?>