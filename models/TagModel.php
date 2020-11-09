<?php 

function getAllTag(){
    $sql = "select * from tag";
    return query($sql);
}
