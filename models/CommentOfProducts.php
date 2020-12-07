<?php

require_once 'core/connect.php';

// Lấy tất cả bình luận sản phẩm
function getAllCommentProduct(){
    $sql = "SELECT * FROM product_comment";
    return query($sql);
}

// Lấy tất cả bình luận của một user
function getCommentByUserId($id){
    $sql = "SELECT * FROM product_comment WHERE user_id = $id;";
    return query($sql);
}

// Lấy tất cả bình luận của sản phẩm
function getCommentByProductId($id){
    $sql = "SELECT * FROM product_comment WHERE product_id = $id;";
    return query($sql);
}
<<<<<<< HEAD
function addNewcommentOfProduct($product_id,$user_id,$message,$created){
    $sql = "INSERT INTO `product_comment`( `product_id`, `user_id`, `content`, `created`) VALUES ('$product_id', '$user_id','$message','$created')";
    return execute($sql);
}
=======
function addNewCommentOfProduct($product_id,$user_id,$message,$created){
    $sql = "INSERT INTO `product_comment`( `product_id`, `user_id`, `content`,`created`) VALUES ('$product_id', '$user_id','$message','$created')";
        return execute($sql);
    }

    
?>
>>>>>>> 3b28899e3c06bc2b137d53c922278e5a814622bf
