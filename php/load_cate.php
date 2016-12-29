<?php
include "connect.php";

$query = "select cate_name from tb_category;";
$result = $connect->query($query);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>