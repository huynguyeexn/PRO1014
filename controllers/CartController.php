<?php
    session_start();
    // session_destroy();
    // Require các file cần sử dụng.
    require_once('core/connection.php');
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/productModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'add':
            require_once('views/cart/index.php');
            break;
        case 'updateCartAJAX':
            if (isset($_GET['id']) && isset($_GET['quantity']) && isset($_GET['size'])) {
                $quantity = $_GET['quantity'];
                $a = $_SESSION['cart'];
                $productID = $_GET['id'];
                $size = $_GET['size'];
                
                $search_items = array('id'=>$productID, 'size'=>$size);
                $result = searchMultiKey($_SESSION['cart'], $search_items);
                $index = $result[0]['index'];

                $_SESSION['cart'][$index]['quantity'] = $quantity;

                $product = getProductById($productID);
                $total = 0;
                foreach ($_SESSION['cart'] as $i) {
                    $total += ($i['quantity'] * getProductById($i['id'])['price']);
                }

                echo json_encode([numToMoney($product['price'] * $quantity),numToMoney($total)]);
            }

            // echo json_encode($_SESSION['cart']);
            break;
        case 'deleteItem':
            if (isset($_GET['id']) && isset($_GET['size'])) {
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

                    $search_items = array('id'=>$_GET['id'], 'size'=>$_GET['size']);
                    $result = searchMultiKey($_SESSION['cart'], $search_items);
                    $index = $result[0]['index'];
                    
                    unset($_SESSION['cart'][$index]);
                }

                $total = 0;
                foreach ($_SESSION['cart'] as $i) {
                    $total += ($i['quantity'] * getProductById($i['id'])['price']);
                }
                echo json_encode([0,numToMoney($total)]);
            }
            break;
            default:
            require_once('views/cart/index.php');
            break;
        break;
    }
    
    if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
        include '../core/connection.php';
        $query = 'SELECT * FROM product WHERE id = '.$productId ;
        $stmt = $conn->query($query);
        $product = $stmt->fetchAll();
        $product = current($product);
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart']=array(
                '0' => array(
                    'id' => $product['id'],
                    'name'=> $product['name'],
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'thumb' => $product['thumb'],
                    'images' => $product['images'],
                    'update' => $product['update'],
                    'cost' => $product['cost'],
                    'quantity'=> 1
                )
            );
        } else {
            $ids = [];
            foreach ($_SESSION['cart'] as $key => $cart) {
                $ids[] = $cart['id'];
                if ($cart['id'] == $productId) {
                    $quantity = $cart['quantity'] + 1;
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                    break;
                }
            }
            
            if (!in_array($productId, $ids)) {
                array_push(
                    $_SESSION['carts'],
                    array(
                        'id' => $product['id'],
                        'name'=> $product['name'],
                        'price' => $product['price'],
                        'description' => $product['description'],
                        'thumb' => $product['thumb'],
                        'images' => $product['images'],
                        'update' => $product['update'],
                        'cost' => $product['cost'],
                        'quantity'=> 1
                    )
                );
            }
        }
   
        header("Location: http://localhost/Pro1014/views/cart/index.php");


   
        $productId = $_GET['productId'];
        include '../core/connection.php';
        $query = 'SELECT * FROM product WHERE id = '.$productId ;
        $stmt = $conn->query($query);
        $product = $stmt->fetchAll();
        $product = current($product);
    
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cart) {
                if ($cart['id'] == $productId) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }
    }

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $query = 'INSERT INTO cart ( user_id,product_id ,size_id ,color_id,quantity)
    VALUES ("'.$_POST['user_id'].'" ,
    "'.$_POST['product_id'].'",
    "'.$_POST['size_id'].'",
    "'.$_POST['color_id'].'",
    "'.$_POST['quantity'].'"
    )';
    
    $stmt = $conn->query($query);
    

    header("Location: http://localhost/Pro1014/views/cart/index.php");
}
    ?>


