<?php

include_once "connect.php";

// 출력 함수
function printing($string){
	echo $string;
	echo "<script language='javascript'>$('body').scrollTop($(document).height());</script>";
	echo str_pad("", 4096);
	ob_flush();
	flush();
	usleep(100000);
}

// 테스팅 함수
function testing($php, $get ,$success_msg, $error_msg){
	try {
		global $connect;
		$_GET = $get;
		
		ob_start();
		include $php;
		ob_end_clean(); 
   
		printing("<p style='color:yellowgreen'>Sucess : ".$php." - ".$success_msg."<p>");
		
	} catch(Exception $e) {
		
		printing("<p style='color:tomato'>Error : ".$php." - ".$error_msg."<br>".$e->getMessage()."<p>");
	}
}

//
// category/parameter 화면 테스팅
printing("<p style='color:black; font-weight:bold'>카테고리/파라미터 관리 화면 테스팅 시작<p>");

//페이지 및 카테고리 결과 로딩 - load_cate, load_cate2
printing("<p style='color:black;'>페이지 및 카테고리 결과 로딩 테스트 시작<p>");

testing("load_cate.php", null ,"카테고리 테이블 불러와 총 페이지 로딩 성공!!!", "카테고리 테이블 불러와 총 페이지 로딩 실패");
testing("load_cate2.php", array('page'=>'1') ,"페이지 넘버에 맞게 카테고리 결과 출력 성공!!!", "페이지 넘버에 맞게 카테고리 결과 출력 실패");

printing("<p style='color:black;'>페이지 및 카테고리 결과 로딩 테스트 종료<p><br>");


//파라미터 관리 - load_paramlist, update_param_button
printing("<p style='color:black;'>파라미터 추가/수정/삭제 테스트 시작<p>");

testing("load_paramlist.php", null ,"모션아이디 테이블의 추가 파라미터 로딩 성공!!!", "모션아이디 테이블의 추가 파라미터 로딩 실패");
testing("update_params_button.php", array('state'=>'3', 'old_params'=>'', 'new_params'=>'testtest1'),"파라미터 testtest1 추가 성공!!!", "파라미터 testtest1 추가 실패");
testing("update_params_button.php", array('state'=>'3', 'old_params'=>'', 'new_params'=>'testtest2'),"파라미터 testtest2 추가 성공!!!", "파라미터 testtest2 추가 실패");
testing("update_params_button.php", array('state'=>'3', 'old_params'=>'', 'new_params'=>'testtest3'),"파라미터 testtest3 추가 성공!!!", "파라미터 testtest3 추가 실패");
testing("update_params_button.php", array('state'=>'2', 'old_params'=>'testtest3', 'new_params'=>'testtest3_modi'),"파라미터 testtest3->testtest3_modi 수정 성공!!!", "파라미터 testtest3->testtest3_modi 수정 실패");
testing("update_params_button.php", array('state'=>'1', 'old_params'=>'testtest3_modi', 'new_params'=>''),"파라미터 testtest3_modi 삭제 성공!!!", "파라미터 testtest3_modi 삭제 실패");

printing("<p style='color:black;'>파라미터 추가/수정/삭제 테스트 종료<p><br>");


//카테고리 관리
printing("<p style='color:black;'>카테고리 추가/수정/삭제 테스트 시작<p>");

//추가 - load_paramlist, make_cate
testing("load_paramlist.php", null ,"모션아이디 테이블의 추가 파라미터 로딩 성공!!!", "모션아이디 테이블의 추가 파라미터 로딩 실패");
testing("make_cate.php", array('testing_seq'=>'1111111111', 'cate_name'=>'testing1', 'cate_serial'=>'99', 'cate_params'=>'testtest1') ,"카테고리 testing1 추가 성공!!!", "카테고리 testing1 추가 실패");
testing("make_cate.php", array('testing_seq'=>'1111111110', 'cate_name'=>'testing1', 'cate_serial'=>'98', 'cate_params'=>'testtest1,testtest2') ,"카테고리 이름/시리얼넘버 중복 시 추가 처리 ignoring 성공!!!", "카테고리 이름/시리얼넘버 중복 시 추가 처리 ignoring 실패");
testing("make_cate.php", array('testing_seq'=>'1111111112', 'cate_name'=>'testing2', 'cate_serial'=>'98', 'cate_params'=>'') ,"카테고리 testing2 추가 성공!!!", "카테고리 testing2 추가 실패");

//수정 - load_paramlist, load_by_index, check_category, modify_by_index
testing("load_paramlist.php", null ,"모션아이디 테이블의 추가 파라미터 로딩 성공!!!", "모션아이디 테이블의 추가 파라미터 로딩 실패");
testing("load_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_category') ,"카테고리 테이블에서 해당 인덱스의 카테고리 정보 출력 성공!!!", "카테고리 테이블에서 해당 인덱스의 카테고리 정보 출력 실패");
testing("check_category.php", array('seq'=>'1111111111') ,"해당 인덱스의 카테고리 존재 여부 로딩 성공!!!", "해당 인덱스의 카테고리 존재 여부 로딩 실패");
testing("modify_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_category', 'param_value'=>'testing1;99;testtest1,testtest2') ,"해당 인덱스의 카테고리 데이터 수정 성공!!!", "해당 인덱스의 카테고리 데이터 수정 실패");

//삭제 - delete_by_index
testing("delete_by_index.php", array('seq'=>'1111111112', 'table'=>'tb_category') ,"해당 인덱스의 카테고리 삭제 성공!!!", "해당 인덱스의 카테고리 삭제 실패");

printing("<p style='color:black;'>카테고리 추가/수정/삭제 테스트 종료<p><br>");

//
// motionID 화면 테스팅
printing("<p style='color:black; font-weight:bold'>모션아이디 관리 화면 테스팅 시작<p>");

//카테고리 선택 - load_cate, load_params, load_page, load_by_cate
printing("<p style='color:black;'>카테고리 선택 테스트 시작<p>");

testing("load_cate.php", null ,"카테고리 드롭박스 클릭 시, 카테고리 리스트 출력 성공!!!", "카테고리 드롭박스 클릭 시, 카테고리 리스트 출력 실패");
testing("load_params.php", array('motion_type'=>'testing1') ,"해당 카테고리의 필요 파라미터 로딩 성공!!!", "해당 카테고리의 필요 파라미터 로딩 실패");
testing("load_page.php", array('motion_type'=>'testing1') ,"해당 카테고리의 모션아이디 테이블 불러와 총 페이지 로딩 성공!!!", "해당 카테고리의 모션아이디 테이블 불러와 총 페이지 로딩 실패");
testing("load_by_cate.php", array('motion_type'=>'testing1', 'cate_params'=>'testtest1,testtest2', 'page'=>'1') ,"페이지 넘버에 맞게 해당 카테고리의 모션아이디 결과 출력 성공!!!", "페이지 넘버에 맞게 해당 카테고리의 모션아이디 결과 출력 실패");

printing("<p style='color:black;'>카테고리 선택 테스트 종료<p><br>");

//모션아이디 관리
printing("<p style='color:black;'>모션아이디 추가/수정/삭제 테스트 시작<p>");

//추가 - load_cate, load_serial, check_motionid, save_one
testing("load_cate.php", null ,"추가 모달 창에서 카테고리 드롭박스 클릭 시, 카테고리 리스트 출력 성공!!!", "추가 모달 창에서 카테고리 드롭박스 클릭 시, 카테고리 리스트 출력 실패");
testing("load_serial.php", array('cate_name'=>'testing1') ,"해당 카테고리의 시리얼넘버 로딩 성공!!!", "해당 카테고리의 시리얼넘버 로딩 실패");
testing("check_motionid.php", array('motion_id'=>'9911111111', 'motion_type'=>'testing1') ,"해당 카테고리의 해당 모션아이디 존재 여부 로딩 성공!!!", "해당 카테고리의 해당 모션아이디 존재 여부 로딩 실패");
testing("save_one.php",  array('testing_seq'=>'1111111111', 'motion_id'=>'9911111111', 'motion_type'=>'testing1') ,"모션아이디 추가 성공!!!", "모션아이디 추가 실패");

//수정 - load_params, load_by_index, modify_by_index
testing("load_params.php", array('motion_type'=>'testing1') ,"해당 카테고리의 필요 파라미터 로딩 성공!!!", "해당 카테고리의 필요 파라미터 로딩 실패");
testing("load_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_motionid', 'cate_params'=>'testtest1,testtest2') ,"해당 인덱스의 모션아이디 데이터 출력 성공!!!", "해당 인덱스의 모션아이디 데이터 출력 실패");
testing("modify_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_motionid', 'cate_params'=>'testtest1,testtest2', 'param_value'=>'value1,value2') ,"해당 인덱스의 모션아이디 데이터 수정 성공!!!", "해당 인덱스의 모션아이디 데이터 수정 실패");

//삭제 - delete_by_index
testing("delete_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_motionid') ,"해당 인덱스의 모션아이디 데이터 삭제 성공!!!", "해당 인덱스의 모션아이디 데이터 삭제 실패");
 
printing("<p style='color:black;'>모션아이디 추가/수정/삭제 테스트 종료<p><br>");

printing("<p style='color:black; font-weight:bold'>남은 테스트 데이터 삭제<p>");

testing("update_params_button.php", array('state'=>'1', 'old_params'=>'testtest1', 'new_params'=>''),"파라미터 testtest1 삭제 성공!!!", "파라미터 testtest1 삭제 실패");
testing("update_params_button.php", array('state'=>'1', 'old_params'=>'testtest2', 'new_params'=>''),"파라미터 testtest2 삭제 성공!!!", "파라미터 testtest2 삭제 실패");
testing("delete_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_category') ,"카테고리 testing1 삭제 성공!!!", "카테고리 testing1 삭제 실패");
testing("delete_by_index.php", array('seq'=>'1111111111', 'table'=>'tb_motionid') ,"카테고리 testing1 데이터 삭제 성공!!!", "카테고리 testing1 데이터 삭제 실패");

printing("<p style='color:black; font-weight:bold'>테스트 완료<p>");

?> 