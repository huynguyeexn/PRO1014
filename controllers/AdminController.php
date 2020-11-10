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


// GET control = c.
$control = "home";
if (isset($_GET["c"])) {
    $control = $_GET["c"];
}

switch ($control) {
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

        $page = "";
        if (isset($_GET["p"])) {
            $page = $_GET["p"];
        }else{
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            include("404.php");
            return;
        }

        switch ($page) {
            case 'home':
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

                require_once('views/admin/edit-layout/home.php');
            break;
            case 'shop':
                $layouts = json_decode(getConfigByName("layout")['config'])->shop;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->shop;

                require_once('views/admin/edit-layout/shop.php');
            break;
            case 'product':
            break;
            case 'blog':
            break;
            case 'contact':
            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    default:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        include("404.php");
        return;
        break;
}
