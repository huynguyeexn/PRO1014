<?php
    
require_once 'core/connect.php';

function insertTagOfBlog($blogId,$tagId){
    $sql = "INSERT INTO `pro1014`.`tag_of_blog` (`blog_id`, `tag_id`) VALUES ('$blogId','$tagId');";
    return execute($sql);
}
function getTagByBlogId($id){
    $sql = "SELECT * FROM tag_of_blog WHERE blog_id = $id";
    return query($sql);
}
function updateTagOfBlog($blogId,$tagId){
    $sql = "UPDATE tag_of_blog SET tag_id = '$tagId' where blog_id = '$blogId' ";
    return execute($sql);
}

?>