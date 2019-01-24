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
	<script src="js/all.js"></script>
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div id="wrap">
		<div class="box">
			<div class="content">
				<div class="top">
					<p>DailyFashion</p>
				</div>
				<div class="mid">
					<form action="./auth/loginOk.php" method="post">
						ID: <input type="text" name="userId"><br>
						PW: <input type="password" name="userPw"><br>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="bottom">
					<a href="./auth/join.php">Join member</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>