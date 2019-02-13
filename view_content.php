<?php
    include("include/db_connect.php");
    include("functions/functions.php");
       $id =clear_string($_GET["id"]);
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
    
<!--
    <script src="javascript/jquery.easing-1.3.pack.js"></script>
    <script src="javascript/jquery.fancybox-1.3.4.js"></script>
-->
  <link rel="stylesheet" href="style/jquery.fancybox.css">
   <script src="javascript/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $("a.send-review").fancybox();
               
            
        });
    </script>
    
      <div class="content">
           <div class="view-content">
            <div class="mid">
               <?php
                $result1 = mysql_query("SELECT * FROM table_products WHERE products_id='$id'", $link);
                    if (mysql_num_rows($result1) > 0)
                        {
                            $row1 = mysql_fetch_array($result1);
                        }
               do
               {
                  echo '
                  
                   <div class="content-imgs">
                      <img src="uploads_images/'.$row1["image"].'" alt="">   
                </div>
                <div class="main-content">
                    <h1>'.$row1["title"].'</h1>
                    <div class="stars"></div>
                    <span class="count-stars">(0)</span>
                    <p>'.$row1["mini_features"].'</p>
                    <div class="quantity-in-stock">
                         <span>Кол-во на складе:</span>
                         <span>10+</span>
                    </div>
                    
                    <div class="price-content">
                        <span>Цена:</span>
                        <span>'.group_numerals($row1["price"]).' руб.</span>
                    </div>
                    <div class="add-to-cart">
                        <a href="">добавить в корзину</a>
                    </div>
                </div>
                <div class="features-description">
                    <ul class="tabs">  
        <li class="active"><a href="#">Описание</a></li>
        <li><a href="#">Характеристики</a></li>
        <li><a href="#">Отзывы</a></li>
    </ul>  
    <div class="clear"></div>
    <div class="tabs_content">
        <div>'.$row1["description"].'</div>
        <div>'.$row1["features"].'</div>
        <div>
        <p id="link-send-review" align="center"><a href="#send-review" class="send-review">Написать отзыв</a></p>
        ';
                   
                   $query_reviews = mysql_query("SELECT * FROM table_reviews WHERE products_id='$id' AND moderat='1' ORDER BY reviews_id DESC", $link);
                   if (mysql_num_rows($query_reviews) > 0)
                   {
                       $row_reviews = mysql_fetch_array($query_reviews);
                       
                       do
                       {
                           
                           echo '<div class="block-reviews">
                 <p class="author-date">'.$row_reviews["name"].', '.$row_reviews["date"].'</p>
                 <img src="images/plus25.png" alt="">
                 <p class="textrev">'.$row_reviews["good_reviews"].'</p>
                 <img src="images/minus18.png" alt="">
                 <p class="textrev">'.$row_reviews["bad_reviews"].'</p>
                 <img src="images/comment33.png" alt="">
                 <p class="text-comment">'.$row_reviews["comment"].'</p>
                 
             </div> ';
                           
                       }while($row_reviews = mysql_fetch_array($query_reviews));
                       
                   }else
                   {
                       echo '<p class="title-no-info">Отзывов нет</p>';
                   }
        
    echo '
        
        
        
        
        </div>
    </div><!-- tabs content --> 
                </div>
                  
                        
                        ' ;
               }
               while ($row1 = mysql_fetch_array($result1));
            
                echo '<div id="send-review">
                  <p id="title-review" align="right">Публикация отзыва производится только после предварительной модерации!</p>
                  <ul>
                      <li>
                          <p align="right"><label id="label-name" for="">Имя<span>*</span></label><input maxlength="15" type="text" id="name_review"></p>
                      </li>
                      <li>
                          <p align="right"><label id="label-good" for="">Достоинства<span>*</span></label><textarea id="good_review"></textarea></p>
                      </li>
                      <li>
                          <p align="right"><label id="label-bad" for="">Недостатки<span>*</span></label><textarea id="bad_review"></textarea></p>
                      </li>
                      <li>
                          <p align="right"><label id="label-comment" for="">Комментарий<span>*</span></label><textarea id="comment_review"></textarea></p>
                      </li>
                  </ul>
                  
                  <p id="reload-img"><img src="images/bx_loader.gif" alt=""></p><p id="button-send-review" data-iid="'.$id.'">Отправить</p>
                  
              </div>';
                ?>
               
              
            
            
            </div>
            </div>
      <div class="clear-footer"></div>
      </div>
      
      <br clear="all" />
      <div class="clear-footer"></div>
       <?php
        include("include/block-footer.php");
    ?> 
</body>
</html>