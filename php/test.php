<?php

include "connect.php";

// 출력 함수
function printing($string){
	echo $string;
	echo str_pad("", 4096);
	ob_flush();
	flush();
	usleep(100000);
}

// 테스팅 함수
function testing($q, $success_msg, $error_msg){
	try {
		global $connect;
		if(!$connect->query($q)) throw new Exception($error_msg);

		printing("<p style='color:yellowgreen'>Sucess : ".$success_msg."<p>");
		
	} catch(Exception $e) {
		
		printing("<p style='color:tomato'>Error : ".$e->getMessage()."<p>");
	}
}
//testing("select * from tb_category", "오예에에ㅔ", "에..?");

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