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