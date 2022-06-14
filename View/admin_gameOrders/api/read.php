<?php
    require_once 'core/product.php';
    require_once 'includes/config.php';
	$product = new Product($db);
	$result = $product->read();

    $num = $result->rowCount();
    $productInfo = array();
    if($num > 0)
    {
        $suc = 1;
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $productInfo[$i] = $row;
            $i++;
        }
    }else
    {
        $suc = 0;
    }
?>