<?php

function getAllTagBlog(){
    $sql = "select * from tag_blog";
    return query($sql);
}
function getTagBlogById($id){
    $sql = "select * from tag_blog where id = $id";
    return queryOne($sql);
}
function addNewTagBlog($tagname,$priority){
    $sql = "INSERT INTO `pro1014`.`tag_blog` (`name`, `show`,`priority`) VALUES ('$tagname', b'1','$priority')";
    return execute($sql);

}
function deleteTagBlog($id){
    $sql = "DELETE FROM tag_blog WHERE id=$id";
    return execute($sql);
}
function updateTagBlog($id,$tagname,$priority){
    $sql = "UPDATE tag_blog SET `name` = '$tagname', priority = '$priority' where id ='$id'";
    return execute($sql);
}
