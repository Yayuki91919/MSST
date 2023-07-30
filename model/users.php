<?php
include_once __DIR__ . '/../vendor/database/database.php';

class users
{
    public function getAllUsersInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM users WHERE 1';
        $stament = $con->prepare($sql);

        if ($stament->execute()){
            $result = $stament->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function AddnewUserInfo(){
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = '';
    }
}