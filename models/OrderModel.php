<?php

function getAllOrder(){
    $sql = "SELECT * FROM pro1014.`order` order BY created DESC;";
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
function addNewOrder($user_id, $status, $created, $name, $address, $phone, $email){
    $sql = "INSERT INTO `order` (`user_id`, `status`, `created`, `name`, `address`, `phone`, `email`) VALUES ('$user_id', '$status', '$created', '$name', '$address', '$phone', '$email');";
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