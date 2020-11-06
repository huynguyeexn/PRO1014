<?php

function getAllUser(){
    $sql = "select * from user";
    return query($sql);
}

function getUserById(){
    $sql = "";
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