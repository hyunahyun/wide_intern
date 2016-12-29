<?php
include "connect.php";

$type = $_POST['motion_type'];
$params = $_POST['cate_params'];


$query = "select seq, motion_type, motion_id ";

//카테고리 별 파라미터 추출
//$arr = split(",",$params);
//for($i=0;$i< sizeof($arr);$i++){
//	$query .= ", $arr[$i] ";
//}

$query .= "from tb_motionid where motion_type='$type' order by seq asc;"
	
$result = $connect->query($query);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}

echo json_encode($row);

?>