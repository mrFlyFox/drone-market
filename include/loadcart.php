<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("db_connect.php");
    $result = mysql_query("SELECT * FROM cart, table_products WHERE cart.cart_ip='{$_SERVER["REMOTE_ADDR"]}' AND table_products.products_id=cart.cart_id_products", $link);
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do
        {
            $count +=$row["cart_count"];
            $int = $int + ($row["price"] * $row["cart_count"]);
        }while (mysql_fetch_array($result));
    if ($count == 1 or $count == 21 or $count == 31 or $count == 41 or $count == 51 or $count == 61 or $count == 71 or $count == 81) ($str = ' товар');
    if ($count == 2 or $count == 3 or $count == 4 or $count == 22 or $count == 23 or $count == 24 or $count == 32 or $count == 33 or $count == 34 or $count == 42 or $count == 43 or $count == 44 or $count == 52 or $count == 53 or $count == 54) ($str = ' товара');
    if ($count == 5 or $count == 6 or $count == 7 or $count == 8 or $count == 9 or $count == 10 or $count == 11 or $count == 12 or $count == 13 or $count == 14 or $count == 15 or $count == 16 or $count == 17 or $count == 18 or $count == 19 or $count == 20 or $count == 25 or $count == 26 or $count == 27 or $count == 28 or $count == 29 or $count == 30 or $count == 35 or $count == 36 or $count == 37 or $count == 38 or $count == 39 or $count == 40) ($str = ' товаров');
        
        echo $count;
        
    
    }else
    {
        echo '0';
    }
    
}
?>