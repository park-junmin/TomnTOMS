<?php
header("Content-Type: text/html; charset=UTF-8");	//charset 설정
$mysql_hostname = "waytech.kr";
$mysql_username = "waytechtest";
$mysql_password = "dnpdl123";
$mySql_database = "waytechtest";

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mySql_database);	//DB연결

//if else문 대신 or die문 추가해도 됨 or die('Error connectiong to MySQL server')
//db 연결 확인
if(mysqli_connect_errno($connect)){
	echo "DB fail";
}
else{
	echo "DB success";
}
echo'<br>';

$cm3 = $_GET["cm3"];
$cm4 = $_GET["cm4"];
$seatState3 = $_GET["seatState3"];
$seatState4 = $_GET["seatState4"];
$tissueState3 = $_GET["tissueState3"];
$tissueState4 = $_GET["tissueState4"];

//$query = "INSERT INTO iotTest (cm1, cm2) VALUES ('$cm1', '테스트')";	//Sb 삽입문
$query = "INSERT INTO arduino2 (cm3, cm4, seatState3, seatState4, tissueState3, tissueState4, time) VALUES ('$cm3', '$cm4', '$seatState3', '$seatState4','$tissueState3', '$tissueState4', NOW())";
var_dump($cm3, $cm4, $seatState3, $seatState4, $tissueState3, $tissueState4);
$result = mysqli_query($connect, $query) or die ('Error inserting DB');		//연결된 DB에 쿼리 실행

/*
if ($result) {
	echo $connect->affected_rows." data inserted into databases.";
	mysqli_free_result($result);
}
else{
	echo "ERROR: data can't inserted into databases";
}
*/
//mysqli_free_result($result);	//메모리 삭제
mysqli_close($connect);			//DB 연결 종료

?>