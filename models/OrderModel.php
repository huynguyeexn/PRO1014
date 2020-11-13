<?php

function getAllOrder(){
    $sql = "select * from pro1014.`order`";
    return query($sql);
}
function getOrderByOffset($limit, $offset){
    $sql = "SELECT * FROM pro1014.`order` LIMIT $limit OFFSET $offset;";
    return query($sql);
}
function getOrderById($id){
    $sql = "SELECT * FROM pro1014.`order` WHERE id = $id;";
    return queryOne($sql);
}
function getOrderByUser($userid){
    $sql = "SELECT * FROM pro1014.`order` WHERE user_id = $userid  order BY created desc;";
    return query($sql);
}
function addNewOrder(){
    $sql = "";
    return execute($sql);
}

function updateOrder(){
    $sql = "";
    return execute($sql);
}

function deleteOrder($id){
    $sql = "DELETE FROM pro1014.`order` WHERE id = $id";
    return execute($sql);
}