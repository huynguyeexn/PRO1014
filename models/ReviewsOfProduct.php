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
function addNewReviewsOfProduct($product_id,$user_id,$message,$star){
echo    $sql = "INSERT INTO `review`( `product_id`, `user_id`, `review`,`rate`) VALUES ('$product_id', '$user_id','$message','$star')";
    return execute($sql);
}


