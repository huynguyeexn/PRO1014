<?php 

function getAllTag(){
    $sql = "select * from tag_product";
    return query($sql);
}
