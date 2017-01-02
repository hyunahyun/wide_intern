<?php
include "connect.php";

$index = $_POST['seq'];
$table = $_POST['table'];
$params = $_POST['params'];

if(!strcmp($table,"tb_category")){
	$query = "delete from tb_motionid where motion_type = (select cate_name from tb_category where seq = '$index');";
	$connect->query($query);
	
	//카테고리 별 파라미터 삭제
	$arr = split(",",$params);
	for($i=0;$i< sizeof($arr);$i++){
		$query = "alter table tb_motionid drop column $arr[$i];";
		$connect->query($query);
	}
}

$query = "delete from $table where seq='$index';";
$connect->query($query);

?>