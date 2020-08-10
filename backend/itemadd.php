<?php 
	
	include 'dbconnect.php';

	$name = $_POST['item_name'];
	$photo = $_FILES['item_photo'];
	$unit_price = $_POST['unit_price'];
	$discount_price = $_POST['discount_price'];
	$brand_id = $_POST['brand_id'];
	$subcategory_id = $_POST['subcategory_id'];
	$description = $_POST['item_des'];

	$basepath = "images/item_images/";
	$fullpath = $basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	$codeno = "CODE_".mt_rand(100000,999999);


	$sql = "INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:item_codeno,:item_name,:item_photo,:item_price,:item_discount,:item_description,:item_brand,:item_subcategory)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':item_codeno',$codeno);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->bindParam(':item_price',$unit_price);
	$stmt->bindParam(':item_discount',$discount_price);
	$stmt->bindParam(':item_description',$description);
	$stmt->bindParam(':item_brand',$brand_id);
	$stmt->bindParam(':item_subcategory',$subcategory_id);

	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:itemlist.php");
	}else{
		echo "Error";
	}








?>