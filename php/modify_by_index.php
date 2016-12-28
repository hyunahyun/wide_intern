<?php
include "connect.php";

$index = $_POST['seq'];
$type = $_POST['motion_type'];
$id = $_POST['motion_id'];
$param1 = $_POST['param1'];
$param2 = $_POST['param2'];
$param3 = $_POST['param3'];

//카테고리 별 추가 파라미터 정보 받기
if(!strcmp($type, "pen")){
	$pen_param1 = $_POST['pen_param1'];
	$pen_param2 = $_POST['pen_param2'];
	$pen_param3 = $_POST['pen_param3'];
	$pen_param4 = $_POST['pen_param4'];
	
	$query = "update tb_motionid set motion_type='$type', motion_id='$id', param1='$param1', param2='$param2', param3='$param3', pen_param1='$pen_param1', pen_param2='$pen_param2', pen_param3='$pen_param3', pen_param4='$pen_param4' where seq='$index';";

}
else if(!strcmp($type, "joystick")){
	$joystick_param1 = $_POST['joystick_param1'];
	$joystick_param2 = $_POST['joystick_param2'];
	$joystick_param3 = $_POST['joystick_param3'];
	$joystick_param4 = $_POST['joystick_param4'];
	$joystick_param5 = $_POST['joystick_param5'];
	
	$query = "update tb_motionid set motion_type='$type', motion_id='$id', param1='$param1', param2='$param2', param3='$param3', joystick_param1='$joystick_param1', joystick_param2='$joystick_param2', joystick_param3='$joystick_param3', joystick_param4='$joystick_param4', joystick_param5='$joystick_param5' where seq='$index';";

}

$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>