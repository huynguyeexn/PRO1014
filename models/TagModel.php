<?php

function getTagId($id){
    $sql = "SELECT * FROM tag_product WHERE id = $id;";
    return queryOne($sql);
}
function getAllTagById($id){
    $sql = "SELECT * FROM tag_product WHERE id = $id;";
    return query($sql);
}

function getAllTag(){
    $sql = "select * from tag_product";
    return query($sql);
}

function updateTagProduct($id,$anhien,$name){
    $sql = 'UPDATE `tag_product` SET `id`='.$id.',`name`="'.$name.'",`show`='.$anhien.' WHERE id ='.$id.'';
    execute($sql);
}

function addNewTagProduct($anhien,$name){
    $sql = 'INSERT INTO `tag_product`(`name`, `show`) VALUES ("'.$name.'",'.$anhien.')';
    execute($sql);
}

function deleteTagProduct($id){
    $sql = 'DELETE FROM `tag_product` WHERE id ='.$id.'';
    execute($sql);
}
