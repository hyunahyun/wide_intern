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
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><input class="cate" type="submit" value="펜"></li>
					<li role="presentation"><input class="cate" type="submit" value="조이스틱"></li>
					</ul>
				</div>
				<input class="btn btn-default" type="button" value="추가">
			</div>
			<div class="row">
				<table class="table table-bordered">
					<caption>결과</caption>
					<thead>
						<tr>
							<th>인덱스</th>
							<th>타입</th>
							<th>모션아이디</th>
							<th>버전</th>
							<th>등록상태</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div class="row">
				<p id="count"></p>
				<input class="btn btn-default" type="submit" value="다운로드">
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#DeleteModal" value="삭제">
				<input class="btn btn-default" type="button" data-toggle="modal" data-target="#ModifyModal" value="수정">
			</div>
	</div>
	
	<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">삭제하기</h4>
				</div>
				<div class="modal-body">
					<h5>반드시 인덱스로 검색 후, 아래 사항들을 확인하시고 석제버튼 누르시길 바랍니다. (인덱스 수정 X)</h5>
					<div class="row modal-row">
						<p>인덱스 : </p>
						<input type="text" class="form-control" id="search_seq1" placeholder="인덱스를 입력하세요.">
						<input type="submit" class="search" id="search_dele" value="검색">
					</div>
					<h5>검색 결과</h5>
					<p id="search_type1">타입 : </p>
					<p id="search_motionid1">모션아이디 : </p>
					<p id="search_ver1">버전 : </p>
					<p id="search_state1">등록상태 : </p>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="delete_btn" value="삭제">	
					<button type="button" onclick="return resetSearch1()" class="btn btn-default" data-dismiss="modal">취소</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="ModifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">수정하기</h4>
				</div>
				<div class="modal-body">
					<h5>반드시 인덱스로 검색 후, 아래 사항들을 수정하시고 수정버튼 누르시길 바랍니다. (인덱스 수정 X)</h5>
					<div class="row modal-row">
						<p>인덱스 : </p>
						<input type="text" class="form-control" id="search_seq2" placeholder="인덱스를 입력하세요.">
						<input type="submit" class="search" id="search_modi" value="검색">
					</div>
					<h5>검색 결과</h5>
					<div class="row modal-row">
						<p>타입 : </p> <input class="form-control" id="search_type2">
					</div>
					<div class="row modal-row">
						<p>모션아이디 : </p> <input class="form-control" id="search_motionid2">
					</div>
					<div class="row modal-row">
						<p>버전 : </p> <input class="form-control" id="search_ver2">				
					</div>
					<div class="row modal-row">
						<p>등록상태 : </p> <input class="form-control" id="search_state2">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="modify_btn" value="수정">
					<button type="button" onclick=" return resetSearch2()" class="btn btn-default" data-dismiss="modal">취소</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
	<script>
		var result = null;
		var i;
		
		var resetSearch1 = function(){
			$('#search_seq1').val(null);
			$('#search_type1').text("타입 : ");
			$('#search_motionid1').text("모션아이디 : ");
			$('#search_ver1').text("버전 : ");
			$('#search_state1').text("등록상태 : ");
		}
		
		var resetSearch2 = function(){
			$('#search_seq2').val(null);
			$('#search_type2').val(null);
			$('#search_motionid2').val(null);
			$('#search_ver2').val(null);
			$('#search_state2').val(null);
		}
		
		$(".cate").on('click', function() {
			$.ajax({
				url: "php/load_cate.php",
				type: "POST",
				async:false,
				data: {"motion_type": $(this).val()},
				success: function(data){
					result = JSON.parse(data);
				
					//개수 출력
					$('#count').text("결과 개수 : " + result.length);
				
					//테이블 로딩
					$('tbody').children().remove();	
				
					for(i=0; i<result.length; i++){
						$('tbody:last').append('<tr><td>'+ result[i][0] +'</td><td>'+ result[i][1] +'</td><td>'+ result[i][2] +'</td><td>'+ result[i][3] +'</td><td>'+ result[i][4] +'</td></tr>');
					}
				},
				error: function(data){
					alert("error by load_cate.php");
				}
			});
		}); 
		
		$(".search").on('click', function() {
			if($(this).attr('id') == 'search_dele'){
				if((document.getElementById("search_seq1").value == null)){
					alert("인덱스를 입력하세요");
					resetSearch1();
				}
				else{
					$.ajax({
						url: "php/load_by_index.php",
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
								$('#search_type1').text("타입 : " + result[1]);
								$('#search_motionid1').text("모션아이디 : " + result[2]);
								$('#search_ver1').text("버전 : " + result[3]);
								$('#search_state1').text("등록상태 : " + result[4]);
							}
						},
						error: function(data){
							alert("error by load_by_index.php");
						}
					});
				}
			}
			else if($(this).attr('id') == 'search_modi'){
				if((document.getElementById("search_seq2").value == null)){
					alert("인덱스를 입력하세요");		
					resetSearch2();
				}		
				else{
					$.ajax({
						url: "php/load_by_index.php",
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
								$('#search_type2').val(result[1]);
								$('#search_motionid2').val(result[2]);
								$('#search_ver2').val(result[3]);
								$('#search_state2').val(result[4]);
							}
						},
						error: function(data){
							alert("error by load_by_index.php");
						}
					});
				}											
			}
		}); 
		
		$("#delete_btn").on('click', function(){
			$.ajax({
				url: "php/delete_by_index.php",
				type: "POST",
				async:false,
				data: {"seq": document.getElementById("search_seq1").value},
				success: function(data){
					alert("삭제되었습니다");
					resetSearch1();
					
					//모달 창 닫기
					$("body").attr('class', '');
					$("#DeleteModal").attr('aria-hidden', 'true');
					$("#DeleteModal").css('display','none');
				
				},
				error: function(data){
					alert("error by delete_by_index.php");
				}
			});
		});
		
		$("#modify_btn").on('click', function(){
			$.ajax({
				url: "php/modify_by_index.php",
				type: "POST",
				async:false,
				data: {	"seq": document.getElementById("search_seq2").value,
								"motion_type" : document.getElementById("search_type2").value,
								"motion_id" : document.getElementById("search_motionid2").value,
								"motion_ver" : document.getElementById("search_ver2").value,
								"motion_state" : document.getElementById("search_state2").value},
				success: function(data){
					alert("수정되었습니다");
					resetSearch2();
					
					//모달 창 닫기
					$("body").attr('class', '');
					$("#ModifyModal").attr('aria-hidden', 'true');
					$("#ModifyModal").css('display','none');
				
				},
				error: function(data){
					alert("error by modify_by_index.php");
				}
			});
		});
	</script>
	
</body>
</html>