<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/Connection.php');
    require_once('core/Function.php');

    // Các Model cần thiết.
    require_once('models/UserModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            $allUser = getAllUser();
            require_once('views/user/index.php');
            break;

        default: 
            $allUser = getAllUser();
            require_once('views/user/index.php');
            break;
        break;
    }
