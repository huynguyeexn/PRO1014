<?php

function getSizeOfProduct($productId){
    $sql = "SELECT size_id FROM product_detail WHERE product_id = $productId order by size_id";
    return query($sql);
}

function getProductDetailById($id){
    $sql = "SELECT product_id,color_id,quantity,min(size_id),max(size_id) FROM product_detail WHERE product_id = $id";
    return queryOne($sql);
}

function addNewProductDetail($id,$color,$size,$quantity){
    $sql = 'INSERT INTO product_detail(`product_id`, `color_id`, `size_id`, `quantity`) VALUES ('.$id.','.$color.','.$size.','.$quantity.')';
    execute($sql);
}

function  deleteProductDetailById($id){
    $sql = "DELETE FROM `product_detail` WHERE product_id = $id";
    execute($sql);
}