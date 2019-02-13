<?php 
    include("include/db_connect.php");
    include("functions/functions.php");
    session_start();

    include("include/auth-cookie.php");
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
<!--
    <script src="javascript/jquery-1.12.3.min.js"></script>
    <script src="javascript/jquery.bxslider.min.js"></script>
    <script src="javascript/dropmenu.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
  $('.bxslider').bxSlider({
    auto: true,
    pause: 6000,
    speed: 1000
  });
});
         $(document).ready(function(){
  $('.bxslider2').bxSlider({
    auto: true,
    pause: 6000,
    speed: 1000,
      minSlides: 4,
  maxSlides: 4,
  slideWidth: 275,
  slideMargin: 22
  });
});
    </script>
-->

</head>
<body>
  <?php 
    include("include/block-javascript.php");
    ?>
   <?php 
    include("include/block-header.php");
    ?>
   
   
   
    <div class="content">
        <div class="slider">
            <div class="bx-wrapper" >
                <div class="bx-viewport" >
                    <ul class="bxslider" >
                        <li ><img src="images/GOPRO.png">
                        <a href="" class="slider-btn">узнать больше<span></span></a>
                        </li>
                        <li ><img src="images/GOPRO.png"></li>
                        <li ><img src="images/GOPRO.png"></li>
                    </ul>
                </div>
                <div class="bx-controls bx-has-pager bx-has-controls-direction">
                    <div class="bx-pager bx-default-pager">
<!--
                        <div class="bx-pager-item">
                            <a href="" data-slide-index="0" class="bx-pager-link">1</a>                           </div>
                        <div class="bx-pager-item">
                            <a href="" data-slide-index="1" class="bx-pager-link">2</a>
                        </div>
                        <div class="bx-pager-item">
                            <a href="" data-slide-index="2" class="bx-pager-link                                         active">3</a>
                        </div>
-->
                    </div>
<!--
                    <div class="bx-controls-direction">
                            <a class="bx-prev" href=""></a><a class="bx-next"                                         href="">Next</a>
                    </div>
-->
                </div>
            </div>
        
        
<!--
            <ul class="bxslider">
                  <li><img src="images/GOPRO.png" /></li>
                  <li><img src="/images/pic2.jpg" /></li>
                  <li><img src="/images/pic3.jpg" /></li>
                  <li><img src="/images/pic4.jpg" /></li>
            </ul>
-->
        </div>
        

        <div class="new">
           <div class="mid">
            <div class="label">
                <span class="line"></span>
                <h1>Новинки</h1>
                <span class="line"></span>
            </div>
            
            <?php
                $result = mysql_query("SELECT * FROM table_products", $link);
                    if (mysql_num_rows($result) > 0)
                        {
                            $row = mysql_fetch_array($result);
                        }
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
                 <p class="new-price">'.group_numerals($row["price"]).' руб</p>
             </div>
             <div class="product-button"><a class="add-to-cart"                           tid='.$row["products_id"].'>Купить</a></div>
            </div>
                  
                        
                        ' ;
               }
               while ($row = mysql_fetch_array($result));
            ?>
            
            
           
            
           </div>
           
          <div class="both"></div> 
        </div>
        
        
        <div class="drones">
           <div class="mid">
            <div class="label">
                <span class="line"></span>
                <h1>Коптеры</h1>
                <span class="line"></span>
            </div>
            
            <div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div>
            
            
             <div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div>
            
             <div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div>
            
             <div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div>
            <div class="show-more"><a href="">Показать еще</a></div>
            
           </div>
           
          <div class="both"></div> 
        </div>
        
        <div class="banner"><img src="images/banner.png" alt="">
        <a href="" class="banner-btn">узнать больше<span></span></a>
        </div>
        
        <div class="popular">
           <div class="mid">
            <div class="label">
                <span class="line"></span>
                <h1>Коптеры</h1>
                <span class="line"></span>
            </div>
            
                
            <ul class="bxslider bxslider2">
            
            <li><div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div></li>
            
            
             <li><div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div></li>
            
             <li><div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div></li>
            
             <li><div class="product">
             <div class="product-img"><img src="images/s900_001.jpg" alt=""></div>      
             <div class="line-product"></div>
             <a href="">Октокоптер Dji S1000 Premium</a>
             <div class="stars"></div>
             <span class="count-stars">(0)</span>
             <p>В комплекте с контроллером Dji A2 и подвесом Z15 для miniDSLR</p>
             <div class="quantity-in-stock">
                 <span>Кол-во на складе:</span>
                 <span>10+</span>
             </div>
             <div class="price">
<!--                 <p class="old-price">230 000 руб</p>-->
                 <p class="new-price">225 000 руб</p>
             </div>
             <div class="product-button"><a href="">Купить</a></div>
            </div></li>
            
            </ul>
            
             </div>
           
            <div class="last-news">
               <div class="mid">
                    <div class="label">
                        <span class="line"></span>
                        <h1>Последние новости</h1>
                        <span class="line"></span>
                    </div>
                    
                    <div class="announcement">
                        <div class="announcement-img"><img src="images/inteldrone100.png"  alt=""></div>
                        <h1>intel drone 100</h1>
                        <p>100 одноременно танцующих дронов, компания intel поставила мировой рекорд</p>
                        <a href="" class="announcement-btn">читать в журнале<span></span></a>
                    </div>
                    
                    <div class="announcement">
                        <div class="announcement-img"><img src="images/dji-a3-pro.png"  alt=""></div>
                        <h1>новинки dji - a3/a3 pro, ronin mx и dji matrice 600</h1>
                        <p>Первая и самая большая новинка - платворма Dji Matrice 600</p>
                        <a href="" class="announcement-btn">читать в журнале<span></span></a>
                    </div>
                    
                    
                </div>
            </div>        
    </div>
    </div>
    <?php
    include("include/block-footer.php");
    ?>
   
    
</body>
</html>