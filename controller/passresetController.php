<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include_once __DIR__.'/../vendor/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vendor/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vendor/PHPMailer/src/Exception.php';

include_once __DIR__.'/../model/Passreset.php';


class PassresetController extends Passreset{
    public function addToken($email,$token){
        return $this->createToken($email,$token);
    }
    public function getPassreset($email){
        return $this->getPassresetInfo($email);
    }
    public function editToken($tok){
        return $this->updateToken($tok);
    }
    public function mailPassrest($email,$token)
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