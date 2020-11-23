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
        <div class="col-md-10 my-4 float-right">
            <form action="admin.php?c=tag-blog&t=update&id=<?php echo $gettag['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="title">ID</label>
                    <input type="text" name="id" id="id" class="form-control" disabled  >
                </div>
                <div class="form-group">
                    <label for="description">Tên thẻ</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $gettag['name'] ?>">
                </div>
                
                <div class="form-group">
                    <label for="description">Ưu tiên</label>
                    <input type="text" name="priority" id="priority" class="form-control" value="<?php echo $gettag['priority'] ?>">
                </div>
               

                <button type="submit" class="btn btn-block btn-primary">Sửa thẻ</button>
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
        </script>
</body>