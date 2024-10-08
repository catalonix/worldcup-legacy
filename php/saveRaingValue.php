<?
	header("Content-Type: application/json");
	
	include "../include/db_connect.php";
	
	$temp1Under = $_POST['temp1Under'];
	$temp2Under = $_POST['temp2Under'];
	$temp2Over = $_POST['temp2Over'];
	$temp3Under = $_POST['temp3Under'];
	$temp3Over = $_POST['temp3Over'];
	$temp4Under = $_POST['temp4Under'];
	$temp4Over = $_POST['temp4Over'];
	$temp5Over = $_POST['temp5Over'];
	
	$humiUnder = $_POST['humi1Under'];
	$humi2Under = $_POST['humi2Under'];
	$humi2Over = $_POST['humi2Over'];
	$humi3Under = $_POST['humi3Under'];
	$humi3Over = $_POST['humi3Over'];
	$humi4Under = $_POST['humi4Under'];
	$humi4Over = $_POST['humi4Over'];
	$humi5Over = $_POST['humi5Over'];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	//온도 단계 저장
	$qry = "UPDATE RATING_VALUE SET UNDER=$temp1Under WHERE STEP=1 AND VALUE_NAME='temp'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$temp2Under,OVER=$temp2Over WHERE STEP=2 AND VALUE_NAME='temp'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$temp3Under,OVER=$temp3Over WHERE STEP=3 AND VALUE_NAME='temp'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$temp4Under,OVER=$temp5Over WHERE STEP=4 AND VALUE_NAME='temp'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET OVER=$temp5Over WHERE STEP=5 AND VALUE_NAME='temp'";
	mysqli_query($connect_local,$qry);

	//습도 단계 저장
	$qry = "UPDATE RATING_VALUE SET UNDER=$humi1Under WHERE STEP=1 AND VALUE_NAME='humi'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$humi2Under,OVER=$humi2Over WHERE STEP=2 AND VALUE_NAME='humi'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$humi3Under,OVER=$humi3Over WHERE STEP=3 AND VALUE_NAME='humi'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET UNDER=$humi4Under,OVER=$humi5Over WHERE STEP=4 AND VALUE_NAME='humi'";
	mysqli_query($connect_local,$qry);
	
	$qry = "UPDATE RATING_VALUE SET OVER=$humi5Over WHERE STEP=5 AND VALUE_NAME='humi'";
	mysqli_query($connect_local,$qry);
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($_POST);
?>