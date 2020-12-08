<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/fav.png">
    <title>Kích hoạt tài khoản</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="assets/css/app-dark.css" id="darkTheme">
    <script src="assets/js/jquery.min.js"></script>
    </script>
</head>

<body class="dark ">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 mt-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">
                                <strong class="card-title"><?php echo $message['title'] ?></strong>
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                <?php echo $message['message'] ?>
                            </p>
                            <a href="<?php echo $message['href'] ?>" class="btn mb-2 btn-primary btn-lg btn-block"><?php echo $message['link'] ?></a>
                        </div> <!-- /. card-body -->
                    </div> <!-- /. card-body -->
                </div>
            </div>
        </div>
    </main>
</body>

</html>