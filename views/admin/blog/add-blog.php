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
            <form action="admin.php?c=blog&a=add" method="POST" onsubmit="saveContent()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết:</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả bài viết:</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Gắn thẻ bài viết:</label>
                        <a href="#" class=" d-inline float-right">Thêm thẻ +</a>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row px-2">
                                <?php
                                    foreach ($tags as $tag) {
                                        echo '
                                        <div class="col-4 col-md-2 custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="tag-'.$tag['id'].'" name="tag[]" value="'.$tag['id'].'">
                                            <label class="custom-control-label" for="tag-'.$tag['id'].'">'.$tag['name'].'</label>
                                        </div>
                                    ';
                                    }
                                ?>
                            </div>
                        </div> <!-- / .card-body -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="customFile">Ảnh đại diện:</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="thumb">Chọn hình ảnh</label>
                        <input type="file" class="custom-file-input" id="hinh" name="thumb" onchange="anh();">
                    </div>
                </div>
                <div class="row my-4">
                    <div id="khunganh" class="card border-0 bg-transparent col-3" style="height:250px ; width:300px">
                        <!-- <img src="assets/assets/products/p4.jpg" alt="..." class="card-img-top img-fluid rounded">
                            <a href="">Xoa hinh anh</a> -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết:</label>
                    <textarea id="content" name="content" class="w-100" style="height: 300px"></textarea>
                    <style>
                    #suneditor_content {
                        width: unset !important;
                    }
                    </style>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Đăng bài viết</button>
            </form>

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
        const editor = SUNEDITOR.create((document.getElementById('content') || 'content'), {
            buttonList: [
                ['undo', 'redo', 'font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'removeFormat'],
                ['fontColor', 'hiliteColor', 'outdent', 'indent', 'align', 'horizontalRule', 'list', 'table'],
                ['link', 'image', 'video'],
                ['codeView','save']
            ],
            lang: SUNEDITOR_LANG['en']
        });
        function saveContent(){
            editor.save();
        }
        var i=0;
        function anh() {
        if (i == 0) {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh');
                var img = hinh.value;
                img = img.slice(12, img.length)
                var anh = document.createElement("img")
                anh.src = "assets/img/blog/" + img
                var newelement = khunganh.appendChild(anh);
            });
            i = 1;
        } else {
            $(function anh() {
                var hinh = document.getElementById('hinh');
                var khunganh = document.getElementById('khunganh').firstElementChild;
                var img = hinh.value;
                img = img.slice(12, img.length)
                khunganh.src = "assets/img/blog/" + img;
            });
            i = 1;
        }

    }
        </script>
</body>