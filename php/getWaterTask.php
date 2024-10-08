<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$startDate = $_POST["startDate"];
	$endDate = $_POST["endDate"];
    $workType = $_POST["workType"];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local,"set names utf8");

    $qry = "SELECT * FROM WATER_TASK WHERE WORK_TYPE='$workType' AND WORK_DATE BETWEEN '$startDate' AND '$endDate' ORDER BY WORK_DATE DESC";

    if($workType=='all'){
        $qry = "SELECT * FROM WATER_TASK WHERE WORK_DATE BETWEEN '$startDate' AND '$endDate' ORDER BY WORK_DATE DESC";
    }
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	while($row = mysqli_fetch_assoc($result)){
		array_push($list,$row);
	}
	
	dbclose_local_mysql($connect_local);
	
	echo json_encode($list);
?>