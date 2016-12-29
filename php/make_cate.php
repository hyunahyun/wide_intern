<?php
include "connect.php";

$name = $_POST['cate_name'];
$serial = $_POST['cate_serial'];
$params = $_POST['cate_params'];

$query = "insert into tb_category (cate_name, cate_serial, cate_params) values ('$name','$serial','$params');";

$connect->query($query);

$arr = split(",",$params);
for($i=0;$i< sizeof($arr);$i++){
  $query = "alter table tb_motionid add $arr[$i] varchar(255);";
	$connect->query($query);
}

?>