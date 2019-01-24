<?php

$userId=$_POST['userId'];
$userPw=$_POST['userPw'];

include "dbConnect.php";
session_start();

if(!isset($userId)|| !isset($userPw)){
    echo "
    <script>
        alert('not working!');
        location.href='login.php?title=LOGIN';
    </script>";
    exit;
}

if($userId==null || $userId==""){
    echo "
    <script>
        alert('아이디를 입력해주세요');
        history.go(-1);
    </script>";
    exit;
}
if($userPw==null || $userPw==""){
    echo "
    <script>
        alert('비번을 입력해주세요');
        history.go(-1);
    </script>";
    exit;
}

$query="select * from joinmember where userId='$userId'";

$result=$conn->query($query);
if($result->num_rows==0){
     echo "
    <script>
        alert('해당 데이터가 없습니다');
        location.href='login.php?title=LOGIN';
    </script>";
    exit; 
}
while($row=$result->fetch_assoc()){
    $userIdR=$row['userId'];
    $userPwR=$row['userPw'];
    
    if($userId==$userIdR and $userPw==$userPwR){
        $_SESSION['sessionId']=$userId;
        echo "
        <script>
            alert('login OK!');
            history.go(-2);
        </script>";
        exit;
    }
    else{
          echo "
        <script>
            alert('login error!');
            location.href='login.php?title=LOGIN';
        </script>";
        exit;
    }
}

  echo "
        <script>
            alert('login error!');
            location.href='login.php?title=LOGIN';
        </script>";
        exit;


?>