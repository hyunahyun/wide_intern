<html lang="ko">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Motion ID Page</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
		
	<style>
		h4, caption {text-align: center}
		#dropdownMenu1 {margin: 0px}
		.container {margin-top: 50px}
		.dropdown, #count {float: left}
		.dropdown-menu {min-width: 100px}
		.btn {float: right; margin-left: 10px}
		.cate {background-color: transparent; border: 0px; width: 100%;}
		thead > tr{background-color: antiquewhite}
		.modal-row {display: inline}
		.modal-row > p, .modal-row > .form-control {width: 30%; display: inline; margin-bottom: 10px}
		.search {background-color: transparent}
	</style>
</head>
<body>	
	
	<div class="container">
		<h4>모션아이디 관리 화면</h4>
			<div class="row">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						타입 선택
						<span class="caret"></span>
					</button>
					<ul id="dropdownMenuResult" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					</ul>
				</div>
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#AddModal" value="랜덤 생성">
			</div>
			<div class="row">
				<table class="table table-bordered">
					<caption>결과</caption>
					<thead>
						<tr>
							<th>인덱스</th>
							<th>타입</th>
							<th>모션아이디</th>
							<th>param1</th>
							<th>param2</th>
							<th id="last_param">param3</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div class="row">
				<p id="count"></p>
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#DeleteModal" value="삭제">
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#ModifyModal" value="수정">
			</div>
	</div>
	
	<!--삭제 모달 창-->
	<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">삭제하기</h4>
				</div>
				<div class="modal-body">
					<h5>반드시 인덱스로 검색 후, 아래 사항들을 확인하시고 석제버튼 누르시기 바랍니다. (인덱스 수정 X)</h5>
					<div class="row modal-row">
						<p>인덱스 : </p>
						<input type="text" class="form-control" id="search_seq1" placeholder="인덱스를 입력하세요.">
						<input type="submit" class="search" id="search_dele" value="검색">
					</div>
					<h5>검색 결과</h5>
					<p id="search_type1">카테고리 : </p>
					<p id="search_motionid1">모션아이디 : </p>
					<p id="search_param1_1">파람1 : </p>
					<p id="search_param1_2">파람2 : </p>
					<p id="search_param1_3">파람3 : </p>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="delete_btn" value="삭제">	
					<button type="button" onclick="return resetSearch1()" class="btn btn-default" data-dismiss="modal">취소</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!--수정 모달 창-->
	<div class="modal fade" id="ModifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">수정하기</h4>
				</div>
				<div class="modal-body">
					<h5>반드시 인덱스로 검색 후, 아래 사항들을 수정하시고 수정버튼 누르시기 바랍니다. (인덱스 수정 X)</h5>
					<div class="row modal-row">
						<p>인덱스 : </p>
						<input type="text" class="form-control" id="search_seq2" placeholder="인덱스를 입력하세요.">
						<input type="submit" class="search" id="search_modi" value="검색">
					</div>
					<h5>검색 결과</h5>
					<div class="row modal-row">
						<p>카테고리 : </p> <input class="form-control" id="search_type2">
					</div>
					<div class="row modal-row">
						<p>모션아이디 : </p> <input class="form-control" id="search_motionid2">
					</div>
					<div class="row modal-row">
						<p>파람1 : </p> <input class="form-control" id="search_param2_1">				
					</div>
					<div class="row modal-row">
						<p>파람2 : </p> <input class="form-control" id="search_param2_2">				
					</div>
					<div class="row modal-row" id="search_param2_row">
						<p>파람3 : </p> <input class="form-control" id="search_param2_3">				
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="modify_btn" value="수정">
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
						<input class="form-control" id="add_type" placeholder="카테고리 입력 (한글 X)" >
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
		var result = null;
		var i;
		var current_cate = null;
		var gen_type_one = null;
		var gen_id_one = null;
		var gen_type_several = [];
		var gen_id_several = [];
		var fileName = "generateID.csv";
		var tempString = null;
		var check_save_several = 0;
		
		// 삭제 모달 창 리셋
		var resetSearch1 = function(){
			$('#search_seq1').val(null);
			$('#search_type1').text("타입 : ");
			$('#search_motionid1').text("모션아이디 : ");
			$('#search_param1_1').text("파람1 : ");
			$('#search_param1_2').text("파람2 : ");
			$('#search_param1_3').text("파람3 : ");
			
			$(".delete_temp_param").remove();
		}
		
		// 수정 모달 창 리셋
		var resetSearch2 = function(){
			$('#search_seq2').val(null);
			$('#search_type2').val(null);
			$('#search_motionid2').val(null);
			$('#search_param2_1').val(null);
			$('#search_param2_2').val(null);
			$('#search_param2_3').val(null);
			
			$(".modify_temp_param").remove();
		}
		
		// 랜덤생성 모달 창 리셋
		var resetSearch3 = function(){
			$("#add_type").val(null);
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
			if(gentype == "pen") return '11' + leadingZeros((Math.floor(Math.random() * 1000000) + 1), 6);
			else if(gentype == "joystick") return '22' + leadingZeros((Math.floor(Math.random() * 1000000) + 1), 6);
		}
		
		// 카테고리 드롭박스 클릭 시
		$("#dropdownMenu1").on('click', function(){
			$.ajax({
				url: "php/load_cate.php",
				type: "POST",
				async:false,
				success: function(data){
					result = JSON.parse(data);	
				
					$("#dropdownMenuResult").children().empty();
					
					for(i=0; i<result.length; i++){
						$('#dropdownMenuResult:last').append('<li role="presentation"><input class="cate" type="submit" value="' + result[i][0] +'"></li>');
					}
						 
					$(".cate").on('click', function() {
						current_cate = $(this).val();
						
						$(".temp_param").remove();
				
						$.ajax({
							url: "php/load_by_cate.php",
							type: "POST",
							async:false,
							data: {"motion_type": current_cate},
							success: function(data){
								result = JSON.parse(data);

								//개수 출력
								$('#count').text("결과 개수 : " + result.length);

								//테이블 로딩
								$('tbody').children().remove();
								
								//카테고리 별 파라미터 출력
								if(current_cate == "pen"){
									$("#last_param").after("<th class='temp_param'>pen_param1</th><th class='temp_param'>pen_param2</th><th class='temp_param'>pen_param3</th><th class='temp_param'>pen_param4</th>");
									for(i=0; i<result.length; i++){
										$('tbody:last').append('<tr><td>'+ result[i][0] +'</td><td>'+ result[i][1] +'</td><td>'+ result[i][2] +'</td><td>'+ result[i][3] +'</td><td>'+ result[i][4] + '</td><td>' + result[i][5] + '</td><td>' + result[i][6] + '</td><td>' + result[i][7] + '</td><td>' + result[i][8] + '</td><td>' + result[i][9] + '</td></tr>');
									}
								}
								else if(current_cate == "joystick"){
									$("#last_param").after("<th class='temp_param'>joystick_param1</th><th class='temp_param'>joystick_param2</th><th class='temp_param'>joystick_param3</th><th class='temp_param'>joystick_param4</th><th class='temp_param'>joystick_param5</th>");
									
									for(i=0; i<result.length; i++){
										$('tbody:last').append('<tr><td>'+ result[i][0] +'</td><td>'+ result[i][1] +'</td><td>'+ result[i][2] +'</td><td>'+ result[i][3] +'</td><td>'+ result[i][4] + '</td><td>' + result[i][5] + '</td><td>' + result[i][6] + '</td><td>' + result[i][7] + '</td><td>' + result[i][8] + '</td><td>' + result[i][9] + '</td><td>' + result[i][10] + '</td></tr>');
									}
								}
								
							},
							error: function(data){
								alert("error by load_by_cate.php");
							}
						});
					});
		
				},
				error: function(data){
					alert("error by load_cate.php");
				}
			});
		});
		
		// 인덱스로 검색 시
		$(".search").on('click', function() {
			// 삭제 모달 창에서 검색 시
			if($(this).attr('id') == 'search_dele'){
				if((document.getElementById("search_seq1").value == null)){
					alert("인덱스를 입력하세요");
					resetSearch1();
				}
				else{
					$(".delete_temp_param").remove();
					var temp_type = null;
					$.ajax({
						url: "php/find_cate.php",
						type: "POST",
						async:false,
						data: {"seq": document.getElementById("search_seq1").value},
						success: function(data){
							result = JSON.parse(data);
													
							if(result == null){
								alert("해당 인덱스의 결과 값이 없습니다.");
								resetSearch1();
							}
							else{
								temp_type = result[0];
							}
						},
						error: function(data){
							alert("error by find_cate.php");
						}
					});
					
					if(temp_type){
						$.ajax({
							url: "php/load_by_index.php",
							type: "POST",
							async:false,
							data: {	"seq": document.getElementById("search_seq1").value,
											"motion_type": temp_type},
							success: function(data){
								result = JSON.parse(data);

								$('#search_type1').text("카테고리 : " + result[0]);
								$('#search_motionid1').text("모션아이디 : " + result[1]);
								$('#search_param1_1').text("파람1 : " + result[2]);
								$('#search_param1_2').text("파람2 : " + result[3]);
								$('#search_param1_3').text("파람3 : " + result[4]);

								//카테고리 별 파라미터 결과 추가 출력
								if(result[0] == "pen"){
									$('#search_param1_3').after(
										"<p class='delete_temp_param'>펜 파람1 : " + result[5]
										+ "</p><p class='delete_temp_param'>펜 파람2 : " + result[6]
										+ "</p><p class='delete_temp_param'>펜 파람3 : " + result[7]
										+ "</p><p class='delete_temp_param'>펜 파람4 : " + result[8] + "</p>"
									);
								}
								else if(result[0] == "joystick"){
									$('#search_param1_3').after(
										"<p class='delete_temp_param'>조이스틱 파람1 : " + result[5]
										+ "</p><p class='delete_temp_param'>조이스틱 파람2 : " + result[6]
										+ "</p><p class='delete_temp_param'>조이스틱 파람3 : " + result[7]
										+ "</p><p class='delete_temp_param'>조이스틱 파람4 : " + result[8]
										+ "</p><p class='delete_temp_param'>조이스틱 파람5 : " + result[9] + "</p>"
									);
								}
							},
							error: function(data){
								alert("error by load_by_index.php");
							}
						});
					}
				}
			}
			
			// 수정 모달 창에서 검색 시
			else if($(this).attr('id') == 'search_modi'){
				if((document.getElementById("search_seq2").value == null)){
					alert("인덱스를 입력하세요");		
					resetSearch2();
				}		
				else{
					$(".modify_temp_param").remove();
					var temp_type = null;
					
					$.ajax({
						url: "php/find_cate.php",
						type: "POST",
						async:false,
						data: {"seq": document.getElementById("search_seq2").value},
						success: function(data){
							result = JSON.parse(data);
							
							if(result == null){
								alert("해당 인덱스의 결과 값이 없습니다.");
								resetSearch2();
							}
							else{
								temp_type = result[0];
							}
						},
						error: function(data){
							alert("error by find_cate.php");
						}
					});
			
					if(temp_type){
						$.ajax({
							url: "php/load_by_index.php",
							type: "POST",
							async:false,
							data: {	"seq": document.getElementById("search_seq2").value,
											"motion_type": temp_type},
							success: function(data){
								result = JSON.parse(data);

								$('#search_type2').val(result[0]);
								$('#search_motionid2').val(result[1]);
								$('#search_param2_1').val(result[2]);
								$('#search_param2_2').val(result[3]);
								$('#search_param2_3').val(result[4]);

									//카테고리 별 파라미터 결과 추가 출력
								if(result[0] == "pen"){
									$('#search_param2_row').after(
										"<div class='row modal-row modify_temp_param'><p>펜 파람1 : </p> <input class='form-control' id='search_pen_param2_1' value='" + result[5]
										+ "'></div><div class='row modal-row modify_temp_param'><p>펜 파람2 : </p> <input class='form-control' id='search_pen_param2_2' value='" + result[6]
										+ "'></div><div class='row modal-row modify_temp_param'><p>펜 파람3 : </p> <input class='form-control' id='search_pen_param2_3' value='" + result[7]
										+ "'></div><div class='row modal-row modify_temp_param'><p>펜 파람4 : </p> <input class='form-control' id='search_pen_param2_4' value='" + result[8] + "'></div>"
									);
								}
								else if(result[0] == "joystick"){
									$('#search_param2_row').after(
										"<div class='row modal-row modify_temp_param'><p>조이스틱 파람1 : </p> <input class='form-control' id='search_joystick_param2_1' value='" + result[5]
										+ "'></div><div class='row modal-row modify_temp_param'><p>조이스틱 파람2 : </p> <input class='form-control' id='search_joystick_param2_2' value='" + result[6]
										+ "'></div><div class='row modal-row modify_temp_param'><p>조이스틱 파람3 : </p> <input class='form-control' id='search_joystick_param2_3' value='" + result[7]
										+ "'></div><div class='row modal-row modify_temp_param'><p>조이스틱 파람4 : </p> <input class='form-control' id='search_joystick_param2_4' value='" + result[8]
										+ "'></div><div class='row modal-row modify_temp_param'><p>조이스틱 파람5 : </p> <input class='form-control' id='search_joystick_param2_5' value='" + result[9] + "'></div>"
									);
								}
							},
							error: function(data){
								alert("error by load_by_index.php");
							}
						});
					}
				}								
			}
		}); 
		
		// 삭제 버튼 클릭 시
		$("#delete_btn").on('click', function(){
			$.ajax({
				url: "php/delete_by_index.php",
				type: "POST",
				async:false,
				data: {"seq": document.getElementById("search_seq1").value},
				success: function(data){
					alert("삭제되었습니다");
					resetSearch1();
					
					// 삭제 모달 창 닫기
					$("body").attr('class', '');
					$("#DeleteModal").attr('aria-hidden', 'true');
					$("#DeleteModal").css('display','none');
				
				},
				error: function(data){
					alert("error by delete_by_index.php");
				}
			});
		});
		
		// 수정 버튼 클릭 시
		$("#modify_btn").on('click', function(){
						
			// 카테고리 별 수정할 파라미터 분류
			if(document.getElementById("search_type2").value == "pen"){
				$.ajax({
					url: "php/modify_by_index.php",
					type: "POST",
					async:false,
					data: {	"seq": document.getElementById("search_seq2").value,
									"motion_type" : document.getElementById("search_type2").value,
									"motion_id" : document.getElementById("search_motionid2").value,
									"param1" : document.getElementById("search_param2_1").value,
									"param2" : document.getElementById("search_param2_2").value,
									"param3" : document.getElementById("search_param2_3").value,
									"pen_param1" : document.getElementById("search_pen_param2_1").value,
									"pen_param2" : document.getElementById("search_pen_param2_2").value,
									"pen_param3" : document.getElementById("search_pen_param2_3").value,
									"pen_param4" : document.getElementById("search_pen_param2_4").value},
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
			else if(document.getElementById("search_type2").value == "joystick"){
				$.ajax({
					url: "php/modify_by_index.php",
					type: "POST",
					async:false,
					data: {	"seq": document.getElementById("search_seq2").value,
									"motion_type" : document.getElementById("search_type2").value,
									"motion_id" : document.getElementById("search_motionid2").value,
									"param1" : document.getElementById("search_param2_1").value,
									"param2" : document.getElementById("search_param2_2").value,
									"param3" : document.getElementById("search_param2_3").value,
									"joystick_param1" : document.getElementById("search_joystick_param2_1").value,
									"joystick_param2" : document.getElementById("search_joystick_param2_2").value,
									"joystick_param3" : document.getElementById("search_joystick_param2_3").value,
									"joystick_param4" : document.getElementById("search_joystick_param2_4").value,
									"joystick_param5" : document.getElementById("search_joystick_param2_5").value},
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
		
		// 랜덤생성 모달 창에서 생성 버튼 클릭 시
		$("#generate_id").on('click', function(){
			if(!$('input:radio').is(':checked')){
				alert("1개 / 여러 개 중 하나를 반드시 선택해야 합니다.");
				if(document.getElementById("add_type").value == null) alert("생성할 카테고리 타입을 입력해야 합니다.");
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
						csvString += document.getElementById("add_type").value + ',' + generateId(document.getElementById("add_type").value) + '\r\n';
					}
					tempString = csvString.substring(43,csvString.length);
					
					// download stuff
					var blob = new Blob([csvString], {"type": "text/csv;charset=utf8;"});					
					
					var link = document.getElementById("genresult_download");
					
					if(link.download !== undefined) { // feature detection
						// Browsers that support HTML5 download attribute
						link.setAttribute("href", window.URL.createObjectURL(blob));
						link.setAttribute("download", fileName);
					 }
					else {
						// it needs to implement server side export
						link.setAttribute("href", "http://tnwls0312.dothome.co.kr/export");
					}
					
					alert("생성되었습니다");
				}
			}
			else{ //1개 생성 시
				gen_type_one = document.getElementById("add_type").value;
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
				for(i=0; i<tempString.length;i++){tempString[i] = tempString[i].split(',');}
		
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