<?php
/*
Dùng để viết các function dùng chung cho cả project
*/


// Định dạng từ số thành tiền VNĐ.
function numToMoney($number){
    $formatter = new NumberFormatter( 'vi_VI', NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($number, "VND")."\n";
}


// Trả về thời gian hiện tại.
function now(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Asia/Ho_Chi_Minh'));
    return $date->format('Y-m-d H:i:s');
}

function addToCart($productID){
    if (isset($_SESSION['cart'])){
        $a = $_SESSION['cart'];

        if(in_array($productID, array_column($a, 'id'))){
            $index = array_search($productID, array_column($a, 'id'));
            ++$_SESSION['cart'][$index]['quantity'];
        }else{
            array_push(
                $_SESSION['cart'], 
                array( 
                    'id' => $productID, 
                    'quantity'=> 1
                )
            );
        }
    }else{
        $_SESSION['cart'] = [];
        array_push(
            $_SESSION['cart'], 
            array( 
                'id' => $productID, 
                'quantity'=> 1
            )
        );
    }
    return $_SESSION['cart'];
}