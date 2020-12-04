<?php
require_once 'core/connect.php';

function addNewOrderDetail($order_id, $product_id, $size_id, $quantity, $price){
    $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `size_id`, `quantity`, `price`) VALUES ('$order_id', '$product_id', '$size_id', '$quantity', '$price');";
    return execute($sql);
}
function totalPriceOfOrder($order_id){
    $sql = "SELECT SUM(price) AS total FROM order_detail WHERE order_id = $order_id;";
    return queryOne($sql);
}