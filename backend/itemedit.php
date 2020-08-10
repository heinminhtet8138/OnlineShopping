<?php 

	include 'include/backend_header.php';
	include 'include/backend_sidebar.php';
	include 'dbconnect.php';

	$id = $_GET['id'];

	$sql = "SELECT * FROM items WHERE id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_id',$id);
	$stmt->execute();
	$item = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid  mb-3">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Items Edit</h1>
		<a href="itemlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="itemupdate.php" enctype="multipart/form-data">
				<input type="hidden" name="item_id" value="<?= $item['id'] ?>">
				<input type="hidden" name="old_photo" value="<?= $item['photo'] ?>">
				<input type="hidden" name="item_codeno" value="<?= $item['codeno']?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="item_name" class="form-control" value="<?= $item['name'] ?>">
				</div>
				<ul class="nav nav-tabs" id="myTab2" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#old_photo" role="tab" aria-controls="home" aria-selected="true">Photo</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#new_photo" role="tab" aria-controls="profile" aria-selected="false">New Photo </a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent2">
					<div class="tab-pane fade show active py-3" id="old_photo" role="tabpanel" aria-labelledby="home-tab">
						<img src="<?= $item['photo'] ?>" width="100" height="100">
					</div>
					<div class="tab-pane fade py-3" id="new_photo" role="tabpanel" aria-labelledby="profile-tab">
						<div class="form-group">
							<input type="file" name="new_photo" class="form-control-file">
							
						</div>
					</div>
				</div>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="form-group my-3">
							<input type="number" name="unit_price" class="form-control" placeholder="Unit Price" value="<?= $item['price'] ?>">
						</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="form-group my-3">
							<input type="number" name="discount_price" class="form-control" placeholder="Discount Price" value="<?= $item['discount'] ?>">
						</div>
					</div>
					
				</div>
				<div class="form-group">
					<label>Brand</label>
					<select name="brand_id" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM brands";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$brands = $stmt->fetchAll();

							foreach ($brands as $brand) {
								
								$id = $brand['id'];
								$name = $brand['name'];
							?>




<option value="<?= $id ?>" <?php if ($item['brand_id']==$id) {
	echo "selected";
} ?> >
	<?= $name?>
		
</option>




							<?php
								}
							?>
					</select>
				</div>
				<div class="form-group">
					<label>Sub Category</label>
					<select name="subcategory_id" class="form-control">
						<option>Choose...</option>
						<?php 
							$sql = "SELECT * FROM subcategories";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$subcategories = $stmt->fetchAll();

							foreach ($subcategories as $subcategory) {
								
								$id = $subcategory['id'];
								$name = $subcategory['name'];
							?>

<option value="<?= $id ?>" <?php if ($item['subcategory_id']==$id) {
	echo "selected";
} ?> ><?= $name?></option>

							<?php
								}
							?>
					</select>
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="item_des"><?= $item['description'] ?></textarea>
				</div>

				<input type="submit" value="Update" class="btn btn-outline-primary">
				
			</form>
		</div>
	</div>






</div>



<?php 
	
	include 'include/backend_footer.php';

?>