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

$row = mysqli_fetch_row($temp);

if(!$row){ // 겹치지 않을 경우
	
	//카테고리 추가
	$query = "insert into tb_category (seq, cate_name, cate_serial, cate_params) values ('$num', '$name','$serial','$params');";
	if(!$connect->query($query)) throw new Exception($connect->error); 

	$param_arr = split(",",$params);
	$param_value = split(",",$values);
	
	//필요 파라미터 업데이트
	$query = "update tb_category set ";
		
	for($i=0;$i< sizeof($param_arr);$i++){
		if($i < (sizeof($param_arr)-1) ){ 
			$temp = $param_arr[$i]."='$param_value[$i]', ";
			$query .= $temp;
		}
		else{
			$temp = "$param_arr[$i]='$param_value[$i]'";
			$query .= $temp;
		}
	}
		
	$query .=	" where seq='$num';";

	if(!$connect->query($query)) throw new Exception($connect->error); 
}
else echo "can't adding!";
 
 
?>
 