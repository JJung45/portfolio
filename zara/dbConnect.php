<?php

$localhost='localhost';
$dbId='root';
$dbPw='1111';
$dbName='zara';

$conn=new mysqli($localhost,$dbId,$dbPw,$dbName);

$conn->query("SET NAMES UTF8");

if($conn->connect_error){
    echo "
    <script>
        alert('오류!');
    </script>";
    exit;
}

?>