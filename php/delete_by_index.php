<?php
include "connect.php";

$index = $_POST['seq'];

$query = "delete from tb_motionid where seq='$index';";
$result = $connect->query($query);

?>