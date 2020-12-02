<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/Connection.php');
    require_once('core/Function.php');

    // Các Model cần thiết.
    require_once('models/ProductModel.php');
    require_once('models/TagModel.php');
    require_once('models/SizeModel.php');
    require_once('models/TagOfProductModel.php');
    require_once('models/SizeOfProduct.php');
    require_once('models/CommentOfProducts.php');
    require_once('models/ReviewsOfProduct.php');
    require_once('models/UserModel.php');
    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            if(isset($_GET['id'])){

                $id=$_GET['id'];
                $product = getProductById($id);
                $view = $product['view'] + 1;
                updateViewProduct($view,$id);
            require_once('views/products/index.php');
            }
            
            break;
        case 'detail':
            // Product detail view
            break;
        case 'create':
            // Product create view
            break;

        default: 
            $allProduct = getAllProduct();
            require_once('views/products/index.php');
            break;
        break;
    }
