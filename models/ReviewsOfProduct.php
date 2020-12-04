<?php
require_once 'core/connect.php';

function getReviewsByProductId($id){
    $sql = "SELECT * FROM review WHERE product_id = $id;";
    return query($sql);
}
function getAllReviews(){
    $sql = "SELECT * FROM review";
    return query($sql);
}
function getReviewsByUserId($id){
    $sql = "SELECT * FROM review WHERE user_id = $id;";
    return query($sql);
}


