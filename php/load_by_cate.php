<?php

include_once "connect.php";

$type = $_GET['motion_type'];
$page = $_GET['page'];
$check = $_GET['check'];

$start_num = ($page - 1) * 10;

if(!strcmp($check, "all_load")) $query = "select * from tb_motionid order by seq asc";
else $query = "select * from tb_motionid where motion_type='$type' order by seq asc";


if(!strcmp($page, "1")) $query .= " limit 0,10;";
else $query .= " limit $start_num,10;";

if(!($result = $connect->query($query))) throw new Exception($connect->error);

if($result == null) echo "0";
else{
	$n = 0;
	while($count = mysqli_fetch_row($result)){
		$row[$n++] = $count;
	}
	echo json_encode($row);
}

?>