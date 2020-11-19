<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Bình luận</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Đánh giá</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
							
								<?php
									
									$comment = getCommentByProductId($product['id']);		
									if($comment)	{
										foreach($comment as $cmt){
											$user=getUserById($cmt['user_id']);
											echo'										
											<div class="review_item">
												<div class="media">
													<div class="d-flex">
	
														<img src="'.($user['avartar']?$user['avartar']:'assets/images/user/noavt.jpg').'" alt="">
													</div>
													<div class="media-body">
														<h4>'.$user['fullname'].'</h4>
														<h5>'.$cmt['created'].'</h5>
													</div>
												</div>
												<p>'.$cmt['content'].'</p>
											</div>
											'
										;}
										
									}										
									
								?>							
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Viết bình luận</h4>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Bình luận"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Bình luận</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Trung bình</h5>
										<h4>4.0</h4>
										<h6>(03 Đánh giá)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Dựa trên 3 nhận xét</h3>
										<ul class="list">
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
							<?php
							$reviews = getReviewsByProductId($product['id']);
							if($reviews){
								foreach($reviews as $rv){
									$user=getUserById($cmt['user_id']);
									echo'
									<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img src="'.$user['avartar'].'" alt="">
											</div>
											<div class="media-body">
												<h4>'.$user['fullname'].'</h4>';
												for($i=0;$i<$rv['rate'];$i++){
												echo	'<i class="fa fa-star"></i>';
												}
												echo'
											</div>
										</div>
										<p>'.$rv['review'].'</p>
									</div>';}
							}
								
							
								 ?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Viết nhận xét</h4>
								<p>Đánh giá:</p>
								<ul class="list">
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
								</ul>
								<p>Nổi bật</p>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Đánh giá" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="primary-btn">Gửi</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>