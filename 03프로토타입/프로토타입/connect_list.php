<?php
header("Content-Type: text/html; charset=UTF-8");
$mysql_hostname = "waytech.kr";
$mysql_username = "waytechtest";
$mysql_password = "dnpdl123";
$mySql_database = "waytechtest";

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mySql_database);  //DB연결

//if else문 대신 or die문 추가해도 됨 or die('Error connectiong to MySQL server')
//db 연결 확인


if(mysqli_connect_errno($connect)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$res = mysqli_query($connect, "select * from HumanInfo");
$result = array();

while($row = mysqli_fetch_array($res)){
	array_push($result, array('id'=>$row[0],'name'=>$row[1],'address'=>$row[2]));
}

echo json_encode(array("result"=>$result));

mysqli_close($connect);

?>