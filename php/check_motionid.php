<?php
include_once "connect.php";

$id = $_GET['motion_id'];
$type = $_GET['motion_type'];

$query = "select seq from tb_motionid where motion_type='$type' and motion_id='$id';";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$row = mysqli_fetch_row($result);
echo json_encode($row);

?>