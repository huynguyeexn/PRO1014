<?php

function getAllUser(){
    $sql = "select * from user";
    return query($sql);
}

function getUserById($id){
    $sql = "select * from user where id = $id";
    return queryOne($sql);
}

function addNewUser(){
    $sql = "";
    return execute($sql);
}

function updateUser(){
    $sql = "";
    return execute($sql);
}

function deleteUser($id){
    $sql = "";
    return execute($sql);
}

function checkUser($user, $pass)
{
    $sql = "select * from user where username= '" . $user . "' and password= '" . $pass . "'";
    return execute($sql);
}
function addUser($user, $pass)
{
    $sql = "insert into user (username, password) values ('$user', '$pass',)";
    return execute($sql);
}