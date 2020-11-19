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
// session_destroy();

// print_r($_SESSION['cart']); die();

function calculator($products)
{
    $total = 0;
    foreach ($products as $product) {
        $price = getProductById($product['id'])['price'];
        $total += $price * $product['quantity'];
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
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col" class="px-4">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
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
                                <div class="product-price"><?php echo money($data['price']); ?> VNĐ</div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    <input type="number" min="1" class="form-control"
                                        value="<?php echo $product['quantity']; ?>">
                                </div>
                            </td>
                            <td>
                                <h5><?php echo money($data['price'] * $product['quantity']); ?> VNĐ</h5>
                            </td>
                            <td>
                                <button class="deleteItem btn btn-danger"
                                    data-value="<?= $product['id']; ?>">Xóa</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <tr class="bottom_button">
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text d-flex justify-content-end">
                                    <a class="gray_btn" href="#">Cập nhật giỏ hàng</a>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4><strong>Tổng đơn hàng:</strong></h4>
                                </div>
                            </td>
                            <td>
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4><?php echo money(calculator($_SESSION['cart'])); ?> VNĐ</h4>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

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
                        </tr> -->
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner d-flex justify-content-end">
                                    <a class="gray_btn" href="shop.php">Tiếp tục mua hàng</a>
                                    <button type="submit" name="action" value = "add" >thanh toán đơn hàng</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>