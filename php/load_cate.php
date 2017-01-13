<?php
include_once "connect.php";

$query = "select cate_name from tb_category;";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);


?>