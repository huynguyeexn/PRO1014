<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/meta.php') ?>
    <style>
        .cont{
            height: 100px;
            overflow: hidden;
        }
        .select{
          width:100%;
          height:35px;
          color:#ced4da;
          background:#343a40;
          border-color: #9bbcff;
          border-radius: 0.25rem;
          box-shadow: 0 0 0 0.2rem rgba(27, 104, 255, 0.25)
        }
        .drag{
          width:100%;
          height:300px;
          overflow:hidden;
          background:black;
        }
        .drag img{
          width:100%;
          height:100%;
          object-fit:cover;
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
                  <div class="card-body">
                      <tbody>
                        <div class="card shadow mb-4">
                          <div class="card-body">
                            <form action="admin.php?c=product&p=edit&id=<?php echo $product['id']?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                            <div class="col-md-3">
                                  <h1 class="h5 mb-2">Ảnh Sản Phẩm</h1>
                                  <div style="padding:0px;" class="card-body">
                                      <input type="file" name="images_sp">
                                    <div  class="drag mt-3"> 
                                      <img src="<?php echo $product['thumb']?>" alt="">
                                    </div>
                                  </div>
                                  <div style="padding:0px;" class="card-body">
                                  <h1 class="h5 mb-2 mt-4">Ảnh Mô Tả</h1>
                                      <input type="file" name="hinh[]" multiple>
                                  </div>
                              </div>
                              <div class="col-md-9 my-4">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-3 col-form-label">Tên Sản Phẩm</label>
                                  <div class="col-sm-9 mb-3">
                                    <input type="text" class="form-control" name="name" value="<?php echo $product['name']?>">
                                  </div>
                                </div>
                                <fieldset class="form-group">
                                  <div class="form-group row">
                                    <label class="col-form-label col-sm-3 pt-0">Giá</label>
                                    <div class="col-sm-9 mb-3">
                                    <input type="text" class="form-control" name="cost" value="<?php echo $product['cost']?>">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Giá Thị Trường</label>
                                    <div class="col-sm-9 mb-3">
                                      <input type="text" class="form-control" name="price" value="<?php echo $product['price']?>">
                                    </div>
                                  </div>
                                </fieldset>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Số Lượng</label>
                                  <div class="col-sm-9 mb-3">
                                    <input type="text" class="form-control" value="<?php echo $product_detail['quantity']?>" name="quantity" >
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3" for="exampleFormControlTextarea1">Mô Tả</label>
                                  <div class="col-sm-9 mb-3">
                                    <textarea class="form-control" name="description" rows="3"><?php echo $product['description']?></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Thương Hiệu</label>
                                    <div class="col-sm-14">
                                     <select class="select" name="brand" >
                                       <?php
                                          foreach($brand as $b){
                                              if($b['id'] == $product['brand_id']){
                                                echo '
                                                    <option value="'.$b['id'].'"  selected>'.$b['name'].'</option>
                                                ';
                                              }else{
                                                  echo '
                                                    <option value="'.$b['id'].'">'.$b['name'].'</option>
                                                    ';
                                              }
                                          }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Màu Sắc</label>
                                    <div class="col-sm-14">
                                     <select class="select" name="color">
                                       <?php
                                          foreach($color as $c){
                                            if($c['id'] == $product_detail['color_id']){
                                                echo '
                                                    <option  selected value="'.$c['id'].'">'.$c['name'].'</option>
                                                ';
                                              }else{
                                                  echo '
                                                    <option value="'.$c['id'].'">'.$c['name'].'</option>
                                                    ';
                                              }
                                          }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Danh Mục</label>                                             
                                    <div class="col-sm-14">
                                     <select class="select" name="tag">
                                       <?php
                                          foreach($tag as $t){
                                            if($t['id'] == $product_tag['tag_id']){
                                                echo '
                                                    <option  selected value="'.$t['id'].'">'.$t['name'].'</option>
                                                ';
                                              }else{
                                                  echo '
                                                    <option value="'.$t['id'].'">'.$t['name'].'</option>
                                                    ';
                                              }
                                          }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">   
                                  <div class="col-md-6 mb-3">
                                    <label for="validationSelect2">Size Từ</label>
                                    <div class="col-sm-14">
                                     <select class="select" name="size1">
                                       <?php
                                          for($s=35;$s<40;$s++){
                                            if($s == $product_detail['min(size_id)']){
                                                echo '
                                                    <option  value="'.$s.'"  selected>'.$s.'</option>
                                                ';
                                              }else{
                                                echo '
                                                    <option value="'.$s.'">'.$s.'</option>
                                                ';
                                              }
                                          }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="validationSelect2">Đến</label>   
                                    <div class="col-sm-14">
                                     <select class="select" name="size2" id="">
                                       <?php
                                          for($i=35;$i<45;$i++){
                                            if($i == $product_detail['max(size_id)']){
                                                echo '
                                                    <option  selected value="'.$i.'">'.$i.'</option>
                                                ';
                                              }else{
                                                echo '
                                                    <option value="'.$i.'">'.$i.'</option>
                                                ';
                                              }
                                          }
                                       ?>
                                     </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group mt-2">
                                  <button type="submit" style='width:100px;float:right;margin-top:20px;' class="btn btn-primary">Lưu</button>
                                </div>
                              </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </tbody>
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
      // function a(){
      //    var anh = document.getElementById('anh');
      //    var hinh = document.getElementById('hinh');
      //    var img = anh.value; 
      //    img = img.slice(13,img.length)
      //    hinh.src = 'assets/img/product/'+img;
      // }
    </script>
    <script>
      $('.file-upload').file_upload();
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