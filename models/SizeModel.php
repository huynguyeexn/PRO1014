<?php

function getSizeId($id){
    $sql = "SELECT * FROM size WHERE id = $id;";
    return queryOne($sql);
}