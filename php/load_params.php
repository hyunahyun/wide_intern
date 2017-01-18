<?php
include_once "connect.php";

$index = $_GET['seq'];
$param = $_GET['param'];

$query = "select $param from tb_category where seq='$index';";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

$row = mysqli_fetch_row($result);
echo json_encode($row);

?>