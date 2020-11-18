<?php
function getAllComment(){
    $sql = "SELECT * FROM comment";
    return query($sql);
}
function getCommentByUserId($id){
    $sql = "SELECT * FROM comment WHERE user_id = $id;";
    return query($sql);
}
function getCommentByProductId($id){
    $sql = "SELECT * FROM comment WHERE product_id = $id;";
    return query($sql);
}
