<?php
include_once "connect.php";

$category = $_GET['cate_name'];

$query = "select cate_serial from tb_category where cate_name='$category';";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>