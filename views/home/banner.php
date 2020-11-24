<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <?php
							foreach($sliders as $slider){
								echo '
								<!-- single-slide -->
								<div class="row single-slide align-items-center d-flex">
									<div class="col-lg-5 col-md-6">
										<div class="banner-content">
											<h1>'.$slider['title'].'</h1>
											<p>'.$slider['description'].'</p>
											<div class="add-bag d-flex align-items-center">
												<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
												<span class="add-text text-uppercase">Thêm vào giỏ</span>
											</div>
										</div>
									</div>
									<div class="col-lg-7">
										<div class="banner-img">
											<img class="img-fluid" src="'.$slider['img'].'" alt="">
										</div>
									</div>
								</div>
								';
							}
						?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 
var images = document.getElementsByClassName('product-image-thumbnail');
 for (let i = 0; i < images.length; i++) {
	let url = images[i].children[0].src.replace('-350x350','').replace('.png','');
  setTimeout(function timer() {
		let a = document.createElement('a');
    a.href = url;
    a.download = (i+1)+".jpg";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }, i * 3000);
} -->