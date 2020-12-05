<?php
require_once 'core/connect.php';

// Lấy tất cả đánh giá của sản phẩm
function getReviewsByProductId($id){
    $sql = "SELECT * FROM review WHERE product_id = $id;";
    return query($sql);
}

//Lấy tất cả đánh giá
function getAllReviews(){
    $sql = "SELECT * FROM review";
    return query($sql);
}

// Lấy tất cả đánh giá của một khách hàng
function getReviewsByUserId($id){
    $sql = "SELECT * FROM review WHERE user_id = $id;";
    return query($sql);
}


