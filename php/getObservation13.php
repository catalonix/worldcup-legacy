<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

//기상센서
$qry = "SELECT * FROM FUTURE JOIN(
            SELECT SENSOR_NO,MAX(TM) AS TM FROM FUTURE
            WHERE TM > '2023-08-01' AND TM LIKE '%13:%'
            GROUP BY SENSOR_NO
        ) S USING(TM,SENSOR_NO)";



$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    $row["TM"] = substr($row["TM"],0,16);
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>