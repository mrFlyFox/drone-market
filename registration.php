<?php
    include("include/db_connect.php");
//    include("functions/functions.php");
    session_start();

    include("include/auth-cookie.php");
//unset($_SESSION["auth"]);
    //setcookie('rememberme', '', 0,'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drone Market - Регистрация</title>
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
    
    <script >
        $(document).ready(function(){
            $('#form-reg').validate(
            {
                //правила для проверки
                rules:{
                    "reg_login":{
                        required: true,
                        minlength: 5,
                        remote:{
                            type: "post",
                            url: "reg/check_login.php"
                        }
                    },
                    "reg_pass":{
                        required:true,
                        minlength: 7,
                        maxlength:15
                    },
                     "reg_surname":{
                        required:true,
                        minlength: 2,
                        maxlength: 20
                    },
                     "reg_name":{
                        required:true,
                        minlength: 2,
                        maxlength:20
                    },
                     "reg_patronymic":{
                        required:true,
                        minlength: 2,
                        maxlength:20
                    },
                     "reg_email":{
                        required:true,
                        email: true
                    },
                     "reg_phone":{
                        required:true
                    },
                     "reg_address":{
                        required:true
                    },
                     "reg_captcha":{
                        required: true,
                        remote: {
                        type: "post",
                        url: "reg/check_captcha.php"    
                        }
                    }
                },
                
                //выводимые сообщения при нарушении правил
                messages: {
                        "reg_login": {
                            required: "Укажите Логин!",
                            minlength: "От 5 до 15 символов!",
                            maxlength: "От 5 до 15 символов!",
                            remote: "Логин занят!"
                        },
                        "reg_pass":{
                            required:"Укажите Пароль!",
                            minlength: "От 7 до 15 символов!",
                            maxlength: "От 7 до 15 символов!"
                        },
                        "reg_surname":{
                            required: "Укажите вашу фамилию!",
                            minlength: "От 2 до 20 символов!",
                            maxlength: "От 2 до 20 символов!"
                        },
                        "reg_name":{
                            required: "Укажите ваше Имя!",
                            minlength: "От 2 до 20 символов!",
                            maxlength: "От 2 до 20 символов!"
                        },
                        "reg_patronymic":{
                            required: "Укажите ваше Отчество!",
                            minlength: "От 2 до 20 символов!",
                            maxlength: "От 2 до 20 символов!"
                        },
                        "reg_email":{
                            required: "Укажите свой E-mail",
                            email: "Не корректный E-mail"
                        },
                        "reg_phone":{
                            required: "Укажите номер телефона!"
                        },
                        "reg_address":{
                            required: "Необходимо указать адрес доставки!"
                        },
                        "reg_captcha":{
                            required: "Введите код с картинки!",
                            remote: "Не верный код проверки!"
                        }
                },
                submitHandler: function(form){
                    $(form).ajaxSubmit({
                        success: function(data){
                            if (data == 'true')
                            {
                                $("#block-form-registration").fadeOut(300, function(){
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
                                    $("#form_submit").hide();
                                });
                            }
                            else
                                {
                                    $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                                }
                        }
                    });
                }
            });
        });
    </script>
    
      <div class="content">
       <div class="mid">
          <h1 class="h1-title">Регистрация</h1>
           <form action="reg/handler_reg.php" method="post" id="form-reg">
            <p id="reg_message"></p> 
            <div id="block-form-registration">
                <ul id="form-registration">
                    <li>
                        <label for="">Логин</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_login" id="reg_login">
                    </li>
                     <li>
                        <label for="">Пароль</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_pass" id="reg_pass">
                        <span id="gen_pass">Сгенерировать</span>
                    </li>
                    <li>
                        <label for="">Фамилия</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_surname" id="reg_surname">
                    </li>
                    <li>
                        <label for="">Имя</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_name" id="reg_name">
                    </li>
                    <li>
                        <label for="">Отчество</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_patronymic" id="reg_patronymic">
                    </li>
                    <li>
                        <label for="">E-mail</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_email" id="reg_email">
                    </li>
                    <li>
                        <label for="">Мобильный телефон</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_phone" id="reg_phone">
                    </li>
                    <li>
                        <label for="">Адрес доставки</label>
                        <span class="zvezda">*</span>
                        <input type="text" name="reg_address" id="reg_address">
                    </li>
                    <li>
                        
                        <div id="block-captcha">
                        <label for="">Защитный код</label>
                        <img src="reg/reg_captcha.php" alt="">
                        <input type="text" name="reg_captcha" id="reg_captcha">
                        <p id="reloadcaptcha">Обновить</p>
                    </div></li>
                </ul>
            </div> 
            <p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"></p>
           </form>
           
           
       </div>
       
       
       
       
       
       </div>
      
      
      
      <br clear="all" />
      <div class="clear-footer"></div>
       <?php
        include("include/block-footer.php");
    ?> 
</body>
</html>