<?
	include "../include/db_connect.php";
	
	$workNo = $_POST["workNo"];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql, "set names utf8");
	
	$qry = "DELETE FROM WATER_TASK WHERE WORK_NO=?";
	
	$stmt = mysqli_prepare($connect_local, $qry);

	
	$bind = mysqli_stmt_bind_param($stmt, "s",$workNo);
	
	if ($bind === false) {
		
	}else{
		mysqli_stmt_execute($stmt);
	}
	
	dbclose_local_mysql($connect_local_mysql);
	
	header("Location:../html/work-history.html");
?>