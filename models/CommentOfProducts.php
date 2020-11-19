<?php
function getAllComment(){
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
