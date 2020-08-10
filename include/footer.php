
<div class="container-fluid">
		<div class="row">
			<div class="col-6 col-md-4 text-center">
				<span class="fa-stack fa-2x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-truck fa-stack-1x fa-inverse"></i>
				</span>
				<h6>Door to Door Delivery</h6>
				<p class="text-muted">On-time Delivery</p>
			</div>
			<div class="col-6 col-md-4 text-center">
				<span class="fa-stack fa-2x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-headphones-alt fa-stack-1x fa-inverse"></i>
				</span>
				<h6>Customer Service</h6>
				<p class="text-muted">Hotline: <span class="text-danger">09-974927279</span></p>
			</div>
			<div class="col-6 col-md-4 text-center">
				<span class="fa-stack fa-2x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-hand-holding-usd fa-stack-1x fa-inverse"></i>
				</span>
				<h6>Satisfication</h6>
				<p class="text-muted">3 Day Return</p>
			</div>
		</div>
	</div>

	<footer class="text-center mt-5 bg-light">
		<div class="container text-center py-2 pt-4">
			<p>
				<i class="fab fa-cc-visa"></i>
				<i class="fab fa-cc-jcb"></i>
				<i class="fab fa-cc-paypal"></i>
				<i class="fab fa-cc-mastercard"></i>
				<i class="fab fa-cc-discover"></i>
				<i class="fab fa-cc-amex"></i>
				<i class="fab fa-cc-mastercard"></i>
			</p>
			<p>
				Copyright &copy; heinshop.com | Design by <a href="http://heinminhtet.com" target="_blank">HEIN</a>
			</p>
		</div>
	</footer>

<!-- Product Detail Modal -->
<!-- Detail Modal -->
<div class="modal fade" id="product_detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Item Detail</h3>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<img src="images/corret.png" class="img-fluid pimg">
						</div>
						<div class="col-md-6">
							<h4>Item Infomations</h4>
							<p class="pname"></p>
							<p class="pbrand"></p>
							<p class="psubcategory"></p>
							<p class="pprice"></p>
							<p class="pdiscount"></p>
							<p class="pdescription"></p>
			
							<div class="form-group">
								<label for="qty">Qty</label>
								<input type="number" name="" id="qty" class="form-control w-50">
							</div>
							<button class="btn btn-outline-success">Buy Now</button>
							<button class="btn btn-outline-success addtocart cart_data">Add To Cart</button>

						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>






<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="product-carousel/js/script.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>