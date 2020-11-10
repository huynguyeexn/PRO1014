<?php
session_start();

// Require các file cần sử dụng.
require_once('core/connection.php');
require_once('core/function.php');

// Các Model cần thiết.
require_once('models/ProductModel.php');
require_once('models/SliderModel.php');
require_once('models/ConfigModel.php');
require_once('models/BlogModel.php');
require_once('models/UserModel.php');
require_once('models/CatalogModel.php');
require_once('models/TagBlogModel.php');
// GET action.
$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

switch ($page) {
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
    case 'layout':
        if(isset($_POST['save'])){
            $json = urldecode($_POST['save']);
            if(updateConfig('layout',$json)){
                return true;
            }else{
                return false;
            }
        }

        $layouts = json_decode(getConfigByName("layout")['config'])->home;
        $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->home;


        require_once('views/admin/layout.php');
        break;
    default:
        require_once('views/admin/index.php');
        break;
        break;
}
