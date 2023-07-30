<?php
include_once __DIR__ . '/../vendor/database/database.php';

class Account{
    public function createAccount($user_id,$account_type){
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2. write sql
         $sql="insert into accounts (users_id,account_type_id)
          values (:users_id,:account_type_id)";
         $statement=$con->prepare($sql);
         $statement->bindParam(':users_id',$user_id);
         $statement->bindParam(':account_type_id',$account_type);
         if($statement->execute())
         {
             return true;
         }
         else
         {
             return false;
         }
    }
  
}
?>