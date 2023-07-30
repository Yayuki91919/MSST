<?php
session_start();
include_once __DIR__.'/layouts/header.php';
include_once __DIR__.'/controller/registerController.php';
include_once __DIR__.'/controller/accountsController.php';
$register_controller=new RegisterController();
$account_controller=new AccountsController();

$email=$password=$emailErr=$passErr="";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$_SESSION['email'];
	$password=$_POST['password'];
	$user=$register_controller->getUser($email);
	if(empty($user)){
		$emailErr="Email address is not available!";
	}elseif($password==$user['password']){
		$reg_id=$user['id'];
	$_SESSION['user_id']=$reg_id;
		$acc_type=2;
		$status=$account_controller->addAccount($reg_id,$acc_type);
		if($status){
		echo "<script>location.href='index.php'</script>";
		}
	}else{
		$passErr="Incorrect password!";
	}
}
?>
<link rel="stylesheet" href="assets/css/log.css">
<body>
    <form method="post" action="">
		<h1>Sign In</h1>
		<input  class="input" name="email" type="email" placeholder="Email" value="<?php echo $email ?>" required>
		<div class="error"><?php echo $emailErr; ?></div>
		<input  class="input" name="password" type="password" minlength="8" placeholder="Password" value="<?php echo $email ?>" required>
		<div class="error"><?php echo $passErr; ?></div>
		<button class="submit" type="submit" name="submit">Sign In</button>
        <div class="a">
        <a class="a" href="reset.php">Forget your password?</a>
        </div>
	  </form> 
</body>
<?php
include_once __DIR__.'/layouts/footer.php';
?>