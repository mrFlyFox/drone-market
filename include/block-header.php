 <div class="header">
       <div class="top-header">
        <div class="mid">
            <div class="logo">
                <a href="index.php"><img src="images/logodronmarket.png" alt=""></a></div> 
            <div class="right-panel">
                <a class="top-info-panel" href="">Обратная связь</a>
                <p class="top-info-panel">+79188152342</p>
                <div class="search">
                   <form action="" method="get" role="search" autocomplete="off">
                    <input class="input-text" type="text" placeholder="Поиск">
                    
                        <input class="input-span-btn"   type="submit" value="" name="">
                    
                    </input>
                    </form>
                </div>
                <div class="delivery">
               <p>бесплатная доставка на территории рф</p>
               <p>быстрая международная доставка</p>
               </div>
               <div class="bottom-info-panel">
                <div class="cart">
                    <img src="images/cart.png" alt=""> 
                    <a href="cart.php?action=oneclick">Корзина <span id="itog-price-cart"></span></a>
                </div> 
                <div class="sign-in">
                   <?php
                    if ($_SESSION["auth"] == 'yes_auth')
                    {
                        echo '<img id="auth-user-info-img" src="images/user77.png" alt=""> 
                    <p id="auth-user-info-p">Здравствуйте, '.$_SESSION["auth_login"].'!</p>';
                    }else
                    {
                       echo ' <img src="images/lock24.png" alt=""> 
                    <p><a href="" class="top-auth">Войти</a> или <a href="registration.php">Зарегистрироваться</a></p>
                    ';
                    }
                    ?>
                    
                    <div class="block-top-auth">
                        <div class="corner"></div>
                        <form action="" method="post">
                            <ul class="input-email-pass">
                                <h3>Вход</h3>
                                <p id="message-auth">Неверный логин и(или) пароль</p>
                                <li>
                                    <center><input type="text" id="auth-login" placeholder="Логин или E-mail"></center>
                                </li>
                                <li><center><input type="password" id="auth-pass" placeholder="Пароль"><span id="button-pass-show-hide" class="pass-show"></span></center></li>
                            
                               <ul class="list-auth">
                                <li><input type="checkbox" id="rememberme" name="rememberme"><label for="rememberme">Запомнить меня</label></li>
                                <li><a href="" id="remindpass">Забыли пароль?</a></li>
                            </ul>
                            <p id="button-auth" align="center"><a href="#">Вход</a></p>
                            <p id="auth-loading" align="right"><img src="images/bx_loader.gif" alt=""></p>
                            </ul>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            </div>
        
        
        
        </div>
       
        </div>
         <div class="bottom-header">
            <div class="mid">
             <div class="main-menu">
              <ul>
                    <li><a href="">Главная</a></li>     
                  <li><a href="">Новинки</a></li> 
                  <li id="main-menu-drones">Коптеры<img src="images/caret5.png" alt=""></li>
                  <li>Комплектующие<img src="images/caret5.png" alt=""></li>
                  <li>Аксесcуары<img src="images/caret5.png" alt=""></li>
                  <li><a href="">Контакты</a></li>
              </ul> 
              
              </div>
            </div>
            <div id="menu-drone">
               
                <ul>
                              
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
                            <img src="images/1202_drone_1433.jpg" alt="">
                          
            
             </div>
        </div>
    </div>