<?php

include_once "connect.php";

$page = $_GET['page'];

$start_num = ($page - 1) * 10;

$query = "select seq, cate_name, cate_serial from tb_category order by seq asc";

if(!strcmp($page, "1")) $query .= " limit 0,10;";
else $query .= " limit $start_num,10;";

if(!($result = $connect->query($query))) throw new Exception($connect->error);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>