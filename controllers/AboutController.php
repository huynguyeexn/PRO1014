<?php
    session_start();

    // Require các file cần sử dụng.
    include_once('core/function.php');
    
    // Các Model cần thiết.

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            include_once('views/about/index.php');
            break;
        default: 
            include_once('views/about/index.php');
            break;
        break;
    }
?>