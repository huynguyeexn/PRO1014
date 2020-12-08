<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
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
        <?php include_once('views/admin/layout/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/layout/sidebar.php') ?>
        <!-- End Left Sidebar -->


           <!-- Striped rows -->
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12 my-4">
              <h2 class="h1 mb-1">Danh Mục Sản Phẩm</h2>
                <div class="card shadow">
                  <div class="card-body">
                    <div class="toolbar row mb-3">
                        <div class="col">
                            <form class="form-inline">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="search" class="sr-only">Search</label>
                                        <input type="search" class="form-control" onkeyup="timkiem(this.value);"
                                            id="search" placeholder="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <a href='admin.php?c=size&p=insert'
                                    class="btn btn-primary float-right ml-3" type="button">Thêm mới +</a>
                                <button class="btn btn-secondary" type="button" onclick='xoa();'> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" onclick="show();" id="all2">
                              <label class="custom-control-label" for="all2"></label>
                            </div>
                          </td>
                          <th>Mã</th>
                          <th>Size</th>
                        </tr> 
                      </thead>
                      <tbody id="sp"> 
                        <?php
                        $i = 0;
                          foreach($size as $t){
                            $i++;
                            echo '
                            <tr>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="'.$t['id'].'" name="check_box" id="'.$i.'">
                                    <label class="custom-control-label" for="'.$i.'"></label>
                                  </div>
                                </td><td class="text-muted">'.$t['id'].'</td>
                                </td><td class="text-muted">'.$t['size'].'</td>
                                <td>
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=size&p=form_edit&id='.$t['id'].'">Sửa</a>
                                    <a class="dropdown-item" href="admin.php?c=size&p=remove&id='.$t['id'].'">Xóa</a>
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

        function timkiem(x) {
            var sanpham = document.getElementById('sp');
            $.ajax({
                url: 'admin.php?c=size&p=search',
                type: 'GET',
                data: 'content=' + x,
                success: function(data) {
                    sanpham.innerHTML = data;
                }
            });
            return false;
        }

      function xoa() {
          var sanpham = document.getElementById('sp');
          var box = document.getElementsByName('check_box');
          var check = [];
          for (var i = 0; i < box.length; i++) {
              if (box[i].checked === true) {
                  check += ',' + box[i].value;
              }
          }
          $.ajax({
              url: 'admin.php?c=size&p=chosedelete',
              type: 'GET',
              data: 'delete=' + check,
              success: function(data) {
                  sanpham.innerHTML = data;
              }
          });
          return false;
      }

      function show() {
          var show = document.getElementById('all2');
          var box = document.getElementsByName('check_box');
          if (show.checked === true) {
              for (var i = 0; i < box.length; i++) {
                  box[i].checked = true;
              }
          } else if (show.checked === false) {
              for (var i = 0; i < box.length; i++) {
                  box[i].checked = false;
              }
          }
      }
    </script>
  </body>