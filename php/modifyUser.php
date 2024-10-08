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
	mysqli_query($connect_local, "set names utf8");
	
	$qry = "UPDATE USER_INFO SET PASSWORD=
								 CASE ? WHEN \"\" THEN PASSWORD ELSE PASSWORD(?) END,
								 USER_NAME=?,
								 HP=?,
								 DEPT=?,
								 USER_CODE=? 
		 	WHERE USER_ID=?";
	
	$stmt = mysqli_prepare($connect_local, $qry);
	
	//var_dump($password,$password,$userName,$hp1."-".$hp2."-".$hp3,$dept,$userCode,$userId);
	
	$hp1 = $hp1."-".$hp2."-".$hp3;
	
	$bind = mysqli_stmt_bind_param($stmt, "sssssss",$password,$password,$userName,$hp1,$dept,$userCode,$userId);
	
	
	if ($bind === false) {

	}else{
		mysqli_stmt_execute($stmt);
	}
	dbclose_local_mysql($connect_local);
	
	header("Location:../html/user-management.html");
?>