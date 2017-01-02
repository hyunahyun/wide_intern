<?php
include "connect.php";

$index = $_POST['seq'];
$params = $_POST['cate_params'];
$table = $_POST['table'];


if(!strcmp($table, "tb_motionid")){
	//카테고리 별 파라미터 검색
	$query = "select seq, motion_type, motion_id";

	//카테고리 별 파라미터 추출
	$arr = split(",",$params);
	for($i=0;$i< sizeof($arr);$i++){
		$temp = ", $arr[$i]";
		$query .= $temp;
	}

	$query .= " from tb_motionid where seq='$index';";
}

else if(!strcmp($table, "tb_category")){
	$query = "select seq, cate_name, cate_serial, cate_params from tb_category where seq='$index';";
}

$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>