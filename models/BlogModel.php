<?php

function getAllBlogCatalog(){
    $sql = "select * from tag_blog";
    return query($sql);
}
function getAllBlog(){
    $sql = "select * from blog";
    return query($sql);
}
function getAllBlogComment(){
    $sql = "select * from blog_comment";
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
function getCountBlog(){
    $sql = "SELECT (COUNT(*)/3) as `countb` from `blog`";
    return queryOne($sql);
}
function setComment($idblog,$user,$message,$created){
    
         $sql = "INSERT INTO `blog_comment`( `blog_id`, `user_id`, `content`, `created`) VALUES ($idblog,$user,'$message','$created')";
            return execute($sql);
      
        
    }
    

function getComment(){
    $sql = " SELECT *from comment";
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