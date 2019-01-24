<?php

session_start();
$userId = $_SESSION['userId'];
$txt = $_POST['txt'];
$date = $_POST['date'];
$id = $_POST['id'];

include "../auth/dbConnect.php";

$query = "update post set date='$date', content='$txt' where id='$id'";
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