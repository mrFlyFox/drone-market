<?php 

$db_host ='localhost';
$db_user ='admin_crossfox';
$db_pass ='06101995[]crossfox_';
$db_database='db_dronemarket';

$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_database, $link) or die("Нет соединения с БД".mysql_error());
mysql_query("SET name cp1251");

?>