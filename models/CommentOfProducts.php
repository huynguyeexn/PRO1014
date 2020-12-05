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

?>
