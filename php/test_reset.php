<?php

include_once "connect.php";

function testing($query){
	try {
		global $connect;
		if(!$connect->query($query)) throw new Exception($connect->error);
				
	} catch(Exception $e) {
		$s = $e->getMessage() . ' (오류코드:' . $e->getCode() . ')';
		echo $s;
	}
}

//if param - testtest1,testtest2,testtest3
$check_query = "show columns from tb_motionid like 'testtest%';";
if(!($temp = $connect->query($check_query))) throw new Exception($connect->error);

$n = 0;
while($count = mysqli_fetch_row($temp)){
	$row[$n++] = $count;
}

for($i=0; $i<$n; $i++){
	$column = $row[$i][0];
	testing("alter table tb_motionid drop column $column;");
}

//if category - testing1(1111111111),testing2(1111111112)
testing("delete from tb_motionid where motion_type='testing1';");
testing("delete from tb_motionid where motion_type='testing2';");
testing("delete from tb_category where seq='1111111111';");
testing("delete from tb_category where seq='1111111112';");

?> 