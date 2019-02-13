<?php
    session_start();
    define("myeshop", true);
    include("include/db_connect.php");
    include("include/functions.php");

    if($_POST["submit_enter"])
    {
        $login = clear_string($_POST["input_login"]);
        $pass = clear_string($_POST["input_pass"]);
        
        if ($login && $pass)
        {
//            $pass = md5($pass); 
//            $pass = strrev($pass);
//            $pass = strtolower("mb03foo51".$pass."qj2jjdp9");
            
            $result = mysql_query("SELECT * FROM reg_admin WHERE login = '$login' AND pass='$pass'", $link);
            
            if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);
                $_SESSION['auth_admin'] = 'yes_auth';
                header("Location: index.php");
            }else
            {
                $msgerror = "Неверный логин и(или) пароль!";
            }
        }else
        {
            $msgerror = "Заполните все поля!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Панель Управления - Вход</title>
    <link rel="stylesheet" href="../admin/style/reset.css">
    <link rel="stylesheet" href="../admin/style/style-login.css">
</head>
<body>
   <div id="block-pass-login">
      <?php
       if ($msgerror)
       {echo '<p id="msgerror">'.$msgerror.'</p> ';}
       ?>
       
       <form action="" method="post">
           <ul id="pass-login">
               <li><label for="">Login</label><input type="text" name="input_login"></li>
               <li><label for="">Password</label><input type="password" name="input_pass"></li>
           </ul>
           <p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Log in"></p>
       </form>
   </div>
    
</body>
</html>