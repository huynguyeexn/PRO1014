
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("views/templates/Header.php");
    ?>
    <h1>Sản phẩm</h1>
    <ul>
        <?php
        foreach($allProduct as $product){
            echo '<li>'.$product['name'].'</li>';
        }
        echo numToMoney(1234567890);
        ?>
    </ul>
    
    <?php
        require_once("views/templates/Footer.php");
    ?>
</body>
</html>