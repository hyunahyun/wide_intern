<?php
include "connect.php";

$id = $_POST['motion_id'];
$type = $_POST['motion_type'];

$query = "select * from tb_motionid where motion_type='$type' and motion_id='$id';";
$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>