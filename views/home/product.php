<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Sản phẩm Hot</h1>
						<p></p>
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
						<h1>Được mua nhiều</h1>
						<p></p>
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