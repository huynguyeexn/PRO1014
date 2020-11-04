<?php

function getAllProduct(){
    $sql = "select * from product";
    return query($sql);
}
function getProductByOffset($limit, $offset){
    $sql = "SELECT * FROM product LIMIT $limit OFFSET $offset;";
    return query($sql);
}

function getProductById(){
    $sql = "";
    return queryOne($sql);
}

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