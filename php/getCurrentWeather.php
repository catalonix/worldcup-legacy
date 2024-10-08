<?
	header("Content-Type: application/json");
	
	include "../include/db_connect.php";

	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	$qry = "SELECT * FROM WEATHER_SENSOR ORDER BY tm DESC LIMIT 1";
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	$row = mysqli_fetch_assoc($result);
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($row);
?>