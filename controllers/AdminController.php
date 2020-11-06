<?php
session_start();

// Require các file cần sử dụng.
require_once('core/connection.php');
require_once('core/function.php');

// Các Model cần thiết.
// require_once('models/ProductModel.php');
// require_once('models/SliderModel.php');
// require_once('models/ConfigModel.php');

// GET action.
$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'home':
        require_once('views/admin/index.php');
        break;
    case 'order':
        require_once('views/admin/order.php');
        break;
    case 'product':
        require_once('views/admin/product.php');
        break;
    case 'brand':
        require_once('views/admin/brand.php');
        break;
    case 'tag':
        require_once('views/admin/tag.php');
        break;
    case 'comment':
        require_once('views/admin/comment.php');
        break;
    case 'user':
        require_once('views/admin/user.php');
        break;
    case 'blog':
        require_once('views/admin/blog.php');
        break;
    default:
        require_once('views/admin/index.php');
        break;
        break;
}
