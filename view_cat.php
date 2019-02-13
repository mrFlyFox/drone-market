<?php 
    include("include/db_connect.php");
    include("functions/functions.php");
    $cat = clear_string($_GET["cat"]);
       
    $type = clear_string($_GET["type"]);
    session_start();
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drone Market</title>
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
        <div class="options">
            <span></span>
                
              <div class="block-category" >
              <p>Категории</p>
              <div id="accordion">
                  <h3>Коптеры</h3>
                      <div>
                   <ul class="category-section">
                    
                    <?php
                    $result = mysql_query("SELECT * FROM category WHERE type='drone'", $link);
                    
                        if (mysql_num_rows($result) >0)
                        {
                            $row = mysql_fetch_array($result);
                            do
                            {
                                echo '
                                <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
                                ';
                            }
                            while ($row = mysql_fetch_array($result));
                        }
                        
                    ?>
                    
                    
                    </ul>
                      </div>
  <h3>Комплектующие</h3>
  <div>
   <ul class="category-section">
                    
                       <?php
                    $result = mysql_query("SELECT * FROM category WHERE type='accessories'", $link);
                    
                        if (mysql_num_rows($result) >0)
                        {
                            $row = mysql_fetch_array($result);
                            do
                            {
                                echo '
                                <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
                                ';
                            }
                            while ($row = mysql_fetch_array($result));
                        }
                        
                    ?>  
                    
                    </ul>
  </div>
  <h3>Аксессуары</h3>
  <div>
    
    
  </div>
  
            </div>
<!--
               <ul>
                <li><a href="">Коптеры</a>
                    <ul class="category-section">
                    
                    <?php
                    $result = mysql_query("SELECT * FROM category WHERE type='drone'", $link);
                    
                        if (mysql_num_rows($result) >0)
                        {
                            $row = mysql_fetch_array($result);
                            do
                            {
                                echo '
                                <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
                                ';
                            }
                            while ($row = mysql_fetch_array($result));
                        }
                        
                    ?>
                    
                    

                    
                       <?php
                    $result = mysql_query("SELECT * FROM category WHERE type='accessories'", $link);
                    
                        if (mysql_num_rows($result) >0)
                        {
                            $row = mysql_fetch_array($result);
                            do
                            {
                                echo '
                                <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
                                ';
                            }
                            while ($row = mysql_fetch_array($result));
                        }
                        
                    ?>  
                    
                    </ul>
                </li>
                <li><a href="">Аксессуары</a>
                    <ul class="category-section">
                    
                    </ul>
                </li>
            </ul>
-->
            </div>
            
             <div class="block-category">
              <p>Бренд</p>
               <ul>
                <li><a href="">Dji</a>
                    
                </li>
                <li><a href="">SYMA</a>
                   
                </li>
                <li><a href="">Cheerson</a>
                </li>
                <li><a href="">Tarot</a>
                </li>
                <li><a href="">FlySky</a>
                </li>
            </ul>
            </div>
            <div class="block-sorting">
                <p>Сортировать</p>
                <ul>
                    <li class="select-sort"><a href="">Без сортировки</a>
                    <ul class="sorting-list">
                        <li><a href="">От дешевых к дорогим</a></li>
                        <li><a href="">От дорогих к дешевым</a></li>
                        <li><a href="">Популярное</a></li>
                        <li><a href="">Новинки</a></li>
                        <li><a href="">От А до Я</a></li>
                    </ul></li>
                </ul>
                
            </div>

            <span></span>
        </div>
        <div class="all">
           <div class="mid">
            <div class="label">
            </div>
            <?php
               if (!empty($cat) && !empty($type))
               {
                   $querycat = "brand='$cat' AND type_tovara='$type'"; 
               }else
               {
                   if (!empty($type)){
                       $querycat = "type_tovara='$type'";
                   }else
                   {
                       $querycat = ""; 
                   }
               }
               
                $result = mysql_query("SELECT * FROM table_products WHERE $querycat ", $link);
                 if (mysql_num_rows($result) > 0)
                        {
                            $row = mysql_fetch_array($result);
                        
               do
               {
                  echo '
                  
                   <div class="product">
             <div class="product-img"><img src="uploads_images/'.$row["image"].'" alt=""></div>      
             <div class="line-product"></div>
             <a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>';
             echo $row["mini_features"];
             echo '<div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">'.$row["price"].' руб</p>
             </div>
             <div class="product-button"><a class="add-to-cart"                           tid='.$row["products_id"].'>Купить</a></div>
            </div>
                  
                        
                        ' ;
               }
               while ($row = mysql_fetch_array($result));}
               ?>
                
                
            <div class="show-more"><a href="">Показать еще</a></div>
            
           </div>
           
          <div class="both"></div> 
        </div>
        
        </div>
        
            
      </div>  
    
     <?php
        include("include/block-footer.php");
    ?> 
</body>
</html>