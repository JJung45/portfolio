<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	 <link rel="shortcut icon" href="img/zara_gTM_icon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
	$('document').ready(function(){
		var url2="pagingOk.php";
		$.get(url2,{page:1,option:"outer"},function(args){
			$('.newinMain').html(args);
		})
	});
	function get_page(no){
		var url="pagingOk.php";
		$.get(url,{page:no,option:"outer"},function(args){
			$('.newinMain').html(args);
		});
	}
</script>
</head>
<body>
<div id="wrap">
<?php include_once "header.php"; ?>
	<div class="center newinMain">
	
	</div>
	</div>
</body>
<script>
	var ulMenuLi=$('.ulMenu>ul>li');
	ulMenuLi.eq(0).addClass('plus').siblings().removeClass('plus');
</script>
</html>