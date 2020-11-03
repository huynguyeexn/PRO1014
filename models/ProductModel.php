<?php

function getAllProduct(){
    $sql = "select * from product";
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