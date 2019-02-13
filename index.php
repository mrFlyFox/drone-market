<?php
session_start();
if($_SESSION['auth_admin'] == 'yes_auth')
{
define("myeshop", true);

    if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

$_SESSION['urlpage'] = "<a href='index.php'>Главная</a>";
include("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Панель Управления</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
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
  
   
     <div id="block-body">
    <?php
    include("include/block-header.php");
    ?>
    <div id="block-content">
      <div id="block-parameters">
          <p id="title-page">Общая статистика</p>
      </div>  
    </div>
  </div>
</body>
</html>
<?php
}else{header("Location: login.php");}?>