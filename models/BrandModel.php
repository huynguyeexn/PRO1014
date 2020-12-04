<?php 

require_once 'core/connect.php';

function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}
