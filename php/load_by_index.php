<?php
include_once "connect.php";

$index = $_GET['seq'];
$table = $_GET['table'];


if(!strcmp($table, "tb_motionid")) $query = "select * from tb_motionid where seq='$index';";
else if(!strcmp($table, "tb_category")) $query = "select * from tb_category where seq='$index';";


if(!($result = $connect->query($query))) throw new Exception($connect->error);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>