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

$_SESSION['urlpage'] = "<a href='index.php'>Главная</a> \ <a href='tovar.php'>Товары</a>";
include("include/db_connect.php");
    
    $action = $_GET["action"];
    if (isset($action))
    {
        $id = (int)$_GET["id"];
        switch($action){
            case 'delete':
                $delete = mysql_query("DELETE FROM table_products WHERE products_id= '$id'", $link);
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Панель Управления</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/jquery-confirm.css">
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
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
   <script src="javascript/js-jquery-1.7.2.min.js"></script>
    <script src="javascript/jquery-confirm.js"></script>
    <script src="javascript/script.js"></script>
    
</head>
<body>
  
   
     <div id="block-body">
    <?php
    include("include/block-header.php");
    $all_count = mysql_query("SELECT * FROM table_products", $link);
    $all_count_result = mysql_num_rows($all_count);
    ?>
    <div id="block-content">
      <div id="block-parameters">
          <p id="title-page">Общая статистика</p>
      </div>  
      
      <div id="block-info">
          <p id="count-style">Всего товаров - <strong><?php echo $all_count_result;?></strong></p>
          
          <p align="right" id="add-style"><a href="add_product.php">Добавить товар</a></p>
      </div>
      <ul id="block-tovar">
          <?php
          $num = 8;
            $page = (int)$_GET['page'];
    
        $count = mysql_query("SELECT COUNT(*) FROM table_products $cat", $link);
        $temp = mysql_fetch_array($count);
        $post = $temp[0];
        // Находим общее число страниц
        $total = (($post-1)/$num)+1;
        $total = intval($total);
        // Определяем начало сообщений для текущей страницы
        $page = intval($page);
        // Если значение $page меньше единицы или отрицательно
        // переходим на первую страницу
        // А если слишком большое, то переходим на последнюю
        if (empty($page) or $page < 0) $page = 1;
        if ($page > $total) $page = $total;
        // Вычисляем начиная с какого номера следует выводить сообщения
        $start = $page * $num - $num;
        if ($temp[0] > 0)
        {
            $result = mysql_query("SELECT * FROM table_products $cat ORDER BY products_id DESC LIMIT $start, $num", $link);
            if (mysql_num_rows($result) > 0)
            {
                $row = mysql_fetch_array($result);
                do
                {
                    echo '<li>
                    <p>'.$row["title"].'</p>
                    <center>
                    <img src="../uploads_images/'.$row["image"].'">
                    </center>
                    <p align="center" class="link-action">
                    <a class="green" href="edit_products.php?id='.$row["products_id"].'">Изменить</a> | <a  rel="tovar.php?'.$url.'id='.$row["products_id"].'&action=delete" class="delete">Удалить</a></p></li>';
                } while ($row = mysql_fetch_array($result));
            }
        }
    echo '</ul>';
    
    if ($page != 1){$pstr_prev = '<li><a class="pstr-prev" href="tovar.php?page='.($page - 1).'">&lt;</a></li>';}
    if ($page != $total){$pstr_next = '<li><a class="pstr-next" href="tovar.php?page='.($page + 1).'">&gt;</a></li>';}
    
    //Формируем сслки со страницами
    if ($page -5 > 0) {$page5left = '<li><a href="tovar.php?'.$url.'page='.($page - 5).'">'.($page - 5).'</a></li>';}
    if ($page -4 > 0) {$page4left = '<li><a href="tovar.php?'.$url.'page='.($page - 4).'">'.($page - 4).'</a></li>';}
    if ($page -3 > 0) {$page3left = '<li><a href="tovar.php?'.$url.'page='.($page - 3).'">'.($page - 3).'</a></li>';}
    if ($page -2 > 0) {$page2left = '<li><a href="tovar.php?'.$url.'page='.($page - 2).'">'.($page - 2).'</a></li>';}
    if ($page -1 > 0) {$page1left = '<li><a href="tovar.php?'.$url.'page='.($page - 1).'">'.($page - 1).'</a></li>';}
    
    if ($page +5 <= $total) {$page5right = '<li><a href="tovar.php?'.$url.'page='.($page + 5).'">'.($page + 5).'</a></li>';}
    if ($page +4 <= $total) {$page4right = '<li><a href="tovar.php?'.$url.'page='.($page + 4).'">'.($page + 4).'</a></li>';}
    if ($page -3 <= $total) {$page3right = '<li><a href="tovar.php?'.$url.'page='.($page + 3).'">'.($page + 3).'</a></li>';}
    if ($page +2 <= $total) {$page2right = '<li><a href="tovar.php?'.$url.'page='.($page + 2).'">'.($page + 2).'</a></li>';}
    if ($page +1 <= $total) {$page1right = '<li><a href="tovar.php?'.$url.'page='.($page + 1).'">'.($page + 1).'</a></li>';}
    
    if ($page + 5 < $total)
    {
        $strtototal = '<li><p class="nav-point">...</p></li><li><a href="tovar.php?'.$url.'page='.$total.'"></a></li>';
    }else {$strtotal = "";}
          ?>
          <div id="footerfix"></div>
          <?php
          if ($total > 1)
          {
              echo '<center><div class="pstrnav"><ul>';
              echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='tovar.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right;
              echo '</center></ul></div>';
          }
          ?>
          
      
    </div>
  </div>
</body>
</html>
<?php
}else{header("Location: login.php");}?>