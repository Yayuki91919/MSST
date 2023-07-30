<?php
include_once __DIR__.'/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/brandsController.php';

$brandsController = new brandsController();

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $addNewBrand = $brandsController->addNewBrand($name);
    if($addNewBrand){
        echo '<script>location.href="brands.php";</script>';
        // echo '<script>location.href = \'brands.php\';</script>';
    }else{
        echo 'You Cant\'t create new brand';
    }

}

?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title my-2">Brands</h4>
                <p class="card-description"> Admin<code>/brands/add new brands</code></p>
                <div class="table-responsive">
                    <form action="" class="p-3" method="post">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control mb-3" name="name" id="name" autocomplete="off">
                        <button type="submit" class="btn btn-success" name="add">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include_once __DIR__.'/../layouts/admin_footer.php';
?>