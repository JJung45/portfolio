<?php
$getsome=$_GET['title'];
session_start();
?>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>zara</title>
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/sub.css">
	<link rel="shortcut icon" href="img/zara_gTM_icon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:700" rel="stylesheet">
     <style>
        .plus{
            font-weight: 900;
            position: relative;
        }
         .plus:after{
             content: "";
             display: block;
             width: 100%;
             height: 2px;
             background: #242323;
             position: absolute;
             top: 30px;
             z-index: 9;
         }
    </style>
    </head>
<body>
<div class="header">
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
                <li class="menuin five"><a href="newin.php?title=NEWIN">NEW IN</a></li>
                <li class="menuin seven br"><a href="">BEST SELLERS</a></li>
                <li class="menuin"><a href="">WOMAN</a></li>
                <li class="menuin"><a href="">TRF</a></li>
                <li class="menuin"><a href="">MAN</a></li>
                <li class="menuin"><a href="">KIDS</a></li>
                <li class="menuin br"><a href="">STORIES</a></li>
                <li class="menuin"><a href="">JOIN LIFE</a></li>
     </ul>
</div>
</div>
<div class="center upto">
  	<h3 class="newinTitle">
		<?= $getsome ?>
	</h3> 
	<div class="ulMenu">
		<ul class="clearfix">
			<li class="plus"><a href="newin.php?title=NEWIN">아우터</a></li>
			<li><a href="jacket.php?title=NEWIN">자켓</a></li>
			<li><a href="knit.php?title=NEWIN">니트</a></li>
            <li><a href="onepiece.php?title=NEWIN">원피스</a></li>
			<li><a href="tshirt.php?title=NEWIN">티셔츠</a></li>
            <li><a href="mantoman.php?title=NEWIN">맨투맨</a></li>
            <li><a href="skirt.php?title=NEWIN">스커트</a></li>
            <li><a href="pants.php?title=NEWIN">팬츠</a></li>
            <li><a href="jean.php?title=NEWIN">진</a></li>
            <li><a href="shoes.php?title=NEWIN">슈즈</a></li>
		</ul>
	</div>
	<div class="center bar"></div>
		</div>
		</div>
		<img src="img/top.png" class="fortop" alt="top">
</body>
<script>
    var menu=$('.menu');
    var menuimg=$('.menu>img');
    var menuinside=$('.menuinside');
    menu.on('click',function(){       menuimg.hide();
							
        $(this).animate({
           height:  '100%',
			overflowy: 'hidden'
        }).promise().done(function(){	
        menuinside.show();
		if(window.outerWidth<'640px'){
			$('.menuinside ul>li').css({
				marginTop: '60%',
				fontSize: '20px',
				paddingBottom: '50px'
			});
		}
			
		});
    });
    
    var x=$('.menuinside>img');
    x.on('click',function(){
        history.go(-1);
    })
//    var ulMenuLi=$('.ulMenu>ul>li');
    
//    ulMenuLi.on('click',function(){
//        $(this).addClass('plus').siblings().removeClass('plus');
//    })
   var fortop=$('.fortop');
	fortop.on('click',function(){
		$('html,body').animate({
			scrollTop:0
		},400);
	})
</script>