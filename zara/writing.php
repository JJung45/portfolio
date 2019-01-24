<?php
$getsome=$_GET['title'];
session_start();
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
   <form method="post" id="writing">
   <div class="gall"></div>
    <p>사진: <a href="javascript:" onclick="fileUploadAction();" class="my_upload"></a>	<input type="file" name="upload" id="upload" multiple/></p>
    <p>분류: <select name="clothes" id="option">
    	<option value="onepiece">onepiece</option>
    	<option value="pants">pants</option>
    	<option value="shoes">shoes</option>
    	<option value="skirt">skirt</option>
    	<option value="tshirt">tshirt</option>
    	<option value="mantoman">mantoman</option>
    	<option value="outer">outer</option>
    	<option value="jacket">jacket</option>
    	<option value="knit">knit</option>
    	<option value="jean">jean</option>
    </select></p>
    <p class="name">이름: <input type="text" name="uploadName" class="uploadName"></p>
    <p>가격: <input type="text" name="uploadPrice" class="uploadPrice"></p>
    <p><a href="javascript:" class="my_button" onclick="submitAction();">upload</a></p>
    </form>
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
	
//	$(function(){
//		$('.submitBtn').click(function(){
//			var form=$('#writing')[0];
//			var formData=new FormData(form);
//			$.ajax({
//				url: 'fileupload',
//				processData: false,
//				contentType: false,
//				data: formData,
//				type: 'post',
//				success: function(result){
//					alert('업로드 성공');
//				}
//			})
//		})
//	})
	
var sel_files=[];
    
    $(document).ready(function(){
        $('#upload').on('change',change);
    });
    
    function fileUploadAction(){
        $('#upload').trigger('click');
    }
    
    function change(e){
        sel_files=[];
        
        var files=e.target.files;
        var filesArr=Array.prototype.slice.call(files);
        
        var index=0;
        filesArr.forEach(function(f){
            if(!f.type.match("image.*")){
                alert('이미지 확장자만 가능합니다!');
                return;
            }
            
            sel_files.push(f);
            
            var reader=new FileReader();
            reader.onload=function(e){
                var html="<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\""+e.target.result+"\" data-file='"+f.name+"' class='selProductFile' title='Click to remove' width=100px; height=100px;></a>";
                $('.gall').append(html);
                index++;
            }
            reader.readAsDataURL(f);
        });
    }
    
    function deleteImageAction(index){
        sel_files.splice(index,1);
        
        var img_id='#img_id_'+index;
        $(img_id).remove();
    }
	
	function submitAction(){
		var data=new FormData();
		
		if(sel_files.length<1){
			alert("업로드할 파일을 선택하세요");
			return;
		}
		
		for(var i=0, len=sel_files.length; i<len; i++){
			var name="image_"+i;
			data.append(name,sel_files[i]);
		}
		data.append("image_count", sel_files.length);
		data.append("uploadName",$('.uploadName').val());
		data.append("uploadPrice",$('.uploadPrice').val());
		data.append("option",$('#option').val());
		
		var xhr=new XMLHttpRequest();
		xhr.open("POST","writingOk.php");
		xhr.onload=function(e){
			if(this.status==200){
				console.log("result: "+e.currentTarget.responseText);
				
				alert(e.currentTarget.responseText);
				location.href='newin.php?title=NEWIN';
			}
		}
		xhr.send(data);
	}
</script>
</html>
<?php
//	$path='fileupload/';
//		
//	$valid_formats=array('jpg','png','gif','bmp','jpeg');
//	$data=array();
//	$data['success']=false;
//		
//	if(isset($_POST) and $_SERVER['REQUEST_METHOD']=="post"){
//		$name=$_FILES['service_image']['name'];
//		$name=$_FILES['service_image']['size'];
//		
//		if(strlen($name)){
//			list($txt,$ext)=explode(".",$name);
//			if(in_array($ext,$valid_formats)){
//				if($size<(1024*1024)){
//					$actual_image_name=time()."_image.".$ext;
//					$tmp=$_FILES['service_image']['tmp_name'];
//					if(move_uploaded_file($tmp, $path,$actual_image_name)){
//						$data['success']=true;
//						$data['url']="http://"
//					}
//				}
//			}
//		}
//	}
?>