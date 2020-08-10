<?php 
	session_start();
	include 'dbconnect.php';
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];

	$sql = "SELECT * FROM users WHERE email=:email AND password=:password";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($data) {
		$_SESSION['loginuser']=$data;

		if ($_SESSION['loginuser']) {
			if ($_SESSION['loginuser']['role_id']==2) {
				header("location:index.php");
			}else{
				header("location:../index.php");
			}
		}else{
			header("location:../login.php");
		}

	}else{
		header("location:login.php");
	}


	

?>