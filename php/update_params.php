<?php
include "connect.php";

$oldString = $_POST['old_params'];
$newString = $_POST['new_params'];

$temp1 = split("\r\n",$oldString);
for($i=0;$i< (sizeof($temp1)-1);$i++){
	$oldArr[$i] = split(",",$temp1[$i]);
}

$temp2 = split("\n",$newString);
for($i=0;$i< sizeof($temp2);$i++){
	$newArr[$i] = split(",",$temp2[$i]);
}
 
if(sizeof($newArr) != sizeof($oldArr)){ // 추가된 파라미터가 있을 경우 추가
	for($i=sizeof($oldArr); $i < sizeof($newArr); $i++){
		$add_param = $newArr[$i][1];
		$query = "alter table tb_motionid add $add_param varchar(255);";
		$connect->query($query);
	}
}

// 수정, 삭제
for($i=0; $i < sizeof($oldArr); $i++){
	$before = $oldArr[$i][1];
	$new = $newArr[$i][1];
	
	// 수정, 삭제할 파라미터를 참조하는 카테고리 검색 후 같이 수정
	$check_query = "select seq, cate_params from tb_category where cate_params like '%$before%';";
	$result = $connect->query($check_query);
	
	$n = 0;
	$check = 0;
	while($count = mysqli_fetch_row($result)){
		$check = 1;
		$search_result[$n++] = $count;
	}
	
	if(strlen($new) == 0){ // 삭제
		
		//tb_category에서 참조하는 카테고리에서 삭제
		if($check == 1){
			for($j=0; $j < sizeof($search_result); $j++){
				
				$temp = split(",",$search_result[$j][1]);
				$index = $search_result[$j][0];
				$changed = "";
				for($k=0; $k < sizeof($temp); $k++){
					if(!strcmp($temp[$k], $before)) continue;
					if($k == (sizeof($temp)-1)) $changed .= "$temp[$k]";
					else $changed .= "$temp[$k],";
				}
				
				$query = "update tb_category set cate_params='$changed' where seq='$index';";
				$connect->query($query);
				
			}
		}
		
		//tb_motionid에도 삭제
		$query = "alter table tb_motionid drop column $before;";
		$connect->query($query);
	}
	else{ // 수정
		
		//tb_category에서 참조하는 카테고리에서 수정
		if($check == 1){
			for($j=0; $j < sizeof($search_result); $j++){
				
				$temp = split(",",$search_result[$j][1]);
				$index = $search_result[$j][0];
				$changed = "";
				for($k=0; $k < sizeof($temp); $k++){
					if(!strcmp($temp[$k], $before)){
						if($k == (sizeof($temp)-1)) $changed .= "$new";
						else $changed .= "$new,";
					}
					else{
						if($k == (sizeof($temp)-1)) $changed .= "$temp[$k]";
						else $changed .= "$temp[$k],";
					}
				}
				
				$query = "update tb_category set cate_params='$changed' where seq='$index';";
				$connect->query($query);
				
			} 
		}
		
		//tb_motionid에도 수정
		$query = "alter table tb_motionid change $before $new varchar(255);";
		$connect->query($query);
	}
}

?>