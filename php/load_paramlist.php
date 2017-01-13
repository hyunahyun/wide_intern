<?php
include_once "connect.php";

$query = "show full columns from tb_motionid;";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>