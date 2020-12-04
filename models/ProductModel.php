<?php

require_once 'core/connect.php';

function getAllProduct(){
    $sql = "select * from product";
    return query($sql);
}
function getProductByOffset($limit, $offset){
    $sql = "SELECT * FROM product LIMIT $limit OFFSET $offset";
    return query($sql);
}

function getProductById($id){
    $sql = "SELECT * FROM product WHERE id = $id";
    return queryOne($sql);
}

function getcategorybyproduct($id){
    $sql = "SELECT * FROM product WHERE id = $id";
}

function getProductByFilter($where){
    $sql = 'select product.id, product.name, `cost`, `price`, `description`, `thumb`, `images`, `update`, `brand_id`,`color_id`  from product '.$where.'';
    return query($sql);
}


function getCountProduct(){
    $sql = "SELECT (COUNT(*)/6) AS 'count' from `product`";
    return queryOne($sql);
}

function addNewProduct($name,$cost,$price,$description,$update,$brand,$view,$color){
    $sql = "INSERT INTO product(`name`, `cost`, `price`, `description`, `update`,`view`, `brand_id`, `color_id`) VALUES ('$name',$cost,$price,'$description','$update',$view,$brand,$color)";
    return execute($sql);
}

function getMaxId(){
    $sql = 'SELECT MAX(id) FROM `product`';
    return queryOne($sql);
}

function updateProduct($id,$name,$cost,$price,$description,$update,$thumb,$brand,$listanh,$color){
    $sql = "UPDATE `product` SET `id`=$id,`name`='$name',`cost`=$cost,`price`=$price,`description`='$description',`thumb`='$thumb',`update`='$update',`brand_id`=$brand, `images`='$listanh',`color_id`=$color WHERE id = $id";
    execute($sql);
}

function deleteProduct($id){
    $sql = "DELETE FROM `product` WHERE id = $id";
    execute($sql);
}

function updateViewProduct($view,$id){
    $sql = "UPDATE `product` SET `view`=$view WHERE id = $id";
    execute($sql);
}

