<?php

require_once 'core/connect.php';

function getSizeOfProduct($productId){
    $sql = "SELECT size_id FROM product_detail WHERE product_id = $productId order by size_id";
    return query($sql);
}

function getProductDetailById($id){
    $sql = "SELECT product_id,quantity,size_id FROM product_detail WHERE product_id = $id";
    return query($sql);
}

function getSizeProductDetailById($id){
    $sql = "SELECT min(size_id),max(size_id) FROM product_detail WHERE product_id = $id";
    return queryOne($sql);
}


function addNewProductDetail($id,$size,$quantity){
    $sql = 'INSERT INTO product_detail(`product_id`, `size_id`, `quantity`) VALUES ('.$id.','.$size.','.$quantity.')';
    execute($sql);
}

function  deleteProductDetailById($id){
    $sql = "DELETE FROM `product_detail` WHERE product_id = $id";
    execute($sql);
}