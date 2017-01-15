<?php
include_once "connect.php";

$index = $_GET['seq'];
$params = $_GET['cate_params'];
$table = $_GET['table'];


if(!strcmp($table, "tb_motionid")){
	//카테고리 별 파라미터 검색
	$query = "select seq, motion_type, motion_id";

	//카테고리 별 파라미터 추출
	if(strlen($params)>0){
		$arr = split(",",$params);
		for($i=0;$i< sizeof($arr);$i++){
			$temp = ", $arr[$i]";
			$query .= $temp;
		}
	}

	$query .= " from tb_motionid where seq='$index';";
}

else if(!strcmp($table, "tb_category")){
	$query = "select seq, cate_name, cate_serial, cate_params from tb_category where seq='$index';";
}

if(!($result = $connect->query($query))) throw new Exception($connect->error);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>