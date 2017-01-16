<?php

include_once "connect.php";

// 출력 함수
function printing($string){
	echo $string;
	echo str_pad("", 2000);
	ob_flush();
	flush();
	echo "<script language='javascript'>$('body').scrollTop($(document).height());</script>";
	usleep(300000);
}

// 테스팅 함수
function testing($php, $get ,$success_msg, $error_msg){
	try {
		global $connect;
		$_GET = $get;
		
		ob_start();
		include $php;
		ob_end_clean(); 
   
		printing("<p style='color:yellowgreen'>Sucess : ".$success_msg."<p>");
		
	} catch(Exception $e) {
		
		printing("<p style='color:tomato'>Error : ".$error_msg."<br>".$e->getMessage()."<p>");
	}
}
//

testing("load_cate.php", array('seq'=>'1'), "오예에에ㅔ", "에..?");

testing("delete_by_index.php", array('seq'=>'2', 'table'=>'tb_motionid') ,"오예에에ㅔ", "에..?");

//
// category/parameter 화면 테스팅
printing("<p style='color:black; font-weight:bold'>카테고리/파라미터 관리 화면 테스팅 시작<p>");
		
//load_cate, load_cate2
 
//파라미터 관리
//load_paramlist, update_param_button

//카테고리 관리
//추가 - load_paramlist, make_cate
//수정 - load_paramlist, load_by_index, check_category, modify_by_index
//삭제 - delete_by_index


//
// motionID 화면 테스팅
printing("<p style='color:black; font-weight:bold'>모션아이디 관리 화면 테스팅 시작<p>");

//카테고리 선택
//load_cate, load_params, load_page, load_by_cate

//모션아이디 관리
//추가 - load_cate, load_serial, check_motionid, save_one
//수정 - load_params, load_by_index, modify_by_index
//삭제 - delete_by_index




?> 