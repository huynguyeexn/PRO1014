<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/meta.php') ?>
    <style>
        .cont{
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
              <h2 class="h1 mb-1">Sản Phẩm</h2>
                <div class="card shadow">
                  <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr class="text-center">
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="all2">
                              <label class="custom-control-label" for="all2"></label>
                            </div>
                          </td>
                          <th>Mã SP</th>
                          <th>Ảnh đại diện</th>
                          <th>Tên sản phẩm</th>
                          <th>Ngày cập nhật</th>
                          <th>Giá gốc</th>
                          <th>Giá khuyến mãi</th>
                          <th>Mô tả</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach($product as $p){
                            echo '
                              <tr>
                                <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="2474">
                                    <label class="custom-control-label" for="2474"></label>
                                  </div>
                                </td><td class="text-muted">'.$p['id'].'</td>
                                <td>
                                  <div class="avatar avatar-md">
                                    <img src="'.$p['thumb'].'" alt="..." class="avatar-img rounded-circle">
                                  </div>
                                </td>
                                <td>
                                  <p class="mb-0 text-muted"><strong>'.$p['name'].'</strong></p>
                                </td>
                                <td class="text-muted">'.$p['update'].'</td>
                                <td class="text-muted">'.numToMoney($p['cost']).'</td>
                                <td class="text-muted">'.numToMoney($p['price']).'</td>
                                <td style = "width:33%;" class="text-muted">'.htmlentities(substr($p['description'], 0, 100)).'</td>
                                <td>
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=product&p=edit">Edit</a>
                                    <a class="dropdown-item" href="admin.php?c=product&p=remove">Remove</a>
                                    <a class="dropdown-item" href="admin.php?c=product&p=insert">Insert</a>
                                  </div>
                                </td>
                              </tr>
                            ';
                          }
                        ?>
                      </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                      <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div> <!-- customized table -->
          </div>
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/apps.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $('#dataTable-1').DataTable(
      {
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

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    <script>
        $(".btn-primary").on('click', function(){
            $(this).parent().toggleClass("showContent");
        });

    </script>
  </body>