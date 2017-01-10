<?php
include "connect.php";

$name = $_POST['cate_name'];
$serial = $_POST['cate_serial'];
$params = $_POST['cate_params'];

//seq setting
$seq_query = "select MAX(seq) from tb_category;";
$result = $connect->query($seq_query);
$check = mysqli_fetch_row($result);

if($check[0] == null) $num = 1;
else $num = $check[0] + 1;


$check_query = "select seq from tb_category where cate_name='$name' or cate_serial='$serial';";
$temp = $connect->query($check_query);

if(!($row = mysqli_fetch_row($temp))){ // 겹치지 않을 경우
	$query = "insert into tb_category (seq, cate_name, cate_serial, cate_params) values ('$num', '$name','$serial','$params');";

	$connect->query($query); 
}
else echo "0";
 
?>
