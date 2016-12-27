<?php
include "connect.php";

$type = $_POST['motion_type'];

$query = "select * from tb_motionid where motion_type='$type';";
$result = $connect->query($query);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}

echo json_encode($row);

?>