<?php
include "connect.php";

$index = $_POST['seq'];
$params = $_POST['cate_params'];
$values = $_POST['param_value'];

$query = "update tb_motionid set ";

$param_arr = split(",",$params);
$value_arr = split(",",$values);

for($i=0;$i< sizeof($param_arr);$i++){
	if($i < (sizeof($param_arr)-1) ){
		$temp = "$param_arr[$i]='$value_arr[$i]', ";
		$query .= $temp;
	}
	else{
		$temp = "$param_arr[$i]='$value_arr[$i]'";
		$query .= $temp;
	}
}

$query .= " where seq= '$index';";

$result = $connect->query($query);

?>