<?php 

require_once 'core/connect.php';

function getAllColor(){
    $sql = "select * from color";
    return query($sql);
}
