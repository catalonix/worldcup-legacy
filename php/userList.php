<?
    header("Content-Type: application/json");
    
    include "../include/db_connect.php";

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $userCode = $_GET["userCode"];
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
    
    $qry = "SELECT * FROM USER_INFO WHERE USER_CODE='$userCode' AND REG_DATE BETWEEN '$startDate' AND '$endDate'";
    
    if($userCode==''){
    	$qry = "SELECT * FROM USER_INFO WHERE REG_DATE BETWEEN '$startDate' AND '$endDate'";
    }
    
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();

    $i = 1;
    
    while($row = mysqli_fetch_assoc($result)){
    	$row["PASSWORD"] = "";
    	$row["SEQ"] = $i;
    	
    	if($row["USER_CODE"]==1){
    		$row["USER_CODE"]="관리자";
    	}else{
    		$row["USER_CODE"]="사용자";
    	}
    	
		array_push($list,$row);
		$i++;
    }
    
    
    dbclose_local_mysql($connect_local_mysql);
    
    
    echo json_encode($list);
?>