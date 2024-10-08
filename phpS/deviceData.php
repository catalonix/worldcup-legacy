<?
    header("Content-Type: application/json");
    
    include "../include/db_connect.php";
    
    
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
    $startTime = $_GET["startTime"];
    $endTime = $_GET["endTime"];
    
    $startDate = $startDate." ".$startTime;
    $endDate = $endDate." ".$endTime;
    
    $sensorNo = $_GET["deviceId"];
    
    $sensorNos = '';
    
    for($i=0; $i<count($_GET['deviceId']); $i++){
        $sensorNos .= "'".$sensorNo[$i]."',";
    }
    
    $sensorNos = substr($sensorNos,0,strlen($sensorNos)-1);
    
    $connect_local = dbconn_local_mysql('grow');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "select *,FLOOR(UNIX_TIMESTAMP(TM)/60)*60*1000 AS UTM from API_DATA D JOIN DEVICE_INFO I ON D.DEVICE_ID = I.DEVICE_ID WHERE TM BETWEEN '$startDate' AND '$endDate' AND I.DEVICE_ID IN(".$sensorNos.") ORDER BY D.DEVICE_ID,D.TM";
    
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();
    $list2 = [];
    $chk = array();
    
    while($row = mysqli_fetch_assoc($result)){
        
        if(count($chk)==0){
            array_push($chk,$row["DEVICE_ID"]);
        }
        
        if(in_array($row["DEVICE_ID"],$chk)){
            array_push($list2,$row);
        }else{
            array_push($list,$list2);
            $list2 = array();
            array_push($chk,$row["DEVICE_ID"]);
            array_push($list2,$row);
        }
        
        //array_push($list,$row);
    }
    
    array_push($list,$list2);
    
    dbclose_local_mysql($connect_local_mysql);
    
    
    echo json_encode($list);
?>