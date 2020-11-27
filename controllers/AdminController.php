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
require_once('models/TagOfBlog.php');
require_once('models/BrandModel.php');
require_once('models/OrderModel.php');
require_once('models/CommentModel.php');

if(!isset($_SESSION['user'])){
    header('location: index.php');
}
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
        $product = getAllProduct();
        require_once('views/admin/product/home.php');
    break;
    case 'brand':
        require_once('views/admin/brand.php');
    break;
    case 'tag':
        require_once('views/admin/tag.php');
    break;
    case 'b-comment':
        $action = "show";
        if (isset($_GET["b"])) {
            $action = $_GET["b"];
        }
        switch ($action) {
            case 'show':
                require_once('views/admin/blog-comment/blog-comment.php');
            break;
            case 'delete':
                if(isset($_GET['id'])){
                    $id =$_GET['id'];
                    deleteBlogComment($id);                             
                }
                header('location: admin.php?c=b-comment');
            break;

            case 'edit':
                $id = $_GET['id'];
                $com = getAllBlogComment();
                $getcom = getBlogCommentById($id);
                include 'views/admin/blog-comment/edit-comment.php';
            break;

            case 'update';
            $id = $_GET['id'];
            $com =$_POST['comment'];
           
            updateCommentBlog($id,$com);
             header('location: admin.php?c=b-comment');
        break;
        }
    break;
    case 'user':
        require_once('views/admin/user.php');
    break;

    case 'tag-blog':
        $tagblog = "t-blog";
        if (isset($_GET["t"])) {
            $tagblog = $_GET["t"];
        }
        switch($tagblog){
            case 't-blog':
                require_once('views/admin/tag-blog/tag-blog.php');
            break;
            case 'create':
                $tags = getAllTagBlog();
                require_once('views/admin/tag-blog/add-tagblog.php');
            break;
            
            case 'add':
                $tagname =$_POST['name'];
                $show = 1;
                $priority = $_POST['priority'];
                addNewTagBlog($tagname,$priority);
                header('location: admin.php?c=tag-blog');
            break;
            case 'delete':
                if(isset($_GET['id'])){
                    $id =$_GET['id'];
                    deleteTagBlog($id);                             
                }
                header('location: admin.php?c=tag-blog');
            break;

            case 'edit':
                $id = $_GET['id'];
                $tags = getAllTagBlog();
                $gettag = getTagBlogById($id);
                include 'views/admin/tag-blog/edit-tagblog.php';
            break;

            case 'update';
            $id = $_GET['id'];
            $tagname =$_POST['name'];
            $show = 1;
            $priority = $_POST['priority'];
            updateTagBlog($id,$tagname,$priority);
             header('location: admin.php?c=tag-blog');
        break;
        }
    break;


    case 'blog':
        $action = "show";
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
        }

        switch ($action) {
            case 'show':
                require_once('views/admin/blog/blog.php');
            break;
            case 'create':
                $tags = getAllTagBlog();
                require_once('views/admin/blog/add-blog.php');
            break;
          
            case 'add':
                $userId = $_SESSION['user']['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $tags = $_POST['tag'];
                $content = $_POST['content'];
                $thumb = NULL;
                $now = now();
                $blogId = intval(getMaxBlogId()) + 1;
    
                // Upload.
                $target_dir = "assets/img/blog/$blogId/";

                //Check if the directory already exists.
                if(!is_dir($target_dir)){
                    mkdir($target_dir, 0755);
                }

                $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                if (isset($_FILES["thumb"]["name"])) {
                    $check = getimagesize($_FILES["thumb"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)){
                            $thumb = $target_file;
                        } else {
                            echo "Xin lỗi, đã có lỗi xảy ra khi tải lên hình ảnh. Vui lòng thử lại!";
                            die();
                        }
                    } else {
                        echo "File không phải là hình ảnh.";
                        die();
                    }
                }
                addNewBlog($userId,$title,$thumb,$now,$description,$content);
                foreach($tags as $tag){
                    insertTagOfBlog($blogId,$tag);
                }
                header('location: admin.php?c=blog&a=create');
            break;
            case 'delete':
                if(isset($_GET['id'])){
                    $id =$_GET['id'];
                    deleteBlog($id);                             
                }
                header('location: admin.php?c=blog');
            break;

            case 'edit':
                $id = $_GET['id'];
                $tags = getAllTagBlog();
                $tagOfBlog = getTagByBlogId($id);
                
                $getblog = getBlogById($id);
                include 'views/admin/blog/edit-blog.php';

            break;

            case 'update':
                // $id = $_POST['id'];
                 $userId = $_SESSION['user']['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $content = $_POST['content'];
                $thumb = NULL;
                $now = now();
                // $blogId = intval(getMaxBlogId()) + 1;
                $blogid = $_GET['id'];
    
                // Upload.
                $target_dir = "assets/img/blog/$blogid/";

                //Check if the directory already exists.
                if(!is_dir($target_dir)){
                    mkdir($target_dir, 0755);
                }

                $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                if (isset($_FILES["thumb"]["name"])) {
                    $check = getimagesize($_FILES["thumb"]["tmp_name"]);
                    if ($check !== false) {
                        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)){
                            $thumb = $target_file;
                        } else {
                            echo "Xin lỗi, đã có lỗi xảy ra khi tải lên hình ảnh. Vui lòng thử lại!";
                            die();
                        }
                    }
                    
                    else {
                        echo "File không phải là hình ảnh.";
                        die();
                    }
                }
                updateBlog($blogid,$title,$description,$thumb,$content);
                if(isset($_POST['tag'])){
                 $tags = $_POST['tag'];
                    foreach($tags as $tag){
                        updateTagOfBlog($blogid,$tag);
                    }
                }else{
                    $blog = getTagByBlogId($blogid);
                    foreach($blog as $blogs){
                        $t = $blogs['tag_id'];
                        updateTagOfBlog($blogid,$t);
                    }
                }
                
             header('location: admin.php?c=blog');

            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
            break;
        }
    break;
    case 'pagelayout':

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
    case 'menulayout':
        $menu = "";
        if (isset($_GET["p"])) {
            $menu = $_GET["p"];
        }else{
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            include("404.php");
            return;
        }

        switch ($menu) {
            case 'topmenu':
                if(isset($_POST['save'])){
                    $json = urldecode($_POST['save']);
                    if(updateConfig('layout',$json)){
                        return true;
                    }else{
                        return false;
                    }
                }
                $layouts = json_decode(getConfigByName("layout")['config'])->topmenu;
                $layoutDefault = json_decode(getConfigByName("default_layout")['config'])->topmenu;

                require_once('views/admin/edit-layout/topmenu.php');
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