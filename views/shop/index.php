<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('views/layouts/meta.php'); ?>
</head>

<body>
<<<<<<< HEAD
    <?php
		foreach($layouts as $layout){
			echo "<!-- Start $layout Area -->";
			include_once("views/$layout.php");
			echo "<!-- End Header Area -->";
		}
	?>
=======
    <!-- Start Header Area -->
    <?php include_once('views/layouts/Header.php'); ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <?php include_once('views/shop/bannerArea.php'); ?>
    <!-- End Banner Area -->

    <?php include_once('views/shop/container.php'); ?>

    <!-- Start related-product Area -->
    <?php include_once('views/shop/relatedProductArea.php'); ?>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <?php include_once('views/layouts/Footer.php'); ?>
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->
        <?php include_once('views/shop/modal.php'); ?>

    
        <?php include_once('views/layouts/script.php'); ?>
>>>>>>> 037e9f0d8661e1c4838e59deb9069df9b8c83cd9
</body>

</html>