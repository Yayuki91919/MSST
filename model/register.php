<?php
include_once __DIR__ . '/../vendor/database/database.php';

class Register{
    public function createUser($name,$email,$password,$cpassword,$token,$filename){
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2. write sql
         $sql="insert into users(name,email,password,confirm_password,token,image)
          values (:name,:email,:password,:confirm_password,:token,:image)";
         $statement=$con->prepare($sql);
         $statement->bindParam(':name',$name);
         $statement->bindParam(':email',$email);
         $statement->bindParam(':password',$password);
         $statement->bindParam(':confirm_password',$cpassword);
         $statement->bindParam(':token',$token);
         $statement->bindParam(':image',$filename);
        
 
         if($statement->execute())
         {
             return true;
         }
         else
         {
             return false;
         }
    }
   
   public function getUserInfo($email){
    //1.db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2. write sql
    $sql='select * from users where email=:email';
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

   public function updatePassword($email,$password,$cpassword){
        //1.db connection
      $con=Database::connect();
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //2. write sql
      $sql='update users set password=:password,confirm_password=:confirm_password where email=:email';
      $statement=$con->prepare($sql);   
      $statement->bindParam(':password',$password);
      $statement->bindParam(':confirm_password',$cpassword);
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
}
?>