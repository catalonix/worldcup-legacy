<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT ROUND(AVG(NDVI_DAILY),3) NDVI FROM FUTURE JOIN(
        SELECT SENSOR_NO,MAX(TM) AS TM FROM FUTURE GROUP BY SENSOR_NO) S
        USING(SENSOR_NO,TM)";

$result = mysqli_query($connect_local,$qry);

$row = mysqli_fetch_assoc($result);

dbclose_local_mysql($connect_local);

echo json_encode($row["NDVI"]);
?>