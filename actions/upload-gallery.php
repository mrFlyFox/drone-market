<?php
defined("myeshop") or die('Доступ запрещен!');

if ($_FILES['galleryimg']['name'][0])
{
    //В зависимости от номера ошибки віводим соответствующее сообщение
   for ($i = 0; $i < count($_FILES['galleryimg']['name']); $i++)
   {
       $error_gallery = "";
       if($_FILES['galleryimg']['name'][$i])
       {
           $galleryimgType = $_FILES['galleryimg']['type'][$i];
           $types = array("image/gif", "image/png", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png");
           $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['galleryimg']['name'][$i]));
           $uploaddir = "../uploads/images/";
           //Новое сгенерированное имя
        $newfilename = $_POST["form_type"].'-'.$id.rand(100,500).'.'.$imgext;
        //путь к файлу (папка.файл)
        $uploadfile = $uploaddir.$newfilename;
           
           if (!in_array($galleryimgType, $types))
           {
               $error_gallery = "<p id='form_error'>Допустимые расширения: gif, jpeg, jpg, png </p>";
               $_SESSION['answer'] = $error_gallery;
               continue;
           }
           if(empty($error_gallery))
               if(@move_uploaded_file($_FILES['galleryimg']['tmp_name'][$i], $uploadfile))
               {
                   mysql_query("INSERT INTO uploads_images(products_id,image)
                   VALUES('".$id."',
                            '".$newfilename."')", $link);
               }else
               {
                   $_SESSION['answer'] = "Ошибка загрузки файла!";
               }
       }
   }
}
?>