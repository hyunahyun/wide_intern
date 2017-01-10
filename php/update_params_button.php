<?php
include "connect.php";

$state = $_POST['state'];
$oldParam = $_POST['old_params'];
$newParam = $_POST['new_params'];

//추가
if($state == 3){
	$query = "alter table tb_motionid add $newParam varchar(255) DEFAULT '';";
		$connect->query($query);
}
else{
	// 수정, 삭제할 파라미터를 참조하는 카테고리 검색 후 같이 수정
	$check_query = "select seq, cate_params from tb_category where cate_params regexp ',?$oldParam,?';";
	$result = $connect->query($check_query);

	$n = 0;
	$check = 0;
	$search_result = [];
	while($count = mysqli_fetch_row($result)){
		$check = 1;
		$search_result[$n++] = $count;
	}

	//삭제
	if($state == 1){
		//tb_category에서 참조하는 카테고리에서 삭제
		if($check == 1){
			for($j=0; $j < sizeof($search_result); $j++){
													 
				$temp = split(",",$search_result[$j][1]);
				$index = $search_result[$j][0];
				$changed = "";
				for($k=0; $k < sizeof($temp); $k++){
					if(!strcmp($temp[$k], $oldParam))	continue;
					if($k == (sizeof($temp)-1)) $changed .= "$temp[$k]";
					else{
						if((($k + 1) == (sizeof($temp)-1)) and(!strcmp($temp[$k+1], $oldParam))) $changed .= "$temp[$k]";
						else $changed .= "$temp[$k],";
					}
				}
																																																				
				$query = "update tb_category set cate_params='$changed' where seq='$index';";
				$connect->query($query);
																																																		
			}
		}
																																																																							
		//tb_motionid에도 삭제
		$query = "alter table tb_motionid drop column $oldParam;";
		$connect->query($query);
	}

	//수정
	else if($state == 2){
		//tb_category에서 참조하는 카테고리에서 수정
		if($check == 1){
			for($j=0; $j < sizeof($search_result); $j++){
													
				$temp = split(",",$search_result[$j][1]);
				$index = $search_result[$j][0];
				$changed = "";
				for($k=0; $k < sizeof($temp); $k++){
					if(!strcmp($temp[$k], $oldParam)){
						if($k == (sizeof($temp)-1)) $changed .= "$newParam";
						else $changed .= "$newParam,";
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
		$query = "alter table tb_motionid change $oldParam $newParam varchar(255);";
		$connect->query($query);
	}
}

?>
