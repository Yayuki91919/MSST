<?php
include_once __DIR__ . '/../vendor/database/database.php';

class Passreset{
    public function createToken($email,$token){
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2. write sql
         $sql="insert into password_reset(email,token) values (:email,:token)";
         $statement=$con->prepare($sql);
         $statement->bindParam(':email',$email);
         $statement->bindParam(':token',$token);
         if($statement->execute())
         {
             return true;
         }
         else
         {
             return false;
         }
    }
    public function updateToken($email,$tok){
            //1.db connection
      $con=Database::connect();
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //2. write sql
      $sql='update password_reset set token=:token where email=:email';
      $statement=$con->prepare($sql);   
      $statement->bindParam(':token',$tok);
      $statement->bindParam(':email',$email);
      if($statement->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    
    }
   
   public function getPassresetInfo($email){
    //1.db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2. write sql
    $sql='select * from password_reset where email=:email';
    $statement=$con->prepare($sql);
    $statement->bindParam(':email',$email);
    //3. sql excute
    if($statement->execute())
    {
    //4. result
    //date fetch()==>one row, fetchall()==>multiple row
        $result=$statement->fetch(PDO::FETCH_ASSOC);
    }
    return $result;
   }

}
?>