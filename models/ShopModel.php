<?php

function getAllTag(){
    $sql = "select * from tag";
    return query($sql);
}

function getAllColor(){
    $sql = "select * from color";
    return query($sql);
}

function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}

function getProduct_6(){
    $sql = "select * from product limit 6";
    return query($sql);
}

function getCountProduct(){
    $sql = "SELECT (COUNT(*)/6) AS 'count' from `product`";
    return queryOne($sql);
}

function getPageProduct($start,$end){
    $sql = 'SELECT * from `product` where  id BETWEEN '.$start.' AND '.$end.'';
    return query($sql);
}