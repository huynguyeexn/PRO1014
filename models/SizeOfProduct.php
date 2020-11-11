<?php

function getSizeByProductId($id){
    $sql = "SELECT * FROM size_of_product WHERE product_id = $id;";
    return query($sql);
}
