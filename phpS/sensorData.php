<?
    header("Content-Type: application/json");
    
    include "../include/db_connect.php";
    
    
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
    $startTime = $_GET["startTime"];
    $endTime = $_GET["endTime"];
    
    $startDate = $startDate." ".$startTime;
    $endDate = $endDate." ".$endTime;
    
    $sensorNo = $_GET["sensorNo"];
    
    $sensorNos = '';
    
    for($i=0; $i<count($_GET['sensorNo']); $i++){
        $sensorNos .= $sensorNo[$i].",";
    }
    
    $sensorNos = substr($sensorNos,0,strlen($sensorNos)-1);
    
    $connect_local = dbconn_local_mysql('grow');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "select *,FLOOR(UNIX_TIMESTAMP(TM)/1800)*1800*1000 AS UTM from SENSOR_DATA D JOIN SENSOR_INFO I ON D.SENSOR_NO = I.SENSOR_NO WHERE TM BETWEEN '$startDate' AND '$endDate' AND I.SENSOR_NO IN(".$sensorNos.") ORDER BY D.SENSOR_NO,D.TM";
    
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();
    $list2 = [];
    $chk = array();
    
    while($row = mysqli_fetch_assoc($result)){
        
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
        
        //array_push($list,$row);
    }
    
    array_push($list,$list2);
    
    dbclose_local_mysql($connect_local_mysql);
    
    
    echo json_encode($list);
?>