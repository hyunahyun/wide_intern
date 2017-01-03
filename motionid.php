<html lang="ko">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Motion ID Page</title>
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
		.carousel-control.left, .carousel-control.right {background-image: none;}
		.item {text-align: center}
	</style>
</head>
<body>	
	
	<div class="container">
		<h4>모션아이디 관리 화면</h4>
			<div class="row">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						카테고리 선택
						<span class="caret"></span>
					</button>
					<ul id="dropdownMenuResult" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					</ul>
				</div>
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#AddModal" value="모션아이디 생성">
			</div>
			<div class="row">
				<table class="table table-bordered">
					<caption>결과</caption>
					<thead>
						<tr>
							<th><input type="checkbox" name="_selected_all_"></th>
							<th>인덱스</th>
							<th>카테고리</th>
							<th id="last_param">모션아이디</th>
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
				<div id="myCarousel" class="modal-body carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<p id="modify_index0">인덱스 : </p>
							<p id="modify_type0">카테고리 : </p>
							<p id="modify_id0">모션아이디 : </p>
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
		
	<!--랜덤생성 모달 창-->
	<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">생성하기</h4>
				</div>
				<div class="modal-body">
					<h5>1개 / 여러 개 중 하나를 반드시 선택 후, 생성버튼을 누르시기 바랍니다.</h5>
					<h5>1개 생성 시 아래 화면에 나오는 결과를 DB에 저장하고싶을 경우, 아래 DB에 저장 버튼을 누르시기 바랍니다.</h5>
					<h5>여러 개 생성 시 다운로드된 파일을 확인하고 아래 DB에 저장 버튼을 누르시기 바랍니다.</h5>
					<div class="row modal-row">
						<label class="radio-inline">
							<input type="radio" name="count" id="add_one">1개 생성
						</label>
						<label class="radio-inline">
							<input type="radio" name="count" id="add_several">여러 개 생성
						</label>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
								카테고리 선택
								<span class="caret"></span>
							</button>
							<ul id="dropdownMenuResult2" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
							</ul>
						</div>
						<input class="form-control" id="add_count" placeholder="개수 입력 (반드시 숫자)" >
						<input type="submit" class="search" id="generate_id" value="생성">
					</div>
					<h5>생성 결과</h5>
					<p id="genresult_type" style="display:none">카테고리 : </p>
					<p id="genresult_id" style="display:none">모션아이디 : </p>
					<a id="genresult_download" style="display:none">다운로드</a>
					<p id="genresult_several" style="display:none">다운로드된 파일을 확인하시고, DB저장을 원할 경우 DB에 저장 버튼을 누르시기 바랍니다.</p>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="save_btn" value="DB에 저장">
					<button type="button" onclick=" return resetSearch3()" class="btn btn-default" data-dismiss="modal">취소</button>
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
		var current_cate = null;
		var add_current_cate = null;
		var gen_type_one = null;
		var gen_id_one = null;
		var gen_type_several = [];
		var gen_id_several = [];
		var tempString = null;
		var check_save_several = 0;
		var total_page = 1;
		var current_cate_param = null;
		var page_arr = [];
		var current_first_page_num = 1;
		var parameter_num = null;
		
		$(".carousel").carousel({ interval:false });
		
		// 수정 모달 창 리셋
		var resetSearch2 = function(num){
			$(".item").remove();
			
			$(".carousel-inner").append('<div class="item active"><p id="modify_index0">인덱스 : </p><p id="modify_type0">카테고리 : </p><p id="modify_id0">모션아이디 : </p></div>');
		}
		
		// 랜덤생성 모달 창 리셋
		var resetSearch3 = function(){
			add_current_cate = null;
			document.getElementById("dropdownMenu2").innerHTML = '카테고리 선택<span class="caret"></span>';
			$("#add_count").val(null);
			
			var radiobox = document.getElementsByName("count");
			radiobox[0].checked = false;
			radiobox[1].checked = false; 
			
			$("#genresult_several").css('display', 'none');
			$("#genresult_id").css('display', 'none');
			$("#genresult_type").css('display', 'none');
			$("#genresult_download").css('display', 'none');
			$("#genresult_type").text('카테고리 : ');
			$("#genresult_id").text('모션아이디 : ');			
		}
				
		
		// 체크박스 관리
		$('input[name=_selected_all_]').on('change', function(){
			$('input[name=_selected_]').prop('checked', this.checked);
		});
				
		function leadingZeros(n, digits) {
			var zero = '';
			n = n.toString();

			if (n.length < digits) {
				for (var i = 0; i < digits - n.length; i++)
					zero += '0';
			}
			return zero + n;
		}
		
		// 모션아이디 랜덤 생성
		var generateId = function(gentype){
			//if(gentype == "pen") return '11' + leadingZeros((Math.floor(Math.random() * 1000000) + 1), 6);
			//else if(gentype == "joystick") return '22' + leadingZeros((Math.floor(Math.random() * 1000000) + 1), 6);
			var ID = null;
			var check = 1;
			
			// 시리얼 넘버 받아오기
			$.ajax({
				url: "php/load_serial.php",
				type: "POST",
				async:false,
				data: {"cate_name": gentype},
				success: function(data){
					result = JSON.parse(data);
					
					ID = result[0];
				},
				error: function(data){
					alert("error by load_serial.php");
				}
			});
			
			// 기존에 있는 것인지 체크
			while(check){
				var temp = leadingZeros((Math.floor(Math.random() * 1000000) + 1), 6);
				$.ajax({
					url: "php/check_motionid.php",
					type: "POST",
					async:false,
					data: {	"motion_id": ID + temp,
									"motion_type": gentype},
					success: function(data){
						result = JSON.parse(data)

						if(result == null){
								ID += temp;
								check = 0;
						}
					},
					error: function(data){
						alert("error by check_motionid.php");
					}
				});
			}
			
			return ID;
		}
		
		var loadByCate = function(page_num){
			$.ajax({
				url: "php/load_by_cate.php",
				type: "POST",
				async:false,
				data: {	"motion_type": current_cate,
								"cate_params": current_cate_param,
								"page": page_num},
				success: function(data){
					//테이블 리셋
					$('tbody').children().remove();
				
					if(data != "0"){
						result = JSON.parse(data);

						//결과 출력
						if(result != null){
							for(i=0; i<result.length; i++){

							// 공통 부분(seq, motion_type, motion_id)
							var str = '<tr id="tr_' + (i+1) + '"><td><input type="checkbox" name="_selected_" value="' + result[i][0] +'"></td><td>'+ result[i][0] +'</td><td>'+ result[i][1] +'</td><td>'+ result[i][2] +'</td>';

							// 추가 파라미터 부분
							for(var j=0; j<parameter_num.length; j++){
								str += '<td>'+ result[i][j+3] +'</td>';
							}	 
							str += '</tr>';

							$('tbody:last').append(str);
							}
						}
					}
				},
				error: function(data){
					alert("error by load_by_cate.php");
				}
			});	
		}
		
		//페이지 버튼 누르면		
		var pageClicked = function(){
			$(".page").on('click', function(){
				$(this).parent().siblings().removeClass("active");
				$(this).parent().addClass("active");

				loadByCate($(this).html());
			});
		}
		
		// 조회 - 카테고리 드롭박스 클릭 시
		$("#dropdownMenu1").on('click', function(){
			$.ajax({
				url: "php/load_cate.php",
				type: "POST",
				async:false,
				success: function(data){
					result = JSON.parse(data);	
				
					$("#dropdownMenuResult").children().remove();
					
					for(i=0; i<result.length; i++){
						$('#dropdownMenuResult:last').append('<li role="presentation"><input class="cate" type="submit" value="' + result[i][0] +'"></li>');
					}
						 
					$(".cate").on('click', function() {
						total_page = 1;
						current_cate = $(this).val();
						current_cate_param = null;
						current_first_page_num = 1;
						page_arr = [];
				
						$(".page").parent().remove();
						$("#prev").after('<li id="first_page" class="active"><a href="#" class="page">1</a></li>');
					
						document.getElementById("dropdownMenu1").innerHTML = current_cate + '<span class="caret"></span>';
						
						$(".temp_param").remove();
					
						parameter_num = null;
				
						// 카테고리 별 파라미터 출력
						$.ajax({
							url: "php/load_params.php",
							type: "POST",
							async:false,
							data: {"motion_type": current_cate},
							success: function(data){
								parameter_num = JSON.parse(data);
								current_cate_param = parameter_num[0];
								parameter_num = current_cate_param.split(',');
								
								for(i=(parameter_num.length); i>0; i--)
									$("#last_param").after("<th class='temp_param'>" + parameter_num[i-1] + "</th>");
							},
							error: function(data){
								alert("error by load_params.php");
							}
						});
			
						// 페이지 로딩
						$.ajax({
							url: "php/load_page.php",
							type: "POST",
							async:false,
							data: {	"motion_type": current_cate},
							success: function(data){
								result = JSON.parse(data);

								//개수 출력
								if(result != null){
									$('#count').text("총 결과 개수 : " + result[0]);
									
									// 10개씩 paging
									if((result[0] % page_criteria) == 0) total_page = Math.floor(result[0] / page_criteria);
									else total_page = Math.floor(result[0] / page_criteria) + 1; 
									
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
							},
							error: function(data){
								alert("error by load_page.php");
							}
						});
						
						loadByCate(1);
		
						pageClicked();
					});
				},
				error: function(data){
					alert("error by load_cate.php");
				}
			});
		});
		
		// 이전 버튼 클릭 시
		$("#prev").on('click', function(){
			if(current_first_page_num - page_criteria >= 1){

				current_first_page_num = current_first_page_num - 10;

				$(".page").parent().remove();

				$("#prev").after(page_arr[current_first_page_num-1]);
				for(i=(current_first_page_num-1 + page_criteria-1); i >= current_first_page_num; i--){
					$("#first_page").after(page_arr[i]);
				}

				loadByCate(current_first_page_num);

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

				loadByCate(current_first_page_num);

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
											"table": "tb_motionid"},
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
		
		//메인 화면에서 수정 버튼 클릭 시 
		$("#modify_btn").on('click', function(){
			if($('input[name=_selected_]:checked').length != 0){
				
				// 카테고리 별 파라미터 출력
				$.ajax({
					url: "php/load_params.php",
					type: "POST",
					async:false,
					data: {"motion_type": $('input[name=_selected_]:checked')[0].parentNode.nextSibling.nextSibling.innerHTML},
					success: function(data){
						parameter_num = JSON.parse(data);
						current_cate_param = parameter_num[0];
						parameter_num = current_cate_param.split(',');
					},
					error: function(data){
						alert("error by load_params.php");
					}
				});
			
				// 수정할 정보 로딩
				for(var index=0; index < $('input[name=_selected_]:checked').length ; index++){
					if(index != 0){
						$(".carousel-inner").children().last().after('<div class="item"><p id="modify_index' + index
																												 + '">인덱스 : </p><p id="modify_type' + index
																												 + '">카테고리 : </p><p id="modify_id' + index
																												 +'">모션아이디 : </p></div>');
					}
					
					$.ajax({
						url: "php/load_by_index.php",
						type: "POST",
						async:false,
						data: {	"seq": $('input[name=_selected_]:checked')[index].value,
										"cate_params": current_cate_param,
										"table": "tb_motionid"},
						success: function(data){
							result = JSON.parse(data);

							$('#modify_index' + index).text("인덱스 : " + result[0]);
							$('#modify_type' + index).text("카테고리 : " + result[1]);
							$('#modify_id' + index).text("모션아이디 : " + result[2]);

							for(i=(parameter_num.length); i>0; i--)
								$("#modify_id" + index).after('<div class="row modal-row modify_temp_param"><p>' + parameter_num[i-1]
																			 + ' : </p> <input class="form-control" id="' + parameter_num[i-1] +'_' + index + '"></div>');

							for(i=3; i<(parameter_num.length+3); i++)
								$('#' + parameter_num[i-3] + '_' + index).val(result[i]);

						},
						error: function(data){
							alert("error by load_by_index.php");
						}
					});
					
				}
			}
			else{
				alert("수정할 데이터의 체크박스를 클릭해야 합니다.");
				
				resetSearch2();
		
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
				for(i=0; i<parameter_num.length; i++){
					var tempValue = parameter_num[i] + "_" + index;
					paramValue += ($('#' + tempValue).val() + ",");
				}
				
				$.ajax({
					url: "php/modify_by_index.php",
					type: "POST",
					async:false,
					data: {	"seq": $('input[name=_selected_]:checked')[index].value,
									"cate_params": current_cate_param, 
									"param_value": paramValue,
									"table": "tb_motionid"},
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
		
		// 랜덤생성 모달 창에서 라디오 버튼 변동 시
		$('input:radio').change(function(){
			if($('input:radio[id="add_one"]').is(':checked')){
				$('#add_count').css('display', 'none');
				$("#add_count").val(null);
				
				$("#genresult_several").css('display', 'none');
				$("#genresult_download").css('display', 'none');
			}
			else if($('input:radio[id="add_several"]').is(':checked')){
				$('#add_count').css('display', 'inline');
				$("#add_count").val(null);
				
				$("#genresult_type").css('display', 'none');
				$("#genresult_id").css('display', 'none');
				$("#genresult_type").text('카테고리 : ');
				$("#genresult_id").text('모션아이디 : ');
			}
		});
			
		// 랜덤생성 - 카테고리 드롭박스 클릭 시
		$("#dropdownMenu2").on('click', function(){
			$.ajax({
				url: "php/load_cate.php",
				type: "POST",
				async:false,
				success: function(data){
					result = JSON.parse(data);	
				
					$("#dropdownMenuResult2").children().remove();
										
					for(i=0; i<result.length; i++){
						$('#dropdownMenuResult2:last').append('<li role="presentation"><input class="add_cate" type="submit" value="' + result[i][0] +'"></li>');
					}
						 
					$(".add_cate").on('click', function() {
						add_current_cate = $(this).val();
						document.getElementById("dropdownMenu2").innerHTML = add_current_cate + '<span class="caret"></span>';
					});
				},
				error: function(data){
					alert("error by load_cate.php");
				}
			});
		});
		
		// 랜덤생성 모달 창에서 생성 버튼 클릭 시
		$("#generate_id").on('click', function(){
			if(!$('input:radio').is(':checked')){
				alert("1개 / 여러 개 중 하나를 반드시 선택해야 합니다.");
				if(add_current_cate == null) alert("생성할 카테고리를 선택해야 합니다.");
				resetSearch3();
			}
			else if($('input:radio[id="add_several"]').is(':checked')){
				if(document.getElementById("add_count").value == null){
					alert("개수를 입력해야 합니다.");
					resetSearch3();
				}
				else{ //여러 개 생성 시				
					$("#genresult_several").css('display', 'block');
					$("#genresult_download").css('display', 'block');
					
					var csvString = 'motion_type(category),motion_id(motionID)\r\n';
					for(i=0; i<document.getElementById("add_count").value; i++){
						csvString += add_current_cate + ',' + generateId(add_current_cate) + '\r\n';
					}
					tempString = csvString.substring(43,csvString.length);
					
					// download stuff
					var blob = new Blob([csvString], {"type": "text/csv;charset=utf8;"});					
					
					var link = document.getElementById("genresult_download");
					
					if(link.download !== undefined) { // feature detection
						// Browsers that support HTML5 download attribute
						link.setAttribute("href", window.URL.createObjectURL(blob));
						link.setAttribute("download", "generateID.csv");
					 }
					else {
						// it needs to implement server side export
						link.setAttribute("href", "http://tnwls0312.dothome.co.kr/export");
					}
					
					alert("생성되었습니다");
				}
			}
			else{ //1개 생성 시
				gen_type_one = add_current_cate;
				gen_id_one = generateId(gen_type_one);
					
				$("#genresult_type").css('display', 'block');
				$("#genresult_id").css('display', 'block');
				$("#genresult_type").text('카테고리 : ' + gen_type_one);
				$("#genresult_id").text('모션아이디 : ' + gen_id_one);

				alert("생성되었습니다");
			}
		});
		
		$("#save_btn").on('click', function(){
			if(gen_type_one && gen_id_one){ //1개 저장 시
				$.ajax({
					url: "php/save_one.php",
					type: "POST",
					async:false,
					data: {	"motion_type" : gen_type_one,
									"motion_id" : gen_id_one},
					success: function(data){
						alert("저장되었습니다.");
						resetSearch3();

						//모달 창 닫기
						$("body").attr('class', '');
						$("#AddModal").attr('aria-hidden', 'true');
						$("#AddModal").css('display','none');
					
						gen_type_one = null;
						gen_id_one = null;
					},
					error: function(data){
						alert("error by save_one.php");
					}
				});
			}
			else{ //여러 개 저장 시
				tempString = tempString.split('\r\n');
				for(i=0; i<tempString.length;i++) tempString[i] = tempString[i].split(',');
		
				for(i=0; i<tempString.length-1;i++){
					gen_type_several[i] = tempString[i][0];
					gen_id_several[i] = tempString[i][1];
				}
				
				for(i=0; i<gen_type_several.length;i++){
					$.ajax({
						url: "php/save_one.php",
						type: "POST",
						async:false,
						data: {	"motion_type" : gen_type_several[i],
										"motion_id" : gen_id_several[i]},
						success: function(data){
							check_save_several += 1;
						},
						error: function(data){
							alert("error by save_one.php");
						}
					});
				}
				
				if(check_save_several == gen_type_several.length){
					alert("저장되었습니다.");
					resetSearch3();

					//모달 창 닫기
					$("body").attr('class', '');
					$("#AddModal").attr('aria-hidden', 'true');
					$("#AddModal").css('display','none');

					tempString = null;
					gen_type_several = [];
					gen_id_several = [];
					
					check_save_several = 0;
				}
				else{
					alert("저장 실패");
				}
			}
		});
			
	</script>
	
</body>
</html>