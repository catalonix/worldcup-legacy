<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$weather = $_POST["weather"];
	$camera = $_POST["camera"];
	$spot = $_POST["spot"];
	
	$today = date("Y-m-d");
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	//토양센서 마지막 데이터
	$qry = "SELECT * FROM SOIL_SENSOR where loc_no='spot$spot' order by tm desc LIMIT 1";
	
	//기상센서 당일 데이터
	$qry2 = "SELECT * FROM WEATHER_SENSOR WHERE SENSOR_CODE='$weather' AND TM >= '$today'";
	
	//ndvi 이미지 경로
	$qry3 = "SELECT * FROM NDVI_LAST WHERE SENSOR_NO='$camera'";
	
	$qry4 = "SELECT * FROM RATING_VALUE";
	
	$resultMap = new stdClass();
	
	$result = mysqli_query($connect_local,$qry);
	$r = mysqli_fetch_assoc($result);
	
	$result2 = mysqli_query($connect_local,$qry2);
	
	$list = array();
	while($row = mysqli_fetch_assoc($result2)){
	    array_push($list,$row);
	}
	
	$result3 = mysqli_query($connect_local,$qry3);
	$c = mysqli_fetch_assoc($result3);
	
	$result4 = mysqli_query($connect_local,$qry4);
	$list2 = array();
	while($row = mysqli_fetch_assoc($result4)){
	    array_push($list2,$row);
	}
	
	$resultMap -> weather = $list;
	$resultMap -> camera = $c;
	$resultMap -> spot = $r;
	$resultMap -> rate = $list2;
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($resultMap);
?>