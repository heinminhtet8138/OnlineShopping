<?php 

include 'include/header.php';
include 'backend/dbconnect.php';

$sql = "SELECT items.*,brands.name as brand_name, subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id = brands.id INNER JOIN subcategories ON items.subcategory_id= subcategories.id LIMIT 8";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll();

?>

	<!-- Header Carousel -->
	<div class="slider ml-lg-5 ml-md-5 mt-5 py-lg-5">
		<div class="row">
			<div class="col-md-4">
				<div class="imgContainer ml-lg-n5 mt-lg-0 mt-md-0 ml-md-n5 mt-n5">
					<div class="image">
						<img src="images/1.png" />
					</div>
					<div class="image">
						<img src="images/2.png" />
					</div>
					<div class="image">
						<img src="images/3.png" />
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<!-- slider -->
				<div id="productSlider" class="carousel slide carousel-fade pr-lg-5 py-lg-0 py-4" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="content">
								<div class="date">
									26 December 2019
								</div>
								<div class="title">
									Lorem ipsum dolor - one
								</div>
								<div class="desc">
									Lorem ipsum dolor sit amet consectetur adipisicing
									elit. Error itaque, libero dignissimos nihil aliquam
									eveniet tenetur cupiditate consectetur quod modi
									repellendus veniam, repellat iusto fugiat temporibus
									officia facere nulla nam.
								</div>
								<div class="d-flex justify-content-center justify-content-lg-start">
									<button class="btn readMoreBtn">
										Read More
									</button>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="content">
								<div class="date">
									26 December 2019
								</div>
								<div class="title">
									Lorem ipsum dolor - two
								</div>
								<div class="desc">
									Lorem ipsum dolor sit amet consectetur adipisicing
									elit. Error itaque, libero dignissimos nihil aliquam
									eveniet tenetur cupiditate consectetur quod modi
									repellendus veniam, repellat iusto fugiat temporibus
									officia facere nulla nam.
								</div>
								<div class="d-flex justify-content-center justify-content-lg-start">
									<button class="btn readMoreBtn">
										Read More
									</button>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="content">
								<div class="date">
									26 December 2019
								</div>
								<div class="title">
									Lorem ipsum dolor -three
								</div>
								<div class="desc">
									Lorem ipsum dolor sit amet consectetur adipisicing
									elit. Error itaque, libero dignissimos nihil aliquam
									eveniet tenetur cupiditate consectetur quod modi
									repellendus veniam, repellat iusto fugiat temporibus
									officia facere nulla nam.
								</div>
								<div class="d-flex justify-content-center justify-content-lg-start">
									<button class="btn readMoreBtn">
										Read More
									</button>
								</div>
							</div>
						</div>
					</div>

					<!-- indicators -->
					<ol class="carousel-indicators indicators">
						<li
						data-target="#productSlider"
						data-slide-to="0"
						class="active"
						></li>
						<li data-target="#productSlider" data-slide-to="1"></li>
						<li data-target="#productSlider" data-slide-to="2"></li>
					</ol>
					<!-- indicators -->
				</div>
				<!-- slider -->
			</div>
		</div>
	</div>

	<!-- New Arrival -->
	<div class="container my-5">
		<h1 class="text-center mt-5 head">Our New Arriavel</h1>
		<hr class="divider">
	</div>

	<div class="container my-5">
		<div class="row">
			<?php 
				foreach ($items as $item) {
			?>

			<div class="col-md-3 py-3">
				<div class="card">
					<div class="inner">
                            <img class="card-img-top" src="backend/<?= $item['photo'] ?>" alt="Card image cap">
                            <div class="overlay">
								<button class="btn btn-warning border-radius view_detail" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>" data-brand="<?=$item['brand_name']?>" data-subcategory="<?=$item['sub_name']?>" data-description="<?=$item['description']?>">Quick View</button>
							</div>
                    </div>
					<div class="card-body text-justify item-card-body">
						<p class="text-muted py-1 my-0"><b>Category: </b><?= $item['sub_name'] ?></p>
						<p class="text-muted py-1 my-0"><b>Name: </b><?= $item['name'] ?></p>
						<p class="text-muted py-1 my-0"><b>Price: </b>

							<?php 
								if ($item['discount']) {
									echo $item['discount']." MMK";
									echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<del>".$item['price']." MMK </del>";
								}else{
									echo $item['price']." MMK";
								}


							?>





						</p>
						
					</div>

					<div class="container-fluid p-0 m-0">
						<div class="row text-center p-0 m-0">
							<div class="col-md-6 item-bg mt-1">
								<a href="" class="text-decoration-none text-dark item-save">
									<i class="fas fa-heart fa-lg py-3"></i>
								</a>
							</div>
							<div class="col-md-6 item-bg mt-1">
								<a href="javascript:0" class="text-decoration-none text-dark item-add addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>" >
									<i class="fas fa-cart-plus fa-lg py-3 item-add"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
					
				}
			?>

		</div>
		<div class="text-center my-5">
			<a href="product.html" class="btn btn-outline-secondary btn-lg">View More</a>
		</div>
	</div>

	<div class="about bg-warning my-5">
		<div class="container py-5 text-center text-light">
			<h2>About Us</h2>
			<p>At Heinshop.com, our purpose is simple: to live and deliver WOW.</p>
			<button class="btn btn-outline-light">Contact Us</button>
		</div>
	</div>

<?php include 'include/footer.php'; ?>


