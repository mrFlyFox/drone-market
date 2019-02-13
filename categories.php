<?php 

    include("include/db_connect.php");
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
                    
                    
                    </ul>
                </li>
                <li><a href="">Комплектующие</a>
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