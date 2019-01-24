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
$userId=$_SESSION['userId'];

include "../auth/dbConnect.php";

?>
<!Doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>dailyfashion</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/all.js"></script>
	<script type="text/javascript">
		function confirm_delete(){
			return confirm('정말 삭제하시겠습니까?');
		}
	</script>
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/gnb.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/mypage.css">
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
					<p style="font-size: 15px;padding-top:5px;">- <?= $userId ?>님의 옷장</p>
				</div>
				<div class="gnbBox">
					<img src="../img/gnb.png" width="20px">
				</div>
			</div>
			<div id="main">
				<ul class="about">
				<?php
	
					$query = "select * from post where writer='$userId' order by id desc";
						
					$result = $conn->query($query);
						
					if($result->num_rows!=0){
						$next = 1;
						while($row=$result->fetch_assoc()){
							$img = explode(",",$row['img']);
							
							echo "
							<li class='col-6'>
								<div class='maincon'>";
							
							if(count($img)!=1){
								echo "<div class='arrow' onclick='myarrow(-1,".$next.")' style='left:10px;'>
										<img src='../img/arrowL.png'>
									</div>";
							}		
							
							for($i=0; $i<count($img); $i++){
								
								if($i==0){
									echo "
										<img src=".$img[$i]." class='pic' style='width:100%;'>
									";
								}else{
									echo "
									<img src=".$img[$i]."  class='pic' style='width:100%;display:none;'>
									";
								}
							
							}
							
							if(count($img)!=1){
								echo "<div class='arrow' style='right:10px;' onclick='myarrow(+1,".$next.")'>
											<img src='../img/arrowR.png' >
										</div>";
							}
							echo
									"<div class='txtcon'>
										<div class='txt'>".$row['content']."</div>
									</div>
									<div class='else'>
										<p>".$row['date']."</p><a href='./update.php?id=".$row['id']."'>글수정</a><a href='./deleteOk.php?id=".$row['id']."' onClick='return confirm_delete()'>게시물삭제</a>
									</div>
								</div>
							</li>";
							
							$next++;
						}
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</body>			