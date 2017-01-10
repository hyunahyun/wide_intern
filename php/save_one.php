<?php
include "connect.php";

$type = $_POST['motion_type'];
$id = $_POST['motion_id'];

//seq setting
$seq_query = "select MAX(seq) from tb_motionid;";
$result = $connect->query($seq_query);
$check = mysqli_fetch_row($result);

if($check[0] == null) $num = 1;
else $num = $check[0] + 1;


$query = "insert into tb_motionid (seq, motion_type, motion_id) values ('$num', '$type', '$id');";
$connect->query($query);

?>
