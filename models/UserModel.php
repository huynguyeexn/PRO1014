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
function addUser($user, $pass, $email)
{
    $sql = "insert into user (username, password, email) values ('$user', '$pass', '$email')";
    return execute($sql);
}

function checkUsername($user)
{
    $sql = "select * from user where username= '" . $user . "';";
    return queryOne($sql);
}
function checkPassword($user, $pass)
{
    $sql = "select * from user where username= '" . $user . "' and password= '" . $pass . "';";
    return queryOne($sql);
}
function checkEmail($email)
{
    $sql = "select * from user where email= '" . $email . "';";
    return queryOne($sql);
}