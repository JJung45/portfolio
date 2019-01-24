<?php

header("Content-Type:text/html;charset=UTF-8");

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
	<link rel="stylesheet" href="../css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Yeon+Sung" rel="stylesheet">
</head>
<body>
	<div id="wrap">
		<div class="box">
			<div class="content">
				<div class="top">
					<p>DailyFashion</p>
				</div>
				<div class="midj">
					<form action="./joinOk.php" method="post">
						ID: <input type="text" name="userId"><br>
						NAME: <input type="text" name="userName" style="width:66%"><br>
						PW: <input type="password" name="userPw"><br>
						EMAIL: <input type="email" name="userEmail" style="width:66%"><br>
						<input type="submit" value="Join">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>