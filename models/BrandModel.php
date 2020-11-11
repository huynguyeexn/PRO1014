<?php 

function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}
