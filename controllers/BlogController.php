<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/connection.php');
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/BlogModel.php');
    require_once('models/UserModel.php');
    require_once('models/CatalogModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            require_once('views/blog/index.php');
            break;
        case 'catalog':
            $allBlogCatalog = getAllBlogCatalog();
            require_once('views/blog/index.php');
            break;
        case 'detail':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $blog = getBlogById($id);
                require_once('views/blog/detail.php');
            }
            else{
                header('location: blog.php');
            }
            break;
        default: 
            require_once('views/blog/index.php');
            break;
        break;
    }
