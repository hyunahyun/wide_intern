<?php

include_once "connect.php";

$type = $_GET['category'];

$query = "select cate_params from tb_category where cate_name = '$type';";

if(!($result = $connect->query($query))) throw new Exception($connect->error);
$row = mysqli_fetch_row($result);

$param = split(",",$row[0]);

if($param[0] == "") echo "0";
else{
	$query = "select ";
	
	for($i=0;$i< sizeof($param);$i++){
		if($i < (sizeof($param)-1) ){
			$query .= "$param[$i], ";
		}
		else{
			$query .= "$param[$i]";
		}
	}

	$query .= " from tb_category where cate_name = '$type';";
	
	if(!($result = $connect->query($query))) throw new Exception($connect->error);
	$value = mysqli_fetch_row($result);

	$string = "";
	
	for($i=0;$i< sizeof($param);$i++){
		if($i < (sizeof($param)-1) ){
			$string .= $param[$i]." : ".$value[$i]."<br>";
		}
		else{
			$string .= $param[$i]." : ".$value[$i];
		}
		
	}
	
	echo $string;
}

?>