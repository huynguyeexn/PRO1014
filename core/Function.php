<?php
/*
Dùng để viết các function dùng chung cho cả project
*/


// Định dạng từ số thành tiền.
function numToMoney($number){
    setlocale(LC_MONETARY, 'vi_VI');
    $formatter = new NumberFormatter( 'vi_VI', NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($number, "VND")."\n";
}


// Trả về thời gian hiện tại.
function now(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Asia/Ho_Chi_Minh'));
    return $date->format('Y-m-d H:i:s');
}

function addToCart($productID, $size){
    if (isset($_SESSION['cart'])){
        $search_items = array('id'=>$productID, 'size'=>$size); 
        $result = searchMultiKey($_SESSION['cart'], $search_items); 
        
        if($result){
            
            $_SESSION['cart'][$result[0]['index']]['quantity'] += 1;
        }else{
            array_push(
                $_SESSION['cart'], 
                array( 
                    'id' => $productID, 
                    'size' => $size, 
                    'quantity'=> 1
                )
            );
        }
    }else{
        $_SESSION['cart'] = [];
        array_push(
            $_SESSION['cart'], 
            array( 
                'id' => $productID, 
                'size' => $size, 
                'quantity'=> 1
            )
        );
    }
    return $_SESSION['cart'];
}

function singleProduct($product){
    
    $size = getSizeOfProduct($product['id']);
    $html = "";
    foreach($size as $s){
        $html .=  '<option value="'.$s['size_id'].'">Size '.$s['size_id'].'</option>';
    }
    $result =  '<!-- single product -->
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="' . $product["thumb"] . '" alt="">
            <div class="product-details">
                <h6><a href="product.php?id='.$product["id"].'">' . $product["name"] . '</a></h6>
                <div class="price">
                    <h6>' .numToMoney($product["price"]). '</h6>
                    <h6 class="l-through">' . numToMoney($product["cost"]) . '</h6>
                </div>
                <div class="prd-bottom">
                <div class="default-select mb-2" >
                    <select>
                        '.$html.'
                    </select>
                </div>
                    <a class="social-info addtocart" value="' . $product["id"] . '">
                        <span class="ti-bag"></span>
                        <p class="hover-text">Thêm vào giỏ</p>
                    </a>
                    <a  class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Yêu thích</p>
                    </a>
                </div>
            </div>
        </div>
    </div>';

    return $result;
}



function money_format($formato, $valor) {

    if (setlocale(LC_MONETARY, 0) == 'C') { 
        return number_format($valor); 
    }

    $locale = localeconv(); 

    $regex = '/^'.             // Inicio da Expressao 
             '%'.              // Caractere % 
             '(?:'.            // Inicio das Flags opcionais 
             '\=([\w\040])'.   // Flag =f 
             '|'. 
             '([\^])'.         // Flag ^ 
             '|'. 
             '(\+|\()'.        // Flag + ou ( 
             '|'. 
             '(!)'.            // Flag ! 
             '|'. 
             '(-)'.            // Flag - 
             ')*'.             // Fim das flags opcionais 
             '(?:([\d]+)?)'.   // W  Largura de campos 
             '(?:#([\d]+))?'.  // #n Precisao esquerda 
             '(?:\.([\d]+))?'. // .p Precisao direita 
             '([in%])'.        // Caractere de conversao 
             '$/';             // Fim da Expressao 

    if (!preg_match($regex, $formato, $matches)) { 
        trigger_error('Formato invalido: '.$formato, E_USER_WARNING); 
        return $valor; 
    } 

    $opcoes = array( 
        'preenchimento'   => ($matches[1] !== '') ? $matches[1] : ' ', 
        'nao_agrupar'     => ($matches[2] == '^'), 
        'usar_sinal'      => ($matches[3] == '+'), 
        'usar_parenteses' => ($matches[3] == '('), 
        'ignorar_simbolo' => ($matches[4] == '!'), 
        'alinhamento_esq' => ($matches[5] == '-'), 
        'largura_campo'   => ($matches[6] !== '') ? (int)$matches[6] : 0, 
        'precisao_esq'    => ($matches[7] !== '') ? (int)$matches[7] : false, 
        'precisao_dir'    => ($matches[8] !== '') ? (int)$matches[8] : $locale['int_frac_digits'], 
        'conversao'       => $matches[9] 
    ); 

    if ($opcoes['usar_sinal'] && $locale['n_sign_posn'] == 0) { 
        $locale['n_sign_posn'] = 1; 
    } elseif ($opcoes['usar_parenteses']) { 
        $locale['n_sign_posn'] = 0; 
    } 
    if ($opcoes['precisao_dir']) { 
        $locale['frac_digits'] = $opcoes['precisao_dir']; 
    } 
    if ($opcoes['nao_agrupar']) { 
        $locale['mon_thousands_sep'] = ''; 
    } 

    $tipo_sinal = $valor >= 0 ? 'p' : 'n'; 
    if ($opcoes['ignorar_simbolo']) { 
        $simbolo = ''; 
    } else { 
        $simbolo = $opcoes['conversao'] == 'n' ? $locale['currency_symbol'] 
                                               : $locale['int_curr_symbol']; 
    } 
    $numero = number_format(abs($valor), $locale['frac_digits'], $locale['mon_decimal_point'], $locale['mon_thousands_sep']); 


    $sinal = $valor >= 0 ? $locale['positive_sign'] : $locale['negative_sign']; 
    $simbolo_antes = $locale[$tipo_sinal.'_cs_precedes']; 

    $espaco1 = $locale[$tipo_sinal.'_sep_by_space'] == 1 ? ' ' : ''; 

    $espaco2 = $locale[$tipo_sinal.'_sep_by_space'] == 2 ? ' ' : ''; 

    $formatado = ''; 
    switch ($locale[$tipo_sinal.'_sign_posn']) { 
    case 0: 
        if ($simbolo_antes) { 
            $formatado = '('.$simbolo.$espaco1.$numero.')'; 
        } else { 
            $formatado = '('.$numero.$espaco1.$simbolo.')'; 
        } 
        break; 
    case 1: 
        if ($simbolo_antes) { 
            $formatado = $sinal.$espaco2.$simbolo.$espaco1.$numero; 
        } else { 
            $formatado = $sinal.$numero.$espaco1.$simbolo; 
        } 
        break; 
    case 2: 
        if ($simbolo_antes) { 
            $formatado = $simbolo.$espaco1.$numero.$sinal; 
        } else { 
            $formatado = $numero.$espaco1.$simbolo.$espaco2.$sinal; 
        } 
        break; 
    case 3: 
        if ($simbolo_antes) { 
            $formatado = $sinal.$espaco2.$simbolo.$espaco1.$numero; 
        } else { 
            $formatado = $numero.$espaco1.$sinal.$espaco2.$simbolo; 
        } 
        break; 
    case 4: 
        if ($simbolo_antes) { 
            $formatado = $simbolo.$espaco2.$sinal.$espaco1.$numero; 
        } else { 
            $formatado = $numero.$espaco1.$simbolo.$espaco2.$sinal; 
        } 
        break; 
    } 

    if ($opcoes['largura_campo'] > 0 && strlen($formatado) < $opcoes['largura_campo']) { 
        $alinhamento = $opcoes['alinhamento_esq'] ? STR_PAD_RIGHT : STR_PAD_LEFT; 
        $formatado = str_pad($formatado, $opcoes['largura_campo'], $opcoes['preenchimento'], $alinhamento); 
    } 

    return $formatado; 
}

function searchMultiKey($array, $search_list) { 
  
    // Create the result array 
    $result = array(); 
  
    // Iterate over each array element 
    foreach ($array as $key => $value) { 
  
        // Iterate over each search condition 
        foreach ($search_list as $k => $v) { 
      
            // If the array element does not meet 
            // the search condition then continue 
            // to the next element 
            if (!isset($value[$k]) || $value[$k] != $v) 
            { 
                  
                // Skip two loops 
                continue 2; 
            } 
        } 
      
        // Append array element's key to the 
        //result array 

        $value += ['index' => $key];
        $result[] = $value; 
    } 
  
    // Return result  
    return $result; 
} 