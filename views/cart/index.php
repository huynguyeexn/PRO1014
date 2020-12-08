<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/layouts/Meta.php'); ?>
    <style>
    .product-image {
        width: 150px
    }
    </style>
</head>

<body>

    <!-- Start Header Area -->
    <?php include('views/layouts/header.php.php'); ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <?php include('views/cart/banner.php'); ?>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <?php include('views/cart/cartarea.php'); ?>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include('views/layouts/footer.php.php'); ?>
    <!-- End footer Area -->

    <?php include('views/layouts/script.php'); ?>

</body>

</html>