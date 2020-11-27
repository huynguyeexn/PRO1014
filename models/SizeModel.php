<?php

function getSizeId($id){
    $sql = "SELECT * FROM size WHERE id = $id;";
    return queryOne($sql);
}

function getAllSize(){
    $sql = "SELECT * FROM size";
    return query($sql);
}