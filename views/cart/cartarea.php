<?php
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
            
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){?>
            <div class="table-responsive">
                
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Size</th>
                            <th scope="col" class="px-4">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $product) :  $data = getProductById($product['id']);?>
                        <tr class='allItem' id="product-<?php echo $product['id'].'-'.$product['size']; ?>">
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
                                <div class="product-price"><?php echo numToMoney($data['price']); ?></div>
                            </td>
                            <td>
                                <div class="product-price"><?php echo $product['size']; ?></div>
                            </td>
                            <td>
                                <div class="product-quantity">
                                    <input type="number" min="1" class="form-control"
                                        value="<?php echo $product['quantity']; ?>"
                                        onchange="quantityUpdate(this, <?php echo $product['id'].',', $product['size']; ?>)">
                                </div>
                            </td>
                            <td>
                                <h5 class="total"><?php echo numToMoney($data['price'] * $product['quantity']); ?></h5>
                            </td>
                            <td>
                                <button class="deleteItem btn btn-danger"
                                    data-value="<?= $product['id']; ?>" data-size="<?= $product['size']; ?>">Xóa</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4><strong>Tổng đơn hàng:</strong></h4>
                                </div>
                            </td>
                            <td  colspan="2">
                                <div class="cupon_text d-flex justify-content-end">
                                    <h4 class="cart-total"><?php echo numToMoney(calculator($_SESSION['cart'])); ?></h4>
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner d-flex justify-content-end">
                                    <a class="gray_btn" href="shop.php">Tiếp tục mua hàng</a>
                                    <a class="primary-btn" href="cart.php?action=add">Thanh toán đơn hàng</a>
                                </div>
                            </td>
                        </tr>
                        <?php }else{ ?>
                            <div class="text-center">
                                <h4>Bạn chưa có sản phẩm nào trong giỏ hàng </h4> <a class="gray_btn" href="shop.php">Tiếp tục mua hàng</a>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>