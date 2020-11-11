<?php

function getAllBlogCatalog(){
    $sql = "select * from tag_blog";
    return query($sql);
}
function getAllBlog(){
    $sql = "select * from blog";
    return query($sql);
}
function getBlogByOffset($limit, $offset){
    $sql = "SELECT * FROM blog LIMIT $limit OFFSET $offset;";
    return query($sql);
}

function getBlogById($id){
    $sql = "select * from blog where id=".$id;
    return queryOne($sql);
}

function addNewBlog(){
    $sql = "";
    return execute($sql);
}

function updateBlog(){
    $sql = "";
    return execute($sql);
}

function deleteBlog($id){
    $sql = "";
    return execute($sql);
}
?>