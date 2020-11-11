<?php 

function getAllColor(){
    $sql = "select * from color";
    return query($sql);
}
