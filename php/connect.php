<?php header("Content-Type: text/html; charset=UTF-8");

$mysql_host = 'localhost';
$mysql_user = 'tnwls0312';
$mysql_password = 'tn3125977';
$mysql_db = 'tnwls0312';

$connect = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$connect->query("set session character_set_connection=utf8;");
$connect->query("set session character_set_results=utf8;");
$connect->query("set session character_set_client=utf8;");

?>
