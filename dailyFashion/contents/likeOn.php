<?php

session_start();

include "../auth/dbConnect.php";

$data = $_POST['id'];
$add = '';

if(!isset($_SESSION['userId'])){
	echo "
	<script>
		alert('접근오류');
		history.go(-1);
	</script>";
	exit;
}else{
	
	$userId = $_SESSION['userId'];
	if(!is_user_has_alredy_like_content($conn, $userId, $data)){
		
		$query = "insert into liketo (postId, writer) values ('$data','$userId')";
		
		$result = $conn->query($query);
		
		$add .= count_content_like($conn, $data);	
		
	}else{
		
		$query = "delete from liketo where postId='$data' and writer='$userId'";
		
		$result = $conn->query($query);
		
		$count_like = count_content_like($conn, $data);
		
		$add .= $count_like;
	
	}
	
	echo $add;

}

function is_user_has_alredy_like_content($conn, $userId, $data){
	$query="select * from liketo where postId='$data' and writer='$userId'";
	
	$result = $conn->query($query);
	
	if($result->num_rows!=0){
		return true;
	}else{
		return false;
	}
}

function count_content_like($conn, $data){
	$query="select * from liketo where postId='$data'";
	
	$result = $conn->query($query);
	
	$count = mysqli_num_rows($result);
	return $count;
	
}
?>