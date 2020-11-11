<?php
function getTagByProductId($id){
    $sql = "SELECT * FROM tag_of_product WHERE product_id = $id;";
    return query($sql);
}
