<?
	header("Content-Type: application/json");
	
	include "../include/db_connect.php";
	
	$sensorCode = $_GET["sensorCode"];
	$startDate = $_GET["startDate"]." 00:00:00";
	$endDate = $_GET["endDate"]." 23:59:59";
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local,"set names utf8");

    //기상센서
	if(substr($sensorCode,0,1)=="W"){
	   $qry = "SELECT * FROM WEATHER_SENSOR JOIN SENSOR_INFO USING(SENSOR_CODE) WHERE TM BETWEEN '$startDate' AND '$endDate' AND GROUP_CODE='S001' ORDER BY TM DESC";
	}

    //로봇센서
	if(substr($sensorCode,0,1)=="R"){
	    $qry = "SELECT 
                  DATE_FORMAT(FROM_UNIXTIME(FLOOR(UNIX_TIMESTAMP(TM)/(2*3600))*(2*3600)), '%Y-%m-%d %H:%i') AS TwoHourInterval,
                  ROUND(AVG(SMO),2) as SMO,
                  ROUND(AVG(STP),2) as STP,
                  ROUND(AVG(SEC),3) as SEC
                FROM SOIL_SENSOR
                WHERE TM BETWEEN '$startDate' AND '$endDate' AND SENSOR_CODE='R001'
                GROUP BY TwoHourInterval
                ORDER BY TM DESC ";
	}

    //카메라
	if(substr($sensorCode,0,1)=="C"){
	    //$qry = "SELECT * FROM NDVI_IMG N JOIN SENSOR_INFO I ON N.SENSOR_NO=I.SENSOR_CODE AND SENSOR_NO='$sensorCode' AND TM BETWEEN '$startDate' AND '$endDate' ORDER BY TM DESC";
	    $qry = "SELECT SENSOR_NO,SENSOR_NAME,TM,NDVI FROM NDVI_IMG N JOIN SENSOR_INFO I 
                ON N.SENSOR_NO=I.SENSOR_CODE AND I.GROUP_CODE='S001' AND TM BETWEEN '$startDate' AND '$endDate' AND TM LIKE '%12:%' ORDER BY TM DESC";
    }
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	while($row = mysqli_fetch_assoc($result)){
        $row["TM"] = substr($row["TM"],0,16);
		array_push($list,$row);
	}
	
	dbclose_local_mysql($connect_local);
	
	echo json_encode($list);
?>