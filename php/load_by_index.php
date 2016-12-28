<?php
include "connect.php";

$type = $_POST['motion_type'];
$index = $_POST['seq'];

//카테고리 별 파라미터 검색

if(!strcmp($type, "pen")) $query = "select motion_type, motion_id, param1, param2, param3, pen_param1, pen_param2, pen_param3, pen_param4 from tb_motionid where seq='$index';";
else if(!strcmp($type, "joystick")) $query = "select motion_type, motion_id, param1, param2, param3, joystick_param1, joystick_param2, joystick_param3, joystick_param4, joystick_param5 from tb_motionid where seq='$index';";

$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>