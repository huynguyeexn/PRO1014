<?php
    session_start();
    // session_destroy();
    // Require các file cần sử dụng.
    require_once('core/connection.php');
    require_once('core/function.php');
    
    // Các Model cần thiết.
    require_once('models/TagModel.php');
    require_once('models/ColorModel.php');
    require_once('models/BrandModel.php');
    require_once('models/ProductModel.php');
    require_once('models/SliderModel.php');
    require_once('models/ConfigModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            // $sliders = getAllSlider();
            // $layouts = json_decode(getConfigByName("shop")['config'])->home;
            require_once('views/shop/index.php');
            break;

        case 'addToCart':
            if(isset($_GET['id'])){
                $a = addToCart($_GET['id']);
                $quantity = 0;
                foreach ($a as $e)  {
                    $quantity += $e['quantity'];
                }
                echo $quantity;
                return;
            }
            break;
        case 'page':
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name == 1){
                    $name = 'tag'; 
                }else if($name == 2){
                    $name = 'color';
                }else{
                    $name = 'brand';
                }
                $values = $_GET['value'];
                if(!isset($_SESSION['filter'])){
                        $_SESSION['filter'] = array('0' => array('name' => $name, 'value' => $values));
                }else{
                    if(in_array($name,array_column($_SESSION['filter'],'name'))){
                        foreach($_SESSION['filter'] as $key => $v){
                            if($v['name'] == $name){
                                if($name == 'tag'){
                                    $_SESSION['filter'][$key]['name'] = $name;
                                    $_SESSION['filter'][$key]['value'] = $values;
                                    $_SESSION['filter'][$key]['class'] = $l;
                                }else{
                                    $_SESSION['filter'][$key]['name'] = $name;
                                    $_SESSION['filter'][$key]['value'] = $values;
                                }
                            }
                        }
                    }else{
                            array_push($_SESSION['filter'],array('name' => $name, 'value' => $values));
                    }
                }
            }else if(isset($_GET['start'])){
                $offset = $_GET['start'];
                $limit = 6;
                $value = ceil($offset/6+1);
                $name = 'page';
                $_SESSION['page'] = array('name'=>$name,'value'=>$value);
            }else if(isset($_GET['sort'])){
                $value = $_GET['sort'];
                $name = 'sort';
                $_SESSION['sort'] = array('name'=>$name,'value'=>$value);
            }else if(isset($_GET['lower'])){
                $lower = ceil($_GET['lower']);
                $upper = ceil($_GET['upper']);
                $value = $lower.'-'.$upper;
                $name = 'price';
                $_SESSION['price'] = array('name'=>$name,'value'=>$value,'lower'=>$lower,'upper'=>$upper);
            }

            $where ='';
            $true = 1;
            if(!empty($_SESSION['filter'])){
                $true = 2;
                foreach($_SESSION['filter'] as $filter => $value){
                    if($value['value'] == 'delete'){
                        unset($_SESSION['filter'][$filter]);
                    }else{
                        switch($value['name']){
                            case 'tag':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product  INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$value['value'].')': 'INNER JOIN tag_of_product on product_id = id WHERE tag_id = '.$value['value'].'';
                            break;
    
                            case 'color':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN product_detail on product_id = id where color_id =  '.$value['value'].')': 'INNER JOIN product_detail on id = product_id where color_id = '.$value['value'].'';
                            break;
    
                            case 'brand':
                                $where .= !empty($where) ? ' and product.id IN(select product.id from product INNER JOIN brand on brand.id = brand_id where brand_id = '.$value['value'].')': 'INNER JOIN brand on brand.id = brand_id where brand_id ='.$value['value'].'';
                            break;
                        }
                    }
                }
            }
            if(!empty($_SESSION['sort'])){
                $true = 2;
                $value = $_SESSION['sort']['value']; 
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
            if(!empty($_SESSION['price'])){
                $true = 2;
                $lower = $_SESSION['price']['lower'];
                $upper = $_SESSION['price']['upper'];
                $where .= !empty($where) ? ' and price BETWEEN '.$lower.' and '.$upper.'': ' where price BETWEEN '.$lower.' and '.$upper.'';
            }
            if(isset($_GET['start'])){
                if($true == 2){
                    $where .= ' limit '.$limit.' offset '.$offset.'';
                    $page = getProductByFilter($where); 
                }else{
                    $page = getProductByOffset($limit, $offset);
                }
            }else{
                $page = getProductByFilter($where);
            }
            
            
            $lan = 0;
            $luot =0;
            $sp = '';
            foreach($page as $p){  
                $luot++;
                $lan++;
                if($luot < 7){
                    $sp .= '
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
            } 
            $myArr = array(array($sp));
            $number = 0;
            $lan = $lan / 6;
            $page = '';
            if(ceil($lan) < 4){
                if(ceil($lan) == 0){
                    $page = '';
                }else{
                    $page = '<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
                    for ($i=0; $i < ceil($lan); $i++){ 
                        $number++;
                        $page .= '<a onclick="page('.$number.');">'.$number.'</a>';
                    }
                    $page .= '<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                }
            }else{
                for ($i=0; $i < 4; $i++){ 
                    $number++;
                    $page .= '
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>	
                        <a onclick="page('.$number.');">'.$number.'</a>
                    ';
                }
                $page .= '
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">'.ceil($lan).'</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                ';
            }
            array_push($myArr,array($page));
            if(isset($_SESSION['filter'])){
                foreach($_SESSION['filter'] as $filter => $value){
                    array_push($myArr,array($value['value'],$value['name']));
                }
            }
            if(isset($_SESSION['sort'])){
                array_push($myArr,array($_SESSION['sort']['value'],$_SESSION['sort']['name']));
            }
            if(isset($_SESSION['page'])){
                array_push($myArr,array($_SESSION['page']['value'],$_SESSION['page']['name']));
            }
            if(isset($_SESSION['price'])){
                array_push($myArr,array($_SESSION['price']['value'],$_SESSION['price']['name']));
            }
            echo json_encode($myArr);
            // echo $where;
            break;

        default: 
            require_once('views/shop/index.php');
            break;
        break;
    }