<?php
include "connect.php";

$name = $_POST['cate_name'];
$serial = $_POST['cate_serial'];
$params = $_POST['cate_params'];

$check_query = "select seq from tb_category where cate_name='$name' or cate_serial='$serial';";
$temp = $connect->query($check_query);

if(!($row = mysqli_fetch_row($temp))){ // 겹치지 않을 경우
	$query = "insert into tb_category (cate_name, cate_serial, cate_params) values ('$name','$serial','$params');";

	$connect->query($query); 
}
else echo "0";
 
?>