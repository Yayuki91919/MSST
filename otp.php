<?php
session_start();
include_once __DIR__.'/layouts/header.php';
include __DIR__.'/controller/registerController.php';
include __DIR__.'/controller/passresetController.php';

$email=$_SESSION['email'];
$type=$_GET['type'];
$register_controller=new RegisterController();
$user=$register_controller->getUser($email);
$passreset_controller=new PassresetController();
$reset=$passreset_controller->getPassreset($email);

$reg_otp=$user['token'];
$reset_otp=$reset['token'];
$otp=$otpErr="";
if(isset($_POST['submit'])){
	$otp=$_POST['otp'];
	
	if(($otp==$reset_otp)&&($type=="reset")){
		echo "<script>location.href='newpassword.php'</script>";
	}elseif(($otp==$reg_otp)&&($type=="new")){
		echo "<script>location.href='signin.php'</script>";
	}else{
		$otpErr="OTP code is invalid!";
	}

}
?>
<link rel="stylesheet" href="assets/css/log.css">
<body>
    <form method="post" action="">
		<h1>OTP Verification</h1>
        <p>We've send a verification code to your email. Please check your email.</p>
		<input class="input" name="otp" type="text" placeholder="Enter verification code"  value="<?php echo $otp ?>" required>
		<div class="error"><?php echo $otpErr; ?></div>
		<button class='submit' type="submit" name="submit">Submit</button>
	  </form> 
</body>
<?php
include_once __DIR__.'/layouts/footer.php';
?>