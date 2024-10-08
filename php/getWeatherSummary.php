<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$weather = $_POST["sensorCode"];
	
	$today = date("Y-m-d");
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local,"set names utf8");

	//기상센서 당일 데이터
	$qry = "SELECT * FROM WEATHER_SENSOR WHERE SENSOR_CODE='$weather' AND TM >= '$today'";
    
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();

    $resultMap = new stdClass();
	
	while($row = mysqli_fetch_assoc($result)){
        $row["TM"] = substr($row["TM"],0,16);
	    array_push($list,$row);
	}
	
	$resultMap -> weather = $list;
	
	dbclose_local_mysql($connect_local);
	
	echo json_encode($resultMap);
?>