<?php

require_once 'core/connect.php';

// Lấy ra tất cả khách hàng
function getAllUser(){
    $sql = "select * from user";
    return query($sql);
}

// lấy ra khách hàng theo id
function getUserById($id){
    $sql = "select * from user where id = $id";
    return queryOne($sql);
}

// lấy ra khách hàng theo username
function getUserByUsername($username){
    $sql = "select * from user where username = '$username'";
    return queryOne($sql);
}

// Thêm khách hàng
function addUser($user, $pass, $email)
{
    $sql = "insert into user (username, password, email, rank) values ('$user', '$pass', '$email', 0)";
    return execute($sql);
}

// Thêm mã xác nhận tài khoản
function addVeriCode($id, $code)
{
    $sql = "UPDATE user SET verification_code = '$code' where id='$id'";
    return execute($sql);
}

// Kích hoạt tài khoản
function activeUser($email)
{
    $sql = "UPDATE user SET verification_code = 'NULL', `rank` = '1' where email='$email'";
    return execute($sql);
}

// Kiểm tra mã kích hoạt
function checkVeriCode($email)
{
    $sql = "select verification_code from user where email='$email'";
    return queryOne($sql);
}

// Kiểm tra cấp bậc
function checkRank($email)
{
    $sql = "select rank from user where email='$email'";
    return queryOne($sql);
}

// Kiểm tra username
function checkUsername($user)
{
    $sql = "select * from user where username= '" . $user . "';";
    return queryOne($sql);
}

// Kiểm tra mật khẩu
function checkPassword($user, $pass)
{
    $sql = "select * from user where username= '" . $user . "' and password= '" . $pass . "';";
    return queryOne($sql);
}

// Kiểm tra email
function checkEmail($email)
{
    $sql = "select * from user where email= '" . $email . "';";
    return queryOne($sql);
}