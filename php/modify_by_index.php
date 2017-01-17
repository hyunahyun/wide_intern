<?php
include_once "connect.php";

$index = $_GET['seq'];
$params = $_GET['cate_params'];
$values = $_GET['param_value'];
$table = $_GET['table'];

if(!strcmp($table,"tb_motionid")){
	$query = "update tb_motionid set ";

	$param_arr = split(",",$params);
	$value_arr = split(",",$values);

	for($i=0;$i< sizeof($param_arr);$i++){
		if($i < (sizeof($param_arr)-1) ){
			$temp = "$param_arr[$i]='$value_arr[$i]', ";
			$query .= $temp;
		}
		else{
			$temp = "$param_arr[$i]='$value_arr[$i]'";
			$query .= $temp;
		}
	}

	$query .= " where seq= '$index';";
	
}
else if(!strcmp($table,"tb_category")){
	$param_arr = split(",",$params);
	$value_arr = split(";",$values);
	$param_value = split(",", $value_arr[3]);
	 
	//모션 아이디 DB에서 카테고리 수정
	$query = "update tb_motionid set motion_type='$value_arr[0]' where motion_type = (select cate_name from tb_category where seq = '$index');";
	
	if(!$connect->query($query)) throw new Exception($connect->error);

	//카테고리 DB에서 카테고리 수정
	$query = "update tb_category set cate_name='$value_arr[0]', cate_serial='$value_arr[1]', cate_params='$value_arr[2]', ";
		
	for($i=0;$i< sizeof($param_arr);$i++){
		if($i < (sizeof($param_arr)-1) ){ 
			$temp = "$param_arr[$i]='$param_value[$i]', ";
			$query .= $temp;
		}
		else{
			$temp = "$param_arr[$i]='$param_value[$i]'";
			$query .= $temp;
		}
	}
		
	$query .=	" where seq='$index';";
}

if(!$connect->query($query)) throw new Exception($connect->error);

?>