<?php
    include("include/db_connect.php");
    include("functions/functions.php");
    session_start();

    include("include/auth-cookie.php");
//unset($_SESSION["auth"]);
//    setcookie('rememberme', '', 0,'/');

$id = clear_string($_GET["id"]);
$action = clear_string($_GET["action"]);

switch ($action) {
    case 'clear' :
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'", $link);
        break;
    case 'delete' :
        $delete = mysql_query("DELETE FROM cart WHERE cart_id='$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'", $link);
        break;
}

if (isset($_POST["submitdata"]))
{
    $_SESSION["order_delivery"] = $_POST["order_delivery"];
    $_SESSION["order_fio"] = $_POST["order_fio"];
    $_SESSION["order_email"] = $_POST["order_email"];
    $_SESSION["order_phone"] = $_POST["order_phone"];
    $_SESSION["order_address"] = $_POST["order_address"];
    $_SESSION["order_note"] = $_POST["order_note"];
    
    header("Location: cart.php?action=completion");
}

$result = mysql_query("SELECT * FROM cart, table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id=cart.cart_id_products", $link);
if (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_array($result);
    do
    {
        $int = $int + ($row["price"] * $row["cart_count"]);
    }while ($row = mysql_fetch_array($result));
    $itogpricecart = $int;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drone Market - Корзина заказо</title>
    <link rel="stylesheet" href="style/reset.css" type="text/css">
   
    <link rel="stylesheet" href="style/style.css" type="text/css">
    
     <style>
      @font-face {
font-family: OpenSans;
  src: url(fonts/OpenSans-Regular.ttf);
        }
        @font-face {
      font-family: OpenSans-Bold;
  src: url(fonts/OpenSans-Bold.ttf);    
        }
           @font-face {
      font-family: OpenSans-Condensed;
  src: url(fonts/OpenSans-CondLight.ttf);    
        }
    </style>
    
    
</head>
<body>
      
     
      

   <?php
    include("include/block-javascript.php");
    ?>

    <?php
    include("include/block-header.php");
    ?>
    
   
    
      <div class="content">
       <div class="mid">
        
       
        
         <?php
           $action = clear_string($_GET["action"]);
           switch($action){
               case 'oneclick':
                   
                   echo '<div id="block-step">
         <div id="name-step">
             <ul>
                 <li><a href="cart.php?action=oneclick" class="active">1. Корзина товаров</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=confirm">2. Контактная информация</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=completion">3. Завершение</a></li>
             </ul>
         </div>
         <p>Шаг 1 из 3</p>
         <a href="cart.php?action=clear">Очистить</a>
     </div>';
                   
                 
                  
                   $result = mysql_query("SELECT * FROM cart, table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id=cart.cart_id_products", $link);
                   if (mysql_num_rows($result) > 0)
                   {
                       $row=mysql_fetch_array($result);
                         echo '<div id="header-list-cart">
             <div id="head1">Изображение</div>
             <div id="head2">Наименование товара</div>
             <div id="head3">Кол-во</div>
             <div id="head4">Цена</div>
         </div>';
                       
                       do
                       {
                           $int = $row["cart_price"] * $row["cart_count"];
                           $all_price = $all_price + $int;
                           
                             echo ' <div class="block-list-cart">
           <div class="img-cart">
               <p align="center"><img src="uploads_images/'.$row["image"].'" alt=""></p>
           </div>
           
           <div class="title-cart">
               <p><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
               <p class="cart-mini-features">'.$row["mini_features"].'</p>
           </div>
           
           <div class="count-cart">
               <ul class="input-count-style">
                   <li>
                       <p   data-idcount="'.$row["cart_id"].'"   class="count-minus">-</p>
                   </li>
                   <li>
                       <p><input id="input-id'.$row["cart_id"].'"               data-idcount='.$row["cart_id"].' type="text" class="count-input" value="'.$row["cart_count"].'"></p>
                   </li>
                   <li>
                       <p class="count-plus"                                       data-idcount='.$row["cart_id"].'>+</p>
                   </li>
               </ul>
           </div>
           
           <div id="tovar'.$row["cart_id"].'" class="price-product">
               <h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.group_numerals($row["cart_price"]).' руб</span></h5><p price="'.$row["cart_price"].'">'.group_numerals($int).' руб</p>
           </div>
           
           <div class="delete-cart"><a href="cart.php?id='.$row["cart_id"].'&action=delete"><img src="images/remove11.png" alt=""></a></div>
           
           <div id="bottom-cart-line"></div>
       </div>';
                          
                       }while ($row = mysql_fetch_array($result));
                       
                       echo '<h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> руб</h2>
       <p class="button-next" align="right"><a href="cart.php?action=confirm">Далее</a></p>';
                       
                   }else
                   {
                       echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
                       
                   }
                   
                 
                   
                   break;
            
                   
                   case 'confirm':
                   
                         echo '<div id="block-step">
         <div id="name-step">
             <ul>
                 <li><a href="cart.php?action=oneclick" >1. Корзина товаров</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=confirm" class="active">2. Контактная информация</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=completion">3. Завершение</a></li>
             </ul>
         </div>
         <p>Шаг 2 из 3</p>
         
     </div>';
                   
                   
                   if ($_SESSION['order_delivery'] == "По почте") $chck1 = "checked";
                   if ($_SESSION['order_delivery'] == "Курьером") $chck2 = "checked"; 
                   if ($_SESSION['order_delivery'] == "Самовывоз") $chck3 = "checked"; 
                   
                   echo ' <h3 class="title-h3">Способы доставки:</h3>
           <form action="" method="post">
               <ul id="info-radio">
                   <li>
                   <input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="По почте" '.$chck1.'>
                   <label class="label_delivery" for="order_delivery1">По почте</label>
                   </li>
                   
                   <li>
                   <input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Курьером" '.$chck2.'>
                   <label class="label_delivery" for="order_delivery2">Курьером</label>
                   </li>
                   
                   <li>
                   <input type="radio" name="order_delivery" class="order_delivery" id="order_delivery3" value="Самовывоз" '.$chck1.'>
                   <label class="label_delivery" for="order_delivery3">Самовывоз</label>
                   </li>
                   
               </ul>';
                   
                   echo '<h3 class="title-h3">Информация для доставки:</h3>
               <ul id="info-order">';
                   
                   if ($_SESSION['auth'] != 'yes_auth')
                   {
                     echo '
                   <li><label for=""><span>*</span>ФИО:</label><input type="text" name="order_fio" id="order_fio" value="'.$_SESSION["order_fio"].'"><span class="order-span-style">Пример: Иванов Иван Иванович</span>
                   </li>
                   
                   <li><label for=""><span>*</span>E-mail:</label><input type="text" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'"><span class="order-span-style">Пример: ivanov@mail.ru</span>
                   </li>
                   
                   <li><label for=""><span>*</span>Телефон:</label><input type="text" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'"><span class="order-span-style">Пример: +7 918 000 88 99</span>
                   </li>
                   
                   <li><label for=""><span>*</span>Адрес <br/>доставки:</label><input type="text" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'"><span class="order-span-style">Пример: Россия г. Москва ул. Ленина д. 18, кв. 1</span>
                   </li>';  
                   }
                   
                   echo '<li><label for=""><span>*</span>Примечания:</label><textarea cols="30" rows="10" name="order_note" id="order_note" value="'.$_SESSION["order_note"].'"></textarea><span class="order-span-style">Уточните информацию о заказе. <br>Например, удобное время для звонка<br>нашего менеджера</span>
                   </li>
                   
               </ul>
               <p align="right"><input type="submit" name="submitdata" id="confirm-button-next" value="Далее"></p>
               </form>
               ';
                   
                   break;
               case 'completion':
                   
                         echo '<div id="block-step">
         <div id="name-step">
             <ul>
                 <li><a href="cart.php?action=oneclick" >1. Корзина товаров</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=confirm">2. Контактная информация</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=completion" class="active">3. Завершение</a></li>
             </ul>
         </div>
         <p>Шаг 3 из 3</p>
       
     </div>';
                  echo  '<h3 class="completion-title">Конечная информация</h3>';
                   
                   if ($_SESSION['auth'] == 'yes_auth')
                   {
                       echo '
                       <ul id="list-info">
                       <li><strong>Способ доставки: </strong>'.$_SESSION['order_delivery'].'</li>
                       <li><strong>E-mail: </strong>'.$_SESSION['auth_email'].'</li>
                       <li><strong>ФИО: </strong>'.$_SESSION['auth_surname'].' '.$_SESSION['auth_name'].' '.$_SESSION['auth_patronymic'].'</li>
                       <li><strong>Адрес доставки: </strong>'.$_SESSION['auth_address'].'</li>
                       <li><strong>Телефон: </strong>'.$_SESSION['auth_phone'].'</li>
                       <li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
                       </ul>
                       ';
                   }else
                   {
                     echo ' <ul id="list-info">
                       <li><strong>Способ доставки: </strong>'.$_SESSION['order_delivery'].'</li>
                       <li><strong>E-mail: </strong>'.$_SESSION['order_email'].'</li>
                       <li><strong>ФИО: </strong>'.$_SESSION['order_fio'].'</li>
                       <li><strong>Адрес доставки: </strong>'.$_SESSION['order_address'].'</li>
                       <li><strong>Телефон: </strong>'.$_SESSION['order_phone'].'</li>
                       <li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
                       </ul>';  
                   }
                    echo '<h2 class="itog-price" align="right">Итого: <strong>'.$itogpricecart.'</strong> руб</h2>
       <p class="button-next" align="right"><a href="">Оплатить</a></p>';
                   
                   break;
               default:
                   
                    echo '<div id="block-step">
         <div id="name-step">
             <ul>
                 <li><a href="cart.php?action=oneclick" class="active">1. Корзина товаров</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=confirm">2. Контактная информация</a></li>
                 <li><span>&rarr;</span></li>
                 <li><a href="cart.php?action=completion">3. Завершение</a></li>
             </ul>
         </div>
         <p>Шаг 1 из 3</p>
         <a href="cart.php?action=clear">Очистить</a>
     </div>';
                   
                 
                  
                   $result = mysql_query("SELECT * FROM cart, table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id=cart.cart_id_products", $link);
                   if (mysql_num_rows($result) > 0)
                   {
                       $row=mysql_fetch_array($result);
                         echo '<div id="header-list-cart">
             <div id="head1">Изображение</div>
             <div id="head2">Наименование товара</div>
             <div id="head3">Кол-во</div>
             <div id="head4">Цена</div>
         </div>';
                       
                       do
                       {
                           $int = $row["cart_price"] * $row["cart_count"];
                           $all_price = $all_price + $int;
                           
                             echo ' <div class="block-list-cart">
           <div class="img-cart">
               <p align="center"><img src="uploads_images/'.$row["image"].'" alt=""></p>
           </div>
           
           <div class="title-cart">
               <p><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
               <p class="cart-mini-features">'.$row["mini_features"].'</p>
           </div>
           
           <div class="count-cart">
               <ul class="input-count-style">
                   <li>
                       <p   data-idcount="'.$row["cart_id"].'"   class="count-minus">-</p>
                   </li>
                   <li>
                       <p><input id="input-id'.$row["cart_id"].'"               data-idcount='.$row["cart_id"].' type="text" class="count-input" value="'.$row["cart_count"].'"></p>
                   </li>
                   <li>
                       <p class="count-plus"                                       data-idcount='.$row["cart_id"].'>+</p>
                   </li>
               </ul>
           </div>
           
           <div id="tovar'.$row["cart_id"].'" class="price-product">
               <h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.group_numerals($row["cart_price"]).' руб</span></h5><p price="'.$row["cart_price"].'">'.group_numerals($int).' руб</p>
           </div>
           
           <div class="delete-cart"><a href="cart.php?id='.$row["cart_id"].'&action=delete"><img src="images/remove11.png" alt=""></a></div>
           
           <div id="bottom-cart-line"></div>
       </div>';
                          
                       }while ($row = mysql_fetch_array($result));
                       
                       echo '<h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> руб</h2>
       <p class="button-next" align="right"><a href="cart.php?action=confirm">Далее</a></p>';
                       
                   }else
                   {
                       echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
                       
                   }
                   
                 
                   
                   break;
               
                   
                   
                   
           }
           ?>
         

              
               
               
                   
           
          
           
       </div>
       </div>
       
       
      
      
      
      <br clear="all" />
      <div class="clear-footer"></div>
       <?php
        include("include/block-footer.php");
    ?> 
</body>
</html> 