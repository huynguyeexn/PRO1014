<?php

function getAllConfig(){
    $sql = "select * from config";
    return query($sql);
}

function getConfigByName($name){
    $sql = "select * from config where name = '".$name."'";
    return queryOne($sql);
}

function getConfigById(){
    $sql = "";
    return queryOne($sql);
}

function addNewConfig(){
    $sql = "";
    return execute($sql);
}

function updateConfig($name, $data){
    echo $sql = "UPDATE `config` SET `config`='$data' WHERE  `name`='$name';";
    return execute($sql);
}

function deleteConfig($id){
    $sql = "";
    return execute($sql);
}