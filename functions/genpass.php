<?php

$number = 10;
    
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 '1','2','3','4','5','6',
                 '7','8','9','0');

    // ГЕНЕРИРУЕМ ПАРОЛЬ

$pass ="";

    for ($i=0; $i < $number; $i++)
    {
        // ВЫЧИСЛЯЕМ СЛУЧАЙНЫЙ ИНДЕКС МАССИВА
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
        
    }
echo $pass;

?>