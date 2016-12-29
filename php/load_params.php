<?php
include "connect.php";

$type = $_POST['motion_type'];

$query = "select cate_params from tb_category where cate_name='$type';";
$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>