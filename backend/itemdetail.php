<?php 
	
	include 'include/backend_header.php';
	include 'include/backend_sidebar.php';
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "SELECT items.*,brands.name as brand_name, subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE items.id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_id',$id);
	$stmt->execute();

	$item = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Items Detail</h1>
		<a href="itemlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="col-md-4">
			<img src="<?= $item['photo'] ?>" class="img-fluid">
		</div>
		<div class="col-md-8 px-5 text-justify">
			<h5 class="text-dark">Name: <span class="text-muted"><?= $item['name']?></span></h5>
			<h5 class="text-dark">Brand: <span class="text-muted"><?= $item['brand_name']?></span></h5>
			<h5 class="text-dark">SubCategory: <span class="text-muted"><?= $item['sub_name']?></span></h5>
			<?php 

				if ($item['discount']) {
			?>
				<h5 class="text-dark">Price: 
					<span class="text-muted">
					<?= $item['discount']?> MMK
					<del class="d-block"><?= $item['price']?> MMK</del>
					</span>
				</h5>
			<?php
				}else{

			?>
			<h5 class="text-dark">Price: <span class="text-muted"><?= $item['price']?> MMK</span></h5>
			<?php 
				}
			?>
			<br>
			<h5 class="text-dark">Description:</h5>
			<p><?= $item['description']?></p>
		</div>
	</div>




</div>

<?php 

	include 'include/backend_footer.php';

?>