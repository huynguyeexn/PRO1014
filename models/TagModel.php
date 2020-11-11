<?php

function getTagId($id){
    $sql = "SELECT * FROM tag WHERE id = $id;";
    return queryOne($sql);
}