<?php
function getAllCommentProduct(){
    $sql = "SELECT * FROM product_comment";
    return query($sql);
}
function getCommentByUserId($id){
    $sql = "SELECT * FROM product_comment WHERE user_id = $id;";
    return query($sql);
}
function getCommentByProductId($id){
    $sql = "SELECT * FROM product_comment WHERE product_id = $id;";
    return query($sql);
}
function addNewcommentOfProduct($product_id,$user_id,$message,$created){
    $sql = "INSERT INTO `product_comment`( `product_id`, `user_id`, `content`, `created`) VALUES ('$product_id', '$user_id','$message','$created')";
    return execute($sql);
}