<?php
    
function insertTagOfBlog($blogId,$tagId){
    $sql = "INSERT INTO `pro1014`.`tag_of_blog` (`blog_id`, `tag_id`) VALUES ('$blogId','$tagId');";
    return execute($sql);
}

?>