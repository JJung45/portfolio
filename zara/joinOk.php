<?php

$userId=$_POST['userId'];
$userPw=$_POST['userPw'];
$userName=$_POST['userName'];
$userPhone=$_POST['userPhone'];
$userEmail=$_POST['userEmail'];

include "dbConnect.php";

if(!isset($userId)|| !isset($userPw) || !isset($userName) || !isset($userPhone) || !isset($userEmail)){
    echo "
    <script>
        alert('not working!');
        location.href='join.php?title=JOIN';
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
if($userName==null || $userName==""){
    echo "
    <script>
        alert('이름을 입력해주세요');
        history.go(-1);
    </script>";
    exit;
}
$userPhoneR=implode('-',$userPhone);
if($userPhone==null || $userPhone==""){
    echo "
    <script>
        alert('휴대번호를 입력해주세요');
        history.go(-1);
    </script>";
    exit;
}
if($userEmail==null || $userEmail==""){
    echo "
    <script>
        alert('이메일을 입력해주세요');
        history.go(-1);
    </script>";
    exit;
}

$query="insert into joinmember(userId, userPw, userName, userPhone, userEmail) values ('$userId', '$userPw', '$userName', '$userPhoneR', '$userEmail')";
$result=$conn->query($query);

if($result==false){
    echo "
    <script>
        alert('join error');
        location.href='join.php?title=JOIN';
    </script>";
    exit;
}

echo "
<script>
    alert('join OK!');
    location.href='login.php?title=LOGIN'
</script>";
exit;

?>