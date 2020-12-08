<!DOCTYPE html>
<html lang="en">

<head>
	<?php required 'views/layouts/meta.php'; ?>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- Start Header Area -->
	<?php required 'views/layouts/header.php.php'; ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<?php required 'views/products/banner.php'?>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<?php required 'views/products/single_product.php'?>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
    <?php required 'views/products/product_descriptions.php'?>
	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->
	<?php required 'views/layouts/RelatedProduct.php'?>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php required 'views/layouts/footer.php.php'; ?>
	<!-- End footer Area -->

	
	<?php required 'views/layouts/script.php'; ?>

</body>

</html>