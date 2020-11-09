<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<?php
							$tag = getAllTag();
							// print_r($_SESSION['filter']);
							$delete = 'delete';
							$i = -1;
							foreach($tag as $t){
								$i++;
								echo'
									<li onclick="filter('.$t['id'].',1,'.$i.');"  class="main-nav-list"><a class="color" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
											class="lnr lnr-arrow-right"></span>'.$t['name'].'</a>
									</li>
								';
							}
						?>
						<li onclick="filter('delete',1);"  class="main-nav-list"><a class="color" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
							class="lnr lnr-arrow-right"></span>All Browse Categories</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Product Filters</div>
					<div class="common-filter">
						<div class="head">Brands</div>
						<form action="#">
							<ul>
								<?php
									$brand = getAllBrand();
									$i=0;
									foreach($brand as $b){
										$i++;
										echo'
											<li onclick="filter('.$b['id'].',3,'.$i.');" class="filter-list"><input class="pixel-radio" type="radio" id="'.$b['name'].'" name="brand"><label for="'.$b['name'].'">'.$b['name'].'</label></li>
										';
									}
								?>
								<li onclick="filter('delete',3);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$b['name'].'" name="brand"><label for="'.$b['name'].'">All Brand</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Color</div>
						<form action="#">
							<ul>
								<?php
									$color = getAllColor();
									foreach($color as $c){
										$i++;
										echo'
										<li onclick="filter('.$c['id'].',2,'.$i.');" class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['name'].'" name="color"><label for="'.$c['name'].'">'.$c['name'].'</label></li>
										';
									}
								?>
								<li onclick="filter('delete',2);" class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['name'].'" name="color"><label for="'.$c['name'].'">All Color</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div id ='pagination' class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>		
						<?php
							$product = getCountProduct();
							$number = 0;
							if(ceil($product['count']) < 4){
								for ($i=0; $i < ceil($product['count']); $i++){ 
									$number++;
									echo'
										<a onclick="page('.$number.');">'.$number.'</a>
									';
								}
							}else{
								for ($i=0; $i < 4; $i++){ 
									$number++;
									echo'
										<a onclick="page('.$number.');">'.$number.'</a>
									';
								}
								echo'
									<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
									<a href="#">'.ceil($product['count']).'</a>
								';
							}
							
						?>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div id="row" class="row">
						<!-- single product -->
						<?php
							$where = '';
							if(isset($_GET['tag']) || isset($_GET['color']) || isset($_GET['brand'])){
								if(isset($_GET['tag'])){
									$tag = $_GET['tag'];
									$where .= !empty($where) ? ' and id IN(select id from product  INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.')': 'INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.'';
								}
								if(isset($_GET['color'])){
									$color = $_GET['color'];
									$where .= !empty($where) ? ' and id IN(select id from product INNER JOIN color_of_product on id = productID where colorID =  '.$color.')': 'INNER JOIN color_of_product on id = productID where colorID = '.$color.'';
								}
								if(isset($_GET['brand'])){
									$brand = $_GET['brand'];
									$where .= !empty($where) ? ' and id IN(select id from product INNER JOIN brand_of_product on id = product_id where brand_id = '.$brand.')': 'INNER JOIN brand_of_product on id = product_id where brand_id ='.$brand.'';
								}
								$product = getProductByFilter($where);
							}else{
								unset($_SESSION['filter']);
								$product = getProductByOffset(6,0);
							}
							$i = 0;
							foreach($product as $p){
								$i++;
								echo'
									<div class="col-lg-4 col-md-6">
										<div class="boxa single-product">
											<img class="img-fluid" src="'.$p['thumb'].'" alt="">
											<div class="product-details">
												<a href="view/shop/index.php?id='.$p['id'].'" class = "name">'.$p['name'].'</a>
												<div class="price">
													<h6 class = "value">$'.$p['price'].'.00</h6>
													<h6 class="l-through cost">$'.$p['cost'].'.00</h6>
												</div>
												<div class="prd-bottom">
			
													<a href="" class="social-info">
														<span class="ti-bag"></span>
														<p class="hover-text">add to bag</p>
													</a>
													<a href="" class="social-info">
														<span class="lnr lnr-heart"></span>
														<p class="hover-text">Wishlist</p>
													</a>
													<a href="" class="social-info">
														<span class="lnr lnr-sync"></span>
														<p class="hover-text">compare</p>
													</a>
													<a href="" class="social-info">
														<span class="lnr lnr-move"></span>
														<p class="hover-text">view more</p>
													</a>
												</div>
											</div>
										</div>
									</div>
								';
							}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div id ='pages' class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>	
						<?php
							$product = getCountProduct();
							$number = 0;
							if(ceil($product['count']) < 4){
								for ($i=0; $i < ceil($product['count']); $i++){ 
									$number++;
									echo'
										<a onclick="page('.$number.');">'.$number.'</a>
									';
								}
							}else{
								for ($i=0; $i < 4; $i++){ 
									$number++;
									echo'
										<a onclick="page('.$number.');">'.$number.'</a>
									';
								}
								echo'
									<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
									<a href="#">'.ceil($product['count']).'</a>
								';
							}
							
						?>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
	<script>
		function page(x){
			var start = (x*6) - 6;
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			$.ajax({
				url: 'Shop.php',
                type: 'GET',
                data : 'action=page&start='+start,
              	success : function(data) 
                        { 
							var chuoi = data.split(",",7);
							var so =0;
							var s = 0;
							for(i=1;i<8;i++){
								if(chuoi[i] == 'tag'){
									so = Number(chuoi[i-1])	
								}
								if(i == so){
									tag[so].style.color='rgb(127, 0, 250)';
								}else{
									tag[i].style.color='black';
								}
							}
							d.innerHTML = chuoi[0];
							// history.pushState('','','');
                        }
              });
              return false;
		}

		function filter(x,t,l){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'Shop.php',
                type: 'GET',
                data : 'action=filter&name='+t+'&value='+x+'&class='+l, //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var chuoi = data.split(",",7);
							var so =0;
							var s = 0;
							var x = 'shop.php'
							for(i=2;i<8;i++){
								if(chuoi[i] == 'tag'){
									// so = Number(chuoi[i-1])
									if(x == 'shop.php'){
										x += '?tag='+chuoi[i-1];
									}else{
										x += '&tag='+chuoi[i-1];
									}
								}

								if(chuoi[i] == 'color'){
									// so = Number(chuoi[i-1])
									if(x == 'shop.php'){
										x += '?color='+chuoi[i-1];
									}else{
										x += '&color='+chuoi[i-1];
									}
								}

								if(chuoi[i] == 'brand'){
									// so = Number(chuoi[i-1])
									if(x == 'shop.php'){
										x += '?brand='+chuoi[i-1];
									}else{
										x += '&brand='+chuoi[i-1];
									}
								}
								// if(i == so){
								// 	tag[so].style.color='rgb(127, 0, 250)';
								// }else{
								// 	tag[i].style.color='black';
								// }
							}
							history.pushState('','',x);
							d.innerHTML = chuoi[0];
							page.innerHTML= chuoi[1];
							pages.innerHTML= chuoi[1];
                        }
              });
              return false;
		}
	</script>