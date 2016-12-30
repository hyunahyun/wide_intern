<?php

include "connect.php";

$type = $_POST['motion_type'];

//카테고리 별 파라미터 검색
$query = "select count(*) from tb_motionid where motion_type='$type';";

$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>