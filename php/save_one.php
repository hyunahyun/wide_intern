<?php
include "connect.php";

$type = $_POST['motion_type'];
$id = $_POST['motion_id'];

$query = "insert into tb_motionid (motion_type, motion_id) values ('$type', '$id');";
$result = $connect->query($query);

?>