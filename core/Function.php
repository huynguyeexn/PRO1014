<?php
/*
Dùng để viết các function dùng chung cho cả project
*/


// Định dạng từ số thành tiền.
function numToMoney($number){
    setlocale(LC_MONETARY, 'vi_VI');
    $formatter = new NumberFormatter( 'vi_VI', NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($number, "VND")."\n";
}


// Trả về thời gian hiện tại.
function now(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Asia/Ho_Chi_Minh'));
    return $date->format('Y-m-d H:i:s');
}

function addToCart($productID, $size){
    if (isset($_SESSION['cart'])){
        $search_items = array('id'=>$productID, 'size'=>$size); 
        $result = searchMultiKey($_SESSION['cart'], $search_items); 
        
        if($result){
            $_SESSION['cart'][$result[0]['index']]['quantity'] += 1;
        }else{
            array_push(
                $_SESSION['cart'], 
                array( 
                    'id' => $productID, 
                    'size' => $size, 
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
                'size' => $size, 
                'quantity'=> 1
            )
        );
    }
    return $_SESSION['cart'];
}

function searchMultiKey($array, $search_list) { 
  
    // Create the result array 
    $result = array(); 
  
    // Iterate over each array element 
    foreach ($array as $key => $value) { 
  
        // Iterate over each search condition 
        foreach ($search_list as $k => $v) { 
      
            // If the array element does not meet 
            // the search condition then continue 
            // to the next element 
            if (!isset($value[$k]) || $value[$k] != $v) 
            { 
                  
                // Skip two loops 
                continue 2; 
            } 
        } 
      
        // Append array element's key to the 
        //result array 

        $value += ['index' => $key];
        $result[] = $value; 
    } 
  
    // Return result  
    return $result; 
} 