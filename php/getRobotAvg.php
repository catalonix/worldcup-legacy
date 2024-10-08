<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql,"set names utf8");
	$qry = "SELECT ROUND(AVG(SMO),1) AS SMO,ROUND(AVG(STP),1) as STP FROM SOIL_SENSOR A,
			(SELECT LOC_NO,MAX(TM_FC) AS TM_FC FROM SOIL_SENSOR GROUP BY LOC_NO) B
			WHERE A.LOC_NO = B.LOC_NO AND A.TM_FC = B.TM_FC 
			ORDER BY A.LOC_NO";
	
	$result = mysqli_query($connect_local,$qry);
				
	$avg = mysqli_fetch_assoc($result);
			
	$qry4 = "SELECT * FROM RATING_VALUE";
	$result4 = mysqli_query($connect_local,$qry4);
	$list2 = array();
	while($row = mysqli_fetch_assoc($result4)){
	    array_push($list2,$row);
	}
	$resultMap = new stdClass();
	$resultMap -> rate = $list2;
	$resultMap -> avg = $avg;
	
	dbclose_local_mysql($connect_local_mysql);
		
	echo json_encode($resultMap);
?>