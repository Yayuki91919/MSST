<?php
include_once __DIR__ . '/../controller/brandsController.php';

// var_dump($id);
$id = $_POST['id'];
$brandController = new brandsController();
$delete = $brandController->deleteBrand($id);


