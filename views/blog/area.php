 <!--================Blog Area =================-->
 <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                    <?php
                                        $blognews= getAllBlog();
                                        foreach($blognews as $news){
                                           echo'
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                    '.$news['id_catalog'].'
                                    </div>
                                   
                                           <ul class="blog_meta list">
                                           <li><a href="#">'.$news['user_id'].'<i class="lnr lnr-user"></i></a></li>
                                           <li><a href="#">'.$news['created'].'<i class="lnr lnr-calendar-full"></i></a></li>
                                           <li><a href="#">'.$news['view'].' Views<i class="lnr lnr-eye"></i></a></li>
                                           <li><a href="#"> Comments<i class="lnr lnr-bubble"></i></a></li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="col-md-9">
                                   <div class="blog_post">
                                       <img src="assets/img/blog/main-blog/'.$news['image'].'" alt="">
                                       <div class="blog_details">
                                           <a href="blog.php?action=detail&id='.$news['id'].'">
                                               <h2>'.$news['title'].'</h2>
                                           </a>
                                           <p>'.$news['content'].'</p>
                                           <a href="blog.php?action=detail&id='.$news['id'].'" class="white_bg_btn">View More</a>
                                       </div>
                                   </div>
                               </div>
                               </article>
                                           ';     

                                        }
                                    ?>

                                   
                      
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="assets/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get. Boot camps have itssuppor
                                ters andits detractors.</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            <?php
                                 $blogs = getAllBlog();
                                 foreach($blogs as $blog){
                                     echo'
                                     <div class="media post_item">
                                <img src="assets/img/blog/popular-post/'.$blog['image'].'" alt="post" width="100px" height="60px">
                                <div class="media-body">
                                    <a href="blog.php?action=detail&id='.$news['id'].'">
                                        <h3>'.$blog['title'].'</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                                     ';
                                 }
                            ?>

                            
                            
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="assets/img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                <?php
                                    $blogs = getAllBlogCatalog();
                                    foreach($blogs as $blog){
                                        echo'
                                        <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>'.$blog['catalog'].'</p>
                                        <p>'.$blog['number_post'].'</p>
                                    </a>
                                </li>
                                        
                                        ';
                                    } 
                                ?>
                                
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                            <?php
                            $blogs = getAllBlogCatalog();
                            foreach($blogs as $blog){
                                echo'
                                <li><a href="#">'.$blog['catalog'].'</a></li>
                                ';}
                            ?>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->