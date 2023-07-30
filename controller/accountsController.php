<?php
include_once __DIR__.'/../model/account.php';


class AccountsController extends Account{
    public function addAccount($user_id,$account_type){
        return $this->createAccount($user_id,$account_type);
    }
    
}
?>