<?
header("Content-Type: application/json");

$searchDate = $_GET["searchDate"];

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

//$qry = "SELECT * FROM SOIL_SENSOR WHERE TM_FC = (SELECT MAX(TM_FC) FROM SOIL_SENSOR)";
$qry = "SELECT *,DATE_FORMAT(TM,'%H:%i') AS MINS FROM SOIL_SENSOR 
        where SENSOR_CODE='R001' AND tm BETWEEN  '$searchDate' AND DATE_ADD('$searchDate', INTERVAL 30 MINUTE)
        ORDER BY tm asc
        LIMIT 29";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>