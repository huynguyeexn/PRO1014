<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/Connection.php');
    require_once('core/Function.php');

    // Các Model cần thiết.
    require_once('models/ProductModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            $allProduct = getAllProduct();
            require_once('views/products/Show.php');
            break;
        case 'detail':
            // Product detail view
            break;
        case 'create':
            // Product create view
            break;

        default: 
            $allProduct = getAllProduct();
            require_once('views/products/Show.php');
            break;
        break;
    }
