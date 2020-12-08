<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/layouts/meta.php'); ?>
</head>

<body>
    <?php
    // foreach($layouts as $layout){
    // 	echo "<!-- Start $layout Area -->";
    // 	include("views/$layout.php");
    // 	echo "<!-- End Header Area -->";
    // }
    ?>
    <!-- Start Header Area -->
    <?php include('views/layouts/header.php'); ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <?php include('views/shop/bannerArea.php'); ?>
    <!-- End Banner Area -->

    <?php include('views/shop/container.php'); ?>

    <!-- Start related-product Area -->
    <?php include('views/layouts/RelatedProduct.php'); ?>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <?php include('views/layouts/footer.php'); ?>
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->
    <?php include('views/shop/modal.php'); ?>


    <?php include('views/layouts/script.php'); ?>
</body>

</html>