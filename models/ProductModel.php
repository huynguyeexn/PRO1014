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
<<<<<<< HEAD
    return queryOne($sql);
}

function getProductByFilter($where){
    $sql = 'select * from product '.$where.'';
    return query($sql);
}


function getCountProduct(){
    $sql = "SELECT (COUNT(*)/6) AS 'count' from `product`";
=======
>>>>>>> 037e9f0d8661e1c4838e59deb9069df9b8c83cd9
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