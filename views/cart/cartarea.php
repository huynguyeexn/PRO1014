<?php
// session_start(); 
// if (isset($_SESSION['cart'])) {
//     $products = $_SESSION['cart'];
// }

// if (isset($_SESSION['cart')) {
    // $product = getProductById($_GET['id']);
    // $product['quantity'] = 1;
    // if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    //     foreach ($_SESSION['cart'] as $key => $data) {
    //         if ($data['id'] == $product['id']) {
    //             $_SESSION['cart'][$key]['quantity'] += 1;
    //         }
    //     }
    // } else {
    //     $_SESSION['cart'][] = $product;
    // }
// }

// var_dump($_SESSION['cart']);

function calculator($products)
{
    $total = 0;
    foreach ($products as $product) {
        $total += $product['price'] * $product['quantity'];
    }
    return $total;
}
?>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table text-center">
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
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                        <?php foreach ($_SESSION['cart'] as $product) :  $data = getProductById($product['id']);?>
                        <tr class='allItem'>
                            <td>
                                <div class="media">
                                    <div class="product-image">
                                        <img style='width:100%' src="<?php echo $data['thumb']; ?>">
                                    </div>
                            </td>
                            <td>
                                <div class="product-details">
                                    <div class="product-title"><?php echo $data['name']; ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="product-price">$<?php echo $data['price']; ?></div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    <input type="number" min="1" class="form-control" value="<?php echo $product['quantity']; ?>">
                                </div>
                            </td>
                            <td>
                                <h5>$<?php echo $data['price'] * $product['quantity']; ?></h5>
                            </td>
                            <td>
                                <button class="deleteItem btn btn-danger" data-value="<?= $product['id']; ?>">delete</button>
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
                                <h5>chua lam</h5>
                            </td>
                            <td>
                                <h5>Chua lam</h5>
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