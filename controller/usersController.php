<?php
include_once __DIR__.'/../model/users.php';

class usersController extends users {
    public function getAllUsers(){
        return $this->getAllUsersInfo();
    }
    
    public function AddnewUser(){
        return $this->AddnewUserInfo();
    }
}