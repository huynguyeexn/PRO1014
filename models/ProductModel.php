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
<<<<<<< HEAD
    $sql = "SELECT * FROM product where id = $id";
=======
    $sql = "SELECT * FROM product WHERE id = $id;";
>>>>>>> 6651f1e1a8d9e44609969643ceeada442bd6b5c6
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