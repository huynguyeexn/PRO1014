<?php
function getTagByProductId($id){
    $sql = "SELECT * FROM tag_of_product WHERE product_id = $id;";
    return queryOne($sql);
}
function getAllTagByProductId($id){
    $sql = "SELECT * FROM tag_of_product WHERE product_id = $id;";
    return query($sql);
}

function updateTagOfProduct($id,$tag){
    $sql = 'UPDATE `tag_of_product` SET `product_id`='.$id.',`tag_id`='.$tag.' WHERE product_id='.$id.'';
    execute($sql);
}

function addNewTagOfProduct($id,$tag){
    $sql = 'INSERT INTO `tag_of_product`(`product_id`, `tag_id`) VALUES ('.$id.','.$tag.')';
    execute($sql);
}
