<?php  
	
	include 'dbconnect.php';
	session_start();

	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$phone = $_POST['user_phone'];
	$address = $_POST['user_address'];
	$password = $_POST['user_password'];
	$cpassword = $_POST['user_cpassword'];
	$profile = $_FILES['user_profile'];
	$role_id = 1;
	// print_r($profile);die();

	$basepath = "images/user/";
	$fullpath = $basepath.$profile['name'];
	move_uploaded_file($profile['tmp_name'], $fullpath);

	$_SESSION['old_name']=$name;
	$_SESSION['old_email']=$email;
	$_SESSION['old_phone']=$phone;
	$_SESSION['old_address']=$address;
	$_SESSION['old_password']=$password;
	$_SESSION['old_cpassword']=$cpassword;



if ($name == null || $email == null || $phone == null || $address == null || $password == null || $cpassword == null || $profile['size'] == 0) {

	if ($profile['size'] == 0) {
		$_SESSION['validate_profile_msg']="User Profile is Require!";
	}elseif ($name == null) {
		$_SESSION['validate_name_msg']="User Name is Require!";
	}elseif ($email == null) {
		$_SESSION['validate_email_msg']="User Email is Require!";
	}elseif ($password == null) {
		$_SESSION['validate_password_msg']="User Password is Require!";
	}elseif ($cpassword == null) {
		$_SESSION['validate_cpassword_msg']="User Confirm Password is Require!";
	}elseif ($phone == null) {
		$_SESSION['validate_phone_msg']="User Phone Number is Require!";
	}else{
		$_SESSION['validate_address_msg']="User Address is Require!";
	}

	header("location:../register.php");
	
}elseif ($password != $cpassword) {
	$_SESSION['validate_cpassword_msg']="User Confirm Password is not Equal Password!";
	header("location:../register.php");
	
}else{

	$sql = "INSERT INTO users (name,profile,email,password,phone,address,role_id) VALUES(:name,:profile,:email,:password,:phone,:address,:role_id)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':profile',$fullpath);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':role_id',$role_id);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:../login.php");
	}else {
		echo "Error";
	}

}







	




?>