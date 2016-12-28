<?php
include "connect.php";

$index = $_POST['seq'];

$query = "select motion_type from tb_motionid where seq='$index';";

$result = $connect->query($query);

$count = mysqli_fetch_row($result);
echo json_encode($count);

?>