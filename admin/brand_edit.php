<?php
include_once __DIR__.'/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/brandsController.php';

$id = $_GET['id'];
// var_dump($id);
$brandsController = new brandsController();
$getBrand = $brandsController->showBrand($id);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $updateBrand = $brandsController->updateBrand($id,$name); 
    if($updateBrand){
        echo '<script>location.href="app_brands.php"</script>';
    }
}


?>

    <div class="col-12 grid-margin stretch-card mt-5"f>
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title my-2">Brands</h4>
                <p class="card-description"> Admin<code>/brands/update_your_brand_name</code></p>
                <div class="table-responsive">
                    <form action="" class="p-3" method="post">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control mb-3" name="name" id="name" autocomplete="off" value="<?php echo $getBrand['name']?>">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include_once __DIR__.'/../layouts/admin_footer.php';
?>