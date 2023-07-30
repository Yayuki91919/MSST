<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/modelsController.php';
include_once __DIR__ . '/../controller/brandsController.php';

$id = $_GET['id'];
$models_controller = new modelsController();
$brands_controller = new brandsController();
$brands = $brands_controller->getAllBrands();
$show_model = $models_controller->showModel($id);
// echo '<script>location.href="brands.php";</script>';

// if (isset($_POST['add'])) {
//     $name = $_POST['name'];
//     $image = $_FILES['image'];
//     $brand_id = $_POST['brand'];
//     $add = $models_controller->createNewBrand($name, $image, $brand_id);
//     if($add){
//         echo '<script>location.href = \'app_models.php\';</script>';
//     }
// }
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card p-5">
        <div class="card-body">
            <h4 class="card-title my-2">Models</h4>
            <p class="card-description"> Admin<code>/models/update_model</code></p>
            <div class="table-responsive">

                <form action="" class="p-3" method="post" enctype="multipart/form-data">

                    <div class="img-fluid text-center">
                        <?php
                        // echo '<img src="../uploads/'.$show_model['image'].'" class="img-fluid rounded mx-auto d-block"
                        // style="width: 200px; height: 250px;" id="img">';
                        ?>
                        <img src="../uploads/<?php echo $show_model['image']; ?>" class="img-fluid rounded mx-auto d-block" style="width: 200px; height: 250px;" id="img">
                        <label class="btn btn-secondary my-2">
                            <i class="ri-camera-line">&nbsp;Choose</i><input type="file" id="file_img" hidden>
                        </label>
                    </div>

                    <label for="name">Model Name</label>
                    <input type="text" class="form-control mb-3" name="name" id="name" autocomplete="off" value="<?php echo $show_model['name']?>">

                    <label for="options">Brand</label>
                    <select id="options" name="brand" class="form-control mb-3 text-secondary">
                        <!-- <option value="" disabled selected hidden>Choose Your Brand</option> -->
                        <?php
                        foreach ($brands as $brand) {
                            if($brand['id'] == $show_model['brands_id']){
                                echo ' <option value=' . $brand['id'] . ' selected>' . $brand['name'] . '</option>';
                            }else{
                                echo ' <option value=' . $brand['id'] . '>' . $brand['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                    <button type="submit" class="btn btn-success" name="update">Update</button>


                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once __DIR__ . '/../layouts/admin_footer.php';
?>
<script type="text/javascript">
    document.getElementById('file_img').onchange = function() {
        document.getElementById('img').src = URL.createObjectURL(fileImg.files[0]);
    }
</script>