<?php

function getAllSlider(){
    $sql = "select * from slider order BY slider.`order` asc";
    return query($sql);
}
function getSliderByOffset($limit, $offset){
    $sql = "SELECT * FROM product LIMIT $limit OFFSET $offset;";
    return query($sql);
}

function getSliderById(){
    $sql = "";
    return queryOne($sql);
}

function addNewSlider(){
    $sql = "";
    return execute($sql);
}

function updateSlider(){
    $sql = "";
    return execute($sql);
}

function deleteSlider($id){
    $sql = "";
    return execute($sql);
}