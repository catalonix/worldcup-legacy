<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	$okList = array();
	$errList = array();
	
	$qry = "SELECT * FROM SENSOR_INFO WHERE LAST_UPDATED < DATE_SUB(NOW(), INTERVAL 24 HOUR)";
	
	$result = mysqli_query($connect_local,$qry);
	
	//24시간 이상 데이터가 들어오지 않은 목록
	while($row = mysqli_fetch_assoc($result)){
	    array_push($errList,$row);
	}
	
	$qry2 = "SELECT * FROM SENSOR_INFO WHERE LAST_UPDATED >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
	
	$result = mysqli_query($connect_local,$qry2);
	
	//24시간 이내 데이터 들어온 목록
	while($row = mysqli_fetch_assoc($result)){
	    array_push($okList,$row);
	}
	
	$ret = new stdClass();
	$ret -> success = $okList;
	$ret -> error = $errList;
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($ret);
?>