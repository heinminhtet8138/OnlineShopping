<?php 
 	
 	include 'include/header.php';

?>

<div id="checkout_body">
	<div class="container my-5 text-center">
		<div class="row">
			<div class="offset-md-2 col-md-8">
				<h3 class="py-3">Check Out</h3>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Item Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>

			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<textarea class="form-control notes" placeholder="Notes"></textarea>
					<input type="hidden" name="" class="total">
				</div>
			</div>


			<div class="offset-md-2 col-md-4 text-left">
				<a href="products.php" class="btn btn-warning">Contintue Shopping</a>
			</div>
			<div class="offset-md-2 col-md-4 text-left">
				<?php 
					if (isset($_SESSION['loginuser'])) {
				?>
					<button class="btn btn-warning buy_now">Buy Now</button>
				<?php
					}else{
						echo "<a href='login.php' class='btn btn-warning'>Login To Buy</a>";
					}

				?>
			</div>
		</div>
	</div>
</div>


<?php include 'include/footer.php'; ?>
