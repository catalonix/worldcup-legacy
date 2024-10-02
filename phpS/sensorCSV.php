<?
	header('Content-type: text/csv; charset=UTF-8');
	
    header("Content-Disposition: attachment; filename=".$_GET["startDate"]."_".$_GET["endDate"].".csv");
    header("Pragma: no-cache");
    echo "\xEF\xBB\xBF";
	header("Expires: 0");
    
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
    
    $qry = "select * from SENSOR_DATA D JOIN SENSOR_INFO I ON D.SENSOR_NO = I.SENSOR_NO WHERE TM BETWEEN '$startDate' AND '$endDate' AND D.SENSOR_NO IN(".$sensorNos.") ORDER BY D.SENSOR_NO,TM";
    
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();
    
    while($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
        echo $row["SENSOR_NAME"].",";
        echo $row["TM"].",";
        echo $row["SMO"].",";
        echo $row["STP"].",";
        echo $row["SEC"].",";
        echo $row["PM10"].",";
        echo $row["PM25"].",";
        echo $row["TEMP"].",";
        echo $row["HUMI"]."\r\n";
    }
    
    dbclose_local_mysql($connect_local_mysql);
    
    

?>