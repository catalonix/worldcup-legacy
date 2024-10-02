<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$tm = $_GET["tm"];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	$qry = "SELECT * FROM WATER_TASK WHERE WORK_DATE LIKE '$tm%'";
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	while($row = mysqli_fetch_assoc($result)){
		array_push($list,$row);
	}
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($list);
?>