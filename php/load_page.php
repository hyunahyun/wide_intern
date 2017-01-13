<?php

include_once "connect.php";

$type = $_GET['motion_type'];

//카테고리 별 파라미터 검색
$query = "select count(*) from tb_motionid where motion_type='$type';";

if(!($result = $connect->query($query))) throw new Exception($connect->error);

$count = mysqli_fetch_row($result);
echo json_encode($count);


?>