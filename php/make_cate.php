<?php
include_once "connect.php";

$name = $_GET['cate_name'];
$serial = $_GET['cate_serial'];
$params = $_GET['cate_params'];
$testing_index = $_GET['testing_seq'];

//seq setting
$seq_query = "select MAX(seq) from tb_category;";
if(!($result = $connect->query($seq_query))) throw new Exception($connect->error);

$check = mysqli_fetch_row($result);

if($check[0] == null) $num = 1;
else $num = $check[0] + 1;

if($testing_index != null) $num = $testing_index;

$check_query = "select seq from tb_category where cate_name='$name' or cate_serial='$serial';";
if(!($temp = $connect->query($check_query))) throw new Exception($connect->error);

$row = mysqli_fetch_row($temp);

if(!$row){ // 겹치지 않을 경우
	$query = "insert into tb_category (seq, cate_name, cate_serial, cate_params) values ('$num', '$name','$serial','$params');";

	if(!$connect->query($query)) throw new Exception($connect->error); 
}
else if($row) echo 0;

 
?>
 