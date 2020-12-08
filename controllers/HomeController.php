<?php
    session_start();

    // Require các file cần sử dụng.
    include_once('core/function.php');
    
    // Các Model cần thiết.
    include_once('models/ProductModel.php');
    include_once('models/ProductDetailModel.php');
    include_once('models/SliderModel.php');
    include_once('models/ConfigModel.php');
    include_once('models/BlogModel.php');

    // GET action.
    $action = "home";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'home':
            $sliders = getAllSlider();
            $layouts = json_decode(getConfigByName("layout")['config'])->home;
            include_once('views/home/index.php');
            break;
        case 'search':
            $content = $_GET['content'];
            $sp ='';
            $product = getAllProduct();
            if($content == ''){
                foreach($product as $p){
                    $sp .= '';
                }
            }else{
                foreach($product as $p){
                    if(strlen(strpos(strtolower($p['name']),strtolower("$content"))) > 0){
                        $sp .= '
					        <li style="width:100%;height:20px;list-style-type: none;padding-top:15px;padding-bottom:15px;padding-left: 40px;border-bottom: 1px solid #f9f9f9;"><a style="float: left;line-height:0.2;"  href="product.php?id='.$p['id'].'">'.$p['name'].'</a></li>
                        ';
                    }
                }
            }
            echo $sp;
            break;
        default: 
            include_once('views/home/index.php');
            break;
        break;
    }
