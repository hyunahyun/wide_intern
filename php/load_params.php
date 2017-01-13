<?php
include_once "connect.php";

$type = $_GET['motion_type'];

$query = "select cate_params from tb_category where cate_name='$type';";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>