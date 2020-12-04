<?php

require_once 'core/connect.php';

function getSizeByProductId($id){
    $sql = "SELECT * FROM product_detail WHERE product_id = $id  order BY size_id;";
    return query($sql);
}
