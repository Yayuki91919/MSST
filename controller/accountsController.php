<?php
include_once __DIR__.'/../model/account.php';


class AccountsController extends Account{
    public function addAccount($user_id,$account_type){
        return $this->createAccount($user_id,$account_type);
    }
    public function getUserAccount($acc_id){
        return $this->getUser($acc_id);
    }
    public function deleteUser($id){
        return $this->deleteAccount($id);
    }
    
}
?>