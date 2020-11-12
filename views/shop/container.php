<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<?php
							$tag = getAllTag();
							// print_r($_SESSION['filter']);
							// print_r($_SESSION['sort']);
							// print_r($_SESSION['price']);
							$delete = 'delete';
							$i = -1;
							foreach($tag as $t){
								$i++;
								echo'
									<li onclick="filter('.$t['id'].',1);"  class="main-nav-list"><a class="color" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
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
							<div id="price-range" onmouseup="price();"></div>
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
						<select onchange="sort(this.value)">
							<option value="1">Phù hợp nhất</option>
							<option value="2">Sản phẩm mới nhất</option>
							<option value="3">Sản phẩm được mua nhiều nhất</option>
							<option value="4">Giá từ thấp tới cao</option>
							<option value="5">Giá từ cao xuống thấp</option>
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
							$where = '';
							$true = 1;
							if(isset($_GET['tag']) || isset($_GET['color']) || isset($_GET['brand']) || isset($_GET['sort'])|| isset($_GET['page'])|| isset($_GET['price']) ){
								if(isset($_GET['tag'])){
									$true = 2;
									$tag = $_GET['tag'];
									$where .= !empty($where) ? ' and id IN(select id from product  INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.')': 'INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$tag.'';
								}
								if(isset($_GET['color'])){
									$true = 2;
									$color = $_GET['color'];
									$where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN product_detail on product_id = id where color_id =  '.$color.')': 'INNER JOIN product_detail on id = product_id where color_id = '.$color.'';
								}
								if(isset($_GET['brand'])){
									$true = 2;
									$brand = $_GET['brand'];
									$where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN brand on brand.id = brand_id where brand_id = '.$brand.')': 'INNER JOIN brand on brand.id = brand_id where brand_id ='.$brand.'';
								}
								if(isset($_GET['sort'])){
									$true = 2;
									$value = $_GET['sort']; 
									if($value == 1){
										$where .= '';
									}else if($value == 2){
										$where .= ' order by "update" desc';
									}else if($value == 3){
									}else if($value == 4){
										$where .= ' order by price asc';
									}else if($value == 5){
										$where .= ' order by price desc';
									}
								}
								if(isset($_GET['price'])){
									$true = 2;
									$lower = $_SESSION['price']['lower'];
									$upper = $_SESSION['price']['upper'];
									$where .= !empty($where) ? ' and price BETWEEN '.$lower.' and '.$upper.'': ' where price BETWEEN '.$lower.' and '.$upper.'';
								}
								if(isset($_GET['page'])){
									$offset = ($_GET['page'] - 1) * 6 ;
									$limit = 6;
									if($true == 2){
										$where .= ' limit '.$limit.' offset '.$offset.'';
										$product = getProductByFilter($where); 
									}else{
										$product = getProductByOffset($limit, $offset);
									}
								}else{
									$product = getProductByFilter($where);
								}
								$luot =0;
								foreach($product as $produycts){
									$luot++;
								}
								$lan = ceil($luot/6);
							}else{
								unset($_SESSION['filter']);
								unset($_SESSION['sort']);
								unset($_SESSION['page']);
								unset($_SESSION['price']);
								$product = getProductByOffset(6,0);
								$dproduct = getCountProduct();
								$lan = ceil($dproduct['count']);
							}
							$number = 0;
							if($lan < 4){
								for ($i=0; $i < $lan; $i++){ 
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
									<a href="#">'.$lan.'</a>
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
							$i = 0;
							foreach($product as $p){
								$i++;
								if($i<7){
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
				
														<a class="social-info addtocart" value="' . $p["id"] . '">
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
							if($lan < 4){
								for ($i=0; $i < $lan; $i++){ 
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
									<a href="#">'.$lan.'</a>
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
							var myObj = JSON.parse(data);
							d.innerHTML = myObj[0];
							x='shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
                        }
              });
              return false;
		}

		function filter(x,t){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'Shop.php',
                type: 'GET',
                data : 'action=page&name='+t+'&value='+x, //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
							// alert(data)
                        }
              });
              return false;
		}
		
		function sort(x){
			var tag = document.getElementsByClassName('color')
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'Shop.php',
                type: 'GET',
                data : 'action=page&sort='+x, //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
							// alert(data)
                        }
              });
              return false;
		}

		function price(){
			var lower = document.getElementById("lower-value").innerText;
			var upper = document.getElementById("upper-value").innerText;
			var d = document.getElementById("row");			
			var page = document.getElementById("pagination");
			var pages = document.getElementById("pages");
			$.ajax({
				url: 'Shop.php',
                type: 'GET',
                data : 'action=page&lower='+lower+'&upper='+upper, //dữ liệu sẽ được gửi
              	success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
							var myObj = JSON.parse(data);
							var x = 'shop.php'
							for(i=2;i<myObj.length;i++){
								if(x == 'shop.php'){
									x += '?'+myObj[i][1]+'='+myObj[i][0];
								}else{
									x += '&'+myObj[i][1]+'='+myObj[i][0];
								}
							}
							history.pushState('','',x);
							d.innerHTML= myObj[0];
							page.innerHTML= myObj[1];
							pages.innerHTML= myObj[1];
							// alert(data)
                        }
              });
              return false;
		}
	</script>