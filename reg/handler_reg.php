<?php
session_start();

include("../include/db_connect.php");
include("../functions/functions.php");

$error = array();
            //убрать преобразование iconv("UTF-8", "cp1251" когда будешь переносить на хостинг, может не корректно работать код
    $login = iconv("UTF-8", "cp1251", strtolower(clear_string($_POST['reg_login'])));
    $pass = iconv("UTF-8", "cp1251", strtolower(clear_string($_POST['reg_pass'])));
    $surname = iconv("UTF-8", "cp1251", strtolower($_POST['reg_surname']));

    $name = iconv("UTF-8", "cp1251", strtolower($_POST['reg_name']));
    $patronymic = iconv("UTF-8", "cp1251", strtolower($_POST['reg_patronymic']));
    $email = iconv("UTF-8", "cp1251", strtolower($_POST['reg_email']));

    $phone = iconv("UTF-8", "cp1251", strtolower($_POST['reg_phone']));
    $address = iconv("UTF-8", "cp1251", strtolower($_POST['reg_address']));

if (strlen($login)< 5 or strlen($login) > 15)
{
    $error[] = "Логин должен быть от 5 до 15 символов!";
}else
{
    $result = mysql_query("SELECT login FROM reg_user WHERE login='$login'", $link);
    if (mysql_num_rows($result) > 0)
    {
        $error[] = "Логин занят!";
    }
}

if (strlen($pass) < 7 or strlen($pass) > 15) $error[] = "Укажите пароль от 7 до 15 сиволов!"; 
if (strlen($surname) < 2 or strlen($surname) > 20) $error[] = "Укажите Фамилию от 2 до 20 сиволов!"; 
if (strlen($name) < 2 or strlen($name) > 20) $error[] = "Укажите Имя от 2 до 20 сиволов!"; 
if (strlen($patronymic) < 2 or strlen($patronymic) > 20) $error[] = "Укажите Отчество от 2 до 20 сиволов!"; 
if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Укажите корректный email!";
if (!$phone) $error[] = "Укажите номер телефона!";
if (!$address) $error[] = "Необходимо указать адрес доставки!";
if ($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) $error[] = "Неверный код с картинки!";

unset($_SESSION['img_captcha']);

if (count($error))
{
    echo implode('<br />', $error);
}else
{
    $pass = md5($pass);
    $pass = strrev($pass);
    $pass = "9nm2rv8q".$pass."2yo6z";
    
    $ip = $_SERVER['REMOTE_ADDR'];
    
    mysql_query("INSERT INTO reg_user(login, pass, surname, name, patronymic, email, phone, address, datetime, ip) VALUES(
                                            '".$login."',
                                            '".$pass."',
                                            '".$surname."',
                                            '".$name."',
                                            '".$patromymic."',
                                            '".$email."',
                                            '".$phone."',
                                            '".$address."',
                                            NOW(),
                                            '".$ip."')", $link);
    echo 'true'; 
    
    
}

?>