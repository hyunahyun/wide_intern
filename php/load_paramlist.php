<?php
include_once "connect.php";

$table = $_GET['table'];

if(!strcmp($table, 'tb_category')) $query = "show full columns from tb_category;";
else if(!strcmp($table, 'tb_motionid')) $query = "show full columns from tb_motionid;";

if(!($result = $connect->query($query))) throw new Exception($connect->error);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>