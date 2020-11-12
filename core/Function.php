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
            $_SESSION['cart'][$index]['quantity'] += 1;
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

function singleProduct($product){
    $result =  '<!-- single product -->
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="' . $product["thumb"] . '" alt="">
            <div class="product-details">
                <h6><a href="product.php">' . $product["name"] . '</a></h6>
                <div class="price">
                    <h6>$' . $product["price"] . '</h6>
                    <h6 class="l-through">$' . $product["cost"] . '</h6>
                </div>
                <div class="prd-bottom">

                    <a class="social-info addtocart" value="' . $product["id"] . '">
                        <span class="ti-bag"></span>
                        <p class="hover-text">add to bag</p>
                    </a>
                    <a  class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Wishlist</p>
                    </a>
                    <a  class="social-info">
                        <span class="lnr lnr-sync"></span>
                        <p class="hover-text">compare</p>
                    </a>
                    <a  class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">view more</p>
                    </a>
                </div>
            </div>
        </div>
    </div>';

    return $result;
}