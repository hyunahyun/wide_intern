<?php

include "connect.php";

$page = $_POST['page'];

$start_num = ($page - 1) * 10;

$query = "select seq, cate_name, cate_serial, cate_params from tb_category order by seq asc";

if(!strcmp($page, "1")) $query .= " limit 0,10;";
else $query .= " limit $start_num,10;";

$result = $connect->query($query);

$n = 0;
while($count = mysqli_fetch_row($result)){
	$row[$n++] = $count;
}
echo json_encode($row);

?>