<?php 
	session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_id']==2) {

	include 'include/backend_header.php';
	include 'include/backend_sidebar.php';

	include 'dbconnect.php';

	$sql = "SELECT items.*,brands.name as brand_name FROM items INNER JOIN brands ON items.brand_id=brands.id";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items = $stmt->fetchAll();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Items</h1>
		<a href="itemcreate.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Item</a>
	</div>

	<!-- Item List Table -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Item List</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Brand</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Brand</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>




<?php
	
	$i=1;
	foreach ($items as $item) {
		$id = $item['id'];
		$name = $item['name'];
		$price = $item['price'];
		$discount = $item['discount'];
		$codeno = $item['codeno'];
		$brand_id = $item['brand_name'];
		$subcategory_id = $item['subcategory_id'];
		$photo = $item['photo'];

		?>
		 <tr>
		 	<td><?= $i++ ?></td>
		 	<td><?= $name ?></td>
		 	<td>
		 		<?php 
		 			if ($discount) {
		 				echo $discount." MMK";
		 		?>
		 			<del class="d-block"><?= $price ?> MMK</del>
		 		<?php
		 			}else{
		 				echo $price." MMK";
		 			}
		 		?>
		 	</td>
		 	<td><?= $brand_id ?></td>
		 	<td><img src="<?= $photo ?>" width="70" height="70"></td>
		 	<td>
		 		<a href="itemdetail.php?id=<?= $id ?>" class="btn btn-outline-primary detail btn-sm"><i class="fas fa-info-circle"></i></a> 
		 		<a href="itemedit.php?id=<?= $id ?>" class="btn btn-outline-warning edit btn-sm"><i class="fas fa-edit"></i></a> 
		 		<a href="itemdelete.php?id=<?= $id ?>" class="btn btn-outline-danger delete btn-sm"><i class="fas fa-trash"></i></a>
		 	</td>

		 </tr>

<?php

	}

?>





					</tbody>
				</table>
			</div>
		</div>
	</div>


</div>

<?php 
	
	include 'include/backend_footer.php';
	}else{
    header("location:../index.php");
  }


?>