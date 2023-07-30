<?php

// convert illegal input value to ligal value formate
function text_input($value) {
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
  }
include_once __DIR__.'/layouts/header.php';
include_once __DIR__.'/controller/registerController.php';

$register_controller=new RegisterController();


$name=$email=$password=$cpassword=$img=$nameErr=$emailErr=$passErr=$cpassErr=$imageErr="";

//input fields are Validated with regular expression
$validName="/^[a-zA-Z ]*$/";
$validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
$uppercasePassword = "/(?=.*?[A-Z])/";
$lowercasePassword = "/(?=.*?[a-z])/";
$digitPassword = "/(?=.*?[0-9])/";
$spacesPassword = "/^$|\s+/";
$symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
if(isset($_POST['submit']))
{	
	if(!preg_match($validName,$_POST['name'])){
		$nameErr="Username aren't allowed digits.";
		
	}else{
		$name=text_input($_POST['name']);
	}
	if(!preg_match($validEmail,$_POST['email'])){
		$emailErr="Invalid email address!";
	}else{
		$email=text_input($_POST['email']);
		$user=$register_controller->getUser($email);
		if(!empty($user)){
			$emailErr="Account with this email already exist!";
		}
	}
	if (!preg_match($uppercasePassword,$_POST['password']) || !preg_match($lowercasePassword,$_POST['password']) ||  !preg_match($symbolPassword,$_POST['password']) || preg_match($spacesPassword,$_POST['password'])) {
		$passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
	  }
	  else{
		$password=text_input($_POST['password']);
	  }
	  if($_POST['cpassword']!=$_POST['password']){
		$cpassErr="Confirm Password doesn't Matched";
	 }
	 else{
		$cpassword=text_input($_POST['cpassword']);
	 }
	 $image=$_FILES['image'];
	 
	 if(!empty($image)){
	 if($image['error']==0)
	 {   
		 $filename=$image['name'];
		 $extension=explode('.',$filename);
		 $filetype=end($extension);
		 $filesize=$image['size'];

		 $allowed_types=['jpg','jpeg','png','svg'];
		 $temp_file=$image['tmp_name'];
		 if(in_array($filetype,$allowed_types))
		 {
			 if($filesize <= 2000000)
			 {   
				 $timestamp=time();
				 $filename=$timestamp.$filename;
				 if(move_uploaded_file($temp_file,'uploads/'.$filename)){
					
				 }
			 }else{
				$imageErr="Image is large";
			 }
		 }else{
			$imageErr="File type should be jpg, jpeg, png and svg";
		 }
	 }else{
		$imageErr="Invalid Image";
	 }
	}else{
		$imageErr="Please choose your profile picture!";
	}	
	 
	if(empty($nameErr) && empty($passErr)&& empty($cpassErr) && empty($imageErr)){
		$token=rand(100000,999999);
		$status=$register_controller->addUser($name,$email,$password,$cpassword,$token,$filename);
		if($status){
		echo "<script>location.href='email_otp.php?email=$email'</script>";
		}
	}
}


?>
<link rel="stylesheet" href="assets/css/log.css">
<body>
    <form method="post" action="" enctype="multipart/form-data">
		<h1>Register</h1>
		<div>
        <div id="img-preview"></div>
         <input type="file" accept="image/*" id="choose-file" name="image"/>
         <label for="choose-file">+ Choose Profile Picture</label>
        </div>
		<div class="error"><?php echo $imageErr; ?></div>
		<input class="input" name="name" placeholder="Username" value="<?php echo $name; ?>" required>
		<div class="error"><?php echo $nameErr; ?></div>
		<input class="input" name="email" type="email" placeholder="Email" value="<?php echo $email; ?>" required>
		<div class="error"><?php echo $emailErr; ?></div>
		<input class="input" name="password" type="password" placeholder="Password" value="<?php echo $password; ?>" minlength="8" required>
		<div class="error"><?php echo $passErr; ?></div>
		<input class="input" name="cpassword" type="password" placeholder="Confirm Password" value="<?php echo $cpassword; ?>" minlength="8" required>
		<div class="error"><?php echo $cpassErr; ?></div>
		<button class="submit" type="submit" name="submit">Register</button>
		<p class='p'>Already have an account? <a class='link' href="signin.php">Sign In</a></p>
	  </form> 
</body>
<?php
include_once __DIR__.'/layouts/footer.php';
?>