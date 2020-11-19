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
            <div class="col-md-12">
              <h1 class="h1 mb-2">Thêm Sản Phẩm</h1>
                <div class="card shadow">
                  <div class="card-body">
                      <tbody>
                        <div class="card shadow mb-4">
                          <div class="card-body">
                            <form>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <div class="card shadow mb-4">
                                  <div style="padding:0px;" class="card-body">
                                    <div id="drag-drop-area"></div>
                                  </div> <!-- .card-body -->
                                </div> <!-- .card -->
                              </div>
                              <div class="col-md-9 my-4">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="disabledInput" class="col-sm-3 col-form-label">Disabled</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
                                  </div>
                                </div>
                                <fieldset class="form-group">
                                  <div class="form-group row">
                                    <label class="col-form-label col-sm-3 pt-0">Giá gốc</label>
                                    <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Giá thị trường</label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                  </div>
                                </fieldset>
                                <div class="form-group row">
                                  <label class="col-sm-3" for="exampleFormControlTextarea1">Nội dung</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Thương Hiệu</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="validationSelect2" required="" data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                                      <option value="" data-select2-id="2">Select state</option>
                                      <optgroup label="Mountain Time Zone" data-select2-id="10">
                                        <option value="AZ" data-select2-id="11">Arizona</option>
                                      </optgroup>
                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-validationSelect2-container"><span class="select2-selection__rendered" id="select2-validationSelect2-container" role="textbox" aria-readonly="true" title="Select state">Select state</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="invalid-feedback"> Please select a valid state. </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Màu Sắc</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="validationSelect2" required="" data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                                      <option value="" data-select2-id="2">Select state</option>
                                      <optgroup label="Mountain Time Zone" data-select2-id="10">
                                        <option value="AZ" data-select2-id="11">Arizona</option>
                                      </optgroup>
                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-validationSelect2-container"><span class="select2-selection__rendered" id="select2-validationSelect2-container" role="textbox" aria-readonly="true" title="Select state">Select state</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="invalid-feedback"> Please select a valid state. </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Danh mục</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="validationSelect2" required="" data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                                      <option value="" data-select2-id="2">Select state</option>
                                      <optgroup label="Mountain Time Zone" data-select2-id="10">
                                        <option value="AZ" data-select2-id="11">Arizona</option>
                                      </optgroup>
                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-validationSelect2-container"><span class="select2-selection__rendered" id="select2-validationSelect2-container" role="textbox" aria-readonly="true" title="Select state">Select state</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="invalid-feedback"> Please select a valid state. </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Ảnh</label>
                                    <div class="col-sm-14">
                                    <div class="custom-file mb-3">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Kích thước nhỏ nhất</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="validationSelect2" required="" data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                                      <option value="" data-select2-id="2">Select state</option>
                                      <optgroup label="Mountain Time Zone" data-select2-id="10">
                                        <option value="AZ" data-select2-id="11">Arizona</option>
                                      </optgroup>
                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-validationSelect2-container"><span class="select2-selection__rendered" id="select2-validationSelect2-container" role="textbox" aria-readonly="true" title="Select state">Select state</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="invalid-feedback"> Please select a valid state. </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationSelect2">Kích thước lớn nhất</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="validationSelect2" required="" data-select2-id="validationSelect2" tabindex="-1" aria-hidden="true">
                                      <option value="" data-select2-id="2">Select state</option>
                                      <optgroup label="Mountain Time Zone" data-select2-id="10">
                                        <option value="AZ" data-select2-id="11">Arizona</option>
                                      </optgroup>
                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-validationSelect2-container"><span class="select2-selection__rendered" id="select2-validationSelect2-container" role="textbox" aria-readonly="true" title="Select state">Select state</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="invalid-feedback"> Please select a valid state. </div>
                                  </div>
                                </div>
                                <div class="form-group mb-2">
                                  <button type="submit" class="btn btn-primary">Lưu</button>
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
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 900,
          height: 300,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
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