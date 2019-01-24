<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/zara_gTM_icon.ico">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$('document').ready(function(){
		var url2="pagingOk.php";
		$.get(url2,{page:1,option:"pants"},function(args){
			$('.newinMain').html(args);
		})
	});
	function get_page(no){
		var url="pagingOk.php";
		$.get(url,{page:no,option:"pants"},function(args){
			$('.newinMain').html(args);
		});
	}
</script>
<body>
<div id="wrap">
<?php include_once "header.php"; ?>
	<div class="center newinMain">

	</div>
	</div>
</body>
<script>
	var ulMenuLi=$('.ulMenu>ul>li');
	ulMenuLi.eq(7).addClass('plus').siblings().removeClass('plus');
</script>
</html>