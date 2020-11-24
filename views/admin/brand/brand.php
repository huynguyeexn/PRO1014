<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
    </style>


</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <!-- Top Navbar -->
        <?php include_once('views/admin/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/sidebar.php') ?>
        <!-- End Left Sidebar -->


        <!-- Striped rows -->
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12 my-4">
                        <h2 class="h1 mb-1">Nhãn hàng</h2>
                        <div class="card shadow">
                            <div class="card-body">
                                <h2 class="card-title">Danh sách nhãn hàng</h2>
                                <div class="toolbar row mb-3">
                                    <div class="col">
                                        <div class="dropdown">
                                            <a class="btn btn-primary"
                                                href="http://pro1014.test/admin.php?c=brand&a=create">Thêm
                                                nhãn hàng +</a>
                                        </div>
                                    </div>
                                </div>
                                <form action="../../models/brandmodel.php" method="post">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="chall">
                                                        <label class="custom-control-label" for="d1"></label>
                                                    </div>
                                                </th>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Show</th>
                                                <th>Prioryti</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                  $brand=getAllBrand();
                                  foreach($brand as $br){
                                    echo'
                                    <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="d1">
                                        <label class="custom-control-label" for="d1"></label>
                                      </div>
                                    </td>
                                    <td>'.$br['id'].'</td>
                                    <td>'.$br['name'].'</td>
                                    <td>'.$br['show'].'</td>
                                    <td>'.$br['priority'].'</td>
                                    </td>
                                    
                                    
                                    
                                   
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a href="admin.php?c=brand&a=edit&id='.$br['id'].'" name="action" value="Edit" class="btn btn-primary">Edit</a>                                          
                                          <a href="admin.php?c=brand&a=delete&id='.$br['id'].'" name="action" value="delete"  class="btn btn-primary">remove</a>
                                          <button type="submit" name="action" value="assign"  class="btn btn-primary">assign</button>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                    ';
                                 }
                            ?>

                                        </tbody>
                                    </table>
                                    <div class="toolbar row mb-3">
                                        <div class="col">
                                            <div class="dropdown">
                                                <a class="btn btn-primary"
                                                    href="http://pro1014.test/admin.php?c=blog&a=create">Thêm
                                                    nhãn hàng +</a>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    </div>
    <!-- Striped rows -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src='assets/js/jquery.dataTables.min.js'></script>
    <script src='assets/js/dataTables.bootstrap4.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
    </script>
    <script src="assets/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>
    <script>
    $(".btn-primary").on('click', function() {
        $(this).parent().toggleClass("showContent");
    });
    </script>
</body>