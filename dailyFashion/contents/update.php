<?php

session_start();

include "../auth/dbConnect.php";

$userId=$_SESSION['userId'];
$id = $_GET['id'];

if(!isset($userId)){
	echo "
	<script>
		alert('접근오류');
		location.href='../index.php';
	</script>";
	exit;
}

$query = "select * from post where id='$id'";

$result = $conn->query($query);

if($result->num_rows!=0){
	while($row=$result->fetch_assoc()){
		$img = explode(",",$row['img']);
		$cnt = count($img);
		$txt = $row['content'];
	}
}


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
				<div class="arrow" style="display:block;left:0;" onclick="plusImgs(-1)">
					<img src="../img/arrowL.png">
				</div>
				<input type="hidden" value="<?=$id?>" name="id" id="id">
				<?php
					for($i=0; $i<$cnt; $i++){
						if($i==0){
				?>
							<img src="<?=$img[$i]?>" class='uploadImg' style="height:98%;margin:0 auto;display:block;">
				<?php
						}else{
				?>
							<img src="<?=$img[$i]?>" class='uploadImg' style="height:98%;margin:0 auto;display:none;">
				<?php
						}
					}
				?>
				<div class="arrow" style="display:block;right:0;" onclick="plusImgs(+1)">
					<img src="../img/arrowR.png">
				</div>
				</div>
				<div class="text col-5">
					<textarea name="upfileTxt" id="upfileTxt" style="text-indent:0">
					<?=$txt?>
					</textarea>
					<div class="submit">
						<input type="submit" value="업로드" onclick="submitAction();">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>