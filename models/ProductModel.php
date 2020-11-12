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
}
function getProductByFilter($where){
    $sql = 'select * from product '.$where.'';
    return query($sql);
}


function getCountProduct(){
    $sql = "SELECT (COUNT(*)/6) AS 'count' from `product`";
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
    $sql = "DELETE FROM `product` WHERE id = $id";
    return execute($sql);
}