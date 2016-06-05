<?php
$db = mysql_connect("localhost","root","") or die("MySQL сервер недоступен!".mysql_error());
mysql_select_db('diplom', $db) or die("Нет соединения с БД".mysql_error());
mysql_set_charset("utf8");
?>