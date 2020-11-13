<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <?php
								$pro = getProductById(7);
								
								$images = json_decode($pro['images']);

								
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
			
			$pro = getProductById(1);
			$tags = getTagByProductId($pro['id']);
			echo'
			<div class="col-lg-5 offset-lg-1">
			<div class="s_product_text">
				<h3>'.$pro['name'].'</h3>;
				<h2>$'.$pro['price'].'</h2>
				<ul class="list">
					<li><a class="active" href="#"><span>Category</span> :';
					foreach($tags as $t){
						echo getTagId($t['tag_id'])['name']." ";
					}
					$Availibility=getSizeByProductId($pro['id']);
					foreach($Availibility as $avb){
					};
						if($avb['quantity']<=0){
							echo '<li><a href="#"><span>Availibility</span> : Out Of Stock</a></li>';
						}else{
							echo'<li><a href="#"><span>Availibility</span> : In Stock</a></li>';
						}
					
				echo'</a></li>
				</ul>
				<p>'.$pro['description'].'</p>	
			';
				
		?>

            <div class="row mb-2">
                <style>
                .form-select .current {
                    margin-left: 20px;
                }
                </style>
                <div class="input-group-icon mt-10">
                    <div class="icon">Size: </div>
                    <div class="form-select" id="default-select"">
											<select>
				<?php 
				$size=getSizeByProductId($pro['id']);
				foreach($size as $sz){
					getSizeId($sz['size_id']);
					echo 	"<option value=".'1'."> $sz[size_id]</option>";
				}
				?>
							</select>
							</div>
					</div>
			</div>
            <div class="product_count row">
                <label for="qty">Quantity:</label>
                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                    class="input-text qty">
                <button
                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                <button
                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;"
                    class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
            </div>
						<div class=" card_area d-flex align-items-center">
                        <a class="primary-btn" href="#">Add to Cart</a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>