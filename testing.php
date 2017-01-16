<html lang="ko">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Testing...</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>	
	<div class="container" style="margin-top: 20px;">
		<input type="button" id="reset_btn" value="테스트 데이터 리셋" style="float:right">
		<?php include "php/test.php"; ?>
	</div>
	
	<script>
		$('body').scrollTop($(document).height());
		
		$("#reset_btn").on('click', function(){
			$.ajax({
				url: "php/test_reset.php",
				success: function(data){
					alert("리셋되었습니다.");
				},
				error: function(data){
					alert("error by test_reset.php");
				}
			});
		});
	</script>
</body>
</html>
