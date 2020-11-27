<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/connection.php');
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/ProductModel.php');
    require_once('models/ProductDetailModel.php');
    require_once('models/SliderModel.php');
    require_once('models/ConfigModel.php');
    require_once('models/BlogModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            $sliders = getAllSlider();
            $layouts = json_decode(getConfigByName("layout")['config'])->home;
            require_once('views/home/index.php');
            break;
        default: 
            require_once('views/home/index.php');
            break;
        break;
    }
