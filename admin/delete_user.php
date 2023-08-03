<?php 
include_once __DIR__.'/../controller/registerController.php';
include_once __DIR__.'/../controller/accountsController.php';
$id=$_POST['id'];

$user_con=new AccountsController();
$result=$user_con->deleteUser($id);


if($result)
{
    echo "success";
}
else{
    echo "You can't delete as it has related child data.";
    //cascade
    //restrict

}


?>