<?
	include "../include/db_connect.php";
	
	$userId = $_POST["userId"];
	$password = $_POST["password"];
	$userName = $_POST["userName"];
	$hp1 = $_POST["hp1"];
	$hp2 = $_POST["hp2"];
	$hp3 = $_POST["hp3"];
	$dept = $_POST["dept"];
	$userCode = $_POST["userCode"];
	
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local_mysql, "set names utf8");
	
	$qry = "INSERT INTO USER_INFO(USER_ID,PASSWORD,USER_NAME,USER_CODE,DEPT,HP,REG_DATE) 
			VALUES(?,PASSWORD(?),?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'))";
	
	$stmt = mysqli_prepare($connect_local, $qry);
	
	var_dump($password,$password,$userName,$hp1."-".$hp2."-".$hp3,$dept,$userCode,$userId);
	
	$hp1 = $hp1."-".$hp2."-".$hp3;
	
	$bind = mysqli_stmt_bind_param($stmt, "ssssss",$userId,$password,$userName,$userCode,$dept,$hp1);
	
	if ($bind === false) {
		
	}else{
		mysqli_stmt_execute($stmt);
	}
	
	dbclose_local_mysql($connect_local_mysql);
	
	//header("Location:../html/user-management.html");
?>