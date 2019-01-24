<?php

session_start();

if(!isset($_SESSION['userId'])){
	echo "
	<script>
		alert('접근오류');
		location.href='../index.php';
	</script>";
	exit;
}

$_SESSION['userId'];

?>
<!Doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>dailyfashion</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/all.js"></script>
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/gnb.css">
	<link rel="stylesheet" href="../css/create.css">
</head>
<body>
	<div id="wrap">
		<div id="content">
			<div class="gnb">
				<ul class="gnbCon">
					<li><a href="../contents/main.php">홈</a></li>
					<li>
					<a href="../contents/create.php">글 작성</a></li>
					<li><a href="../contents/mypage.php">마이페이지</a></li>
					<li><a href="../contents/like.php">좋아요</a></li>
					<li><a href="../auth/logout.php">로그아웃</a></li>
					<img src="../img/x-icon.png" class="x-icon">
				</ul>
			</div>
			<div id="header">
				<div class="title">
					<a href="main.php">DailyFashion</a>
				</div>
				<div class="gnbBox">
					<img src="../img/gnb.png" width="20px">
				</div>
			</div>
			<div id="create">
				<div class="img col-7">
				<div class="arrow" style="left:0;" onclick="plusImgs(-1)">
					<img src="../img/arrowL.png">
				</div>
				<div class="uploadGo" style="height:100%">
					<div class="upload">
						<label for="upfile">두 개이상의 사진을 업로드해주세요.</label>
						<input type="file" name="upfile" id="upfile" multiple/ >
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="arrow" style="right:0;" onclick="plusImgs(+1)">
					<img src="../img/arrowR.png">
				</div>
				</div>
				<div class="text col-5">
					<textarea name="upfileTxt" id="upfileTxt"></textarea>
					<div class="submit">
						<input type="submit" value="업로드" onclick="submitAction();">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>