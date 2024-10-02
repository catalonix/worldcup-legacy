<?
    header("Content-Type: application/json");
         
    include "../include/db_connect.php";
    
    
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
    $startTime = $_GET["startTime"];
    $endTime = $_GET["endTime"];
    
    $branchName = $_GET["branchName"];
    
    $startDate = $startDate." ".$startTime;
    $endDate = $endDate." ".$endTime;
    
    $connect_local = dbconn_local_mysql('grow');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "SELECT *,FLOOR(UNIX_TIMESTAMP(TM)/1800)*1800*1000 AS UTM FROM             
            BRANCH B JOIN SENSOR_INFO I USING(BRANCH_NO) JOIN
            NDVI_IMG N USING(SENSOR_NO) 
            WHERE B.BRANCH_NAME = '$branchName' AND TM BETWEEN '$startDate' AND '$endDate' ORDER BY N.SENSOR_NO,N.TM";
        
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();
    $list2 = [];
    $chk = array();
    
    while($row = mysqli_fetch_assoc($result)){
        
        $row["IMG_PATH"] = "../data/".$row["SENSOR_NO"]."/".$row["IMG_PATH"];
        
        if(count($chk)==0){
            array_push($chk,$row["SENSOR_NO"]);
        }
        
        if(in_array($row["SENSOR_NO"],$chk)){
            array_push($list2,$row);
        }else{
            array_push($list,$list2);
            $list2 = array();
            array_push($chk,$row["SENSOR_NO"]);
            array_push($list2,$row);
        }
        
    }
    
    array_push($list,$list2);
    
    dbclose_local_mysql($connect_local_mysql);
    
    
    echo json_encode($list);
?>