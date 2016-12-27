<?php
include "connect.php";

$index = $_POST['seq'];
$type = $_POST['motion_type'];
$id = $_POST['motion_id'];
$ver = $_POST['motion_ver'];
$state = $_POST['motion_state'];

$query = "update tb_motionid set motion_type='$type', motion_id='$id', motion_ver='$ver', motion_state='$state' where seq='$index';";
$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>