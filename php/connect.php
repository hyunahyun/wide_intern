<?php header("Content-Type: text/html; charset=UTF-8");

$mysql_host = 'localhost';
<<<<<<< HEAD
$mysql_user = 'tnwls0312';
$mysql_password = 'tn3125977';
$mysql_db = 'tnwls0312';
=======
$mysql_user = 'root';
$mysql_password = '';
$mysql_db = 'intern';
>>>>>>> bc1f7b88085798142e07ab5b047e1fda0bbee6f1

$connect = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$connect->query("set session character_set_connection=utf8;");
$connect->query("set session character_set_results=utf8;");
$connect->query("set session character_set_client=utf8;");

?>
