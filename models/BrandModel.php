<?php 

require_once('core/connection.php');
require_once('core/function.php');


function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}

function getBrandById($id){
    $sql = "select * from brand where id=$id";
    return queryOne($sql);
}

function addNewBrand($name,$show,$priority){
    $sql = "INSERT INTO `pro1014`.`brand` ( `name`,`show`, `priority`) VALUES ( '$name', b'$show', '$priority' );";
    return execute($sql);
}


function updateBrand($id,$name,$show,$priority){
    $sql = "update `pro1014`.`brand` set `name` ='$name',  `show` = b'$show', `priority` = '$priority' where id=$id;";
    return execute($sql);
}
function deleteBrand($id){
    $sql = "DELETE FROM brand WHERE id=$id";
    return execute($sql);
}