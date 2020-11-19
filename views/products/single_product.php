<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <?php							
								$images = json_decode($product['images']);								
								foreach( $images as $img){
									echo'
									<div class="single-prd-item">
										<img class="img-fluid" src="'.$img.'" alt="">
									</div>';
								}								
								?>
                </div>
            </div>
            <?php
			$tags = getTagByProductId($product['id']);
			echo'
			<div class="col-lg-5 offset-lg-1">
			<div class="s_product_text">
				<h3>'.$product['name'].'</h3>
				<h2>'.money($product['price']).' VNĐ</h2>
				<ul class="list">
					<li><a class="active" href="#"><span>Loại hàng :</span> ';
					foreach($tags as $t){
						echo getTagId($t['tag_id'])['name']." ";
					}
					$Availibility=getSizeByProductId($product['id']);
					foreach($Availibility as $avb){
					};
						if($avb['quantity']<=0){
							echo '<li><a href="#"><span>Tình trạng :</span>Hết hàng</a></li>';
						}else{
							echo'<li><a href="#"><span>Tình trạng :</span>Còn hàng</a></li>';
						}
					
				echo'</a></li>
				</ul>
				<div>'.$product['description'].'</div>	
			';
				
		?>

            <div class="row mb-2 margin-size">
                <style>
                .form-select .current {
                    margin-left: 20px;

                }

                .form-select .nice-select {
                    background-color: white;

                }

                .margin-size {
                    margin-left: -20px;
                }

                .format-input {
                    border: 0px;
                }
                </style>
                <div class="input-group-icon mt-10">
                    <div class="icon">Size: </div>
                    <div class="form-select " id="default-select">
											<select>
				<?php 
				$size=getSizeByProductId($product['id']);
				foreach($size as $sz){
					getSizeId($sz['size_id']);
					echo 	"<option value=".'1'."> $sz[size_id]</option>";
				}
				?>
							</select>
							</div>
					</div>
			</div>
            <div class=" product_count ">
                <label for=" qty">Số lượng:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                            class="input-text qty ">
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;"
                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </div>
                    <div class=" card_area d-flex align-items-center">
                        <a class="primary-btn" href="#">Thêm vào giỏ </a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>