<?php
// session_start(); 
if (isset($_SESSION['cart'])){
  $products = $_SESSION['cart'];
 
}

if($_GET['id'] && $_GET['action'] == 'add'){
    $product = getProductById($_GET['id']);
    $product['quantity'] = 1;
    if(!empty($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $data){
            if($data['id'] == $product['id']){
                $_SESSION['cart'][$key]['quantity'] += 1;
            }
        }
    }else{
        $_SESSION['cart'][] = $product;
    }
   
}

// var_dump($_SESSION['cart']);

function calculator($products){
  $total = 0;
  foreach($products as $product){
    $total += $product['price']*$product['quantity']; 
  }
  return $total;
}
?>
<section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                            <?php foreach($_SESSION['cart'] as $product): ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="product-image">
                                        <img style='width:100%' src="<?php echo $product['thumb']; ?>">
                                    </div>                         
                                </td>
                                <td>
                                    <div class="product-details">
                                        <div class="product-title"><?php echo $product['name']; ?></div>
                                    </div>  
                                </td>
                                <td>
                                <div class="product-price"><?php echo $product['price']; ?></div>
                                </td>
                                <td>
                                <div class="product-quantity">
                                    <input type="text" value="<?php echo $product['quantity']; ?>">
                                </div>
                                </td>
                                <td>
                                    <h5><?php echo $product['price']*$product['quantity']; ?></h5>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>

                                </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$2160.00</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.assets/js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="assets/js/gmaps.min.js"></script>
	<script src="assets/js/main.js"></script>