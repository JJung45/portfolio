<?php

$uploadName=$_POST['uploadName'];
$uploadPrice=$_POST['uploadPrice'];
$option=$_POST['option'];
include "dbConnect.php";

$imageKind=array('image/pjeg','image/jpeg','image/jpg','image/png','image/x-png');
$dir="./fileupload/";

for($i=0; $i<$_POST['image_count']; $i++){
	$image_id="image_".$i;
	$image_file=time().$i.".jpg";
	
	if(isset($_FILES[$image_id]) && !$_FILES[$image_id]['error']){
		if(in_array($_FILES[$image_id]['type'], $imageKind)){
			if(move_uploaded_file($_FILES[$image_id]['tmp_name'],$dir.$image_file)){
				
				$path=$dir.$image_file;
				
$image=$dir.$image_file;
$query="insert into content(gall, options, name, price) values('$path','$option','$uploadName','$uploadPrice')";
$result=$conn->query($query);
if($result!=0){
	echo "업로드성공";
	exit;
}
else{
	echo "업로드실패";
	exit;
}
				
//$query="select num from image_content where userId='$userId' and userimage='$image'";
//$result=$conn->query($query);
//	echo "
//	<script>
//		var xhr=new XMLHttpRequest();
//		xhr.open('GET','main/posting.php?num="+$result+",true);
//	</script>";
//	exit;
			}else{
				echo "
				타입이 맞지 않아요!";
			}
		}
		else{
				echo "
				업로드 실패!";
			}
	}
}
exit;

//var_dump($_POST['userTxt']);
//$post_data=$_POST['userTxt'];
//$filename='imgs/data.txt';
//$handle=fopen($filename,"w");
//if(empty($post_data)){
//	fwrite($handle, 'I did not get any data from ajax, userTxt is: '.$post_data);
//	
//}
//if(!empty($post_data)){
//	fwrite($handle,'...reccived dadta from ajax! userTxt: ');
//
//fwrite($handle,$post_data);
//}
//fclose($handle);

$conn->close();

?>