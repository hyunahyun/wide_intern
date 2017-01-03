<?php
include "connect.php";

$oldString = $_POST['old_params'];
$newString = $_POST['new_params'];

$temp = split("\r\n",$oldString);
for($i=0;$i< sizeof($temp);$i++){
	$oldArr[$i] = $split(",",$temp[$i]);
}
$temp = split("\r\n",$newString);
for($i=0;$i< sizeof($temp);$i++){
	$newArr[$i] = $split(",",$temp[$i]);
}

if(sizeof($newArr) != sizeof($oldArr)){ // 추가된 파라미터가 있을 경우 추가
	for($i=sizeof($oldArr); $i < sizeof($newArr); $i++){
		$add_param = $newArr[$i][1];
		$query = "alter table tb_motionid add $add_param varchar(255);";
		$connect->query($query);
	}
}

// 수정, 삭제
for($i=0; $i < sizeof($newArr); $i++){
	$before = $oldArr[$i][1];
	$new = $newArr[$i][1];
	
	// 수정, 삭제할 파라미터를 참조하는 카테고리 검색 후 같이 수정
	$check_query = "select seq, cate_params from tb_category where cate_params like '%$before%';";
	$result = $connect->query($check_query);
	
	$n = 0;
	while($count = mysqli_fetch_row($result)){
		$search_result[$n++] = $count;
	}
	
	if(strlen($new) == 0){ // 삭제
		//tb_category에서 참조하는 카테고리에서 삭제
		
		
		//tb_motionid에도 삭제
		$query = "alter table tb_motionid drop column $before;";
		$connect->query($query);
	}
	else{ // 수정
		//tb_category에서 참조하는 카테고리에서 수정
		
		//tb_motionid에도 수정
		$query = "alter table tb_motionid change $before $new varchar(255);";
		$connect->query($query);
	}
}

?>