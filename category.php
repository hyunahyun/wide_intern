<html lang="ko">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Category Page</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
		
	<style>
		h4, caption {text-align: center}
		.btn .caret {margin-left: 10px}
		#dropdownMenu1 {margin: 0px}
		#dropdownMenu2 {margin-right: 20px}
		#add_count {margin-left: 10px}
		.container {margin-top: 50px}
		.dropdown, #count {float: left}
		.dropdown-menu {min-width: 100px}
		.btn {float: right; margin-left: 10px}
		.cate, .add_cate {background-color: transparent; border: 0px; width: 100%;}
		thead > tr{background-color: antiquewhite}
		.modal-row {display: inline}
		.modal-row > p, .modal-row > .form-control {width: 30%; display: inline; margin-bottom: 10px}
		.search {background-color: transparent}
		#make_cate_name, #make_cate_serial, #make_cate_params {width: 100%}
		.carousel-control.left, .carousel-control.right {background-image: none;}
		.item {text-align: center}
	</style>
</head>
<body>	
	
	<div class="container">
		<h4>카테고리 관리 화면</h4>
			<div class="row">
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#TypeModal" value="카테고리 추가">
			</div>
			<div class="row">
				<table class="table table-bordered">
					<caption>결과</caption>
					<thead>
						<tr>
							<th><input type="checkbox" name="_selected_all_"></th>
							<th>인덱스</th>
							<th>카테고리 이름</th>
							<th>카테고리 고유키</th>
							<th>사용 파라미터</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div class="row">
				<p id="count">총 결과 개수 :</p>
				<input class="btn btn-default" type="button" id="delete_btn" value="삭제">
				<input class="btn btn-default" type="button" id="modify_btn" data-toggle="modal" data-target="#ModifyModal" value="수정">
			</div>
			<nav style="text-align:center">
				<ul class="pagination">
					<li id="prev">
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li id="first_page" class="active"><a href="#" class="page">1</a></li>
					<li id="after">
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
	</div>
	
	<!--수정 모달 창-->
	<div class="modal fade" id="ModifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">수정하기</h4>
				</div>
				<h5 style="padding:15px">데이터가 있는 카테고리의 경우, 고유키 수정은 무시됩니다.</h5>
				<div id="myCarousel" class="modal-body carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<p id="modify_index0">인덱스 : </p>
							<div class="row modal-row modify_temp_param">
								<p>카테고리 이름 : </p><input class="form-control" id="modify_name0">
							</div>
							<div class="row modal-row modify_temp_param">
								<p>카테고리 고유키 : </p><input class="form-control" id="modify_serial0">
							</div>
							<div class="row modal-row modify_temp_param">
								<p>사용 파라미터</p><input class="form-control" id="modify_params0" style="width:100%; margin-top:10px">
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="modify_btn_Modal" value="수정">
					<button type="button" onclick=" return resetSearch2()" class="btn btn-default" data-dismiss="modal">취소</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- 카테고리 추가 모달 창-->
	<div class="modal fade" id="TypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">카테고리 추가하기</h4>
				</div>
				<div class="modal-body">
					<h5>ID 구분자는 motionID의 앞의 두 글자로 카테고리를 대표할 숫자입니다. 숫자 두 글자만 입력하세요.</h5>
					<h5>추가 파라미터 입력 창에는 쌍따옴표(")와 스페이스 필요 없이, 오직 쉼표로 구분합니다.</h5>
					<div class="row modal-row">
						<p>카테고리 이름 : </p><input type="text" class="form-control" id="make_cate_name">
					</div>
					<div class="row modal-row">
						<p>ID 구분자 : </p><input class="form-control" id="make_cate_serial">
					</div>
					<div class="row modal-row">
						<p>추가 파라미터 : </p><input class="form-control" id="make_cate_params" placeholder="ex: param1,param2,param3">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="make_cate_btn" value="추가">
					<button type="button" onclick=" return resetSearch4()" class="btn btn-default" data-dismiss="modal">취소</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
		
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
	<script>
		var page_criteria = 10;
		var result = null;
		var i;
		var add_current_cate = null;
		var gen_type_one = null;
		var gen_id_one = null;
		var gen_type_several = [];
		var gen_id_several = [];
		var fileName = "generateID.csv";
		var tempString = null;
		var check_save_several = 0;
		var total_page = 1;
		var page_arr = [];
		var current_first_page_num = 1;
		var parameter_num = null;
		
		$(".carousel").carousel({ interval:false });
		
		// 수정 모달 창 리셋
		var resetSearch2 = function(num){
			$(".item").remove();
			
			$(".carousel-inner").append('<div class="item active"><p id="modify_index0">인덱스 : </p><div class="row modal-row modify_temp_param"><p>카테고리 이름 : </p><input class="form-control" id="modify_name0"></div><div class="row modal-row modify_temp_param"><p>카테고리 고유키 : </p><input class="form-control" id="modify_serial0"></div><div class="row modal-row modify_temp_param"><p>사용 파라미터</p><input class="form-control" id="modify_params0" style="width:100%; margin-top:10px"></div></div>');
		}
		
				
		// 카테고리 추가 모달 창 리셋
		var resetSearch4 = function(){
			$("#make_cate_name").val(null);
			$("#make_cate_serial").val(null);
			$("#make_cate_params").val(null);	
		}
		
		// 체크박스 관리
		$('input[name=_selected_all_]').on('change', function(){
			$('input[name=_selected_]').prop('checked', this.checked);
		});
		
		var loadCate = function(page_num){
			$.ajax({
				url: "php/load_cate2.php",
				type: "POST",
				async:false,
				data: {"page": page_num},
				success: function(data){
					result = JSON.parse(data);

					//테이블 로딩
					$('tbody').children().remove();

					//개수 출력
					if(result != null){
						for(i=0; i<result.length; i++){

						// 공통 부분(seq, cate_name, cate_serial, cate_params)
						$('tbody:last').append('<tr id="tr_' + (i+1) + '"><td><input type="checkbox" name="_selected_" value="' + result[i][0] +'"></td><td>'+ result[i][0] +'</td><td>'+ result[i][1] +'</td><td>'+ result[i][2] +'</td><td>'+ result[i][3] +'</td></tr>');
						}
					}
				},
				error: function(data){
					alert("error by load_cate2.php");
				}
			});	
		}
		
		//페이지 버튼 누르면		
		var pageClicked = function(){
			$(".page").on('click', function(){
				$(this).parent().siblings().removeClass("active");
				$(this).parent().addClass("active");

				loadCate($(this).html());
			});
		}
		
		// 페이지 로딩 시
		window.onload = function(){
			$.ajax({
				url: "php/load_cate.php",
				type: "POST",
				async:false,
				success: function(data){
					result = JSON.parse(data);	
						 
					total_page = 1;
					current_first_page_num = 1;
					page_arr = [];

					$(".page").parent().remove();
					$("#prev").after('<li id="first_page" class="active"><a href="#" class="page">1</a></li>');

					// 페이지 로딩
					//개수 출력
					if(result != null){
						$('#count').text("총 결과 개수 : " + result.length);

						// 10개씩 paging
						if((result.length % page_criteria) == 0) total_page = Math.floor(result.length / page_criteria);
						else total_page = Math.floor(result.length / page_criteria) + 1; 

						var j=0;
						for(i=1; i <= total_page; i++){
							if((j % page_criteria) == 0) page_arr[j++] = '<li id="first_page" class="active"><a href="#" class="page">' + i + '</a></li>';
							else page_arr[j++] = '<li><a href="#" class="page">' + i + '</a></li>';
						}

						if(total_page <= page_criteria){
							for(i=total_page-1; i >= current_first_page_num; i--){
								$("#first_page").after(page_arr[i]);
							}
						}
						else{
							for(i=page_criteria-1; i >= current_first_page_num; i--){
								$("#first_page").after(page_arr[i]);
							}
						}
					}
					else $('#count').text("총 결과 개수 : 0");
						
					loadCate(1);

					pageClicked();
				},
				error: function(data){
					alert("error by load_cate.php");
				}
			});
		};
		
		// 이전 버튼 클릭 시
		$("#prev").on('click', function(){
			if(current_first_page_num - page_criteria >= 1){

				current_first_page_num = current_first_page_num - 10;

				$(".page").parent().remove();

				$("#prev").after(page_arr[current_first_page_num-1]);
				for(i=(current_first_page_num-1 + page_criteria-1); i >= current_first_page_num; i--){
					$("#first_page").after(page_arr[i]);
				}

				loadCate(current_first_page_num);

				pageClicked();
			}
		});

		// 다음 버튼 클릭 시
		$("#after").on('click', function(){
			if(current_first_page_num + page_criteria <= total_page){
				current_first_page_num = current_first_page_num + 10;

				$(".page").parent().remove();

				$("#prev").after(page_arr[current_first_page_num-1]);
				for(i=(current_first_page_num-1 + page_criteria-1); i >= current_first_page_num; i--){
					$("#first_page").after(page_arr[i]);
				}

				loadCate(current_first_page_num);

				pageClicked();
			}
		});
		
		// 삭제 버튼 클릭 시
		$("#delete_btn").on('click', function(){
			if($('input[name=_selected_]:checked').length != 0){
				var check = 0;
				for(i=0; i< $('input[name=_selected_]:checked').length; i++){
					$.ajax({
							url: "php/delete_by_index.php",
							type: "POST",
							async:false,
							data: {	"seq": $('input[name=_selected_]:checked')[i].value,
											"table": "tb_category",
											"params": $('input[name=_selected_]:checked')[i].parentNode.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML},
							success: function(data){
								check += 1;
							},
							error: function(data){
								alert("error by delete_by_index.php");
							}
						});
				}
				if(check == $('input[name=_selected_]:checked').length) alert("삭제되었습니다.");
			}
			else alert("삭제할 데이터의 체크박스를 클릭해야 합니다.");
		});
		
		//메인 화면에서 수정 버튼 클릭 시 여러 개인거 캐러셀로 처리
		$("#modify_btn").on('click', function(){
			if($('input[name=_selected_]:checked').length != 0){
			
			
				// 수정할 정보 로딩
				for(var index=0; index < $('input[name=_selected_]:checked').length ; index++){
					if(index != 0){
						$(".carousel-inner").children().last().after('<div class="item"><p id="modify_index' + index
																												 + '">인덱스 : </p><div class="row modal-row modify_temp_param"><p>카테고리 이름 : </p><input class="form-control" id="modify_name' + index
																												 + '"></div><div class="row modal-row modify_temp_param"><p>카테고리 고유키 : </p><input class="form-control" id="modify_serial' + index 
																												 + '"></div><div class="row modal-row modify_temp_param"><p>사용 파라미터</p><input class="form-control" id="modify_params' + index 
																												 + '" style="width:100%;margin-top:10px"></div></div>');
					}
					
					$.ajax({
						url: "php/load_by_index.php",
						type: "POST",
						async:false,
						data: {	"seq": $('input[name=_selected_]:checked')[index].value,
										"table": "tb_category"},
						success: function(data){
							result = JSON.parse(data); 

							$('#modify_index' + index).text("인덱스 : " + result[0]);
							$('#modify_name' + index).val(result[1]);
							$('#modify_serial' + index).val(result[2]);
							$('#modify_params' + index).val(result[3]);

						},
						error: function(data){
							alert("error by load_by_index.php");
						}
					});
					
				}
			}
			else{
				alert("수정할 데이터의 체크박스를 클릭해야 합니다.");
				
				//리프레쉬
				//수정 모달 창 닫기
				$("body").attr('class', '');
				$("#ModifyModal").attr('aria-hidden', 'true');
				$("#ModifyModal").css('display','none');
			}
		});
		
		// 수정 모달 창에서 수정 버튼 클릭 시
		$("#modify_btn_Modal").on('click', function(){
			for(var index = 0; index < $('input[name=_selected_]:checked').length; index++){
				var paramValue = "";
				paramValue += ($('#modify_name' + index).val() + ";");
				paramValue += ($('#modify_serial' + index).val() + ";");
				paramValue += ($('#modify_params' + index).val() + ";");
				
				$.ajax({
					url: "php/modify_by_index.php",
					type: "POST",
					async:false,
					data: {	"seq": $('input[name=_selected_]:checked')[index].value,
									"param_value": paramValue,
									"table": "tb_category"},
					success: function(data){
						alert("수정되었습니다");
						resetSearch2();

						// 수정 모달 창 닫기
						$("body").attr('class', '');
						$("#ModifyModal").attr('aria-hidden', 'true');
						$("#ModifyModal").css('display','none');	

					},		 
					error: function(data){
						alert("error by modify_by_index.php");
					}
				});
			}												
		});
		
		
		// 카테고리 추가 버튼 클릭 시
		$("#make_cate_btn").on('click', function(){
			if((document.getElementById("make_cate_name").value == null)
				|| (document.getElementById("make_cate_serial").value == null)){
					resetSearch4();
					alert("카테고리 이름과 ID구분자는 필수 입력해야 합니다.");
			}
			else{
				$.ajax({
					url: "php/make_cate.php",
					type: "POST",
					async:false,
					data: {	"cate_name": document.getElementById("make_cate_name").value,
									"cate_serial" : document.getElementById("make_cate_serial").value,
									"cate_params" : document.getElementById("make_cate_params").value},
					success: function(data){
						resetSearch4();
						alert("추가되었습니다.");

						//추가 모달 창 닫기
						$("body").attr('class', '');
						$("#TypeModal").attr('aria-hidden', 'true');
						$("#TypeModal").css('display','none');

					},
					error: function(data){
						alert("error by make_cate.php");
					}
				});	
			}
		});
		
	</script>
	
</body>
</html>