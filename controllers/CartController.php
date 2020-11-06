<?php
    session_start();

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

        default: 
            require_once('views/cart/index.php');
            break;
        break;
    }
    
    
  
        $productId = $_GET['productId'];
        include '../core/connection.php';
        $query = 'SELECT * FROM product WHERE id = '.$productId ;
        $stmt = $conn->query($query);
        $product = $stmt->fetchAll();
        $product = current($product);
        
        if (!isset($_SESSION['cart']))
        {
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
        }
        else{
            $ids = [];
            foreach($_SESSION['cart'] as $key => $cart){
                $ids[] = $cart['id'];
                if($cart['id'] == $productId){
                    $quantity = $cart['quantity'] + 1;
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                    break;
                }
            }
            
            if(!in_array($productId, $ids)){
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
    
    if (isset($_SESSION['cart']))
    {
        foreach($_SESSION['cart'] as $key => $cart){
            if($cart['id'] == $productId){
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
    ?>
    
