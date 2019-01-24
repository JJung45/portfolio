<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zara</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/zara_gTM_icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="wrap">
       <div class="gallery">
       <ul class="gall">
           <li>
             <div class="content firstmain">
              <a href="https://www.zara.com/kr/ko/woman-editorial-9-l1471.html?v1=920010">
               <span class="denimtxt contentMaintxt">
                   DENIM
               </span>
               <span class="contentetctxt">
                   WOMAN ECITORIAL <br>
                   SPRING SUMMER .2018
               </span>
           </a>
            </div> 
           </li>
           <li>
             <div class="content secondmain">
              <a href="https://www.zara.com/kr/ko/kids-girl-editorial-4-l372.html?v1=826503">
               <span class="contentMaintxt">
                   Patterns
               </span>
               <span class="contentetctxt patternstext">
                  spring summer collection / 2018
               </span>
           </a>
            </div> 
           </li>
           <li>
            <div class="content thirdmain">
              <a href="https://www.zara.com/kr/ko/trf-editorial-5-l1489.html?v1=937003">
               <span class="contentMaintxt">
                   atlantic beach
               </span>
               <span class="contentetctxt beachtext">
                 TRF  spring summer 2018
               </span>
           </a>
            </div> 
           </li>
           <li>
               <div class="content fourthmain">
              <a href="https://www.zara.com/kr/ko/man-editorial-8-l636.html?v1=569501">
               <span class="contentMaintxt">
                   multicolour<br> clash
               </span>
               <span class="contentetctxt colortext">
                 spring summer Man / 2018
               </span>
           </a>
            </div> 
           </li>
       </ul>
       
        <div class="logo">
            Z A R A
        </div>
        <div class="hmenu">
            <ul>
                <li><a href="newin.php?title=NEWIN">NEW IN</a></li>
                <li class="br">BEST<br> SELLERS</li>
                <li>WOMAN</li>
                <li>TRF</li>
                <li>MAN</li>
                <li>KIDS</li>
                <li class="br">STORIES</li>
                <li>JOIN LIFE</li>
            </ul>
        </div>
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
        </div>
        </div>
</body>
<script>
    var galleryLi=$('.gallery>ul>li');
    galleryLi.eq(0).fadeIn(0).siblings().fadeOut(0);
    
    var num=-1;
    function autoGallery(){
        num++;
        galleryLi.eq(num).fadeIn().siblings().fadeOut();
        if(num>galleryLi.length-2) num=-1;
    }
    setInterval(autoGallery,3000);
    
    var gallArr=[];
    for(var i=0; i<galleryLi.length; i++){
        gallArr.push('url(img/bg'+i+'.jpg) 50% no-repeat');
	
        galleryLi.eq(i).css({
            background: gallArr[i],
            backgroundSize: 'cover'
        })
		}    
</script>
</html>