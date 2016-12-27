<?php header("Content-Type: text/html; charset=UTF-8");

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'oQk8yiultO4Q';
$mysql_db = 'intern';

$connect = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$connect->query("set session character_set_connection=utf8;");
$connect->query("set session character_set_results=utf8;");
$connect->query("set session character_set_client=utf8;");

?>
