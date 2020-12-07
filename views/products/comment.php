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
                      
                    $idpro =$_GET['id'];
                    if(isset($_SESSION['user'])){
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
										<button type ="submit" class="primary-btn submit_btn" name="submit">Gửi bình luận</button>
									</div>
								</form>
							</div>
						</div>
					
                ';} else{
                    echo'
                    <div class="col-lg-6">
							<div class="review_box">
                            <p>Vui lòng <a style="text-decoration: underline" href="account.php">Đăng Nhập</a> để bình luận.</p>
							</div>
						</div>'
                ;} ?>
</div>
</div>