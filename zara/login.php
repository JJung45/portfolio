<?php
$getsome=$_GET['title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zara</title>
     <link rel="shortcut icon" href="img/zara_gTM_icon.ico">
     <link rel="stylesheet" href="css/grid.css">
     <link rel="stylesheet" href="css/sub.css">
     <link rel="stylesheet" href="css/login.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
</head>
<body>
   <div class="menu">
<img src="img/arrow.png" alt="x">
<div class="menuinside">
      <div class="login">
                    <?php
            if(!isset($_SESSION['sessionId'])){
                
            ?>
        <a href="login.php?title=Login">로그인 </a>/
        <a href="join.php?title=JOIN"> 회원가입</a>
        <?php
            }else if($_SESSION['sessionId']=='wjdgkrud'){
				?>
				<a href="writing.php?title=WRITING" class='loginok'>writing</a> /
            <a href="logout.php">logout</a>
				<?php
			}
            else{
                
                ?>
            <a href="#" class='loginok'><?= $_SESSION['sessionId'] ?>님</a> /
            <a href="logout.php">logout</a>
            <?php
            }
                    ?></div>
     <img src="img/x.png" alt="x">
      <ul>
                <li class="five"><a href="newin.php">NEW IN</a></li>
                <li class="seven br"><a href="">BEST SELLERS</a></li>
                <li><a href="">WOMAN</a></li>
                <li><a href="">TRF</a></li>
                <li><a href="">MAN</a></li>
                <li><a href="">KIDS</a></li>
                <li class="br"><a href="">STORIES</a></li>
                <li><a href="">JOIN LIFE</a></li>
     </ul>
</div>
</div>
<div class="center upto">
  	<h3 class="newinTitle">
		<?= $getsome ?>
	</h3> 
	<div class="center bar"></div>
</div>
<div class="center updown">
   <form action="loginOk.php" method="post">
    <p>아이디 : <input type="text" name="userId"></p>
    <p>비밀번호: <input type="password" name="userPw" ></p>
    <p><input type="submit" value="login"></p>
    </form>
    <div class="join">
        <p class="sub">아직 회원이 아니세요?</p>/<a href="join.php" class="joinin">회원가입</a>
    </div>
</div>
</body>
<script>
      var menu=$('.menu');
    var menuimg=$('.menu>img');
    var menuinside=$('.menuinside');
    menu.on('click',function(){       menuimg.hide();
        $(this).animate({
           height:  '100%'
        }).promise().done(function(){
        menuinside.show();	
		});
    });
    
      var x=$('.menuinside>img');
    x.on('click',function(){
        history.go(-1);
    })
</script>
</html>