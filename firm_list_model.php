<?php
include_once __DIR__ . '/layouts/header.php';
?>

<section class="container">
    <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 models  align-items-center text-center ">
            <a href="" class=" border">
                <img src="assets/images/android.png" class="" alt="" style="width: 80px; height: 150px">
                <h5 class=" p-1 rounded-1">Samsung a14 </h5>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 models  align-items-center text-center ">
            <a href="" class=" border">
                <img src="assets/images/android.png" class="" alt="" style="width: 80px; height: 150px">
                <h5 class=" p-1 rounded-1">Samsung a14 </h5>
            </a>
        </div><div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 models  align-items-center text-center ">
            <a href="" class=" border">
                <img src="assets/images/android.png" class="" alt="" style="width: 80px; height: 150px">
                <h5 class=" p-1 rounded-1">Samsung a14  </h5>
            </a>
        </div> -->
    <table class="table my-5">
        <thead>
            <tr class="models_header">
                <th scope="col">Model</th>
                <th scope="col">MIUI Version</th>
                <th scope="col">Android <br>Version</th>
                <th scope="col">File Size</th>
                <th scope="col">Update at</th>
                <th scope="col">Download</th>
            </tr>
        </thead>
        <tbody>
            <tr class="models_body">
                <td>Huawei Mate 30</td>
                <td>MIUI 12</td>
                <td>13</td>
                <td>3.46GB</td>
                <td>2023-07-23</td>
                <td><a href="firmware_download.php" class="btn btn-sm modeldown"><i class="ri-file-download-line">&nbsp;</i>Download</a></td>
            </tr>
            <tr class="models_body">
                <td>Huawei Mate 30</td>
                <td>MIUI 11</td>
                <td>12</td>
                <td>3.16GB</td>
                <td>2023-07-23</td>
                <td><a href="firmware_download.php" class="btn btn-sm modeldown"><i class="ri-file-download-line">&nbsp;</i>Download</a></td>
            </tr>
            <tr class="models_body">
                <td>Huawei Mate 30</td>
                <td>MIUI 10</td>
                <td>10</td>
                <td>3.46GB</td>
                <td>2023-07-23</td>
                <td><a href="firmware_download.php" class="btn btn-sm modeldown"><i class="ri-file-download-line">&nbsp;</i>Download</a></td>
            </tr>
            <tr class="models_body">
                <td>Huawei Mate 30</td>
                <td>MIUI 13</td>
                <td>13</td>
                <td>3.46GB</td>
                <td>2023-07-23</td>
                <td><a href="firmware_download.php" class="btn btn-sm modeldown"><i class="ri-file-download-line">&nbsp;</i>Download</a></td>
            </tr>
        </tbody>
    </table>
        <ul class="pagination justify-content-center mb-5">
            <li class="page-item">
                <a class="page-link bg-secondary-subtle" href="#">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link bg-secondary-subtle" href="#">Next</a>
            </li>
        </ul>
        
</section>

<?php
include_once __DIR__ . '/layouts/footer.php';
?>