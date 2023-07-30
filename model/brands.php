<?php
include_once __DIR__ . '/../vendor/database/database.php';
class brands
{
    public function getAllBrandsInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM brands';
        $statement = $con->prepare($sql);

        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function addNewBrandInfo($name)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO brands(name) VALUES (:name)';
        $statement = $con->prepare($sql);
        $statement->bindParam(':name', $name);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showBrandInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM brands WHERE id=:id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateBrandInfo($id, $name)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE brands SET name=:name WHERE id=:id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBrandInfo($id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM brands WHERE id=:id";
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
        // try {
        //     $statement->execute();
        //     return true;
        // } catch (PDOException $e) {
        //     return false;
        // }

    }
}
