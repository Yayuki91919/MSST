<?php
include_once __DIR__.'/../layouts/admin_sidebar.php';

// convert illegal input value to ligal value formate
function text_input($value) {
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
  }

include_once __DIR__.'/../controller/registerController.php';
include_once __DIR__.'/../controller/accountsController.php';

$register_controller=new RegisterController();
$account_conttroller=new AccountsController();
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
				 if(move_uploaded_file($temp_file,'../uploads/'.$filename)){
					
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
	 
	if(empty($nameErr) && empty($emailErr) && empty($passErr)&& empty($cpassErr) && empty($imageErr)){
		$token=rand(100000,999999);
		$status=$register_controller->addUser($name,$email,$password,$cpassword,$token,$filename);
		if($status){
            $type=$_POST['type'];
           if($type=="2"){
            $user=$register_controller->getUser($email);
            $status=$account_conttroller->addAccount($user['id'],$type);
            echo "<script>location.href='app_user.php?email=$email'</script>";
           }else{
            $user=$register_controller->getUser($email);
            $status=$account_conttroller->addAccount($user['id'],$type);
            echo "<script>location.href='admin.php'</script>";
           }
		
		}

	}
}
?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title my-3">Register form</h4>
                <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="exampleSelectGender">Account Type</label>
                        <select name="type" class="form-control" id="exampleSelectGender">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputName1" placeholder="Name" required>
                        <span class="text-danger fs-3"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="exampleInputEmail3" placeholder="Email" required>
                        <span class="text-danger fs-5"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                        <span class="text-danger fs-5"><?php echo $passErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" name="cpassword" value="<?php echo $cpassword; ?>" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                        <span class="text-danger "><?php echo $cpassErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image" required>
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                          <span class="text-danger fs-5"><?php echo $imageErr; ?></span>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="cancel" class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
<?php
include_once __DIR__.'/../layouts/admin_footer.php';
?>