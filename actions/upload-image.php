<?php
defined("myeshop") or die('Доступ запрещен!');
$error_img = array();

if ($_FILES['upload_image']['error'] > 0)
{
    //В зависимости от номера ошибки віводим соответствующее сообщение
    switch($_FILES['upload_image']['error'])
    {
        case 1: $error_img[] = 'Размер файла превышает допустимое значение  UPLOAD_MAX_FILE_SIZE'; break;
        case 2: $error_img[] = 'Размер файла превышает допустимое значе MAX_FILE_SIZE'; break;
        case 3: $error_img[] = 'Не удалось загрузить часть файла'; break;
        case 4: $error_img[] = 'Файл не был загружен'; break;
        case 6: $error_img[] = 'Отсутствует временная папка'; break;
        case 7: $error_img[] = 'Не удалось записать фаул на диск'; break;
        case 8: $error_img[] = 'PHP-расширение остановило загрузку фаула'; break;
         break;
    }
}else
{
    if ($_FILES['upload_image']['type'] == 'image/jpeg' || $_FILES['upload_image']['type'] == 'image/jpg' || $_FILES['upload_image']['type'] == 'image/png')
    {
        $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_image']['name']));
        
        //Папка для загрузки
        $uploaddir = "../uploads_images/";
        //Новое сгенерированное имя
        $newfilename = $_POST["form_type"].'-'.$id.rand(10,100).'.'.$imgext;
        //путь к файлу (папка.файл)
        $uploadfile = $uploaddir.$newfilename;
        //загружаем файл move_uploaded_file
        if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadfile))
        {
            $update = mysql_query("UPDATE table_products SET image='$newfilename' WHERE products_id='$id'");
        }else
        {
            $error_img[] = "Ошибка загрузки файла";
        }
    }else
    {
       $error_img[] = "Допустимые расширения: jpeg, jpg, png"; 
    }
}
?>