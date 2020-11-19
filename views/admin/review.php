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
           <div class="col-md-10 my-4 float-right">
                  <div class="card shadow">
                    <div class="card-body">
                    <h2 class="card-title">Danh sách sản phẩm</h2>
                    <div class="toolbar row mb-3">
                        <div class="col">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="http://pro1014.test/admin.php?c=blog&a=create">Thêm sản phẩm +</a>
                            </div>
                        </div>
                    </div>
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
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Mô tả</th>
                            <th>Ảnh đại diện</th>
                            <th>Cập nhật</th>
                            <th></th>
                            
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
                                    <td>'.$pro['id'].'</td>
                                    <td>'.$pro['name'].'</td>
                                    <td>'.money($pro['cost']).' VNĐ</td>
                                    <td>'.money($pro['price']).' VNĐ</td>
                                    <td>'.substr($pro['description'], 0, 100).'...</td>
                                    <td><img  style=" width: 100px;" src="'.$pro['thumb'].'" alt=""></td>
                                    <td>'.$pro['update'].'</td>
                                    </td>
                                    
                                    
                                    
                                   
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a class="dropdown-item" href="#">Edit</a>
                                          <a class="dropdown-item" href="#">Remove</a>
                                          <a class="dropdown-item" href="#">Assign</a>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                    ';
                                 }
                            ?>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- Striped rows -->
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