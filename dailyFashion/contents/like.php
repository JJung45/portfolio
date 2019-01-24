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

$userId = $_SESSION['userId'];

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
				</div>
				<div class="gnbBox">
					<img src="../img/gnb.png" width="20px">
				</div>
			</div>
			<div id="main">
				<ul>
				<?php
				
					$query = "select * from liketo where writer='".$userId."'";
					
					$result = $conn->query($query);
					
					if($result->num_rows!=0){
						$next = 1;
						while($row=$result->fetch_assoc()){
							
							$query2 = "select * from liketo where postId='".$row['postId']."'";
							
							$result2 = $conn->query($query2);
							$count = mysqli_num_rows($result2);
							
							$query3 = "select * from post where id='".$row['postId']."'";
							
							$result3 = $conn->query($query3);
							
							while($row=$result3->fetch_assoc()){
							
								$img=explode(",",$row['img']);
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
										<div class='like' onclick='likeOn(".$row['id'].")'><img src='../img/heart.png' style='width:20px;'>
										<p class='likecount'>".$count."명</p>
										</div>
										<div class='else'>
											<p>".$row['date']."</p>
											<p>".$row['writer']."</p>
										</div>
									</div>
								</li>";

								$next++;
							}
							
						}
					}else{
						echo "게시물이 없습니다.";
					}
					
				?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>