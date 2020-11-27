<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/meta.php') ?>
    <style>
    .cont {
        height: 100px;
        overflow: hidden;
    }

    .select {
        width: 100%;
        height: 35px;
        color: #ced4da;
        background: #343a40;
        border-color: #9bbcff;
        border-radius: 0.25rem;
        box-shadow: 0 0 0 0.2rem rgba(27, 104, 255, 0.25)
    }

    .drag {
        width: 100%;
        height: 300px;
        background: black;
    }

    .drag img {
        width: 100%;
        height: 100%;
    }

    td {
        width: 35%;
    }

    #account {
        display: block;
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
                    <div class="col-md-12">
                        <h1 class="h1 mb-2">Thêm Sản Phẩm</h1>
                        <div class="card shadow">
                            <div class="card my-4">
                                <form action="admin.php?c=product&p=addnew" method="post" enctype="multipart/form-data">
                                    <section id="account">
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <h1 class="h5 mb-2">Ảnh Sản Phẩm</h1>
                                                        <div style="padding:0px;" class="card-body">
                                                            <div id="khunganh" class="drag mt-3">
                                                            </div>
                                                            <input type="file" id='hinh' onchange="anh();" class="mt-3"
                                                                name="images_sp">
                                                        </div>
                                                        <div style="padding:0px;" class="card-body">
                                                            <h1 class="h5 mb-2 mt-5">Ảnh Mô Tả</h1>
                                                            <input type="file" name="hinh[]" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 my-4 ml-5">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tên
                                                                Sản Phẩm</label>
                                                            <div class="col-sm-9 mb-3">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Tên Sản Phẩm">
                                                            </div>
                                                        </div>
                                                        <fieldset class="form-group">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3 pt-0">Giá</label>
                                                                <div class="col-sm-9 mb-3">
                                                                    <input type="text" class="form-control" name="cost"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Giá Thị
                                                                    Trường</label>
                                                                <div class="col-sm-9 mb-3">
                                                                    <input type="text" class="form-control" name="price"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3" for="exampleFormControlTextarea1">Mô
                                                                Tả</label>
                                                            <div class="col-sm-9 mb-3">
                                                                <textarea class="form-control" name="description"
                                                                    rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3">
                                                                <label for="exampleFormControlTextarea1">Size từ</label>
                                                                <select class="select" name="size1" id="minsize">
                                                                    <option value="">Size từ</option>
                                                                    <?php
                                                                     foreach($size as $c){
                                                                      echo '<option value="'.$c['id'].'">'.$c['size'].'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label for="exampleFormControlTextarea1">đến</label>
                                                                <select class="select" name="size2" id="maxsize">
                                                                    <option value="">Đến</option>
                                                                    <?php
                                                                      foreach($size as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['size'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-4 mb-3">
                                                                <label for="exampleFormControlTextarea1">Màu sắc</label>
                                                                <select class="select" name="color" id="">
                                                                    <option value="">Chọn màu sắc</option>
                                                                    <?php
                                                                      foreach($color as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4 mb-3">
                                                                <label for="exampleFormControlTextarea1">Thương
                                                                    Hiệu</label>
                                                                <select class="select" name="brand" id="">
                                                                    <option value="">Chọn thương hiệu</option>
                                                                    <?php
                                                                      foreach($brand as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4 mb-3">
                                                                <label for="exampleFormControlTextarea1">Danh Mục</label>
                                                                <select class="select" name="tag" id="">
                                                                    <option value="">Chọn danh mục</option>
                                                                    <?php
                                                                      foreach($tag as $c){
                                                                        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
                                                                      }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row  float-right">
                                                    <div class="col-sm-4 mb-3 float-right">
                                                        <input type="button" onclick="next();" style="width: 100px;height:35px;font-size:18px;background:#1b68ff;border:1px solid #1b68ff;border-radius:5px;color:white;" value="Next">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="profile"></section>
                                </form>
                            </div> <!-- .card -->
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
    <script>
    var i = 0;

    function anh() {
        if (i == 0) {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh');
                var img = hinh.value;
                img = img.slice(12, img.length)
                var anh = document.createElement("img")
                anh.src = "assets/img/product/" + img
                var newelement = khunganh.appendChild(anh);
            });
            i = 1;
        } else {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh').firstElementChild;
                var img = hinh.value;
                img = img.slice(12, img.length)
                khunganh.src = "assets/img/product/" + img;
            });
            i = 1;
        }

    }

    function next() {
        var min = document.getElementById("minsize").value;
        var max = document.getElementById("maxsize").value;
        var profile = document.getElementById("profile");
        var account = document.getElementById("account");
        $.ajax({
            url: 'admin.php?c=product&p=next',
            type: 'GET',
            data: 'min=' + min + '&max=' + max,
            success: function(data) {
                account.style.display = 'none';
                profile.innerHTML = data
                alert(data)
            }
        });
        return false;
    }
    </script>
    <script>
    $('.file-upload').file_upload();
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