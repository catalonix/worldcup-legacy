<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$sensorNo = $_POST["sensorNo"];
		
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");

	//ndvi 이미지 경로
	$qry = "SELECT SUBSTRING(DATE(TM), 1, 10) AS TM, ROUND(AVG(NDVI),3) AS NDVI 
            FROM NDVI_IMG
            WHERE SENSOR_NO = '$sensorNo'
            GROUP BY SUBSTRING(DATE(TM), 1, 10)
            ORDER BY SUBSTRING(DATE(TM), 1, 10) DESC
            LIMIT 5;";
	
    $qry2 = "SELECT ROUND(NDVI_daily,3) NDVI_daily,ROUND(NDVI_ma5,3) NDVI_ma5 FROM FUTURE WHERE SENSOR_NO='$sensorNo' ORDER BY TM DESC LIMIT 1";
    
    $resultMap = new stdClass();
    //현재
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	while($row = mysqli_fetch_assoc($result)){
	    array_push($list,$row);
	}
    
	//미래
	$result2 = mysqli_query($connect_local,$qry2);
	
	$row2 = mysqli_fetch_assoc($result2);
		
	dbclose_local_mysql($connect_local_mysql);
	
	$resultMap -> now = $row2;
	$resultMap -> list = $list;
	
	echo json_encode($resultMap);
?>