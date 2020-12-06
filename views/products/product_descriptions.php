<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Bình luận</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Đánh giá</a>
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
                    <?php
                            $_SESSION['user_id'] = 1;
                            $idpro =$_GET['id'];
                    if(isset($_SESSION['user_id'])){
						echo'
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Viết bình luận</h4>
								<form class="row contact_form" action="?id='.$idpro.'&action=comment" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Bình luận"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" name="addComment" class="btn primary-btn">Bình luận</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				';} ?>
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
                                                <li><a href="#">5 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a>
                                                </li>
                                                <li><a href="#">4 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a>
                                                </li>
                                                <li><a href="#">3 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a>
                                                </li>

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
                            <style type="text/css">
                            /* 
        Use :not with impossible condition so inputs are only hidden 
        if pseudo selectors are supported. Otherwise the user would see
        no inputs and no highlighted stars.
    */
                            .rating input[type="radio"]:not(:nth-of-type(0)) {
                                /* hide visually */
                                border: 0;
                                clip: rect(0 0 0 0);
                                height: 1px;
                                margin: -1px;
                                overflow: hidden;
                                padding: 0;
                                position: absolute;
                                width: 1px;
                            }

                            .rating [type="radio"]:not(:nth-of-type(0))+label {
                                display: none;
                            }

                            label[for]:hover {
                                cursor: pointer;
                            }

                            .rating .stars label:before {
                                content: "★";

                            }

                            .stars label {
                                color: lightgray;
                            }

                            .stars label:hover {
                                text-shadow: 0 0 1px #000;
                            }

                            .rating [type="radio"]:nth-of-type(1):checked~.stars label:nth-of-type(-n+1),
                            .rating [type="radio"]:nth-of-type(2):checked~.stars label:nth-of-type(-n+2),
                            .rating [type="radio"]:nth-of-type(3):checked~.stars label:nth-of-type(-n+3),
                            .rating [type="radio"]:nth-of-type(4):checked~.stars label:nth-of-type(-n+4),
                            .rating [type="radio"]:nth-of-type(5):checked~.stars label:nth-of-type(-n+5) {
                                color: orange;
                            }

                            .rating [type="radio"]:nth-of-type(1):focus~.stars label:nth-of-type(1),
                            .rating [type="radio"]:nth-of-type(2):focus~.stars label:nth-of-type(2),
                            .rating [type="radio"]:nth-of-type(3):focus~.stars label:nth-of-type(3),
                            .rating [type="radio"]:nth-of-type(4):focus~.stars label:nth-of-type(4),
                            .rating [type="radio"]:nth-of-type(5):focus~.stars label:nth-of-type(5) {
                                color: darkorange;
                            }
                            </style>
  <?php
                            $_SESSION['user_id'] = 1;
                            $idpro =$_GET['id'];
                    if(isset($_SESSION['user_id'])){
						echo'
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Viết nhận xét</h4>
                                    <form>
                                        <fieldset class="rating">

                                            <legend>Đánh giá:</legend>

                                            <input id="1" type="radio" name="star" value="1">
                                            <label for="demo-1">1 star</label>
                                            <input id="2" type="radio" name="star" value="2">
                                            <label for="demo-2">2 stars</label>
                                            <input id="3" type="radio" name="star" value="3">
                                            <label for="demo-3">3 stars</label>
                                            <input id="4" type="radio" name="star" value="4">
                                            <label for="demo-4">4 stars</label>
                                            <input id="5" type="radio" name="star" value="5">
                                            <label for="demo-5">5 stars</label>
                                            <div class="stars">
                                                <label for="1" aria-label="1 stars" title="1 star"></label>
                                                <label for="2" aria-label="2 stars" title="2 stars"></label>
                                                <label for="3" aria-label="3 stars" title="3 stars"></label>
                                                <label for="4" aria-label="4 stars" title="4 stars"></label>
                                                <label for="5" aria-label="5 stars" title="5 stars"></label>
                                            </div>

                                        </fieldset>

                                    </form>
                                  
								<p>Nổi bật</p>
								<form class="row contact_form" action="?id='.$idpro.'&action=reviews" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
										<textarea class="form-control" name="message" id="message" rows="1" placeholder="Danh gia"></textarea>
												</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" name="addReview" class="primary-btn">Gửi</button>
									</div>
								</form>
							</div>
							';} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                (function() {
                    var rating = document.querySelector('.rating');
                    var handle = document.getElementById('toggle-rating');
                    handle.onchange = function(event) {
                        rating.classList.toggle('rating', handle.checked);
                    };
                }());
                </script>
</section>