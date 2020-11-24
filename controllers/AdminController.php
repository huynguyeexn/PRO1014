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
require_once('models/TagOfProductModel.php');
require_once('models/TagOfBlog.php');
require_once('models/BrandModel.php');
require_once('models/ColorModel.php');
require_once('models/TagModel.php');
require_once('models/ProductDetailModel.php');
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
        $product = 'home';
        if(isset($_GET['p'])){
            $product = $_GET["p"];
        }
        switch ($product) {
            case 'home':
                $product = getAllProduct();
                require_once('views/admin/product/home.php');
            break;
            case 'insert':
                $brand = getAllBrand();
                $color = getAllColor();
                $tag = getAllTag();
                require_once('views/admin/product/addnew.php');
            break;
            case 'addnew':
                $name = $_POST['name'];
                $listanh = '';
                $price = $_POST['price'];
                $view = 0;
                $tag = $_POST['tag'];
                $color = $_POST['color'];
                $cost = $_POST['cost'];
                $brand = $_POST['brand'];
                $size1 = $_POST['size1'];
                $size2 = $_POST['size2'];
                $quantity = $_POST['quantity'];
                $description = '<p>'.$_POST['description'].'</p>';
                $update =  date("Y-m-d H:i:s");
                $thumb = $_FILES['images_sp']['name'];
                move_uploaded_file($_FILES['images_sp']['tmp_name'],"assets/img/product/".$thumb);
                $thumb = 'assets/img/product/'.$thumb;
                foreach($_FILES['hinh']['name'] as $key => $file){
                    move_uploaded_file($_FILES['hinh']['tmp_name'][$key],"assets/img/product/".$file);
                    if($listanh == ''){
                       $listanh = '["assets/img/product/'.$file.'"'; 
                    }else{
                        $listanh .= ', '.'"assets/img/product/'.$file.'"'; 
                    }
                }
                if($listanh == ''){
                    $listanh = ''; 
                }else{
                     $listanh .= ']'; 
                }
                addNewProduct($name,$cost,$price,$description,$update,$thumb,$brand,$view,$listanh);
                $maxid = getMaxId();
                $id = $maxid['MAX(id)'];  
                addNewTagOfProduct($id,$tag);
                for($i = $size1;$i<=$size2;$i++){
                    $size = $i;
                echo  addNewProductDetail($id,$color,$size,$quantity);
                }
                header("location:admin.php?c=product");
            break;
            case 'form_edit':
                $id = $_GET['id'];
                $brand = getAllBrand();
                $color = getAllColor();
                $tag = getAllTag();
                $product = getProductById($id);
                $product_detail = getProductDetailById($id);
                $product_tag = getTagByProductId($id);
                require_once('views/admin/product/edit.php');
            break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $view = 0;
                $listanh = '';
                $anh = '';
                $tag = $_POST['tag'];
                $color = $_POST['color'];
                $cost = $_POST['cost'];
                $brand = $_POST['brand'];
                $size1 = $_POST['size1'];
                $size2 = $_POST['size2'];
                $quantity = $_POST['quantity'];
                $description = $_POST['description'];
                $update =  date("Y-m-d H:i:s");
                $thumb = $_FILES['images_sp']['name'];
                move_uploaded_file($_FILES['images_sp']['tmp_name'],"assets/img/product/".$thumb);
                if(strlen($thumb)>0){
                    move_uploaded_file($_FILES['images_sp']['tmp_name'],"assets/img/product/".$thumb);
                    $thumb = 'assets/img/product/'.$thumb;
                }else{
                    $row = getProductById($id);
                    $thumb  = $row['thumb'];
                }
                foreach($_FILES['hinh']['name'] as $key => $file){
                    $anh .= $_FILES['hinh']['name'][$key];
                }
                if(strlen($anh)>0){
                    foreach($_FILES['hinh']['name'] as $key => $file){
                        move_uploaded_file($_FILES['hinh']['tmp_name'][$key],"assets/img/product/".$file);
                        if($listanh == ''){
                           $listanh = '["assets/img/product/'.$file.'"'; 
                        }else{
                            $listanh .= ', '.'"assets/img/product/'.$file.'"'; 
                        }
                    }
                    if($listanh == ''){
                        $listanh = ''; 
                    }else{
                        $listanh .= ']'; 
                    }
                }else{
                    $row = getProductById($id);
                    $listanh  = $row['images'];
                }
                updateProduct($id,$name,$cost,$price,$description,$update,$thumb,$brand,$listanh);
                updateTagOfProduct($id,$tag);
                deleteProductDetailById($id);
                for($i = $size1;$i<=$size2;$i++){
                    $size = $i; 
                addNewProductDetail($id,$color,$size,$quantity);
                }
                header("location:admin.php?c=product");
            break;
            case 'remove':
                $id = $_GET['id'];
                deleteProduct($id);
                header("location:admin.php?c=product");
            break;
            case 'search':
                $content = $_GET['content'];
                $sp ='';
                $product = getAllProduct();
                if($content == ''){
                    foreach($product as $p){
                        $sp .= '
                        <tr>
                            <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="2474">
                                <label class="custom-control-label" for="2474"></label>
                            </div>
                            </td><td class="text-muted">'.$p['id'].'</td>
                            <td>
                            <div class="avatar avatar-md">
                                <img src="'.$p['thumb'].'" alt="..." class="avatar-img rounded-circle">
                            </div>
                            </td>
                            <td>
                            <p class="mb-0 text-muted"><strong>'.$p['name'].'</strong></p>
                            </td>
                            <td class="text-muted">'.$p['update'].'</td>
                            <td class="text-muted">$'.$p['cost'].'</td>
                            <td class="text-muted">$'.$p['price'].'</td>
                            <td style = "width:33%;" class="text-muted">'.$p['description'].'</td>
                            <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id='.$p['id'].'">Edit</a>
                                <a class="dropdown-item" href="admin.php?c=product&p=remove&id='.$p['id'].'">Remove</a>
                            </div>
                            </td>
                        </tr>
                        ';
                    }
                }else{
                    foreach($product as $p){
                        if(strlen(strpos(strtolower($p['name']),strtolower("$content"))) > 0){
                            $sp .= '
                            <tr>
                                <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="2474">
                                    <label class="custom-control-label" for="2474"></label>
                                </div>
                                </td><td class="text-muted">'.$p['id'].'</td>
                                <td>
                                <div class="avatar avatar-md">
                                    <img src="'.$p['thumb'].'" alt="..." class="avatar-img rounded-circle">
                                </div>
                                </td>
                                <td>
                                <p class="mb-0 text-muted"><strong>'.$p['name'].'</strong></p>
                                </td>
                                <td class="text-muted">'.$p['update'].'</td>
                                <td class="text-muted">$'.$p['cost'].'</td>
                                <td class="text-muted">$'.$p['price'].'</td>
                                <td style = "width:33%;" class="text-muted">'.$p['description'].'</td>
                                <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="admin.php?c=product&p=form_edit&id='.$p['id'].'">Edit</a>
                                    <a class="dropdown-item" href="admin.php?c=product&p=remove&id='.$p['id'].'">Remove</a>
                                </div>
                                </td>
                            </tr>
                            ';
                        }
                    }
                }
                if($sp == ''){
                    echo 'Sản phẩm này không tồn tại!';
                }else{
                    echo $sp;
                }
            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
        break;
    case 'brand':
        $action = "show";
        if (isset($_GET["a"])) {
            $action = $_GET["a"];
        }

        switch ($action) {
            case 'show':
                require_once('views/admin/brand/brand.php');
            break;
            case 'create':
                $tags = getAllTagBlog();
                require_once('views/admin/brand/add-brand.php');
            break;
            case 'add':
                $name = $_POST['name'];
                $show = $_POST['show'];
                $priority = $_POST['priority'];

                if(addNewBrand($name,$show,$priority)){
                    header('location: admin.php?c=brand&a=create');
                }else{
                    echo 'Lỗi khi thêm nhãn hàng';
                }

            break;
            case 'edit':
                $id = $_GET['id'];
                $brand = getBrandById($id);
                require_once('views/admin/brand/edit-brand.php');
            break;

            case 'update':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $show = $_POST['show'];
                $priority = $_POST['priority'];

                updateBrand($id,$name,$show,$priority);
                header('location: admin.php?c=brand');
                echo 'Lỗi khi sửa nhãn hàng';

            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
            break;
            case 'delete':
                $id = $_GET['id'];
                deleteBrand($id);
                
        }
    break;
    case 'tag':
        $tag = 'home';
        if(isset($_GET['p'])){
            $tag = $_GET["p"];
        }
        switch ($tag) {
            case 'home':
                $tag = getAllTag();
                require_once('views/admin/tag/home.php');
            break;
            case 'insert':
                require_once('views/admin/tag/addnew.php');
            break;
            case 'addnew':
                $name = $_POST['name'];
                $anhien = $_POST['anhien'];
                addNewTagProduct($anhien,$name);
                header("location:admin.php?c=tag");
            break;
            case 'form_edit':
                $id = $_GET['id'];
                $tag = getTagId($id);
                require_once('views/admin/tag/edit.php');
            break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_POST['name'];
                $anhien = $_POST['anhien'];
                updateTagProduct($id,$anhien,$name);
                header("location:admin.php?c=tag");
            break;
            case 'remove':
                $id = $_GET['id'];
                deleteTagProduct($id);
                header("location:admin.php?c=tag");
            break;
            default:
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
                include("404.php");
                return;
                break;
        }
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
                $imageFiletag = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
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