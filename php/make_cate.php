<?php
include_once "connect.php";

$name = $_GET['cate_name'];
$serial = $_GET['cate_serial'];
$params = $_GET['cate_params'];
$values = $_GET['param_value'];

//seq setting
$seq_query = "select MAX(seq) from tb_category;";
if(!($result = $connect->query($seq_query))) throw new Exception($connect->error);

$check = mysqli_fetch_row($result);

if($check[0] == null) $num = 1;
else $num = $check[0] + 1;

$check_query = "select seq from tb_category where cate_name='$name' or cate_serial='$serial';";
if(!($temp = $connect->query($check_query))) throw new Exception($connect->error);

if($temp->num_rows == 0){ // 겹치지 않을 경우
	$param_arr = split(",",$params);
	$param_value = split(",",$values);
	
	//카테고리 추가
	$query = "insert into tb_category (seq, cate_name, cate_serial, cate_params";
	
	//필요 파라미터 추가
	if($param_arr[0] != ""){
		for($i=0;$i< sizeof($param_arr);$i++){
			$query .= ", $param_arr[$i]";
		}
	}
	
	$query .=	") values ('$num', '$name', '$serial', '$params'";
	
	if($param_value[0] != ""){
		for($i=0;$i< sizeof($param_value);$i++){
			$query .= ", '$param_value[$i]'";
		}
	}
		
	$query .=	");";

	if(!$connect->query($query)) throw new Exception($connect->error); 
}
else echo "can't adding!";
 
?>
 