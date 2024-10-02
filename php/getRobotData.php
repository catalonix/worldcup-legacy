<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	
	//$qry = "SELECT * FROM SOIL_SENSOR WHERE TM_FC = (SELECT MAX(TM_FC) FROM SOIL_SENSOR)";
	$qry = "SELECT * FROM SOIL_SENSOR A,
			(SELECT LOC_NO,MAX(TM_FC) AS TM_FC FROM SOIL_SENSOR GROUP BY LOC_NO) B
			WHERE A.LOC_NO = B.LOC_NO AND A.TM_FC = B.TM_FC 
			ORDER BY A.LOC_NO";
	
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
	
	while($row = mysqli_fetch_assoc($result)){
		array_push($list,$row);
	}
	
	dbclose_local_mysql($connect_local_mysql);
	
	echo json_encode($list);
?>