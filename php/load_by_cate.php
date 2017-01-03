<?php

include "connect.php";

$type = $_POST['motion_type'];
$params = $_POST['cate_params'];
$page = $_POST['page'];

$start_num = ($page - 1) * 10;

//카테고리 별 파라미터 검색
$query = "select seq, motion_type, motion_id";

//카테고리 별 파라미터 추출
if($params != null){
	$arr = split(",",$params);
	for($i=0;$i< sizeof($arr);$i++){
		$temp = ", $arr[$i]";
		$query .= $temp;
	}
}

$query .= " from tb_motionid where motion_type='$type' order by seq asc";

if(!strcmp($page, "1")) $query .= " limit 0,10;";
else $query .= " limit $start_num,10;";

$result = $connect->query($query);

if($result == null) echo "0";
else{
	$n = 0;
	while($count = mysqli_fetch_row($result)){
		$row[$n++] = $count;
	}
	echo json_encode($row);
}

?>