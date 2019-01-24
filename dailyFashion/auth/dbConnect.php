<?php

$hostName = "localhost";
$dbId = "root";
$dbPw = "1111";
$dbName = "dailyfashionapp";

$conn = new mysqli($hostName, $dbId, $dbPw, $dbName);

$conn->query("SET NAMES UTF8");

if($conn->connect_error){
	die("연결실패");
}
//$hostName = "localhost";
//$dbId = "wjdgkrud";
//$dbPw = "awt5fgse45.";
//$dbName = "dailyFashionapp";
//
//$conn = new mysqli($hostName, $dbId, $dbPw, $dbName);
//
//$conn->query("SET NAMES UTF8");
//
//if($conn->connect_error){
//	die("연결실패");
//}

?>