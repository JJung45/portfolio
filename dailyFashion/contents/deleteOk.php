<?php

$id=$_GET['id'];

include "../auth/dbConnect.php";

$query="delete from post where id='$id'";

$result = $conn->query($query);

if($result==false){
	
	echo "
	<script>
		alert('삭제오류');
		location.href='./mypage.php';
	</script>";
	
}else{
	
	echo "
	<script>
		alert('삭제완료!');
		location.href='./mypage.php';
	</script>";
}
exit;

?>