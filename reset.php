<?php
session_start();
include_once __DIR__.'/layouts/header.php';
include_once __DIR__.'/controller/registerController.php';
$register_controller=new RegisterController();
$email=$emailErr="";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	
	$user=$register_controller->getUser($email);
	if(empty($user)){
		$emailErr="Email address is not available!";
	}else{
		$_SESSION['email']=$email;
		$_SESSION['token']=rand(100000,999999);
		echo "<script>location.href='email_otp.php?type=reset'</script>";
	}
}
?>
<link rel="stylesheet" href="assets/css/log.css">
<body>
    <form method="post" action="">
		<h1>Reset Password</h1>
        <p>Enter your email address and we'll email you a verification code to reset your password.</p>
		<input class="input" name="email" type="email" placeholder="Email" value="<?php echo $email; ?>" required>
		<button class='submit' type="submit" name="submit">Send</button>
	  </form> 
</body>
<?php
include_once __DIR__.'/layouts/footer.php';
?>