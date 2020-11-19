<?php

function getAllTagBlog(){
    $sql = "select * from tag_blog";
    return query($sql);
}
function getTagBlogById($id){
    $sql = "select * from tag_blog where id = $id";
    return queryOne($sql);
}
?>