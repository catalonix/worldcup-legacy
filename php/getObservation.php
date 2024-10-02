<?
	header("Content-Type: application/json");
	
	include "../include/db_connect.php";
	
	$sensorCode = $_GET["sensorCode"];
	$startDate = $_GET["startDate"]." 00:00:00";
	$endDate = $_GET["endDate"]." 23:59:59";
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	if(substr($sensorCode,0,1)=="W"){
	   $qry = "SELECT * FROM WEATHER_SENSOR JOIN SENSOR_INFO USING(SENSOR_CODE) WHERE SENSOR_CODE='$sensorCode' AND TM BETWEEN '$startDate' AND '$endDate' ORDER BY TM DESC";
	}
	
	if(substr($sensorCode,0,1)=="R"){
	    $qry = "SELECT SENSOR_CODE,TM_FC,SENSOR_NAME,AVG(SMO) SMO,AVG(STP) STP,AVG(SEC) SEC FROM SOIL_SENSOR JOIN SENSOR_INFO USING(SENSOR_CODE) 
                WHERE TM_FC BETWEEN '$startDate' AND '$endDate' 
                GROUP BY SENSOR_CODE,TM_FC
                ORDER BY TM_FC DESC";
	}
	
	if(substr($sensorCode,0,1)=="C"){
	    $qry = "SELECT * FROM NDVI_IMG N JOIN SENSOR_INFO I ON N.SENSOR_NO=I.SENSOR_CODE AND SENSOR_NO='$sensorCode' AND TM BETWEEN '$startDate' AND '$endDate' ORDER BY TM DESC";
	}
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	while($row = mysqli_fetch_assoc($result)){
		array_push($list,$row);
	}
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($list);
?>