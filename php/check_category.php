<?php
include_once "connect.php";

$index = $_GET['seq'];

//카테고리 데이터 존재 여부 체크
$query = "select seq from tb_motionid where motion_type = (select cate_name from tb_category where seq = '$index');";
if(!($result = $connect->query($query))) throw new Exception($connect->error);

if($row = mysqli_fetch_row($result)) echo "1";
else echo "0";

?>