<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }
    .card img{
        width: 100%;
    }
    </style>


</head>
<body>

    <!-- Top Navbar -->
    <?php include_once('views/admin/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/sidebar.php') ?>
        <!-- End Left Sidebar -->
        <form action="admin.php" method="GET">
        <div class="col-md-6">
        <input type="hidden" name="c" value="brand" />
        <input type="hidden" name="a" value="add" />
                      <div class="form-group mb-3">
                        <label for="simpleinput">Tên nhãn hàng</label>
                        <input type="text" name="name" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput">Ẩn hiện</label>
                        <input type="text" name="show" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput">Thứ tự nhãn hàng</label>
                        <input type="text" name="priority" id="simpleinput" class="form-control">
                      </div>
                      <input type="submit" />
                      
        </div>
        </form>
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
        <script src='assets/js/jquery.mask.min.js'></script>
        <script src='assets/js/select2.min.js'></script>
        <script src='assets/js/jquery.steps.min.js'></script>
        <script src='assets/js/jquery.validate.min.js'></script>
        <script src='assets/js/jquery.timepicker.js'></script>
        <script src='assets/js/dropzone.min.js'></script>
        <script src='assets/js/uppy.min.js'></script>
        <script src='assets/js/quill.min.js'></script>
        <script src="assets/js/apps.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
</body>