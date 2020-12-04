<?php

require_once 'core/connect.php';

function getAllUser(){
    $sql = "select * from user";
    return query($sql);
}

function getUserById($id){
    $sql = "select * from user where id = $id";
    return queryOne($sql);
}

function getUserByUsername($username){
    $sql = "select * from user where username = '$username'";
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
    $sql = "insert into user (username, password, email, rank) values ('$user', '$pass', '$email', 0)";
    return execute($sql);
}

function addVeriCode($id, $code)
{
    $sql = "UPDATE user SET verification_code = '$code' where id='$id'";
    return execute($sql);
}

function activeUser($email)
{
    $sql = "UPDATE user SET verification_code = 'NULL', `rank` = '1' where email='$email'";
    return execute($sql);
}
function checkVeriCode($email)
{
    $sql = "select verification_code from user where email='$email'";
    return queryOne($sql);
}

function checkRank($email)
{
    $sql = "select rank from user where email='$email'";
    return queryOne($sql);
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