<?php 

	include 'backend/dbconnect.php';

	$id = $_POST['id'];

	$sql="SELECT * FROM items WHERE id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$items = $stmt->fetch(PDO::FETCH_ASSOC);
	echo json_encode($items);

?>