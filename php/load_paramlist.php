<?php
include "connect.php";

$query = "show full columns from tb_motionid;";
$result = $connect->query($query);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>