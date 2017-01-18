<?php
include_once "connect.php";

$index = $_GET['seq'];
$params = $_GET['cate_params'];
$values = $_GET['param_value'];
$table = $_GET['table'];

if(!strcmp($table,"tb_motionid")){
	$query = "update tb_motionid set ";

	$param_arr = split(",",$params);
	$value_arr = split(",,",$values);

	for($i=0;$i< sizeof($param_arr);$i++){
		if($i < (sizeof($param_arr)-1) ){
			$query .= $param_arr[$i]."='$value_arr[$i]', ";
		}
		else{
			$query .= $param_arr[$i]."='$value_arr[$i]'";
		}
	}

	$query .= " where seq= '$index';";
	if(!$connect->query($query)) throw new Exception($connect->error);
}
else if(!strcmp($table,"tb_category")){
	$param_arr = split(",",$params);
	$value_arr = split(";",$values);
	$param_value = split(",", $value_arr[3]);
	
	$check_query1 = "select seq from tb_category where cate_name='$value_arr[0]' and not seq='$index';";
	if(!($temp1 = $connect->query($check_query1))) throw new Exception($connect->error);

	$check_query2 = "select seq from tb_category where cate_serial='$value_arr[1]' and not seq='$index';";
	if(!($temp2 = $connect->query($check_query2))) throw new Exception($connect->error);

	if(($temp1->num_rows != 0) && ($temp2->num_rows != 0)) echo "카테고리의 이름과 고유키가 이미 존재합니다.";
	else if($temp1->num_rows != 0) echo "카테고리의 이름이 이미 존재합니다.";
	else if($temp2->num_rows != 0) echo "카테고리의 고유키가 이미 존재합니다.";
	else{
		//모션 아이디 DB에서 카테고리 수정
		$query = "update tb_motionid set motion_type='$value_arr[0]' where motion_type = (select cate_name from tb_category where seq = '$index');";

		if(!$connect->query($query)) throw new Exception($connect->error);

		//카테고리 DB에서 카테고리 수정
		$query = "update tb_category set cate_name='$value_arr[0]', cate_serial='$value_arr[1]', cate_params='$value_arr[2]', ";

		for($i=0;$i< sizeof($param_arr);$i++){
			if($i < (sizeof($param_arr)-1) ){ 
				$query .= $param_arr[$i]."='$param_value[$i]', ";
			}
			else{
				$query .= $param_arr[$i]."='$param_value[$i]'";
			}
		}

		$query .=	" where seq='$index';";
		if(!$connect->query($query)) throw new Exception($connect->error);
	}
	
}
?>