<?php 
require_once 'core/connect.php';
function getAllBrand(){
    $sql = "select * from brand";
    return query($sql);
}
function addNewBrand($name,$show,$priority){
    $sql = "INSERT INTO brand(`name`, `show`, `priority`) VALUES ('$name',$show,'$priority')";
    return execute($sql);
}
function deleteBrand($id){
    $sql = "DELETE FROM brand WHERE id=$id";
    return execute($sql);
}
function updateBrand($name,$show,$priority){
    $sql = "UPDATE brand SET 'name' = '$name', show = '$show', `priority` = '$priority'  where id ='$id'";
    return execute($sql);
}
?>