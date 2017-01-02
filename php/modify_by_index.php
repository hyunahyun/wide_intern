<?php
include "connect.php";

$index = $_POST['seq'];
$params = $_POST['cate_params'];
$values = $_POST['param_value'];
$table = $_POST['table'];

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
	$value_arr = split(";",$values);
	
	//카테고리 데이터 존재 여부 체크
	$query = "select seq from tb_motionid where motion_type = (select cate_name from tb_category where seq = '$index');";
	$result = $connect->query($query);
	
	if($row = mysqli_fetch_row($result)){ // 있으면
		//tb_motionid 수정 - 카테고리 이름
		$query = "update tb_motionid set motion_type='$value_arr[0]' where motion_type = (select cate_name from tb_category where seq = '$index');";
		$connect->query($query);

		// tb_category 수정
		$query = "update tb_category set cate_name='$value_arr[0]', cate_params='$value_arr[2]' where seq='$index';";
	}
	else{ // 없으면
		// tb_category 수정
		$query = "update tb_category set cate_name='$value_arr[0]', cate_serial='$value_arr[1]', cate_params='$value_arr[2]' where seq='$index';";
	}
}

$connect->query($query);

?>