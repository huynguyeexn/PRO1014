<?php

function getSizeByProductId($id){
    $sql = "SELECT * FROM product_detail WHERE product_id = $id;";
    return query($sql);
}
