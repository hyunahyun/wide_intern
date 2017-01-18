<?php

include_once "connect.php";

$type = $_GET['motion_type'];
$check = $_GET['check'];

if(!strcmp($check, "all_load")) $query = "select count(*) from tb_motionid;";
else $query = "select count(*) from tb_motionid where motion_type='$type';";

if(!($result = $connect->query($query))) throw new Exception($connect->error);

$row = mysqli_fetch_row($result);
echo json_encode($row);


?>