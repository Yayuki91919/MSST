<?php
include_once __DIR__.'/../layouts/admin_sidebar.php';
?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title my-2">Users</h4>
                <p class="card-description"> Admin<code>/users/update your name</code></p>
                <div class="table-responsive">
                    <form action="" class="p-3">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control mb-3" name="name" id="name" autocomplete="off">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include_once __DIR__.'/../layouts/admin_footer.php';
?>