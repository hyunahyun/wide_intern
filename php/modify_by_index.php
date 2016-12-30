<?php
include "connect.php";

$index = $_POST['seq'];

$type = $_POST['motion_type'];
$id = $_POST['motion_id'];
$param1 = $_POST['param1'];
$param2 = $_POST['param2'];
$param3 = $_POST['param3'];

$query = "update tb_motionid set cate1_param1='testtest' where seq= '$index';";

$result = $connect->query($query);

?>