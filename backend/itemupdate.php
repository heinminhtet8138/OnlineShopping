<?php 

	include 'dbconnect.php';

	$uid = $_POST['item_id'];
	$uname = $_POST['item_name'];
	$uprice = $_POST['unit_price'];
	$udiscount = $_POST['discount_price'];
	$ubrand_id = $_POST['brand_id'];
	$usubcategory_id =$_POST['subcategory_id'];
	$udescription = $_POST['item_des'];
	$fullpath = $_POST['old_photo'];
	$new_photo = $_FILES['new_photo'];
	$ucodeno = $_POST['item_codeno'];

	if ($new_photo['size']>0) {
		$basepath = "images/item_images/";
		$fullpath = $basepath.$new_photo['name'];
		move_uploaded_file($new_photo['tmp_name'], $fullpath);
	}

	$sql = "UPDATE items SET codeno=:item_codeno, name=:item_name, photo=:item_photo, price=:item_price, discount=:item_discount, brand_id=:item_brand, subcategory_id=:item_sub, description=:item_des WHERE id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_id',$uid);
	$stmt->bindParam(':item_codeno',$ucodeno);
	$stmt->bindParam(':item_name',$uname);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->bindParam(':item_price',$uprice);
	$stmt->bindParam(':item_discount',$udiscount);
	$stmt->bindParam(':item_brand',$ubrand_id);
	$stmt->bindParam(':item_sub',$usubcategory_id);
	$stmt->bindParam(':item_des',$udescription);
	$stmt->execute();
	
	header("location:itemlist.php");
	







?>