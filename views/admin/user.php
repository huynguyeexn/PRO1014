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
                      <h5 class="card-title">Blog Data Table</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Created</th>
                            <th>Birthday</th>
                            <th>Fullname</th>
                            <th>Avartar</th>
                            <th>Rank</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                  $user=getAllUser();
                                  foreach($user as $u){     
                                    echo'
                                    
                                    <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="d1">
                                        <label class="custom-control-label" for="d1"></label>
                                      </div>
                                    </td>
                                    <td>'.$u['id'].'</td>
                                    <td>'.$u['username'].'</td>
                                    <td>'.$u['password'].'$</td>
                                    <td>'.$u['phone'].'</td>
                                    <td>'.$u['created'].'</td>
                                    <td>'.$u['birthday'].'</td>
                                    <td>'.$u['fullname'].'</td>
                                    <td><img style=" width: 70px;" src="'.$u['avartar'].'" alt=""></td>
                                    <td>'.$u['rank'].'</td>
                                    <td>'.$u['address'].'</td>

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