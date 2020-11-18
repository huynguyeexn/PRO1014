<?php
function getTagBlogById($id){
    $sql = "select * from tag_blog where id = $id";
    return queryOne($sql);
}
?>