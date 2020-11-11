<?php

function getTagId($id){
    $sql = "SELECT * FROM tag WHERE id = $id;";
    return queryOne($sql);
}
?>
<?php 

function getAllTag(){
    $sql = "select * from tag_product";
    return query($sql);
}
?>
