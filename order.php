<?php 
	
	session_start();
	include 'backend/dbconnect.php';

	$notes = $_POST['notes'];
	$total = $_POST['total'];
	$shop_arr = $_POST['shop_arr'];

	date_default_timezone_set('Asia/Yangon');

	$orderdate = date('Y-m-d');

	$voucherno = strtotime(date("h:i:s"));

	$status = 1;

	$user_id = $_SESSION['loginuser']['id'];

	foreach ($shop_arr as $shop) {
		$qty = $shop['qty'];
		$item_id = $shop['id'];

		$sql = "INSERT INTO orderdetails (voucherno,qty,item_id) VALUES(:voucherno,:qty,:item_id)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(':voucherno',$voucherno);
		$stmt->bindParam(':qty',$qty);
		$stmt->bindParam(':item_id',$item_id);
		$stmt->execute();

		if ($stmt->rowCount()) {
			echo "Success";
		}else{
			echo "Error";
		}
	}


	$sql = "INSERT INTO orders (orderdate,voucherno,total,note,status,user_id) VALUES(:orderdate,:voucherno,:total,:notes,:status,:user_id)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':orderdate',$orderdate);
	$stmt->bindParam(':voucherno',$voucherno);
	$stmt->bindParam(':total',$total);
	$stmt->bindParam(':notes',$notes);
	$stmt->bindParam(':status',$status);
	$stmt->bindParam(':user_id',$user_id);
	$stmt->execute();
	if ($stmt->rowCount()) {
			echo "OK";
		}else{
			echo "Error";
		}


?>