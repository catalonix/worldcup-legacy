<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$loc = $_POST["loc"];
		
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");

    $qry2 = "SELECT * FROM SOIL_SENSOR WHERE LOC_NO='spot$loc' ORDER BY TM DESC LIMIT 1";

	$result2 = mysqli_query($connect_local,$qry2);
	
	$row2 = mysqli_fetch_assoc($result2);
	
	$qry4 = "SELECT * FROM RATING_VALUE";
	
	$resultMap = new stdClass();
	
	$result4 = mysqli_query($connect_local,$qry4);
	$list2 = array();
	while($row = mysqli_fetch_assoc($result4)){
	    array_push($list2,$row);
	}
	
	$resultMap -> spot = $row2;
	$resultMap -> rate = $list2;
		
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($resultMap);
?>