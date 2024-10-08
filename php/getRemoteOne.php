<?
	header("Content-Type: application/json");
	
	include "../include/db_connect.php";
	
	$remoteCode = $_GET["remoteCode"];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	$qry = "SELECT * FROM REMOTE_INFO WHERE REMOTE_CODE='$remoteCode'";
	
	$result = mysqli_query($connect_local,$qry);
		
	$row = mysqli_fetch_assoc($result);
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($row);
?>