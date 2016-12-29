<?php
include "connect.php";

$category = $_POST['cate_name'];

$query = "select cate_serial from tb_category where cate_name='$category';";
$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>