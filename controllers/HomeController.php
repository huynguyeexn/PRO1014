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
            require_once('views/home/index.php');
            break;
<<<<<<< HEAD
=======

        case 'shop':
            require_once('views/shop/index.php');
            break;

>>>>>>> 6e0289637c89c82f37b487f9eb7cf960955245d6
        default: 
            require_once('views/home/index.php');
            break;
        break;
    }
