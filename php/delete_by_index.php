<?php
include_once "connect.php";

$index = $_GET['seq'];
$table = $_GET['table'];

if(!strcmp($table,"tb_category")){
	$query = "delete from tb_motionid where motion_type = (select cate_name from tb_category where seq = '$index');";
	if(!$connect->query($query)) throw new Exception($connect->error);
}

$query = "delete from $table where seq = '$index';";
if(!$connect->query($query)) throw new Exception($connect->error);
?>