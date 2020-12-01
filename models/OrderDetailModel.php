<?php
function addNewOrderDetail($order_id, $product_id, $size_id, $quantity, $price){
    $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `size_id`, `quantity`, `price`) VALUES ('$order_id', '$product_id', '$size_id', '$quantity', '$price');";
    return execute($sql);
}