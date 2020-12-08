<?php
    session_start();

    // Require các file cần sử dụng.
        
    include_once('core/Function.php');

    // Các Model cần thiết.
    include_once('models/ProductModel.php');
    include_once('models/TagModel.php');
    include_once('models/SizeModel.php');
    include_once('models/TagOfProductModel.php');
    include_once('models/SizeOfProduct.php');
    include_once('models/CommentOfProducts.php');
    include_once('models/ReviewsOfProduct.php');
    include_once('models/UserModel.php');
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
            include_once('views/products/index.php');
            }
            
            break;
        case 'comment':
            
            if (isset($_POST['addComment'])) {
                $product_id = $_GET['id'];
                $user = $_SESSION['user']['id'];
                $message = $_POST['message'];
                $created = now();
                addNewcommentOfProduct($product_id,$user,$message,$created);
                    header('location: product.php?id='.$product_id);
            }
                    
                break;   
        case 'detail':
            // Product detail view
            break;
            case 'reviews':
                if (isset($_POST['addReview'])) {
                    $product_id = $_GET['id'];
                    $message = $_POST['message'];
                    $user = $_SESSION['user']['id'];
                    echo $star = $_POST['star'];
                    addNewReviewsOfProduct($product_id,$user,$message,$star);
                        header('location: product.php?id='.$product_id);
                }else{
                    // header('location: home.php');
                }
               
                    break;   
                    case 'login':
                        header('location: Account.php'); 
                       
            case 'detail':
                // Product detail view
                break;
    
       
    }
