<?php

function getAllProduct(){
    $sql = "select * from product";
    return query($sql);
}
function getProductByOffset($limit, $offset){
    $sql = "SELECT * FROM product LIMIT $limit OFFSET $offset;";
    return query($sql);
}

function getProductById($id){
    $sql = "SELECT * FROM product WHERE id = $id;";
    return queryOne($sql);
}
function getcategorybyproduct($id){
    $sql = "SELECT * FROM product WHERE id = $id";

<<<<<<< HEAD
}
=======
function getProductByFilter($where){
    $sql = 'select * from product '.$where.'';
    return query($sql);
}


function getCountProduct(){
    $sql = "SELECT (COUNT(*)/6) AS 'count' from `product`";
    return queryOne($sql);
}

>>>>>>> 0bdd3a729cfb05ee80fc828da9d6e83f1d160aac
function addNewProduct(){
    $sql = "";
    return execute($sql);
}

function updateProduct(){
    $sql = "";
    return execute($sql);
}

function deleteProduct($id){
    $sql = "";
    return execute($sql);
}