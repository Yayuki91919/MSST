<?php 
session_start();
include __DIR__.'/controller/registerController.php';
include __DIR__.'/controller/passresetController.php';

$email=$_SESSION['email'];
$tok=$_SESSION['token'];

$register_controller=new RegisterController();
$passreset_controller=new PassresetController();
$user=$register_controller->getUser($email);
if(isset($_GET['type'])&&($_GET['type']=="reset"))
{   
    
    if(!empty($user['email'])){
        $result=$passreset_controller->getPassreset($email);
        if($result){
            $update=$passreset_controller->editToken($email,$tok);
        }else{
            $add=$passreset_controller->addToken($email,$tok);
        }
    }
    $id=$user['id'];
    $status=$passreset_controller->mailPassrest($email,$tok);
    if($status){
        echo "<script>location.href='otp.php?type=reset'</script>";
    }
    
}else{
   
    $token=$user['token'];
    $id=$user['id'];
    $status=$register_controller->mailRegister($email,$token);
    if($status){
        echo "<script>location.href='otp.php?type=new'</script>";
    }
   
}



?>