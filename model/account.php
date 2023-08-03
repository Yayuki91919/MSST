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
    public function getUser($acc_id){
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql="select *,users.id as uid from accounts join users where accounts.account_type_id=:id and accounts.users_id=users.id ";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$acc_id);
       //3. sql excute
    if($statement->execute())
    {
    //4. result
    //date fetch()==>one row, fetchall()==>multiple row
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
   }

   public function deleteAccount($id){
     //1.db connection
     $con=Database::connect();
     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     //2. write sql
     $sql='delete from accounts where users_id=:id';
     $statement=$con->prepare($sql);   
     $statement->bindParam(':id',$id);
     try{
        $statement->execute();
     }
     catch(PDOException $e)
     {
        return false;
     }
     if($statement->execute())
     {
      return true;
     }
  
}
}
?>