<?php
    session_start();

    // Require các file cần sử dụng.
    include_once('core/function.php');
    
    // Các Model cần thiết.
    include_once('models/BlogModel.php');
    include_once('models/UserModel.php');
    include_once('models/CatalogModel.php');
    include_once('models/TagBlogModel.php');
    include_once('models/ProductModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            include_once('views/blog/index.php');
            break;
        case 'catalog':
            $allBlogCatalog = getAllTagBlog();
            include_once('views/blog/index.php');
            break;
        case 'detail':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $blog = getBlogById($id);
                include_once('views/blog/detail.php');
            }
            else{
                header('location: blog.php');
            }
            break;
        case 'page':
            $offset = $_GET['start'];
            $limit = 3;
            $page = getBlogByOffset($limit, $offset);
            $blog = '';
            foreach($page as $news){
                $user = getUserById($news['user_id']);
                $cata = getTagBlogById($news['id']);
                $blog .= '<article class="row blog_item">
                <div class="col-md-3">
                    <div class="blog_info text-right">
                        <div class="post_tag">
                        '.$cata['name'].'
                        </div>
                       
                               <ul class="blog_meta list">
                               <li><a href="#">'.$user['fullname'].'<i class="lnr lnr-user"></i></a></li>
                               <li><a href="#">'.$news['created'].'<i class="lnr lnr-calendar-full"></i></a></li>
                               <li><a href="#">'.$news['view'].' Views<i class="lnr lnr-eye"></i></a></li>
                               <li><a href="#"> Comments<i class="lnr lnr-bubble"></i></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-9">
                       <div class="blog_post">
                           <img src="'.$news['thumb'].'" alt="">
                           <div class="blog_details">
                               <a href="blog.php?action=detail&id='.$news['id'].'">
                                   <h2>'.$news['title'].'</h2>
                               </a>
                               <p>'.$news['description'].'</p>
                               <a href="blog.php?action=detail&id='.$news['id'].'" class="white_bg_btn">Xem thêm</a>
                           </div>
                       </div>
                   </div>
                   </article>';
            
            }
            echo $blog;
        break;

        case 'comment':
            if (isset($_POST['submit'])) {
                $idblog= $_GET['id'];
                $user = $_SESSION['user']['id'];
                $message = $_POST['message'];
                $created = date("Y-m-d H:i:s");
                $blog = getBlogById($idblog);
               echo setComment($idblog,$user,$message,$created);
                
                include_once('views/blog/detail.php');

            };
        break;
        default: 
            include_once('views/blog/index.php');
            break;
       
    }
