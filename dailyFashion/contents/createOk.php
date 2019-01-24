<?php
session_start();
$userId = $_SESSION['userId'];
$txt = $_POST['txt'];
$date = $_POST['date'];

if(!isset($txt)){
	echo 
	"<script>
		alert('글을 작성해주세요!');
		location.href='create.php';
	</script>";
	exit;
}

include "../auth/dbConnect.php";

$imageKind = array('image/jpeg','image/png','image/jpg');
$dir = "./imgs/";
$imageArr = [];
for($i=0;$i<$_POST['img_count']; $i++){
	$img_id="img_".$i;
	$img_file=time().$i.".jpg";
	
	if(isset($_FILES[$img_id]) && !$_FILES[$img_id]['error']){
		if(in_array($_FILES[$img_id]['type'],$imageKind)){
			if(move_uploaded_file($_FILES[$img_id]['tmp_name'],$dir.$img_file)){
				$img = $dir.$img_file;
				$imgArr[$i] = $img;
			}else{
				echo"업로드에 실패했습니다.";
				exit;
			}
		}else{
			echo "jpeg, png, jpg 만 지원합니다.";
			exit;
		}
	}else{
		echo "업로드에 실패했습니다.";
		exit;
	}
}

$imgStr = implode(',',$imgArr);
$query = "insert into post(writer, date, img, content) values ('$userId','$date','$imgStr','$txt')";
$result = $conn->query($query);
if($result!=0){
	echo "업로드 성공";
	exit;
}else{
	echo "업로드 실패";
	exit;
}

$conn->close();

?>