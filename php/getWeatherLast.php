<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

//기상센서 당일 데이터
$qry = "SELECT * FROM WEATHER_SENSOR JOIN
(SELECT SENSOR_CODE,MAX(TM) AS TM 
FROM WEATHER_SENSOR JOIN SENSOR_INFO
USING(SENSOR_CODE) 
GROUP BY(SENSOR_CODE)) LST 
USING(SENSOR_CODE,TM)";

$result = mysqli_query($connect_local,$qry);

$list = array();

$resultMap = new stdClass();

while($row = mysqli_fetch_assoc($result)){
    $row["TM"] = substr($row["TM"],0,16);
    array_push($list,$row);
}

$resultMap -> weather = $list;

dbclose_local_mysql($connect_local);

echo json_encode($resultMap);
?>