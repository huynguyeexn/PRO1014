<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$products = getProductByOffset(8, 0);
				foreach ($products as $product) {
					echo singleProduct($product);
				}
				?>
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Coming Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				$products = getProductByOffset(8, 0);
				foreach ($products as $product) {
					echo singleProduct($product);
				}
				?>
			</div>
		</div>
	</div>
</section>