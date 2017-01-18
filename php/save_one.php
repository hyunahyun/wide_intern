<?php
include_once "connect.php";

$type = $_GET['motion_type'];
$id = $_GET['motion_id'];

//seq setting
$seq_query = "select MAX(seq) from tb_motionid;";
if(!($result = $connect->query($seq_query))) throw new Exception($connect->error);
$check = mysqli_fetch_row($result);

if($check[0] == null) $num = 1;
else $num = $check[0] + 1;

$query = "insert into tb_motionid (seq, motion_type, motion_id) values ('$num', '$type', '$id');";
if(!$connect->query($query)) throw new Exception($connect->error);

?>
