<?php
include_once __DIR__ . '/../model/brands.php';

class brandsController extends brands
{

    public function getAllBrands()
    {
        return $this->getAllBrandsInfo();
    }

    public function addNewBrand($name)
    {
        return $this->addNewBrandInfo($name);
    }

    public function showBrand($id)
    {
        return $this->showBrandInfo($id);
    }

    public function updateBrand($id, $name)
    {
        return $this->updateBrandInfo($id, $name);
    }

    public function deleteBrand($id)
    {
        return $this->deleteBrandInfo($id);
    }
}
