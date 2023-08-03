<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include_once __DIR__.'/../vendor/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vendor/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vendor/PHPMailer/src/Exception.php';

include_once __DIR__.'/../model/register.php';


class RegisterController extends Register{
    public function addUser($name,$email,$password,$cpassword,$token,$filename){
        return $this->createUser($name,$email,$password,$cpassword,$token,$filename);
    }
    public function getUser($email){
        return $this->getUserInfo($email);
    }
    public function getAllUsers(){
        return $this->getAllUsersInfo();
    }
    public function getUserById($id){
        return $this->getUserInfoById($id);
    }
    public function updateUser($id,$name,$email,$password,$cpassword,$filename){
        return $this->editUser($id,$name,$email,$password,$cpassword,$filename);
    }
    public function editPassword($email,$password,$cpassword)
    {
        return $this->updatePassword($email,$password,$cpassword);
    }

    public function mailRegister($email,$token)
    {
        
        #Server Settings
        $message=$token;
        $mailer=new PHPMailer(true);
        //$mailer->SMTPDebug = SMTP::DEBUG_OFF;
        $mailer->isSMTP();
        $mailer->Host='smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Port = 587;

        $mailer->Username="yay169153@gmail.com";
        $mailer->Password="xzplmjpnbsfgzoat";

        $mailer->setFrom('yay169153@gmail.com','MMST');
        $mailer->addAddress('sulattwaddy440@gmail.com','Dear Customer');

        $mailer->Subject="Hello! Dear customer!";
        $mailer->Body="Your code - ".$message;
        $mailer->AltBody="Plain";

       if( $mailer->send())
        return true;
    }
    
}
?>