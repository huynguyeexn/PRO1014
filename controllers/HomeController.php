<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/connection.php');
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/productModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            $allProduct = getAllProduct();
            require_once('views/home/index.php');
            break;

        default: 
            $allProduct = getAllProduct();
            require_once('views/home/index.php');
            break;
        break;
    }
